<main class="container mt-5 text-center">
    <h2 class="text-white">Shortener URL</h2>

    <?php if (isset($_SESSION["error"])): ?>
        <span class="badge text-bg-danger">
            <?= $_SESSION["error"] ?>
        </span>
        <?php unset($_SESSION["error"]); endif; ?>

    <form action="<?= BASE_URL ?>/short/store" method="POST">
        <input type="hidden" name="idUser" value="<?= $id_user ?>">
        <div class="row g-3 mt-5">
            <div class="col-12 col-lg-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="http://example.com"
                        name="url" value="<?= isset($longUrl) ? $longUrl : '' ?>" required>
                    <label for="floatingInput">Input URL</label>
                </div>
            </div>
            <div class="col">
                <div class="input-group form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput"
                        value="<?= isset($shortUrl) ? BASE_URL . '/' . $shortUrl : '' ?>" disabled>
                    <label for="floatingInput">Result URL</label>
                    <span class="input-group-text">
                        <button type="button" class="btn"
                            onclick="clipboardCopy('<?= isset($shortUrl) ? BASE_URL . '/' . $shortUrl : '' ?>')">
                            <i class="fa-regular fa-clipboard"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <div class="button-area mt-5">
            <a href="<?= BASE_URL ?>/short" class="btn btn-secondary btn-lg">
                <i class="fa-solid fa-backward-step"></i> Kembali
            </a>
            <button class="btn btn-success btn-lg" type="submit">
                <i class="fa-solid fa-arrow-up-short-wide"></i> Mulai
            </button>
        </div>
    </form>
</main>