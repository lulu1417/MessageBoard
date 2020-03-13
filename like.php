<?php
include 'header.php';
if (isset($_POST['submit'])) {
    $postId = $_POST["postId"];
    echo '<div class="success">You liked number '.$postId.' post！</div>';
    $name = $_SESSION['name'];
    $userId = $_SESSION['userId'];
    $postId = $_POST["postId"];
    $sql = "INSERT likes(user_id, post_id) VALUES ('$userId', '$postId')";
    if (!mysqli_query($db, $sql)) {
        die(mysqli_error());
    } else {
        echo "
                <script>
                setTimeout(function(){window.location.href='view.php';},1000);
                </script>";

    }
}else{
    var_dump('not cool');
    die();
}
?>
