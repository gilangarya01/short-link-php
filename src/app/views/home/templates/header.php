<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-lg-5">
                        <a class="nav-link" aria-current="page" href="<?= BASE_URL ?>">Home</a>
                        <a class="nav-link" aria-current="page" href="<?= BASE_URL ?>/home/about">About</a>
                    </div>
                </div>
            </div>
        </nav>