<?php
include 'header.php';
if (isset($_POST['submit'])) {
    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $sql = "INSERT posts(user_id, subject ,content) VALUES ('$userId', '$subject', '$content')";

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
