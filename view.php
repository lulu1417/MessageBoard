<title>All messages</title>
<?php
include 'header.php';
$name = $_GET['name'];
?>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right home">
        <?php
        if (!$name) {
            echo '<a href="index.php">Log in</a>';
        } else {
            echo "<a href='board.php?name=" . $name . "'>Write some messages</a>";
            echo '<a href="index.php">Log out</a>';
        }?>
    </div>
    

</div>
<div class="note full-height">
    <?php
    $sql = "select * from posts";
    $result = mysqli_query($db, $sql);
    $_SESSION['name'] = $name = $_GET['name'];
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<br>Visitor Name：" . $row['name'];
        echo "<br>Subject：" . $row['subject'];
        echo "<br>Content：" . nl2br($row['content']) . "<br>";
        $_SESSION['no'] =  $row['no'];
        if ($name == $row['name']) {
            echo '
		<a href=" edit.php?name=' . $name . '&no=' . $row['no'] .'">
		Edit message content</a>&nbsp|&nbsp<a href="delete.php">Delete the message</a><br>';
        }
        echo "Time：" . $row['time'] . "<br>";
        echo "<hr>";

    }
    echo "<br>";
    echo '<div class="bottom left position-abs content">';
    echo "There are " . mysqli_num_rows($result) . " posts.";
    ?>
</div>
</body>
</html>