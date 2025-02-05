<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Usefull';
        require_once './blocks/head.php';
    ?>
</head>
<body>
    <?php 
        require_once './blocks/header.php';
    ?>
    <main>
        <div class="lefted-div">
            <?php
                echo "<b>My time mark - </b>".mktime(6, 30, 0, 1, 31, 1971)."<br><br>";
                echo "<b>Default time zone - </b>".date_default_timezone_get()."<br><br>";   
                echo "<b>User agents (OS, Browser, etc.) - </b>".$_SERVER['HTTP_USER_AGENT']."<br><br>";             
                echo "<b>OS Name - </b>".php_uname()."<br><br>";   
                echo "<b>PHP OS Type (PHP build for) - </b>".PHP_OS."<br><br>";             
                echo "<b>OS Family - </b>".PHP_OS_FAMILY."<br><br>";   
                ?>
        </div>
        <div class="centered-div">
            <button class="btn" onclick="location.href = &quot;<?=SITE_ROOT?>&quot;;">Back</button>
            <br>
            <br>
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