<!DOCTYPE html>
<html lang="en">

<!-- I copy and pasted the home.html onto this file just so I had something to work with, 
 I will erase a lot of it so it's just a bare form while retaining the general style. -->

<head>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gaming | Home </title>
     <link rel="stylesheet" href="css/mvp.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<header class="homeheader" id="forbackground">
  <div class="containertop">
  <a href="home.html"><img src="images/orangelogo.png" alt="Scuf Logo" class="headimage" style="height: 151px; width: 151px;"></a>
</div>
<h1 id="homeh1">Scuf Gaming</h1>
</header>
        <nav class="homenav">
            <ul>
                <li><a href="home.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="products.html"><i class="fa fa-shopping-cart"></i>Products</a></li>
                <li><a href="sitemap.html"><i class="fa fa-map"></i>Site Map </a></li>
                <li><a href="contactus.html"><i class="fa fa-paper-plane"></i>Contact Us </a></li>
                <li><a href="aboutus.html"><i class="fa fa-question-circle"></i>About Us </a></li>
                <li><a href="register.php"><i class="fa fa-reg-icon"></i>Register </a></li>
        </ul>
        </nav>

    <!-- I took the basic form from the CRUD tutorial and put it here, it's already formatting with the css -->

            <form method="get">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" required>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" required>
                <label for="email">Email Address</label> <br> 
                <input type="email" name="email" id="email" required> <br>
                <label for="age">Age</label>
                <input type="text" name="age" id="age">
                <label for="location">Location</label> 
                <select name="location" id="places">
                    <option value="usa">United States</option>
                    <option value="canada">Canada</option>
                    <option value="united-kingdom">United Kingdom</option>
                    <option value="france">France</option>
                    <option value="australia">Australia</option>
                    <option value="japan">Japan</option>
                    <option value="germany">Germany</option>
                    <option value="italy">Italy</option>
                    <option value="spain">Spain</option>
                    <option value="brazil">Brazil</option>
                    <option value="mexico">Mexico</option>
                    <option value="uae">United Arab Emirates</option>
                    <option value="south-africa">South Africa</option>
                    <option value="india">India</option>
                    <option value="china">China</option>
                    <option value="south-korea">South Korea</option>
                    <option value="argentina">Argentina</option>
                    <option value="egypt">Egypt</option>
                    <option value="russia">Russia</option>
                    <option value="indonesia">Indonesia</option> 
                <input type="submit" name="submit" value="Submit">
                <?php // this code isn't complete and doesn't really do anything as of now, just wrote some of it out so
                // i know what's happening once db is connected
                    if (isset($_POST['Submit'])){
                        // require "../config.php";

                        try{
                             // $connection = new PD0($dsn, $username, $password, $options);
                            $new_reg = array(
                                "firstName" => $_POST['firstname'],
                                "lastName" => $_POST['lastname'],
                                "email" => $_POST['email'],
                                "age" => $_POST['age'],
                                "location" => $_POST['location']
                            );                         
                        }
                        catch (PDOException $error){
                            echo $sql . "<br>" . $error->getMessage();
                        }
                    }
                ?>
            </form>

          <p>Founded in 2011, SCUF Gaming "SCUF®", is a global innovator and creator of high-performance gaming controllers, providing superior accessories and customized gaming controllers for console and PC that are used by top professional gamers as well as casual gamers. Built to specification, SCUF controllers offer a number of functional and design features custom built to increase hand use and improve gameplay.

            SCUF controller features are covered by 105 granted patents, and another 56 pending, focusing on four key areas of a controller: the back-control functions and handles, the trigger control mechanisms, the thumbstick control area and the side-mounted configurable Sax™ button placements.</p>
          

          <script src="cascript.js"></script>
</body>

<footer>
      <a href="https://scufgaming.com/eu/"><img src="images/bwlogo.jpg" alt="scuf Logo" style="height: 25px;">
      <a href="https://www.facebook.com/ScufGaming/"><img src="images/facebookbw.png" alt="scuf facebook page" style="height: 25px;"></a>
      <a href="https://twitter.com/ScufGaming?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="images/xbw.png" alt="scuf x page" style="height: 25px;"></a>
    <p>© 2010-2023 Corsair Memory, Inc.</p>
    </a>
</footer>
</html>