<?php
namespace App\Storage\Contracts;

use App\Models\Recipe;

interface RecipeStorageInterface {
    public function all();
    public function delete($id);
    public function get($id);
    public function store(Recipe $recipe);
    public function update(Recipe $recipe);
}
