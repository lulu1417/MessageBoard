<title>All messages</title>
<?php
include 'header.php';
$name = $_SESSION['name'];
$userId = $_SESSION['userId'];
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <?php
        if (!$_SESSION['name']) {
            echo '<a href="index.php">Log in</a>';
        } else {
            echo "<a href='board.php'>Add post</a>";
            echo '<a href="logout.php">Log out</a>';
        } ?>
    </div>


</div>
<div class="note full-height">
    <?php
    $sql = "SELECT posts.id as post_id, posts.* , users.*
FROM users
    RIGHT JOIN posts 
         ON posts.user_id = users.id 
   ORDER BY posts.id DESC";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>Author：" . $row['name'];
        echo "<br>Subject：" . $row['subject'];
        echo "<br>Content：" . nl2br($row['content']) . "<br>";
        $postId = $_SESSION['postId'] = $row['post_id'];
        echo '
        <form name="form1" action="like.php" method="post">
        <input type="hidden" name="postId" value= ' . $postId . ' >
        <input type="submit" name="submit" value= "Like 👍" >
        </form>';

        //comments
        $sql = "SELECT comments.id as comment_id, users.*, comments.*
FROM users
    LEFT JOIN comments
         ON comments.user_id = users.id 
   WHERE comments.post_id = '$postId'
   LIMIT 3";
        echo "<br><strong>Comments：</strong>";
        $results = mysqli_query($db, $sql);
        while ($rows = mysqli_fetch_assoc($results)) {
            echo "<br>Visitor Name：" . $rows['name'] . "
        <br>Content：" . nl2br($rows['content']) . "<br>";
            $commentId = $_SESSION['commentId'] = $rows['comment_id'];
        }
        //

        echo '<hr><a href="allComments.php?postId=' . $postId . '">All Comments</a><br>';
        echo "<br><strong>Add Comment Here</strong>";
        echo '
        <form name="form1" action="comment.php" method="post">

        </form>
         <form name="form1" action="addComment.php" method="post">
                <input type="hidden" name="postId" value= ' . $postId . ' >
                <p><textarea style="font-family: \'Nunito\', sans-serif; font-size:20px; width:550px;height:100px;" name="content"></textarea></p>
                <p><input type="submit" name="submit" value="SEND">
                    <style>
                        input {padding:5px 15px; border:0 none;
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px; }
                    </style>
                    <style>
                        input {
                            padding:5px 15px;
                            background:#CCEEFF;
                            border:0 none;f
                        cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                            font-family: \'Nunito\', sans-serif;
                            font-size: 19px;
                        }
                    </style>
            </form>
        ';

        echo "Time：" . $row['time'] . "<br>";
        echo "<hr>";

    }

    echo '<div class="bottom left position-abs content">';
    echo "There are " . mysqli_num_rows($result) . " posts.";
    ?>
</div>
</body>
</html>