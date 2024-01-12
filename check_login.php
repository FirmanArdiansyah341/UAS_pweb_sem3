<?php
session_start();

include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $checklogin = "SELECT email, password FROM admin WHERE LOWER(email) = LOWER(?)";
    $query = mysqli_prepare($koneksi, $checklogin);
    mysqli_stmt_bind_param($query, "s", $email);
    mysqli_stmt_execute($query);

    if (mysqli_stmt_error($query)) {
        die("Error: " . mysqli_stmt_error($query));
    }

    mysqli_stmt_store_result($query);
    $count = mysqli_stmt_num_rows($query);

    if ($count == 1) {
        mysqli_stmt_bind_result($query, $resultEmail, $resultHashedPassword);
        mysqli_stmt_fetch($query);

        if (password_verify($password, $resultHashedPassword)) {
            $_SESSION['email'] = $resultEmail;
            header("Location: view_kamar.php");
            exit();
        } else {
            echo "<script>alert('Password atau Kata Sandi Anda Salah'); window.location.href='index.php'; </script>";
        }
    } else {
        echo "<script>alert('Password atau Kata Sandi Anda Salah'); window.location.href='index.php';</script>";
    }

    mysqli_stmt_close($query);
}

mysqli_close($koneksi);
?>
