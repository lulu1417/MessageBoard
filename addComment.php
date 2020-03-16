<?php
include 'header.php';
$postId = $_POST["postId"];
if (isset($_POST['submit'])) {
    $content = $_POST["content"];
    $sql = "INSERT comments(user_id, post_id ,content) VALUES ('$userId', '$postId', '$content')";
    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {
        echo "
                <script>
                 setTimeout(function(){window.location.href='allComments.php?postId=" . $postId. "';},10);
                </script>";

    }
} else {
    echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}
?>
