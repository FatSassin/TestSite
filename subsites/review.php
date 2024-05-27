<?php

	// polaczenie z bazą danych
	$con = mysqli_connect("localhost","root","","gunsitedotpng");
    mysqli_set_charset($con, "utf8");
	
	// mysqli_connect("servername","username","password","database_name")

	// wez wszystkie dane z tabeli caliber, producenci i typbron
	$sql = "SELECT * FROM `uzytkownicy`";
	$all_users = mysqli_query($con,$sql);

    $sql = "SELECT * FROM `bron`";
	$all_guns = mysqli_query($con,$sql);

	//ten kod sprawdza czy przycisk submit zostal wcisniety
	// i insertuje dane do tabeli
	if(isset($_POST['submit']))
	{
		// zapisuje username z forms do zmiennej $name
		$userid = mysqli_real_escape_string($con,$_POST['userid']);

        // zapisuje caliber do zmiennej $calib
		$gunid = mysqli_real_escape_string($con,$_POST['gunid']);
		
		// zapisuje producenci do zmiennej $prod
		$text = mysqli_real_escape_string($con,$_POST['text']); 

        // zapisuje typ do zmiennej $typb
		$ocena = mysqli_real_escape_string($con,$_POST['ocena']); 
		
		// tworzy zapytanie wstawiania danych do tabeli przy uzyciu SQL
		// i magazynuje je w zmiennej
		$sql_insert = 
		"INSERT INTO `recenzje`(`user_id`, `gun_id`, `text`, `ocena`)
			VALUES ('$userid','$gunid','$text','$ocena')";
		
		// ten kod zamierza wykonać wstawanie danych powyżej na serio
		// jeżeli nie ma errorów
		// napisze że jest okej
		if(mysqli_query($con,$sql_insert))
		{
			echo "New review added successfully";
		}
	}
?>


<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="users" content="width=device-width, initial-scale=1.0"> 
        <link href="SheetStyle52.css" type="stylesheet">
    </head>
    <body>
        <form method="POST">
            <label>Who is writing the review</label>
            <select name="userid">
                <?php 
                    //Funkcja while feczuje dane
                    // ze zmiennej $all_categories 
                    // i pokazuje je osobno na liście
                    while ($userid = mysqli_fetch_array(
                            $all_users,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $userid["user_id"];
                        //Tu dajesz primary key tego co ma być na liście do wybrania
                    ?>">
                        <?php echo $userid["name"];
                            //Tu dajesz nazwe co bedzie na liście sie pojawiać
                        ?>
                    </option>
                <?php 
                    endwhile; 
                    //Petla while sie zabija
                ?>
            </select>
            <br>


            <label>Select the firearm</label>
            <select name="gunid">
                <?php 
                    //Funkcja while feczuje dane
                    // ze zmiennej $all_categories 
                    // i pokazuje je osobno na liście
                    while ($gunid = mysqli_fetch_array(
                            $all_guns,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $gunid["gun_id"];
                        //Tu dajesz primary key tego co ma być na liście do wybrania
                    ?>">
                        <?php echo $gunid["name"];
                            //Tu dajesz nazwe co bedzie na liście sie pojawiać
                        ?>
                    </option>
                <?php 
                    endwhile; 
                    //Petla while sie zabija
                ?>
            </select>
            <br>
            <label>Write the review:</label>
            <br>
            <textarea placeholder="chrzascz brzmi w szczebrzeysznie w kaszanie" type="text" name="text" class="mytext" required></textarea>
            <br>

            <label>Rating from 1 to 10:</label>
            <input type="number" name="ocena" min="1" max="10" required><br>

            <input type="submit" value="submit" name="submit">
        </form>
    </body>
</html>