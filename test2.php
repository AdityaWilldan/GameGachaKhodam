<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nama</title>
</head>
<body>
    <h2>Input Nama</h2>
    <form action="logic.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <button type="submit" name="submit">Simpan</button>
        <input type="submit" name="reset" value="Reset">
    </form>

    
    <?php if (isset($_SESSION['names']) && !empty($_SESSION['names'])): ?>
        <?php foreach ($_SESSION['names'] as $nama): ?>
            <?php if (isset($_SESSION['kata_kunci'][$nama])): ?>
                <p><?php echo $nama; ?>: <?php echo implode(", ", $_SESSION['kata_kunci'][$nama]); ?></p>
            <?php else: ?>
                <p><?php echo $nama; ?>: Tidak ada kata kunci</p>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
