<?php 
    require_once './blocks/head.php';
    if (!(isset($_COOKIE['isSignedIn']) &&  $_COOKIE['isSignedIn'])) {
        header("Location: ".SITE_ROOT."reg.php");
        exit();    
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Users list';
        require_once './blocks/head.php';
    ?>
</head>
<body>
    <?php 
        require_once './blocks/header.php';
    ?>
    <main>
        <div class="centered-div">
            <?php
                echo "<h2>Manage users</h2><br><br>";     
                
                require './data/mysql.php';
                $sql    = "SELECT `id`, `username` FROM `users`;";
                $query  = $pdo->prepare($sql);
                $query  -> execute([]);

                $users  = $query->fetchAll(PDO::FETCH_OBJ);
                echo "<ul>";
                foreach ($users as $user) { 
                    echo "<li class='user-list-el'><span><b>User : </b>"
                        .$user -> username."</span>
                        <button type='button' id='delete_user_btn' class='btn warn smaller'
                                onclick='deleteUserById(".$user -> id.")'>Delete</button></li>";
                }
                echo "</ul>";
            ?>
            <div class="error-msg" id="error-msg"></div>
        </div>
    </main>
    <?php 
        require_once './blocks/aside.php';
    ?>
    <?php 
        require_once './blocks/footer.php';
    ?>
        <script>
        // DELETE USER
        function deleteUserById(id){
            $.ajax({
                url: 'ajax/ajax_delete_user.php',
                type: 'POST',
                cache: false,
                data: { 'id': id
                },
                dataType: 'html',
                success: function(data){
                    if (data === "Done"){
                        $('#error-msg').hide();
                        document.location.reload(true);
                    }
                    else{
                        $('#error-msg').show();
                        $('#error-msg').html(data);
                    }
                }
            });
        };
    </script>
</body>
</html>