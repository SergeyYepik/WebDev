<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Main page';
        require_once './blocks/head.php';
    ?>
</head>
<body>
    <?php 
        require_once './blocks/header.php';
    ?>
    <main>
        <!-- <div class="centered-div"> -->
            <?php
                include './lib/scrts_lib.php';
                include './data/mysql.php';

                $sql    = 'SELECT * FROM `posts` ORDER BY `publishdate` DESC';
                $query  = $pdo -> query($sql);
                
                while ($post = $query -> fetch(PDO::FETCH_OBJ)){
                    echo "<div class='post'>".
                    "<h2 class='post-title'>".$post -> title."</h2>".
                    "<p class='post-subtitle'>".$post -> subtitle."</p>".
                    "<p class='post-author'>Author: <span>".$post -> username."</span></p>".
                    "<button class='btn smaller' title='".$post -> title."' onclick='showPostById(".$post -> id.")'>Read ...</button>"."</div>";
                }

            //     echo "<h2>Main page</h2><br><br>";     
            ?>
            <!-- <br>
            <br>
            <br>
            <a href='<?=SITE_ROOT?>' class='btn'>Update</a> -->
        <!-- </div> -->
    </main>
    <?php 
        require_once './blocks/aside.php';
    ?>
    <?php 
        require_once './blocks/footer.php';
    ?>
    <script>
        function showPostById(id){
            location.href = '<?=SITE_ROOT?>post.php?id=' + id;
        }
    </script>
</body>
</html>