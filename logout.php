<?php
// mengaktifkan session
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] !== "login") {
    header("location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Logout Confirmation</h5>
                <p class="card-text">Are you sure you want to log out?</p>
                <button class="btn btn-outline-danger" onclick="confirmLogout()">Yes, Logout</button>
                <a href="view_kamar.php" class="btn btn-secondary">No, Cancel</a>
            </div>
        </div>
    </div>

    <script>
        function confirmLogout() {
            let confirmation = confirm("Apakah anda yakin untuk logout?");
            if (confirmation) {
                alert("User telah LogPut");
                window.location.href= "index.php";
            }
        }
    </script>

</body>
</html>
