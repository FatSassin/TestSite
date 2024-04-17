<?php

	// polaczenie z bazą danych
	$con = mysqli_connect("localhost","root","","gunsitedotpng");
	
	// mysqli_connect("servername","username","password","database_name")

	// wez wszystkie dane z tabeli countries
	$sql = "SELECT * FROM `countries`";
	$all_categories = mysqli_query($con,$sql);

	//ten kod sprawdza czy przycisk submit zostal wcisniety
	// i insertuje dane do tabeli
	if(isset($_POST['submit']))
	{
		// zapisuje producentname z forms do zmiennej $name
		$name = mysqli_real_escape_string($con,$_POST['producentname']);

		// zapisuje country do zmiennej $country
		$country = mysqli_real_escape_string($con,$_POST['country']); 
		
		// tworzy zapytanie wstawiania danych do tabeli przy uzyciu SQL
		// i magazynuje je w zmiennej
		$sql_insert = 
		"INSERT INTO `producenci`(`producentName`, `country`)
			VALUES ('$name','$country')";
		
		// ten kod zamierza wykonać wstawanie danych powyżej na serio
		// jeżeli nie ma errorów
		// napisze że jest okej
		if(mysqli_query($con,$sql_insert))
		{
			echo "New producent created successfully";
		}
	}
?>


<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="prod"
            content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>
        <form method="POST">
            <label>Producent Name:</label>
            <input type="text" name="producentname" required><br>
            <label>Select a country</label>
            <select name="country">
                <?php 
                    //Funkcja while feczuje dane
                    // ze zmiennej $all_categories 
                    // i pokazuje je osobno na liście
                    while ($country = mysqli_fetch_array(
                            $all_categories,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $country["country_id"];
                        //Tu dajesz primary key tego co ma być na liście do wybrania
                    ?>">
                        <?php echo $country["name"];
                            //Tu dajesz nazwe co bedzie na liście sie pojawiać
                        ?>
                    </option>
                <?php 
                    endwhile; 
                    //Petla while sie zabija
                ?>
            </select>
            <br>
            <input type="submit" value="submit" name="submit">
        </form>
    </body>
</html>