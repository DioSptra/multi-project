<?php
session_start();

if (!isset($_SESSION['contacts'])) {
    $_SESSION['contacts'] = [];
}

// Tambah kontak
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    
    if ($name && $email && $phone) {
        $_SESSION['contacts'][] = [
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'phone' => htmlspecialchars($phone)
        ];
    }
}

// Reset semua
if (isset($_GET['reset'])) {
    $_SESSION['contacts'] = [];
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>📇 Contact Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>📇 Mini Contact Book</h1>

    <form method="POST">
        <input type="text" name="name" placeholder="Nama" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Nomor HP" required>
        <button type="submit">Tambah Kontak</button>
    </form>

    <h2>📃 Daftar Kontak</h2>
    <ul>
        <?php foreach ($_SESSION['contacts'] as $c): ?>
            <li><strong><?= $c['name'] ?></strong> - <?= $c['email'] ?> - <?= $c['phone'] ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="?reset=true" class="reset-btn">Reset Kontak</a>
</div>
</body>
</html>
