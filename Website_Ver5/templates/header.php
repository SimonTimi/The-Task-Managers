<?php session_start(); 
    if($_SESSION['Active'] = false){
      header("location:login.php");
      exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/mvp.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<h2> Status: <?php if(isset($_SESSION['email'])){
    echo "Logged in as: " . $_SESSION['email'];
} else {
    echo "You are not logged in.";
}
?>

<header class="homeheader" id="forbackground">
  <div class="containertop">
  <a href="home.php"><img src="../images/orangelogo.png" alt="Scuf Logo" class="headimage" style="height: 151px; width: 151px;"></a>
</div>
<h1 id="homeh1">Scuf Gaming</h1>
</header>