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
            echo "<a href='board.php'>Write some messages</a>";
            echo '<a href="index.php">Log out</a>';
        } ?>
    </div>


</div>
<div class="note full-height">
    <?php
    $sql = "select * from posts ORDER BY id DESC";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
//        echo "<br>Visitor Name：" . $row['name'];
        echo "<br>Subject：" . $row['subject'];
        echo "<br>Content：" . nl2br($row['content']) . "<br>";
        $postId = $_SESSION['postId'] = $row['id'];

        echo '
        <form name="form1" action="like.php" method="post">
        <input type="hidden" name="postId" value= ' . $postId . ' >
        <input type="submit" name="submit" value= 👍 >
        </form>
        <form name="form1" action="comment.php" method="post">

        </form>
         <form name="form1" action="addComment.php" method="post">
                <input type="hidden" name="postId" value= ' . $postId . ' >
                     <input type="hidden" name="name" value= ' . $name . '>
                <input type="hidden" name="userId" value= ' . $userId . '>
                <p><textarea style="font-family: \'Nunito\', sans-serif; font-size:20px; width:550px;height:100px;" name="content"></textarea></p>
                <p><input type="submit" name="submit" value="SEND">
                    <style>
                        input {padding:5px 15px; background:#FFCCCC; border:0 none;
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px; }
                    </style>
                    <style>
                        input {
                            padding:5px 15px;
                            background:#FFCCCC;
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
        if ($_SESSION['userId'] == $row['user_id']) {
//            echo '
//		<a href="edit.php?name=' . $_SESSION['name'] ."&userId=". $_SESSION['userId']. '&no=' . $row['id'] .'">
//		<a href="edit.php">Edit message content</a>
//		&nbsp|&nbsp
//		<a href="delete.php">Delete the message</a><br>'
            ;
        }
        echo "Time：" . $row['time'] . "<br>";
        echo "<hr>";

    }

    echo '<div class="bottom left position-abs content">';
    echo "There are " . mysqli_num_rows($result) . " posts.";
    ?>
</div>
</body>
</html>