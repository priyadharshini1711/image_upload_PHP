<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$sql = "DELETE FROM tbl_images WHERE id='" . $_GET['id'] . "'";
if (mysqli_query($conn, $sql)) {
    header("Refresh:0; url=add.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
