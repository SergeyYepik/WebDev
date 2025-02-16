<?php
    include '../lib/scrts_lib.php';
    include '../data/mysql.php';

    $week_ago = time() - ( 7 * 24 *3600);
    $sql    = "DELETE FROM `chatmessages` WHERE `publishdate` < ?;";
    $query  = $pdo->prepare($sql);
    $query  -> execute([$week_ago]);

    $sql    = "SELECT `username`, `fulltext` FROM `chatmessages` ORDER BY `publishdate` DESC LIMIT 5;";
    $query  = $pdo->prepare($sql);
    $query  -> execute([]);

    if ($query -> rowCount() == 0){
        $response = "<div class ='msg-chat' id='msg-chat-empty'>There is no messages yet...</div>";
    }
    else{
        $response = '';
        while ($chatmessage = $query->fetch(PDO::FETCH_OBJ)){
                    $response .= "<div class='msg-chat-posted'><div class='msg-chat-author'>".
                                 $chatmessage -> username.":</div><div class='msg-chat-fulltext'>".
                                 $chatmessage -> fulltext."</div></div>";
                }
            }
    echo  $response;

