<?php
require 'config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tugas WHERE id = ?");
$stmt->execute([$id]);
$tugas = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE tugas SET nama_tugas = ?, mata_kuliah = ?, deadline = ?, status = ? WHERE id = ?");
    $stmt->execute([$nama_tugas, $mata_kuliah, $deadline, $status, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Tugas</h1>
    <form method="post">
        <label>Nama Tugas: <input type="text" name="nama_tugas" value="<?= $tugas['nama_tugas'] ?>" required></label><br>
        <label>Mata Kuliah: <input type="text" name="mata_kuliah" value="<?= $tugas['mata_kuliah'] ?>" required></label><br>
        <label>Deadline: <input type="date" name="deadline" value="<?= $tugas['deadline'] ?>" required></label><br>
        <label>Status: 
            <select name="status">
                <option value="Not Started" <?= $tugas['status'] === 'Not Started' ? 'selected' : '' ?>>Not Started</option>
                <option value="On Going" <?= $tugas['status'] === 'On Going' ? 'selected' : '' ?>>On Going</option>
                <option value="Completed" <?= $tugas['status'] === 'Completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </label><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
