<?php
session_start();

if(!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="map.php">Map</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="master.php">Master</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="request.php">Request</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="rekapitulasi.php">Rekapitulasi</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="user.php">User</a>
            </li>
        </ul>
        <form class="d-flex">
            <a class="btn btn-outline-light" href="logout.php" role="button">Sign Out</a>
        </form>
        </div>
    </div>
    </nav>

    <h4>Ini halaman master</h4>
</body>
</html>