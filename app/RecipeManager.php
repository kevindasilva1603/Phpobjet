<?php
namespace App;

use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;

class RecipeManager {
    private $storage;

    public function __construct(RecipeStorageInterface $storage) {
        $this->storage = $storage;
    }

    public function addRecipe(Recipe $recipe) {
        return $this->storage->store($recipe);
    }

    public function getRecipe($id) {
        return $this->storage->get($id);
    }

    public function getRecipes() {
        return $this->storage->all();
    }

    public function updateRecipe(Recipe $recipe) {
        $this->storage->update($recipe);
    }
}
