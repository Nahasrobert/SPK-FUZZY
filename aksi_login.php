<?php
require_once "config.php";

$alertMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Query untuk mendapatkan admin berdasarkan username
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Periksa password dengan MD5
        if (md5($password) === $user["password"]) {
            // Login berhasil

            // Set sesi username
            session_start();
            $_SESSION["username"] = $user["username"];

            // Redirect ke halaman index.php
            header("Location: index.php");
            exit();
        } else {
            $alertMessage = "Login gagal. Periksa kembali username dan password Anda.";
        }
    } else {
        $alertMessage = "Login gagal. Periksa kembali username dan password Anda.";
    }

    // Jika login gagal, arahkan kembali ke halaman login dengan pesan alert
    header("Location: login.php?alert=" . urlencode($alertMessage));
    exit();
}

// Tutup koneksi
$conn->close();
?>