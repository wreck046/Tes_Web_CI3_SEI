<html>
<head>
    <title>Lokasi</title>
</head>
<body>
    <h1>Daftar Lokasi</h1>
    <ul>
        <?php foreach ($lokasis as $lokasi): ?>
            <li>
                <?php echo $lokasi['name']; ?>
                <a href="<?php echo site_url('lokasicontroller/view/' . $lokasi['id']); ?>">View</a>
                <a href="<?php echo site_url('lokasicontroller/update/' . $lokasi['id']); ?>">Update</a>
                <a href="<?php echo site_url('lokasicontroller/delete/' . $lokasi['id']); ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <form action="<?php echo site_url('lokasicontroller/create'); ?>" method="post">
        <input type="text" name="name" placeholder="Lokasi Name">
        <input type="submit" value="Create Lokasi">
    </form>
</body>
</html>
