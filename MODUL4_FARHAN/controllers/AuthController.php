<?php

class AuthController
{
    private $conn;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require_once 'config/database.php';
        $this->conn = $conn; // Pastikan $conn dideklarasikan dengan benar di database.php
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $nim = mysqli_real_escape_string($this->conn, $_POST['nim']);
            $password = $_POST['password'];

            $query = "SELECT * FROM users WHERE nim = '$nim'";
            $result = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_assoc($result);

                if (password_verify($password, $data['password'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $data;

                    if (isset($_POST['remember'])) {
                        setcookie('nim', $nim, time() + (86400 * 30), "/");
                        setcookie('password', $password, time() + (86400 * 30), "/");
                    } else {
                        setcookie('nim', '', time() - 3600, "/");
                        setcookie('password', '', time() - 3600, "/");
                    }

                    header('Location: index.php?controller=dashboard&action=index');
                    exit;
                } else {
                    $_SESSION['message'] = "Password salah!";
                    $_SESSION['color'] = 'red';
                }
            } else {
                $_SESSION['message'] = 'NIM tidak ditemukan!';
                $_SESSION['color'] = 'red';
            }
        }

        include 'views/auth/login.php';
    }

    private function getJurusan($jurusan)
    {
        $kode_jurusan = 0;
        switch (strtolower($jurusan)) {
            case 'kedokteran':
                $kode_jurusan = 11;
                break;
            case 'psikologi':
                $kode_jurusan = 12;
                break;
            case 'biologi':
                $kode_jurusan = 13;
                break;
            case 'teknik informatika':
                $kode_jurusan = 14;
                break;
        }
        return $kode_jurusan;
    }

    private function generateNIM($id_pendaftaran)
    {
        $query = "SELECT * FROM pendaftaran WHERE id = '$id_pendaftaran' AND status = 'lulus'";
        $result = mysqli_query($this->conn, $query);

        if ($data = mysqli_fetch_assoc($result)) {
            $tahun = date('y');
            $kode_jurusan = $this->getJurusan($data['jurusan']);
            if ($kode_jurusan > 0) {
                return $kode_jurusan . $tahun . str_pad($id_pendaftaran, 2, '0', STR_PAD_LEFT);
            }
        }
        return false;
    }

    public function register_step_1()
    {
        if (isset($_POST['submit'])) {
            $id_pendaftaran = $_POST['id_pendaftaran'];

            $query = "SELECT * FROM pendaftaran WHERE id = '$id_pendaftaran' AND status = 'lulus'";
            $result = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['id_pendaftaran'] = $id_pendaftaran;
                header('Location: index.php?controller=auth&action=register_step_2');
                exit;
            } else {
                $_SESSION['message'] = 'ID Pendaftaran tidak valid atau tidak lulus!';
                $_SESSION['color'] = 'red';
            }
        }

        include 'views/auth/register_step_1.php';
    }

    public function register_step_2()
    {
        if (!isset($_SESSION['id_pendaftaran'])) {
            header('Location: index.php?controller=auth&action=register_step_1');
            exit;
        }

        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password === $confirm_password) {
                $id_pendaftaran = $_SESSION['id_pendaftaran'];
                $query = "SELECT * FROM pendaftaran WHERE id = '$id_pendaftaran'";
                $result = mysqli_query($this->conn, $query);

                if ($data = mysqli_fetch_assoc($result)) {
                    $nim = $this->generateNIM($id_pendaftaran);
                    if ($nim) {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $query_insert = "INSERT INTO users (nim, id_pendaftaran, password, nama, jurusan)
                                         VALUES ('$nim', '$id_pendaftaran', '$hashed_password', '{$data['nama']}', '{$data['jurusan']}')";
                        if (mysqli_query($this->conn, $query_insert)) {
                            $_SESSION['message'] = "Registrasi berhasil! NIM Anda: $nim";
                            unset($_SESSION['id_pendaftaran']);
                            header('Location: index.php?controller=auth&action=login');
                            exit;
                        } else {
                            $_SESSION['message'] = "Registrasi gagal!";
                        }
                    } else {
                        $_SESSION['message'] = "Gagal menghasilkan NIM!";
                    }
                }
            } else {
                $_SESSION['message'] = "Password tidak cocok!";
                $_SESSION['color'] = 'red';
            }
        }

        include 'views/auth/register_step_2.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php?controller=auth&action=login');
        exit;
    }
}

?>
