<?php
class Product
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function getAllByCategory($catId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE category_id=:cat ORDER BY id DESC");
        $stmt->execute(['cat' => $catId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAll()
    {
        return $this->pdo->query("SELECT p.*, c.name AS category_name FROM products p LEFT JOIN categories c ON p.category_id=c.id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO products (title, price, image, content, category_id) VALUES (:title, :price, :image, :content, :category_id)");
        $stmt->execute($data);
    }
    public function update($id, $data)
    {
        $data['id'] = $id;
        $stmt = $this->pdo->prepare("UPDATE products SET title=:title, price=:price, image=:image, content=:content, category_id=:category_id WHERE id=:id");
        $stmt->execute($data);
    }
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE id=:id");
        $stmt->execute(['id' => $id]);
    }
}
