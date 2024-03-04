<?php
namespace App\Storage;

use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;
use PDO;

class MySqlDatabaseRecipeStorage implements RecipeStorageInterface {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $stmt = $this->pdo->query('SELECT * FROM recipes');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM recipes WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function get($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM recipes WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store(Recipe $recipe) {
        $stmt = $this->pdo->prepare('INSERT INTO recipes (created_at, name, description, people, preparation_time) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([
            $recipe->getCreatedAt()->format('Y-m-d H:i:s'),
            $recipe->getName(),
            $recipe->getDescription(),
            $recipe->getPeople(),
            $recipe->getPreparationTime()
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update(Recipe $recipe) {
        $stmt = $this->pdo->prepare('UPDATE recipes SET name = ?, description = ?, people = ?, preparation_time = ? WHERE id = ?');
        $stmt->execute([
            $recipe->getName(),
            $recipe->getDescription(),
            $recipe->getPeople(),
            $recipe->getPreparationTime(),
            $recipe->getId()
        ]);
    }
}
