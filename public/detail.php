<?php
$config = require '../config/db_config.php';
require '../database/Database.php';
require '../modules/Product.php';

$db = new Database($config);
$pdo = $db->connect();
$model = new Product($pdo);
$id = $_GET['id'] ?? 0;
$p = $model->find($id);
include '../layouts/header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-5"><img src="<?= $p['image'] ?>" class="img-fluid" rounded alt=""></div>
        <div class="col-md-7">
            <h3><?= htmlspecialchars($p['title']) ?></h3>
            <h4 class="text-danger"><?= number_format($p['price']) ?></h4>
            <p><?= nl2br($p['content']) ?></p>
            <button class="btn btn-success">Buy now</button>
        </div>
    </div>
</div>
<?php include '../layouts/footer.php'; ?>