<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .custom-hv:hover {
            color: #198754;
        }
    </style>

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 d-grid-1 gap-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=home"><span
                                class="custom-hv">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=english"><span
                                class="custom-hv">English Name</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=bangla"><span
                                class="custom-hv">Bangla Name</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=tutorial"><span
                                class="custom-hv">Tutorial</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=contact"><span
                                class="custom-hv">Contact us</span></a>
                    </li>
                    <!-- Add other menu items as needed -->
                </ul>
                <form class="d-flex" role="search">
                <a class="nav-link active border border-success rounded p-2" aria-current="page" href="?page=login"><span
                                class="custom-hv">Login</span></a>
                </form>
            </div>
        </div>
    </nav>

    <?php
    // Check if the 'page' parameter is set in the URL
    if (isset($_GET['page'])) {
        // Use a switch statement to include the corresponding PHP file
        switch ($_GET['page']) {
            case 'home':
                include 'home.php';
                break;
            case 'english':
                include 'english.php';
                break;
            case 'bangla':
                include 'bangla.php';
                break;
            case 'tutorial':
                include 'tutorial.php';
                break;
            case 'contact':
                include 'contact.php';
                break;
            case 'login':
                include 'login.php';
                break;
            
            default:
                include 'home.php'; // Default to home if no valid page is specified
        }
    } else {
        // Default to home if the 'page' parameter is not set
        include 'home.php';
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
