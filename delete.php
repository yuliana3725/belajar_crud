<!-- delete.php -->
<?php
require 'config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM tugas WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
?>

/* Struktur tabel tugas
CREATE TABLE tugas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_tugas VARCHAR(255) NOT NULL,
    mata_kuliah VARCHAR(255) NOT NULL,
    deadline DATE NOT NULL,
    status ENUM('Not Started', 'On Going', 'Completed') NOT NULL
);
*/