<!DOCTYPE html>
    <html>
        <head>
            <title>Gunsitedotnet</title>
            <meta charset="utf-8">
        </head>
        <body>
            <h1>SUPER JAJA</h1>
            <form action="caliber.php" method="POST">
                Caliber: <input type="text" name="name"><br>
                <p><input type="submit" name="submit" value="submit" /></p>
            </form>
        </body>
        <?php
            // Create connection
            $conn = new mysqli('localhost', 'root', '', 'gunsitedotpng');
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected successfully";

            echo "<br>";
            if (isset( $_POST['name'])){

                $name = $_POST['name'];
                $sql = "INSERT INTO caliber (name) VALUES (\"".$name."\")";

                echo "<br>";
                if ($conn->query($sql) === TRUE) {
                echo "New caliber added successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        ?>
        <body>
            <br>
            <a href="index.php">Back to Menu</a>
        </body>
    </html>