<html>
    <body>
    <?php 
    $mysqli = new mysqli("localhost", "root", "", "gunsitedotpng"); 
    $query = "SELECT * FROM recenzje";

    echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">User</font> </td> 
            <td> <font face="Arial">Weapon</font> </td> 
            <td> <font face="Arial">Review</font> </td> 
            <td> <font face="Arial">Rating (Max 10)</font> </td> 
        </tr>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["user_id"];
            $field3name = $row["gun_id"];
            $field4name = $row["text"];
            $field5name = $row["ocena"]; 

            echo '<tr> 
                    <td>'.$field2name.'</td> 
                    <td>'.$field3name.'</td> 
                    <td>'.$field4name.'</td> 
                    <td>'.$field5name.'</td> 
                </tr>';
        }
        $result->free();
    } 
    ?>
    </body>
</html>