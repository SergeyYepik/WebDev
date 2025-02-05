<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = '404 Error';
        require_once './blocks/head.php';
    ?>
</head>
<body>
    <?php 
        require_once './blocks/header.php';
    ?>
    <main>
        <div class="centered-div">
            <h2>Page not found</h2>
            <br>
            <br>
            <br>            
            <button class="btn" onclick="location.href = &quot;<?=SITE_ROOT?>&quot;;">Back</a>
        </div>
    </main>
    <?php 
        require_once './blocks/aside.php';
    ?>
    <?php 
        require_once './blocks/footer.php';
    ?>
</body>
</html>