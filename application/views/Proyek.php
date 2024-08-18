<html>
<head>
    <title>Proyek</title>
</head>
<html>
<html>
<head>
    <title>Proyek</title>
</head>
<body>
    <h1>Detail Proyek</h1>
    <?php if (isset($proyek) && is_array($proyek) && isset($proyek['data']) && is_array($proyek['data'])): ?>
        <pre><?php print_r($proyek['data']); ?></pre>
        <!-- Tampilkan data dari objek 'data' -->
        <p>Nama Proyek: <?php echo isset($proyek['data']['namaProyek']) ? htmlspecialchars($proyek['data']['namaProyek']) : 'Tidak Ada'; ?></p>
<p>Client: <?php echo isset($proyek['data']['client']) ? htmlspecialchars($proyek['data']['client']) : 'Tidak Ada'; ?></p>
<!-- Dan seterusnya -->
<p>Tanggal Mulai: <?php echo htmlspecialchars(isset($proyek['data']['tanggalMulai']) ? $proyek['data']['tanggalMulai'] : 'Tidak Ada'); ?></p>
        <p>Tanggal Selesai: <?php echo htmlspecialchars(isset($proyek['data']['tanggalSelesai']) ? $proyek['data']['tanggalSelesai'] : 'Tidak Ada'); ?></p>
        <p>Pimpinan Proyek: <?php echo htmlspecialchars(isset($proyek['data']['pimpinanProyek']) ? $proyek['data']['pimpinanProyek'] : 'Tidak Ada'); ?></p>
        <p>Keterangan: <?php echo htmlspecialchars(isset($proyek['data']['ket']) ? $proyek['data']['ket'] : 'Tidak Ada'); ?></p>
        <p>Created At: <?php echo htmlspecialchars(isset($proyek['data']['createdAt']) ? $proyek['data']['createdAt'] : 'Tidak Ada'); ?></p>
        <p>Deleted: <?php echo isset($proyek['data']['isDeleted']) ? ($proyek['data']['isDeleted'] ? 'Ya' : 'Tidak') : 'Tidak Ada'; ?></p>
    <?php else: ?>
        <p>Variabel proyek tidak tersedia atau format data tidak sesuai.</p>
    <?php endif; ?>
</body>
</html>
    <ul>
        <?php foreach ($proyeks as $proyek): ?>
            <li>
                <?php echo $proyek['namaProyek']; ?>
                <a href="<?php echo site_url('ProyekController/view/' . $proyek['id']); ?>">View</a>
                <a href="<?php echo site_url('ProyekController/update/' . $proyek['id']); ?>">Update</a>
                <a href="<?php echo site_url('ProyekController/delete/' . $proyek['id']); ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <form action="<?php echo site_url('ProyekController/create'); ?>" method="post">
        <input type="text" name="name" placeholder="Proyek Name">
        <input type="submit" value="Create Proyek">
    </form>
</body>
</html>
