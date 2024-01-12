<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $pass = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';

    $hash = password_hash($pass, PASSWORD_BCRYPT);

    $stmt = mysqli_prepare($koneksi, "INSERT INTO admin (name, phone, email, password) VALUES (?, ?, ?, ?)");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssss', $name, $phone, $email, $hash);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($koneksi);
            header("Location: index.php");
            exit();
        } else {
            echo "Error: Unable to register.";
        }
    } else {
        echo "Error in preparing SQL statement.";
    }
} else {
    echo "Form not submitted.";
}
?>
