<footer>
    <span><!-- &copy;-->Do More...&trade; - All rights reserved</span> 
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
        // ADD CHAT MESSAGE
        $('#new-msg-chat-btn').click(function(){
            let username = '<?=$username_chat?>';
            let fulltext = $('#new-msg-chat').val();

            $.ajax({
                url: 'ajax/ajax_add_msg_chat.php',
                type: 'POST',
                cache: false,
                data: { 'username': username,
                        'fulltext': fulltext
                },
                dataType: 'html',
                success: function(data){
                    if (data === "Done"){
                        if ($('#msg-chat-empty').length >0) $('#msg-chat-empty').remove();

                        
                        let chat_as_array = $('#chat').html().split('<div class="msg-chat-posted">');
                        
                        $('#chat').html('');
                        
                        for (i = 1; i <= 4 && i <= (chat_as_array.length - 1); i++)
                        $('#chat').append('<div class="msg-chat-posted">' + chat_as_array[i]);    
                    
                        $('#chat').prepend("<div class='msg-chat-posted'><div class='msg-chat-author'>"
                        + username +":"+"</div>"+"<div class='msg-chat-fulltext'>"
                        + fulltext +"</div></div>");
                    
                    
                        $('#new-msg-chat').val('');
                    }
                    else{
                        // $('#error-msg').show();
                        // $('#error-msg').html(data);
                    }
                }
            });
        });
        function updateChat(){
            $.ajax({
                url: 'ajax/ajax_update_chat.php',
                type: 'POST',
                cache: false,
                data: { 
                },
                dataType: 'html',
                success: function(data){ 
                    $('#chat').html(data);
                }
            });
        }
        function startChat(){
            setInterval(updateChat, 3000);
        }
        //startChat();
</script>