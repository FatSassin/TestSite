<html>
    <head>
        <meta charset="utf-8">
        
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
    <?php 
    $mysqli = new mysqli("localhost", "root", "", "gunsitedotpng"); 
    header('Content-Type: text/html; charset=ISO-8859-1');


    $query = "SELECT caliber.name AS calname, producenci.producentName, typbron.name AS typename, gun_id, bron.name, img 
    FROM bron 
    JOIN caliber ON caliber.cal_id = bron.caliber 
    JOIN producenci ON producenci.producent_id = bron.producent_id 
    JOIN typbron ON typbron.type_id = bron.type_id ORDER BY gun_id";


    echo '<table border="0" cellspacing="2" cellpadding="2"> 
        <tr> 
            <td> <font face="Arial">Weapon ID</font> </td> 
            <td> <font face="Arial">Name</font> </td> 
            <td> <font face="Arial">Caliber</font> </td> 
            <td> <font face="Arial">Type</font> </td> 
            <td> <font face="Arial">Producent</font> </td> 
            <td> <font face="Arial">Image</font> </td> 
        </tr>';

    if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field2name = $row["gun_id"];
            $field3name = $row["name"];
            $field4name = $row["calname"];
            $field5name = $row["typename"]; 
            $field6name = $row["producentName"]; 
            $field7name = '<img style="height: 100px;" src="data:image/jpeg;base64,'.base64_encode($row['img']).'"/>';

            echo '<tr> 
                    <td>'.$field2name.'</td> 
                    <td>'.$field3name.'</td> 
                    <td>'.$field4name.'</td> 
                    <td>'.$field5name.'</td> 
                    <td>'.$field6name.'</td>
                    <td>'.$field7name.'</td>
                </tr>';
        }
        $result->free();
    } 
    ?>
    </body>
</html>