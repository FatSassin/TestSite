<html>  
<head>  
    <title>PHP login system</title> 
    
    <?php    
        $host = "localhost";  
        $user = "root";  
        $password = '';  
        $db_name = "gunsitedotpng";  
        
        $con = mysqli_connect($host, $user, $password, $db_name);  
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }  
       

        if(isset($_POST["htc"]))
        {
            $username = $_POST['user'];  
            $password = $_POST['pass'];  
            
            //to prevent from mysqli injection  
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);  
            
            $sql = "SELECT * FROM uzytkownicy WHERE name = '$username' and password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
                
            if($count == 1){  
                echo "<h1><center> Login successful </center></h1>";  
            }  
            else{  
                echo "<h1> Login failed. Invalid username or password.</h1>";  
            } 
        }    
    ?>  
</head>  
<body>  
    <div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" onsubmit = "return validation()" method = "POST">  
            <input type="text" style="display: none" name="htc">
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" />  
            </p>  
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </form>  
    </div>  
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  