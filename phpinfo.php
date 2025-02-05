<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'PHP INFO';
        require_once './blocks/head.php';
    ?>
</head>
<body>
        <div class="centered-div">
            <button class="btn" onclick="location.href = &quot;<?=SITE_ROOT?>&quot;;">Back</button>
        </div>
        <?php
            phpinfo();
        ?>
        <div class="centered-div">
            <button class="btn" onclick="location.href = &quot;<?=SITE_ROOT?>&quot;;">Back</button>
            <br>
            <br>
        </div>
</body>
</html>