<?php
include 'header.php';
if (isset($_POST['submit'])) {
//    echo '<div class="success">Added successfully ！</div>';
    $name = $_POST['name'];
    $userId = $_POST['userId'];
    $content = $_POST["content"];
    $postId = $_POST["postId"];

    $sql = "INSERT messages(user_id, post_id ,content) VALUES ('$userId', '$postId', '$content')";

    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {
        echo "
                <script>
                setTimeout(function(){window.location.href='view.php';},10);
                </script>";

    }
} else {
    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}
?>
