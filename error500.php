<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = '500 error';
        require_once './blocks/head.php';
    ?>
</head>
<body>
    <?php 
        require_once './blocks/header.php';
    ?>
    <main>
        <div class="centered-div">
            <h2>Server return error</h2>
            <br>
            <br>
            <br>            
            <a href="<?=SITE_ROOT?>" class="btn">Back</a>
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