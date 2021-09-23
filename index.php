<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
if(isset($_POST['title']))
$name=$_POST['title'];
if(isset($_FILES['image']['tmp_name']))
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
    if (isset($_POST['title']) && isset($_FILES['image']['tmp_name'])){
        $sql = "INSERT INTO `tbl_images` (`name`, `image`) VALUES ('{$name}', '{$image}')";
        if ($conn->query($sql) === TRUE) {
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }
}

  $conn->close();
?>
<!DOCTYPE>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Image Upload</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css" />

</head>

<body>
    <form action="index.php" method="post" enctype="multipart/form-data">

        <h1><strong>File upload</strong> with style and pure CSS</h1>

        <div class="form-group">
            <label for="title">Title <span>Use title case to get a better result</span></label>
            <input type="text" name="title" id="title" class="form-controll" />
        </div>
        <div class="form-group">
            <label for="caption">Caption <span>This caption should be descriptive</span></label>
            <input type="text" name="caption" id="caption" class="form-controll" />
        </div>

        <div class="form-group file-area">
            <label for="image">Images <span>Your images should be at least 400x300 wide</span></label>
            <input type="file" name="image" id="image" required="required" multiple="multiple" />
            <div class="file-dummy">
                <div class="success">Great, your files are selected. Keep on.</div>
                <div class="default">Please select some files</div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit">Upload images</button>
        </div>


    </form>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet' type='text/css'>

    <a href="add.php" class="back-to-article" target="_self">Image Uploaded</a>
</body>

</html>