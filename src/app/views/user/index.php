<main class="min-vh-100">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-5">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col">
                            <div class="card-body p-md-4 mx-md-4">

                                <div class="text-center">
                                    <h2 class="mt-1 mb-5 pb-1">LOGIN</h2>
                                </div>

                                <form action="<?= BASE_URL ?>/user/login" method="POST">
                                    <p>Silahkan login ke akun anda</p>

                                    <div class="row">
                                        <?php if (isset($_SESSION["error"])): ?>
                                            <div class="col text-danger">
                                                Username atau password salah
                                            </div>
                                            <?php unset($_SESSION["error"]); ?>
                                        <?php endif ?>
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

                                    <div class="text-center">
                                        <p>Belum memiliki akun? <a href="<?= BASE_URL ?>/user/register">Register</a>
                                        </p>
                                    </div>

                                    <div class="text-center pt-3 mb-5">
                                        <button class="btn btn-dark" type="submit">Login</button>
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