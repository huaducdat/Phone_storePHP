<?php
$config = require '../config/db_config.php';
require '../database/Database.php';
require '../modules/Product.php';
$db = new Database($config);
$pdo = $db->connect();
$prodModel = new Product($pdo);
$catId = $_GET['id'] ?? 0;
$products = $prodModel->getAllByCategory($catId);
include '../layouts/header.php'
?>
<div class="container mt-5">
    <h3 class="mb-4">List Product</h3>
    <div class="row">
        <?php foreach ($products as $p): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="<?= $p['image'] ?>" class="card-img-overlay" alt="">
                    <div class="card-body">
                        <h5><?= htmlspecialchars($p['title']) ?></h5>
                        <p class="text-danger"><?= number_format($p['price']) ?></p>
                        <a href="detail.php?id=<?= $p['id'] ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include '../layouts/footer.php'; ?>