<!DOCTYPE html>
    <html>
        <head>
            <title>Gunsitedotnet</title>
            <meta charset="utf-8">
        </head>
        <body>
            <h1>SUPER JAJA</h1>
            <form action="country.php" method="POST">
                Name: <input type="text" name="name"><br>
                <p><input type="submit" name="submit" value="submit" /></p>
            </form>
        </body>
        <?php
            // Create connection
            $conn = new mysqli('localhost', 'root', '', 'gunsitedotpng');
            echo "<br>";
            if (isset( $_POST['name'])){

                $name = $_POST['name'];
                $sql = "INSERT INTO countries (name) VALUES (\"".$name."\")";

                echo "<br>";
                if ($conn->query($sql) === TRUE) {
                echo "New country created successfully";
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