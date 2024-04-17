<!DOCTYPE html>
    <html>
        <head>
            <title>Gunsitedotnet</title>
            <meta charset="utf-8">
        </head>
        <body>
            <form method="POST">
                Caliber: <input type="text" name="name"><br>
                <p><input type="submit" name="submit" value="submit" /></p>
            </form>
        </body>
        <?php
            // Create connection
            $conn = new mysqli('localhost', 'root', '', 'gunsitedotpng');
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
    </html>