<!DOCTYPE html>
    <html class="color">
        <head>
            <title>menu</title>
            <meta charset="utf-8">
            <link href="SheetStyle52.css" type="stylesheet">
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <style> 
            body{ 
                color: black;
                font-size: 15px;
            }
            @keyframes example {
                0%   {background-color: red;}
                25%  {background-color: yellow;}
                38%  {background-color: crimson;}
                50%  {background-color: blue;}
                67%  {background-color: cyan;}
                75%	 {background-color: blueviolet;}
                100% {background-color: green;}
            }
            .color {
                animation-name: example;
                animation-duration: 1s;
                animation-direction: alternate;
                animation-iteration-count: infinite;
            }
            .right_header {
                animation: rotation 2s infinite linear;
                position: relative;
                float: right;
                right: 20%;
                top: 20%;
            }
            @keyframes rotation {
                from {
                transform: rotate(0deg);
                }
                to {
                transform: rotate(359deg);
                }
            }
            @keyframes rotationL {
                from {
                transform: rotate(359deg);
                }
                to {
                transform: rotate(0deg);
                }
            }
            .left_header {
                animation: rotationL 2s infinite linear;
                position: relative;
                float: left;
                left: 100px;
                top: 100px;
                border: 3px solid #73AD21;
            }
            .image-hover {
                background-image: url('path6.png'); /* Initial background image */
                background-size: cover; /* Cover the entire area of the element */
                transition: background-image 0.5s ease-in-out; /* Smooth transition */
                width: 70%;
                height: 40%;
            }

            .image-hover:hover {
                background-image: url('path6_1.png'); /* Change on hover */
            }
            </style>
        </head>
        <body>
                <h1>Main Menu</h1>
                <h2>Navigation:</h2>
                <p class="right_header"><img src="wolwo.png" width="400"></p>
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
                <h2>Database:</h2>
                <ul>
                    <li> <a href="index.php?showreview">See Reviews</a>
                    <li> <a href="index.php?showguns">See Weapons Database</a>
                </ul>
                <h2>Users and stuff:</h2>
                <ul>
                    <li> <a href="index.php?site">Login</a>
                </ul>
            <?php 
                header('Content-Type: text/html; charset=ISO-8859-1');
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
                if (isset($_GET["showreview"])){
                    include "showreview.php";
                } 
                if (isset($_GET["showguns"])){
                    include "showguns.php";
                } 
                if (isset($_GET["site"])){
                    include "site.php";
                } 
            ?>
        </body>