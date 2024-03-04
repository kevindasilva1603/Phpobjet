<?php
namespace App\Storage;

use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;

class SessionRecipeStorage implements RecipeStorageInterface {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['recipes'])) {
            $_SESSION['recipes'] = [];
        }
    }

    public function all() {
        return $_SESSION['recipes'];
    }

    public function delete($id) {
        unset($_SESSION['recipes'][$id]);
    }

    public function get($id) {
        return $_SESSION['recipes'][$id] ?? null;
    }

    public function store(Recipe $recipe) {
        $_SESSION['recipes'][] = $recipe; 
        end($_SESSION['recipes']);
        return key($_SESSION['recipes']); 
    }

    public function update(Recipe $recipe) {
        $id = $recipe->getId();
        $_SESSION['recipes'][$id] = $recipe;
    }
}
