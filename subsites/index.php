<!DOCTYPE html>
    <html>
        <head>
            <title>menu</title>
            <meta charset="utf-8">
        </head>
        <body>
            <h1>Main Menu</h1>
            <h2>Navigation:</h2>
            <ul>
                <li> <a href="index.php">Main Site</a>
                <li> <a href="index.php?country">Adding Countries</a>
                <li> <a href="index.php?user">Adding Users</a>
                <li> <a href="index.php?guns">Adding Guns</a>
                <li> <a href="index.php?produc">Adding Producents</a>
                <li> <a href="index.php?review">Adding Reviews</a>
                <li> <a href="index.php?type">Adding Gun Types</a>
                <li> <a href="index.php?caliber">Adding Diffrent Calibers</a>
            </ul>
            <?php 
                if (isset($_GET["country"])){
                    include "country.php";
                }
                if (isset($_GET["user"])){
                    include "user.php";
                }
                if (isset($_GET["guns"])){
                    include "guns.php";
                }
                if (isset($_GET["produc"])){
                    include "produc.php";
                }
                if (isset($_GET["review"])){
                    include "review.php";
                }
                if (isset($_GET["type"])){
                    include "type.php";
                }
                if (isset($_GET["caliber"])){
                    include "caliber.php";
                }  
            ?>
        </body>