<main class="container text-white mt-5">
    <h2>URL Shortener List:</h2>

    <a href="<?= BASE_URL ?>/short/create" class="btn btn-primary mt-3">
        <i class="fa-solid fa-plus"></i> Add Short
    </a>
    <table class="mt-3 mb-5 table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th style="width: 5%" scope="col">#</th>
                <th style="width: 30%" scope="col">Short</th>
                <th style="width: 50%" scope="col">URL</th>
                <th style="width: 15%" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shorts as $key => $short): ?>
                <tr>
                    <th scope="row">
                        <?= $key + 1 ?>
                    </th>
                    <td>
                        <a class="text-success" href="<?= BASE_URL ?>/<?= $short["short_url"] ?>">
                            <?= BASE_URL ?>/
                            <?= $short["short_url"] ?>
                        </a>
                    </td>
                    <td>
                        <a class="text-success" href="<?= $short["long_url"] ?>">
                            <?= $short["long_url"] ?>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="<?= BASE_URL ?>/short/delete/<?= $short["id"] ?>"
                            class="badge text-bg-danger text-decoration-none" onclick="confirmDelete(event)">
                            <i class="fa-solid fa-trash"></i> Hapus
                        </a>
                        <a href="<?= BASE_URL ?>/short/edit/<?= $short["id"] ?>"
                            class="badge text-bg-warning text-decoration-none">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<script>
    function confirmDelete(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda tidak dapat mengembalikan data yang sudah dihapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= BASE_URL ?>/short/delete/<?= $short["id"] ?>';
            }
        });
    }
</script>