<?php 
################################################################################################
//File: loginSite.php
//Filetype: PHP
//Author: Chris Silva 
//Created: 08/27/21
################################################################################################

// the PHP code below verifies that the login information presented by the user into the form over the Client Side is correct on the Server Side

// Define server connection variables 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbName = "Experiment"; 
// define Input varaibles & set to empty values to be used later
$uin = $classCode = $exercise = $batch = $imgSize = $passTest = "";
// Experiment site test password  
$sitePass = "hfZ8173";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// ensure input = plain text -> $data = the POST (info) being sent from the form to the Server
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    // if Form fileds are not empty, verify the input to make sure it is correct
    if(!empty($_POST["UIN"]) && !empty($_POST["classID"]) && !empty($_POST["exercise"]) &&  !empty($_POST["batch"]) && !empty($_POST["size"]) && !empty($_POST["password"])) {
 
        $uin = test_input($_POST["UIN"]);
        $classCode = test_input($_POST["classID"]);
        $exercise = test_input($_POST["exercise"]);
        $batch = test_input($_POST["batch"]);
        $imgSize = test_input($_POST["size"]);
        $passTest = test_input($_POST["password"]);
     }
       if ($passTest == $sitePass) {
        session_start();
        //while user session is authenticated, create new connection to Database
            $_SESSION["authenticated"] = 'true';

            $conn = new mysqli($servername, $username, "", $dbName);
            mysqli_select_db($conn, 'Experiment');   
            header('Location: EXP.php'); 
            $_SESSION["id"] = htmlentities($_POST[$uin]);    
        }
        else {
        header('Location: login.php');      
        }   
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
        // send login form input to (Users) Database
       $sql =  "INSERT INTO `Users` (UIN, Class_ID, Exercise, Batch_Num, Img_Size, Password)
       VALUES ('$uin','$classCode','$exercise','$batch', '$imgSize','$passTest')";
        if (mysqli_query($conn, $sql)) {
            echo "New record has been added successfully !";
        } else { 
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <noscript>This page requires Javascript to verify your Identity. Please enable javascript in your browser settings.
    </noscript>
    <meta charset="UTF-8" name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Psych Experiment</title>
    <link rel="stylesheet" href="Styling/login.css">
    <img src="Styling/fgcu logo.png" class="image1">
    <img src="Styling/brainlobes.png" class="image2">
    <div class="rectangle"></div>
</head>
<body>
<div class="absolute" style="color: #FFF">
        <p>Computational Perception Laboratory</p>
        <p>Department of Psychology, Florida Gulf Coast University</p>
</div>
    <div class="relative">
        <h2>Login Portal</h2> 
        <form method="POST" action = "login.php" name = "loginInfo"> 
            <div class="form-control">
            <span class = "error">*</span>   
                <input type="text" name="UIN" id="UIN" onfocus = "this.value=''" value = "UIN" required>
            </div>
            <div class = "form-control">
            <span class = "error">*</span>   
                <input list = "ID" id = "classID" name = "classID" onfocus = "this.value =''" value = "Class ID" required>
                <datalist id = "ID">
                    <option value = "FA21-80143"> 
                    <option value = "FA21-33405">
                    <option value = "SP22-10432"> 
                </datalist>
            </div>
            <div class = "form-control">
                <span class = "error">*</span>
                <input list = "EXP" id = "exercise" name = "exercise" onfocus = "this.value =''" value = "Experiment" required> 
                <datalist id = "EXP">
                    <option value = "SHAD_EDGE"> 
                    <option value = "SHAD_TXT">
                </datalist>
            <div class = "form-control">
            <span class = "error">*</span>   
                <input list = "batchNum" id = "batch" name = "batch" onfocus = "this.value =''" value = "Batch" required>
                <datalist id = "batchNum">
                    <option value = "Batch 1"> 
                    <option value = "Batch 2">
                    <option value = "Batch 3">    
                </datalist>
            </div> 
          <div class = "form-control">
          <span class = "error">*</span>   
                <input list = "imgSize" id = "size" name = "size" onfocus = "this.value =''"; value = "Image Size" required>
                <datalist id = "imgSize">
                    <option value = "8px">
                    <option value = "16px">
                    <option value = "24px">
                    <option value = "32px">
                </datalist>
            </div>
            <div class = "form-control">
            <span class = "error">*</span>   
                <input type = "text" name = "password" id = "password"  onfocus = "this.value=''" value = "Password" required>  
            </div>
            <div class="form-control">
                <input type="submit" name = "submit" value="Login" id = "submit" onclick = "emptyAlert()">
            </div>
        </form>
    </div> 
    <script>
        function emptyAlert() {
            var empty = document.getElementById["UIN", "classID", "exercise", "batch", "size", "password"].value;
            if (empty == "") {
                alert("Please fill all of the pertaining info");
                return false;
            } else {
                alert("Code has been accepted");
                return true;
            }
        }
    </script>
</body>
</html>
 