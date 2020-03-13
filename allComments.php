<title>All Comments</title>
<?php
include 'header.php';
$name = $_SESSION['name'];
$userId = $_SESSION['userId'];
$commentId = $_GET["commentId"];
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <?php
        if (!$_SESSION['name']) {
            echo '<a href="index.php">Log in</a>';
        } else {
            echo "<a href='view.php'>All post</a>";
            echo '<a href="index.php">Log out</a>';
        } ?>
    </div>


</div>

<div class="note full-height">
    <?php
    $sql = "SELECT users.*, messages.*
FROM users
    LEFT JOIN messages 
         ON messages.user_id = users.id 
   WHERE messages.post_id = '$postId' ORDER BY messages.id DESC";

    $result = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>Visitor Name：" . $row['name'];
        echo "<br>Content：" . nl2br($row['content']) . "<br>";
        echo "Time：" . $row['time'] . "<br>";
        echo '
         <form name="form1" action="addComment.php" method="post">
                <input type="hidden" name="commentId" value= ' . $commentId . ' >
                     <input type="hidden" name="name" value= ' . $name . '>
                <input type="hidden" name="userId" value= ' . $userId . '>
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
        <a href="allComments.php?postId=' . $postId.'">All Comments</a><br>
        ';
        echo "<hr>";

    }

    echo '<div class="bottom left position-abs content">';
    echo "There are " . mysqli_num_rows($result) . " comments.";
    ?>
</div>
</body>
</html>