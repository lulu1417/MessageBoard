<title>All Comments</title>
<?php
include 'header.php';
$name = $_SESSION['name'];
$userId = $_SESSION['userId'];
$postId = $_GET["postId"];
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <?php
        if (!$_SESSION['name']) {
            echo '<a href="index.php">Log in</a>';
        } else {
            echo "<a href='view.php'>View</a>";
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
        echo "<hr>";

    }

    echo '<div class="bottom left position-abs content">';
    echo "There are " . mysqli_num_rows($result) . " comments.";
    ?>
</div>
</body>
</html>