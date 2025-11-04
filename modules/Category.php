<?php
class Category
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function getAll()
    {
        return $this->pdo->query("SELECT * FROM categories ORDER BY is DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($name)
    {
        $stmt = $this->pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);
    }
    public function update($id, $name)
    {
        $stmt = $this->pdo->prepare("UPDATE categories SET name=:name WHERE id=:id");
        $stmt->execute(['id' => $id, 'name' => $name]);
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id=:id");
        $stmt->execute(['id' => $id]);
    }
}
