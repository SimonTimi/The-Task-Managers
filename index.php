<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>E-Commerce Website</title>

        <link rel="stylesheet" href="index.css" />
    </head>

    <body>
        <header><h1> E-Commerce PlaceHolder </h1></header>
        <h2>Our Products:</h2>
        <?php $phone1 = 'image1.png';
              $phone2 = 'image2.png';
              $phone3 = 'image3.png';
              $phone4 = 'image4.png';
              $phone5 = 'image5.png';  

        $phonesArray = array($phone1, $phone2, $phone3, $phone4, $phone5);

        foreach($phonesArray as $loopPrint){
            echo "$loopPrint \n";
        }

        ?>

        <h2>Add a user</h2>
            <form method="post">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" required>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" required>
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email" required>
            <label for="age">Age</label>
            <input type="text" name="age" id="age">
            <label for="location">Location</label>
            <input type="text" name="location" id="location">
            <input type="submit" name="submit" value="Submit">
            </form>

    </body>
