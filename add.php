<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "test";

$term = isset($_REQUEST['q']) ?mysql_real_escape_string($_REQUEST['q']) : '';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
    $sql = "SELECT * FROM tbl_images WHERE name LIKE '%".$term."%'";
    $result = $conn->query($sql);
}

  $conn->close();
?>

<!DOCTYPE>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Image Upload</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700' rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      html,
body {
    margin: 0;
    padding: 0;
    font-weight: 300;
    height: 100%;
    background: #053777;
    color: #fff;
    font-size: 16px;
    align-items: "center";
}
    th, td {
  padding: 15px;
  text-align: center;
  color: white;
  border: 1px solid black;
}

.back-to-article {
    color: #fff;
    text-transform: uppercase;
    font-size: 12px;
    position: absolute;
    right: 20px;
    top: 20px;
    text-decoration: none;
    display: inline-block;
    background: rgba(0, 0, 0, 0.6);
    padding: 10px 18px;
    transition: all 0.3s ease-in-out;
    opacity: 0.6;
    &:hover {
        opacity: 1;
        background: rgba(0, 0, 0, 0.8);
    }
}

.delete-button{
  background-color: #696969	; /* Green */
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.container{
  max-width: 1000px;
  min-width: 1000px;
  margin: auto;
}

* {
  box-sizing: border-box;
}

.example{
  margin-top: 20px; 
}

/* Style the search field */
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: center;
  width: 40%;
  background: #f1f1f1;
}

/* Style the submit button */
form.example button {
  float: center;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none; /* Prevent double borders */
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

/* Clear floats */
form.example::after {
  content: "";
  clear: both;
  display: table;
}
    </style>
</head>

<body>
<center>
<div class='container'>
<div style="overflow-y:auto;"> 
<a href="index.php" class="back-to-article" target="_self">back to Upload</a>
<?php
    echo "<form class='example' action='add.php' method='post'>
      <input type='text' placeholder='Search..' name='q'>
      <button type='submit' value='Submit'><i class='fa fa-search'></i></button>
    </form>";
    echo "<table style='margin-top: 50px; width: 75%; border: 1px solid black;'>";
    echo "<tbody>";
    echo "<tr style='background-color: #3399ff'>";
    echo "<th> Name </th> <th> Image </th> <th> Action </th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
      // echo "<div id='img_div'>";
      // 	echo "<p>".$row['image']."</p>";
      // echo "</div>";
      echo "<tr>";
      echo "<td>";
      echo $row['name'];
      echo "</td>";
      echo "<td>";
      echo '<img  style="width: 100px; height: 100px;" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
      echo "</td>";
      echo "<td>";
      echo "<a class='delete-button' href='deleteImage.php?id=" .$row['id']. "'>Delete</a>";
      echo "</td>";
      echo "</tr>";
    }
    if (count($result) == 0){
      echo "<tr>No Results Found</tr>";
    }
    echo "</tbody>";
    echo "</table>";
  ?>
  </div>
  </div>
  </center>
    

    
</body>

</html>