<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/"; // Direktori tujuan
    $file_name = basename($_FILES["file"]["name"]);
    $target_file = $target_dir . $file_name;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Pastikan hanya file HTML yang dapat diunggah
    if ($file_type != "html") {
        echo "Hanya file HTML yang diperbolehkan!";
        exit;
    }

    // Buat folder jika belum ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Cek apakah file berhasil diunggah
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "File berhasil diunggah: <a href='$target_file'>$file_name</a>";
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>