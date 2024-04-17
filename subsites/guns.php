<?php

	// polaczenie z bazą danych
	$con = mysqli_connect("localhost","root","","gunsitedotpng");
    mysqli_set_charset($con, "utf8");
	
	// mysqli_connect("servername","username","password","database_name")

	// wez wszystkie dane z tabeli caliber, producenci i typbron
	$sql = "SELECT * FROM `caliber`";
	$all_categories = mysqli_query($con,$sql);

    $sql = "SELECT * FROM `producenci`";
	$all_producenci = mysqli_query($con,$sql);

    $sql = "SELECT * FROM `typbron`";
	$all_types = mysqli_query($con,$sql);

	//ten kod sprawdza czy przycisk submit zostal wcisniety
	// i insertuje dane do tabeli
	if(isset($_POST['submit']))
	{
		// zapisuje username z forms do zmiennej $name
		$name = mysqli_real_escape_string($con,$_POST['name']);

        // zapisuje caliber do zmiennej $calib
		$calib = mysqli_real_escape_string($con,$_POST['caliber']);
		
		// zapisuje producenci do zmiennej $prod
		$prod = mysqli_real_escape_string($con,$_POST['producenci']); 

        // zapisuje typ do zmiennej $typb
		$typb = mysqli_real_escape_string($con,$_POST['typbroni']); 
		
		// tworzy zapytanie wstawiania danych do tabeli przy uzyciu SQL
		// i magazynuje je w zmiennej
		$sql_insert = 
		"INSERT INTO `bron`(`name`, `caliber`, `producent_id`, `type_id`)
			VALUES ('$name','$calib','$prod','$typb')";
		
		// ten kod zamierza wykonać wstawanie danych powyżej na serio
		// jeżeli nie ma errorów
		// napisze że jest okej
		if(mysqli_query($con,$sql_insert))
		{
			echo "New Firearm added successfully";
		}
	}
?>


<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="users"
            content="width=device-width, initial-scale=1.0"> 
    </head>
    <body>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" required><br>



            <label>Select a Caliber</label>
            <select name="caliber">
                <?php 
                    //Funkcja while feczuje dane
                    // ze zmiennej $all_categories 
                    // i pokazuje je osobno na liście
                    while ($calib = mysqli_fetch_array(
                            $all_categories,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $calib["cal_id"];
                        //Tu dajesz primary key tego co ma być na liście do wybrania
                    ?>">
                        <?php echo $calib["name"];
                            //Tu dajesz nazwe co bedzie na liście sie pojawiać
                        ?>
                    </option>
                <?php 
                    endwhile; 
                    //Petla while sie zabija
                ?>
            </select>
            <br>


            <label>Select a Producent</label>
            <select name="producenci">
                <?php 
                    //Funkcja while feczuje dane
                    // ze zmiennej $all_categories 
                    // i pokazuje je osobno na liście
                    while ($prod = mysqli_fetch_array(
                            $all_producenci,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $prod["producent_id"];
                        //Tu dajesz primary key tego co ma być na liście do wybrania
                    ?>">
                        <?php echo $prod["producentName"];
                            //Tu dajesz nazwe co bedzie na liście sie pojawiać
                        ?>
                    </option>
                <?php 
                    endwhile; 
                    //Petla while sie zabija
                ?>
            </select>
            <br>


            <label>Select The Category</label>
            <select name="typbroni">
                <?php 
                    //Funkcja while feczuje dane
                    // ze zmiennej $all_categories 
                    // i pokazuje je osobno na liście
                    while ($typb = mysqli_fetch_array(
                            $all_types,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $typb["type_id"];
                        //Tu dajesz primary key tego co ma być na liście do wybrania
                    ?>">
                        <?php echo $typb["name"];
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