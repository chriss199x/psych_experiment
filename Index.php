<?php

  //  Calls for loginAuth PHP script to run before allowing access to Main Exp. page

  require_once('loginAuth.php');


?>

<!DOCTYPE html>
<html>
<head> 

<title>Image Classification.</title>
<meta http-equiv="X-UA-Compatible" content = "IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
 <link rel="stylesheet" href ="MainEXPStyle.css"> 
 <script src = "IMGCycle.js" defer ></script>
 <img src = "Login IMG/fgcu logo.png" class = "image1">
 <img src = "Login IMG/brainlobes.png" class = "image2">


</head>

<body>

  <div class="w3-container">
    <h2>Image Classification</h2>
    <br>
    <br>
  </div>


  <p>Classify the image <br> then record which category the image corresponds to.</p>
  
 
  <div class="myImg">

    <style>
      img {
        border-radius: 0%;
      }
    </style>
  
  <div class="mySlides">
    <img src="/SHAD_EDGE_GRY/1_0.png" width="96" height="96">
  </div>

  <div class="mySlides">
    <img src="/SHAD_EDGE_GRY/2_1.png" width ="96" height="96">
  </div>

  
  <div class="mySlides">
    <img src="/SHAD_EDGE_GRY/5_1.png" width ="96" height="96">
  </div>

  <div class="mySlides">
    <img src="/SHAD_EDGE_GRY/3_0.png" width ="96" height="96">
  </div>

  <div class="mySlides">
    <img src="/SHAD_EDGE_GRY/4_0.png" width ="96" height="96">
  </div>

  <div class="mySlides">
    <img src="/SHAD_EDGE_GRY/3_1.png" width ="96" height="96">
  </div>

  <div class="mySlides">
    <img src="/SHAD_EDGE_GRY/4_1.png" width ="96" height="96">
  </div>



       
<!-- <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
    -->   

  </div>

  <div class="selection">
      <br>
      <br>

   
  </div>
    
    <form method ="POST" action = "Index.php">

      <div class = "options">
        <!--
      <input type="submit" name="Option1" value="Dog" onclick = "plusDivs(1)">
      <input type="submit" name ="Option2" value ="Cat"  onclick = "plusDivs(1)">
        -->
  
      <button type = "button" value = "Shadow" name = "Shadow" onclick = "plusDivs(1)" class = "button_1">Shadow</button>
      <button type = "button" value = "Edge" name = "Edge" onclick = "plusDivs(1)" class = "button_2">Edge</button>
      </div>
    </form>

   
</body>
</html>
