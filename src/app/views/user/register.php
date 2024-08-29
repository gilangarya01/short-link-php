<main class="min-vh-100">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-5">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col">
                            <div class="card-body p-md-4 mx-md-4">

                                <div class="text-center">
                                    <h2 class="mt-1 mb-5 pb-1">REGISTER</h2>
                                </div>

                                <div class="row">
                                    <?php if (isset($_SESSION["error"])): ?>
                                        <div class="col text-danger">
                                            <?= $_SESSION["error"] ?>
                                        </div>
                                        <?php unset($_SESSION["error"]); ?>
                                    <?php endif ?>
                                </div>

                                <form action="<?= BASE_URL ?>/user/storeRegister" method="POST">
                                    <p>Silahkan register untuk membuat akun</p>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="nama">Nama</label>
                                        <input type="text" id="nama" class="form-control" name="nama" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" id="username" class="form-control" name="username"
                                            required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" id="password" class="form-control" name="password"
                                            required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="repeatPassword">Repeat Password</label>
                                        <input type="password" id="repeatPassword" class="form-control"
                                            name="repeatPassword" required />
                                    </div>

                                    <div class="text-center">
                                        <p>Sudah memiliki akun? <a href="<?= BASE_URL ?>/user">Login</a>
                                        </p>
                                    </div>

                                    <div class="text-center pt-3 mb-5">
                                        <button class="btn btn-dark" type="submit">Register</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>