<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Vocabulary';
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
            include './autoload.php';
            $vocabular = new Vocabular();
            foreach ($vocabular->getAllDescription() as $desciption)
                echo "<p><code>" . $desciption['ServiceDescription'] . "</code></p>". "<br>";
            ?>
        </div>
        <div class="centered-div">
            <button class="btn" onclick="location.href = &quot;<?=SITE_ROOT?>&quot;">Back</button>
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