<?php

class DashboardController {
    private $conn;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require_once 'config/database.php';
        $this->conn = $conn; // Pastikan $conn didefinisikan di file database.php
    }

    public function index() {
        // Langkah 1: Cek apakah user sudah login
        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
            // Langkah 2: Cek apakah ada cookie 'nim' dan 'password'
            if (isset($_COOKIE['nim']) && isset($_COOKIE['password'])) {
                $nim = mysqli_real_escape_string($this->conn, $_COOKIE['nim']);
                $password = $_COOKIE['password'];

                // Query untuk mencari mahasiswa berdasarkan NIM
                $query = "SELECT * FROM users WHERE nim = '$nim'";
                $result = mysqli_query($this->conn, $query);

                if (mysqli_num_rows($result) === 1) {
                    $data = mysqli_fetch_assoc($result);

                    // Verifikasi password
                    if (password_verify($password, $data['password'])) {
                        $_SESSION['login'] = true;
                        $_SESSION['user'] = $data;
                        $_SESSION['message'] = "Login Berhasil (Melalui Cookie)";
                    } else {
                        $_SESSION['message'] = "Login Gagal (Melalui Cookie)";
                        header('Location: index.php?controller=auth&action=login');
                        exit;
                    }
                } else {
                    $_SESSION['message'] = "Login Gagal (Cookie tidak valid)";
                    header('Location: index.php?controller=auth&action=login');
                    exit;
                }
            } else {
                // Jika tidak ada cookie, redirect ke halaman login
                $_SESSION['message'] = "Silakan login terlebih dahulu";
                header('Location: index.php?controller=auth&action=login');
                exit;
            }
        }

        // Langkah 3: Ambil data mahasiswa yang sedang login
        $nim = $_SESSION['user']['nim'];
        $query = "SELECT * FROM users WHERE nim = '$nim'";
        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) === 1) {
            $mahasiswa = mysqli_fetch_assoc($result);
        } else {
            $_SESSION['message'] = "Data mahasiswa tidak ditemukan";
            header('Location: index.php?controller=auth&action=login');
            exit;
        }

        // Langkah 4: Load tampilan dashboard
        include 'views/dashboard/index.php';
    }
}

?>
