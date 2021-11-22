<?php
//Calls for loginAuth PHP script to run before allowing access to Main Exp. page
require_once('loginAuth.php');
require "DB_conn.php";

// SELECT (rows) FROM (table name)
$sql = "SELECT IMGS FROM 
        images ORDER BY RAND()
        limit 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // Outputting HTML and data from the DB
        echo '<div class = "myIMG"><h3><img src="data:image/jpeg;base64,'.base64_encode($row['IMGS']).'"/>'. '</h3></div>';       
    }
} else { 
    echo "No images to show"; 
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["0"]) || !empty($_POST["1"]))  {
        $shad = ($_POST["0"]);
        $edge = ($_POST["1"]);
        }
    $addRec = "INSERT INTO `User_Data` (Input)
               VALUES ('$shad'  '$edge' , {$_SESSION['UIN']})";
        if (mysqli_query($conn, $addRec)) {
            echo "New record successfully added";
        } else {
            echo "Error: " . $addRec . ":-" . mysqli_error($conn);
        }
}    
?>
<!DOCTYPE html>
<html>
<head> 
<title>Image Classification.</title>
<meta http-equiv="X-UA-Compatible" content = "IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
 <link rel="stylesheet" href ="Styling/EXP.css"> 
 <script src = "IMGCycle.js" defer ></script>
 <img src = "Styling/fgcu logo.png" class = "image1">
 <img src = "Styling/brainlobes.png" class = "image2">
</head>
<body>
  <div class="w3-container">
    <h2>Image Classification</h2>
    <br>
  </div>
  <p>Classify the image <br> 
  then record which category the image corresponds to.
  </p>
  </div>
  <div class="selection">
      <br>
      <br>
  </div>
    <form method = "POST" action = "">
      <div class = "options">
      <input type = "submit" value = "Shadow" name = "0" id = "0" class = "button_1"></input>
      <input type = "submit" value = "Edge" name = "1" id = "1" class = "button_2"></input>
      </div>
      <br>
      <br> 
      <br>
   <!-- <div class = "logoutStyle">  
      <a href="logout.php">Log Out</a>
    </div>
    -->
    </form>
</body>
</html>
