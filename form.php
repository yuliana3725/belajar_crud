<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tugas = $_POST['nama_tugas'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("INSERT INTO tugas (nama_tugas, mata_kuliah, deadline, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nama_tugas, $mata_kuliah, $deadline, $status]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Tugas</h1>
    <form method="post">
        <label>Nama Tugas: <input type="text" name="nama_tugas" required></label><br>
        <label>Mata Kuliah: <input type="text" name="mata_kuliah" required></label><br>
        <label>Deadline: <input type="date" name="deadline" required></label><br>
        <label>Status: 
            <select name="status">
                <option value="Not Started">Not Started</option>
                <option value="On Going">On Going</option>
                <option value="Completed">Completed</option>
            </select>
        </label><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
