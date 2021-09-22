
<?php 

 //Login verification --> Class Codes

 $class_code = array("FALL-EXP3302", "FALL-EXP4205", "FALL-EXP2201");


// the PHP code below verifies that the login information presented by the user into the form over the Client Side is correct on the Server Side
    // -> For security reasons, verifying logins over the client side is NOT SAFE, because it allows anyone to view the processes being made to verify user info


// define Input varaibles & set to empty values to be used later

$uinErr = $classIdErr = $exerciseErr = $batchNumErr = $sizeErr =  $passErr = "";

$userID = $exercise = $classCode = $batchNum = $imgSize = $passTest = "";

$password = "hfZ8173";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

// ensure input = plain text -> $data = the POST (or info) being sent from the form to the Server
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



    // if Form fileds are not empty, verify the input to make sure it is correct
    if(!empty($_POST["UIN"])  && !empty($_POST["classID"]) && !empty($_POST["exercise"]) && !empty($_POST["batch"]) && !empty($_POST['size']) && !empty($_POST["password"])) {
 
        $userID = test_input($_POST["UIN"]);
        $classCode = test_input($_POST["classID"]);
        $exercise = test_input($_POST["exercise"]);
        $batchNum = test_input($_POST["batch"]);
        $imgSize = test_input($_POST["size"]);
        $passTest = test_input($_POST["password"]);
       }

        if ($passTest == $password) {
                session_start();
                $_SESSION["authenticated"] = 'true';
                header('Location: Index.php');     
        }
        else {
            header('Location: loginSite.php');
           
        }

    }



// Record user login, send to 'data.txt'

//    if (isset($_POST["subM"])) {
        // echo $_POST['name'];
        // echo $_POST['Code'];
    
 //       $myfile = fopen("data.txt", "a") or die("Unable to open file");
 //       $name = $_POST["UIN"]."\n";
 //       fwrite($myfile, $name);
       
 //       $classCode = $_POST["classID"]."\n";
 //       fwrite($myfile, $classCode);

 //       $stimDone = $_POST["exercise"]."\n";
 //       fwrite($myfile, $stimDone);
 //       fwrite($myfile, "\r\n"); 
 //       fclose($myfile);   
 //   }
?>

<!DOCTYPE HTML>
<html>
<head>

    <noscript>This page requires Javascript to verify your Identity. Please enable javascript in your browser settings.
    </noscript>
   
    <meta charset="UTF-8">
 
    <title>Psych Experiment</title>
    <link rel="stylesheet" href="loginSiteStyle.css">


    <img src="Login IMG/fgcu logo.png" class="image1">
    <img src="Login IMG/brainlobes.png" class="image2">
    <div class="rectangle"></div>

</head>

<body>
<div class="absolute" style="color: #FFF">
        <p>Computational Perception Laboratory</p>
        <p>Department of Psychology, Florida Gulf Coast University</p>
    </div>
    <div class="relative">
        <h2>Login Portal</h2>

        <form method="POST" action = "loginSite.php" name = "loginInfo"> 

            <div class="form-control">
        
                <input type="text" name="UIN" id="UIN" onfocus = "this.value=''" value = "UIN">
                <span class = "error">*</span>
            </div>
            

            <div class = "form-control">
                <input list = "ID" id = "classID" name = "classID" onfocus = "this.value =''" value = "Class ID">
                <span class = "error">*</span>   
                <datalist id = "ID">
                    <option value = "FA21-80143"> 
                    <option value = "FA21-33405">
                    <option value = "SP22-10432"> 
                </datalist>
               
              
            </div>

            <div class = "form-control">
                <input list = "EXP" id = "exercise" name = "exercise" onfocus = "this.value =''" value = "Experiment">
                <span class = "error">*</span>    
                <datalist id = "EXP">
                    <option value = "SHAD_EDGE"> 
                    <option value = "SHAD_TXT">
                </datalist>
               
            </div>           

           
            <div class = "form-control">
                <input list = "batchNum" id = "batch" name = "batch" onfocus = "this.value =''" value = "Batch">
                <span class = "error">*</span>   
                <datalist id = "batchNum">
                    <option value = "Batch 1"> 
                    <option value = "Batch 2">
                    <option value = "Batch 3">    
                </datalist>
            </div>

             
            <div class = "form-control">
                <input list = "imgSize" id = "size" name = "size" onfocus = "this.value =''"; value = "Image Size">
                <span class = "error">*</span>   
                <datalist id = "imgSize">
                    <option value = "8px">
                    <option value = "16px">
                    <option value = "24px">
                    <option value = "32px">
                </datalist>
            </div>

            <div class = "form-control">
                <input type = "text" name = "password" id = "password"  onfocus = "this.value=''" value = "Password">
                <span class = "error">*</span>   
            </div>


            <div class="form-control">
                <input type="submit" name = "subM" value="Login" id = "subM">
            </div>
        </form>
    </div>


       
</body>
</html>
 
<?php 
// set server environment login variables
//$servername = "localhost";
//$username = "root";
//$password = "";

// create connection query
//$conn = new mysqli($servername, $username, $password);

// check connection 
//if ($conn->connect_error) {
//   die("Unable to connect: " . $conn->connect_error);
//}
//echo "Connected to localhost Successfully!";

//$conn->close();
//$UIN = $_POST['UIN'];
//$classNum = $_POST['password'];
//$exerciseType = $_POST['exercise'];
?>


















