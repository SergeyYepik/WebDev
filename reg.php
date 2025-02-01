<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Register';
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
                echo "<h2>Registration</h2>";     
                echo "<h4>Create new account</h4><br><br>";     
            ?>
            <form>
                <label for="username">Name</label>
                <input type="text" name="username" id="username" placeholder="Please enter your username" > 
                <br>   
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="name@example.com">    
                <br>   
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password">    
                <br>   
                <label for="confirm_password">Confirm password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="password"> 
                <br>
                <div class="error-msg" id="error-msg"></div>
                <button type="button" id="reg_user_btn" class="btn">Register</button>   
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
        // REGISTRATION
        $('#reg_user_btn').click(function(){
            let username = $('#username').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let confirm_password = $('#confirm_password').val();

            $.ajax({
                url: 'ajax/ajax_reg.php',
                type: 'POST',
                cache: false,
                data: { 'username': username,
                        'email': email,
                        'password': password,
                        'confirm_password': confirm_password
                },
                dataType: 'html',
                success: function(data){
                    if (data === "Done"){
                        $('#error-msg').hide();
                        document.location.href ='<?=SITE_ROOT?>';
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