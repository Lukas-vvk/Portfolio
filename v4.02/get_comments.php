<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "comment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT user_comments.*, 
        CASE 
            WHEN users.useris IS NOT NULL THEN users.useris 
            ELSE admins.useris 
        END AS vartotojo_vardas
        FROM user_comments 
        LEFT JOIN users ON user_comments.user_id = users.id 
        LEFT JOIN admins ON user_comments.user_id = admins.id
        WHERE user_comments.approved = 1
        ORDER BY user_comments.id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="comment" data-comment-id="' . $row['id'] . '">' .
             '<div class="user-name">' . $row['vartotojo_vardas'] . '</div>' . 
             $row['comment_text'] . 
             '<button class="delete-comment" data-comment-id="' . $row['id'] . '">Trinti</button>' .
             '<button class="reply-comment-btn">Atsakyti</button>';
        echo fetchReplies($row['id'], $conn);
        echo '</div>';
    }
} else {
    echo 'Komentarų dar nėra.';
}

function fetchReplies($commentId, $conn) {
    $sql_replies = "SELECT user_replies.*, 
                    CASE 
                        WHEN users.useris IS NOT NULL THEN users.useris 
                        ELSE admins.useris 
                    END AS vartotojo_vardas 
                    FROM user_replies 
                    LEFT JOIN users ON user_replies.user_id = users.id 
                    LEFT JOIN admins ON user_replies.user_id = admins.id 
                    WHERE comment_id = '$commentId' AND approved = 1
                    ORDER BY user_replies.id ASC";
    $result_replies = $conn->query($sql_replies);

    $replies = '';
    if ($result_replies->num_rows > 0) {
        while ($reply_row = $result_replies->fetch_assoc()) {
            $replies .= '<div class="reply" data-comment-id="' . $reply_row['id'] . '">' . 
                        '<div class="user-name-reply">' . $reply_row['vartotojo_vardas'] . '</div>' . 
                        $reply_row['reply_text'] . 
                        '<button class="reply-reply-btn">Atsakyti</button>' .
                        '<button class="delete-reply" data-reply-id="' . $reply_row['id'] . '">Trinti</button>';
            $replies .= fetchReplies($reply_row['id'], $conn);
            $replies .= '</div>';
        }
    }
    return $replies;
}

$conn->close();
?>








<style>
.comment-text {
    font-size: 10px;
}
.user-name {
    font-size: 14px;
    font-weight: bold; 
    margin-bottom: 5px; 
}
.user-name-reply {
    font-size: 14px;
    font-weight: bold; 
    margin-bottom: 5px; 
}
.reply-comment-btn{
    display: block;
    font-size: 13px;
    top: 20px;
    border: none; 
    background-color: #acacac;
    border-radius: 10px;
    }
.reply-comment-btn:hover {
    background-color: #c7c7c7;
    border-radius: 10px;
}
.reply {
    margin-top: 20px;
    padding: 5px;
    border: none;
    border-left: 2px solid black;
    background-color: #f9f9f9;
    margin-left: 20px;
}
.reply-reply-btn {
    display: block;
    font-size: 13px;
    top: 20px;
    border: none; 
    background-color: #acacac;
    border-radius: 10px;
}
.reply-reply-btn:hover {
    background-color: #c7c7c7;
    border-radius: 10px;
}
.delete-reply {
    position: relative;
    font-size: 13px;
    bottom: 29.5px;
    left: 75px;
    background-color: #acacac;
    border: none;
    border-radius: 10px;
}
.delete-reply:hover {
    background-color: #c7c7c7;
    border-radius: 10px;
}
</style>