<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Recipe;
use App\Storage\MySqlDatabaseRecipeStorage; 
use App\RecipeManager;

$pdo = new PDO('mysql:host=localhost;dbname=Recipes;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock', 'root', 'root');

$storage = new MySqlDatabaseRecipeStorage($pdo); 
$manager = new RecipeManager($storage);

$recipe = new Recipe();
$recipe->setCreatedAt(new DateTime())
       ->setName('Tarte aux fraises')
       ->setDescription('La recette de la fameuse tarte aux Fraises.')
       ->setPeople(4)
       ->setPreparationTime(40);
$addedRecipeId = $manager->addRecipe($recipe);

$recipe = $manager->getRecipe($addedRecipeId);
echo '<pre>'; print_r($recipe); echo '</pre>';
?>
