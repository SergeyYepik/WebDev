<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $page_title = 'Contacts';
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
                echo "<h2>Contacts</h2>";     
                echo "<h4>Contact us, we value everyone's opinion.</h4><br><br>";     
            ?>
            <form>
            <label for="username">Your name</label>
                <input type="text" name="username" id="username" placeholder="Please enter your name" > 
                <br>   
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="name@example.com">    
                <br>   
                <label for="fulltext">Your message</label>
                <textarea name="fulltext" id="fulltext" placeholder="Please enter your message"></textarea>    
                <br>   
                <div class="error-msg" id="error-msg"></div>
                <button type="button" id="email_message_btn" class="btn">Send message</button>   
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
        // NEW EMAIL MESSAGE
        $('#email_message_btn').click(function(){
            let username = $('#username').val();
            let email = $('#email').val();
            let fulltext = $('#fulltext').val();

            $.ajax({
                url: 'ajax/ajax_send_email.php',
                type: 'POST',
                cache: false,
                data: { 'username': username,
                        'email': email,
                        'fulltext': fulltext
                },
                dataType: 'html',
                success: function(data){
                    if (data === "Done"){
                        $('#error-msg').hide();
                        //document.location.href ='<?=SITE_ROOT?>';
                        $('#username').val('');
                        $('#email').val('');
                        $('#fulltext').val('');
                        $('#email_message_btn').text('One more message');
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