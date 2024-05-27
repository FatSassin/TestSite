<html>
    <head>
        <meta charset="utf-8">
        
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
    <?php 
    $mysqli = new mysqli("localhost", "root", "", "gunsitedotpng"); 
    header('Content-Type: text/html; charset=ISO-8859-1');

    $query = "SELECT uzytkownicy.name AS username, bron.name, text, ocena 
    FROM recenzje 
    JOIN uzytkownicy ON uzytkownicy.user_id = recenzje.user_id 
    JOIN bron ON bron.gun_id = recenzje.gun_id";
    
    
    echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">User</font> </td> 
            <td> <font face="Arial">Weapon</font> </td> 
            <td> <font face="Arial">Review</font> </td> 
            <td> <font face="Arial">Rating (Max 10)</font> </td> 
        </tr>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["username"];
            $field3name = $row["name"];
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