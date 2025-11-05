<?php
$config = require __DIR__ . '/../config/db_config.php';
$resultMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = new PDO("mysql:host={$config['host']};charset=utf8mb4", $config['username'], $config['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = file_get_contents(__DIR__ . '/../database/init.sql');
        $pdo->exec($sql);
        $resultMessage = "<div class='alert alert-success mt-3'>✅ Created Database <b>{$config['dbname']}</b> successfully.</div>";
    } catch (Exception $e) {
        $resultMessage = "<div class='alert alert-danger mt-3'>❌ Error: {$e->getMessage()}</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UFT-8">
    <title>Create Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="max-width: 500px; width:100%">
        <h3 class="text-center mb-3">Create Database</h3>
        <form action="" method="POST" onsubmit="return confirm('Create new Database? old data is going to delete!');">
            <div class="d-grid">
                <button type="submit" class="btn btn-danger btn-lg">Re-create Database</button>
            </div>
        </form>
        <?= $resultMessage ?>
        <div class="text-center mt-3"><a href="../public/index.php" class="btn btn-outline-secondary btn-sm">⬅️ Return Home page.</a></div>
    </div>

</body>

</html>