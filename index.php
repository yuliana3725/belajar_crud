<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Tugas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Tugas</h1>
    <div class="table-container">
        <div class="kiri">
            <a href="form.php" class="btn">Tambah Tugas</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Tugas</th>
                    <th>Mata Kuliah</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'config.php';
                $stmt = $pdo->query("SELECT * FROM tugas");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama_tugas']}</td>
                            <td>{$row['mata_kuliah']}</td>
                            <td>{$row['deadline']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='edit.php?id={$row['id']}'>Edit</a> |
                                <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
