<?php
session_start();

// Check if the user is logged in and has the 'admin' role
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    // Redirect to login page or an error page
    header('Location: /login?status=unauthorized');
    exit;
}
?>

<?php
require "partials/head.php";
?>

<body>
    <div class="container mt-5">

    <h2 class="text-center mb-5">Admin felület</h2>

        <div class="row">
            <!-- Blog Posts Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h5">Blog</h2>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success mb-2 w-100">Új blogbejegyzés hozzáadása</button>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sample Blog Post 1
                                <div>
                                    <button class="btn btn-warning btn-sm">Módosítás</button>
                                    <button class="btn btn-danger btn-sm">Törlés</button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sample Blog Post 2
                                <div>
                                    <button class="btn btn-warning btn-sm">Módosítás</button>
                                    <button class="btn btn-danger btn-sm">Törlés</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Projects Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h5">Projektek</h2>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success mb-2 w-100">Új projekt hozzáadása</button>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sample Project 1
                                <div>
                                    <button class="btn btn-warning btn-sm">Módosítás</button>
                                    <button class="btn btn-danger btn-sm">Törlés</button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Sample Project 2
                                <div>
                                    <button class="btn btn-warning btn-sm">Módosítás</button>
                                    <button class="btn btn-danger btn-sm">Törlés</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
