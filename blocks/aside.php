<aside>
    <?php 
        $username_chat = 'Guest user';
        if (isset($_COOKIE['isSignedIn']) &&  $_COOKIE['isSignedIn'])
        {
            $username_chat = $_COOKIE['signedUserName'];
        }  
    ?>
    <span class='span-v'>
    <div class="aside-box info">
        <h4>News</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quae deleniti, repellat natus laborum temporibus repudiandae eos asperiores ipsa consequuntur, unde, adipisci placeat fugit quas est sit modi. Beatae, animi!</p>
        <img style="width:100%;" src="<?=SITE_ROOT?>img/some.jpg">
    </div>
    <div class='aside-box chat-box'>
        <h4>Chat</h4>
        <br> 
        <div id="chat">
            <?php
                require_once './data/mysql.php';

                $sql    = 'SELECT * FROM `chatmessages` ORDER BY `publishdate` DESC LIMIT 5';
                $query  = $pdo -> query($sql);
                $chatmessages = $query -> fetchAll(PDO::FETCH_OBJ);

                if ($query -> rowCount() > 0){
                    foreach ($chatmessages as $chatmessage){
                        echo "<div class='msg-chat-posted'><div class='msg-chat-author'>".$chatmessage -> username.":"."</div>".
                             "<div class='msg-chat-fulltext'>".$chatmessage -> fulltext."</div></div>";
                    }
                }
                else
                    echo "<div class ='msg-chat' id='msg-chat-empty'>There is no messages yet...</div>";
        ?>
        </div>
        <br>
        <br>
        <form>
            <textarea class ='new-msg-chat' type="text" name='new-msg-chat' id='new-msg-chat' placeholder="Enter new message ..." maxlength="50"></textarea>
        </form>
        <div class='chat-control'>
            <button class='btn accent smaller' id='new-msg-chat-btn' title='Send message to chat' >Send</button>
        </div>
    </div>
    </span>
</aside>
