<?php
namespace App\Models;

use DateTime;

class Recipe {
    protected $id;
    protected $createdAt;
    protected $name;
    protected $description;
    protected $people;
    protected $preparationTime;

    public function getId() { return $this->id; }
    public function getCreatedAt() { return $this->createdAt; }
    public function getName() { return $this->name; }
    public function getDescription() { return $this->description; }
    public function getPeople() { return $this->people; }
    public function getPreparationTime() { return $this->preparationTime; }

    public function setId($id) { $this->id = $id; return $this; }
    public function setCreatedAt(DateTime $createdAt) { $this->createdAt = $createdAt; return $this; }
    public function setName($name) { $this->name = $name; return $this; }
    public function setDescription($description) { $this->description = $description; return $this; }
    public function setPeople($people) { $this->people = $people; return $this; }
    public function setPreparationTime($preparationTime) { $this->preparationTime = $preparationTime; return $this; }
}
