<?php
$config = require '../config/db_config.php';
require '../database/Database.php';
require '../modules/Category.php';
$db = new Database($config);
$pdo = $db->connect();
$catModel = new Category($pdo);
$cats = $catModel->getAll();

include '../layouts/header.php';
?>
<div class="container mt-5">
    <h3 class="mb-4">Product List</h3>
    <div class="row">
        <?php foreach ($cats as $c): ?>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5><?= htmlspecialchars($c['name']) ?></h5>
                        <a href="list.php?id=<?= $c['id'] ?>" class="btn btn-primary btn-sm">Show Product</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include '../layouts/footer.php'; ?>