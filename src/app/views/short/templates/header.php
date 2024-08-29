<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/Custom.css">
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg py-3 shadow" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="<?= BASE_URL ?>">Short Link</a>
                <div class="dropdown">
                    <a href="" class="text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span class="text-white me-2">
                            <?= $user["nama"] ?>
                        </span>
                        <i class="fa-solid fa-user text-white border border-white p-2 rounded-circle"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>/user/logout"><i
                                    class="fa-solid fa-right-from-bracket text-white"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>