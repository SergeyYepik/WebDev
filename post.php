<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        require_once './blocks/head.php';
        
        include './lib/scrts_lib.php';
        include './data/mysql.php';

        $id = trim(filter_var($_GET['id'], FILTER_SANITIZE_SPECIAL_CHARS));

        $sql    = 'SELECT * FROM `posts` WHERE `id` = ?';
        $query  = $pdo->prepare($sql);
        $query  -> execute([$id]);

        $post = $query -> fetch(PDO::FETCH_OBJ);

        $page_title = $post -> title;
    ?>
</head>
<body>
    <?php 
        require_once './blocks/header.php';
    ?>
    <main>
        <div class="centered-div">
            <?php
                echo "<div class='post'>".
                "<h2 class='post-title'>".$post -> title."</h2>".
                "<h4>".$post -> subtitle."</h4>".
                "<br>".
                "<span style='justify-content: space-between; display: flex;'>".
                "<p class='post-author'>Author: <span>".$post -> username."</span></p>".
                "<p class='post-author'>Published: <span>".date('F j, Y \a\t g:i:sA', $post -> publishdate)."</span></p>".
                "</span>".
                "<br>".
                "<p class='post-fulltext'>".$post -> fulltext."</p>"."</div>";
            ?>
            <br>
            <h4>Comments</h4>
            <form>
                <label for="username">Your name</label>
                <?php if (!(isset($_COOKIE['isSignedIn']) &&  $_COOKIE['isSignedIn'])) : ?>
                    <input type="text" name="username" id="username" placeholder="Please enter your name"> 
                <?php else: ?>
                    <input type="text" name="username" id="username" placeholder="Please enter your name" value='<?=$_COOKIE['signedUserName']?>'> 
                <?php endif; ?>
                <br>   
                <label for="fulltext">Comment</label>
                <textarea name="fulltext" id="fulltext" placeholder="Please enter your comment"></textarea> 
                <br>
                <div class="error-msg" id="error-msg"></div>
                <button type="button" id="add_comment_btn" class="btn">Add comment</button>   
            </form>
            <br>
            <div id='comments'> 
                <?php
                    $sql    = 'SELECT * FROM `comments` WHERE `postid` = ? ORDER BY `publishdate` DESC';
                    $query  = $pdo->prepare($sql);
                    $query  -> execute([$id]);

                    while ($comment = $query -> fetch(PDO::FETCH_OBJ)){
                        echo "<div class='comment'>".
                        "<span style='justify-content: space-between; display: flex;'>".
                        "<p class='comment-author'>Author: <span>".$comment -> username."</span></p>".
                        "<p class='comment-author'>Published: <span>".date('F j, Y \a\t g:i:sA', $comment -> publishdate)."</span></p>".
                        "</span>".
                        "<br>".
                        "<p class='comment-fulltext'>".$comment -> fulltext."</p>"."</div>";
                        }
                ?>
            </div>
            <br>
            <br>
            <br>
            <a href='<?=SITE_ROOT?>' class='btn'>Back to main page</a>
        </div>
    </main>
    <?php 
        require_once './blocks/aside.php';
    ?>
    <?php 
        require_once './blocks/footer.php';
    ?>
    <script>
        // ADD COMMENT
        $('#add_comment_btn').click(function(){
            let username = $('#username').val();
            let fulltext = $('#fulltext').val();
            let postid = '<?=$id?>';

            $.ajax({
                url: 'ajax/ajax_add_comment.php',
                type: 'POST',
                cache: false,
                data: { 'username': username,
                        'fulltext': fulltext,
                        'postid': postid
                },
                dataType: 'html',
                success: function(data){
                    if (data.substr(0, 4) === "Done"){
                        $('#error-msg').hide();

                        $('#comments').prepend("<div class='comment'>"+
                        "<span style='justify-content: space-between; display: flex;'>"+
                        "<p class='comment-author'>Author: <span>"+username+"</span></p>"+
                        "<p class='comment-author'>Published: <span>"+data.substr(4)+
                        "</span></p>"+"</span>"+"<br>"+
                        "<p class='comment-fulltext'>"+fulltext+"</p>"+"</div>");

                        //document.location.href ='<?=SITE_ROOT?>';
                        $('#fulltext').val('');
                        $('#add_comment_btn').text('One more comment');
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