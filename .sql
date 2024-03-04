Nom de base de donnée : Recipes

la base de donnée a le meme nom que la table sauf une majuscule differente 

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    created_at DATETIME NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    people INT NOT NULL,
    preparation_time INT NOT NULL
);
