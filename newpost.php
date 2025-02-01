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
        $page_title = 'New post';
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
                echo "<h2>New post</h2>";     
                echo "<h4>Create new post for local Blog</h4><br><br>";     
            ?>
            <form>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Please enter title for your post" > 
                <br>   
                <label for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle" placeholder="Please enter subtitle for your post">    
                <br>   
                <label for="fulltext">Post</label>
                <textarea name="fulltext" id="fulltext" placeholder="Please enter your post"></textarea>    
                <br>   
                <div class="error-msg" id="error-msg"></div>
                <button type="button" id="new_post_btn" class="btn">Publish</button>   
            </form>
            <br>
        </div>
    </main>
    <?php 
        require_once './blocks/aside.php';
    ?>
    <?php 
        require_once './blocks/footer.php';
    ?>
    <script>
        // NEW POST
        $('#new_post_btn').click(function(){
            let title = $('#title').val();
            let subtitle = $('#subtitle').val();
            let fulltext = $('#fulltext').val();

            $.ajax({
                url: 'ajax/ajax_newpost.php',
                type: 'POST',
                cache: false,
                data: { 'title': title,
                        'subtitle': subtitle,
                        'fulltext': fulltext
                },
                dataType: 'html',
                success: function(data){
                    if (data === "Done"){
                        //$('#error-msg').hide();
                        //document.location.href ='<?=SITE_ROOT?>';
                        $('#title').val('');
                        $('#subtitle').val('');
                        $('#fulltext').val('');
                        $('#new_post_btn').text('One more post');
                    }
                    else{
                        $('#error-msg').show();
                        $('#error-msg').html(data);
                    }
                }
            });

        });
    </script>
</body>
</html>