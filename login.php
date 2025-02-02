<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Log in';
        include './blocks/head.php';
    ?>
</head>
<body>
    <?php 
        include './blocks/header.php';
    ?>
    <main>
        <div class="centered-div">
            <?php if (!(isset($_COOKIE['isSignedIn']) &&  $_COOKIE['isSignedIn'])) : ?>
            <?php
                echo "<h2>Log in</h2>";     
                echo "<h4>Use a local account to log in</h4><br><br>";     
                ?>
            <form>
                <label for="username">User name</label>
                <input type="text" name="username" id="username" placeholder="Please enter your username" > 
                <br>   
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password">    
                <br>
                <div class="error-msg" id="error-msg"></div>
                <button type="button" id="login_user_btn" class="btn">Log in</button>   
            </form>
            <br>
            <?php else: ?>
                <?php
                    echo "<h2>Manage your account</h2>";     
                    echo "<h4>Change your account settings</h4><br><br>";     
                    echo "<h4>User name ".$_COOKIE['signedUserName']."</h4><br><br>";          
                ?>
                <button type="button" id="logout_user_btn" class="btn">Log out</button>   
            <?php endif; ?>
        </div>
    </main>
    <?php 
        include './blocks/aside.php';
    ?>
    <?php 
        include './blocks/footer.php';
    ?>
    <script>
        // LOGIN
        $('#login_user_btn').click(function(){
            let username = $('#username').val();
            let password = $('#password').val();

            $.ajax({
                url: 'ajax/ajax_login.php',
                type: 'POST',
                cache: false,
                data: { 'username': username,
                        'password': password,
                },
                dataType: 'html',
                success: function(data){
                    if (data === "Done"){
                        // $('#login_user_btn').text("Done");
                        $('#error-msg').hide();
                        //document.location.reload(true);
                        document.location.href ='<?=SITE_ROOT?>';
                    }
                    else{
                        $('#error-msg').show();
                        $('#error-msg').html(data);
                    }
                }
            });
        });
        // LOGOUT
        $('#logout_user_btn').click(function(){
            $.ajax({
                url: 'ajax/ajax_logout.php',
                type: 'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function(data){
                    document.location.href ='<?=SITE_ROOT?>';
                }
            });
        });
    </script>
</body>
</html>