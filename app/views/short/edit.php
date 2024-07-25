<main class="container mt-5 text-center">
    <h2 class="text-white">Edit URL</h2>

    <?php if (isset($_SESSION["error"])): ?>
        <span class="badge text-bg-danger">
            <?= $_SESSION["error"] ?>
        </span>
        <?php unset($_SESSION["error"]); endif; ?>

    <form action="<?= BASE_URL ?>/short/update" method="POST">
        <input type="hidden" name="idUrl" value="<?= $dataUrl["id"] ?>">
        <div class="row g-3 mt-5">
            <div class="col">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="http://example.com"
                        name="longUrl" value="<?= $dataUrl["long_url"] ?>" required>
                    <label for="floatingInput">Input URL</label>
                </div>
            </div>
        </div>
        <div class="button-area mt-5">
            <a href="<?= BASE_URL ?>/short" class="btn btn-secondary btn-lg">
                <i class="fa-solid fa-backward-step"></i> Kembali
            </a>
            <button class="btn btn-success btn-lg" type="submit">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
        </div>
    </form>
</main>