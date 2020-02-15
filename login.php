<?php 
    require 'configuration.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>abzjobs|HOME</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/customized.stylesheet.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/customized.script_Test.js"></script>
    <script src="./js/customized.script_Login.js"></script>
</head>
<body>
<nav>
    <div class="container">
    <h1 class="page-header"><a href="./index.php" id="branding">abzjobs</a> <small>| MENU</small></h1>
        <p id="currentTime" class="float-right text-xs"></p>
        <p class="lead"><mark>Welcome!</mark> guest</p>
        <div class="clearfix"></div>
    </div>
</nav>

<section>
    <div class="centered" id="loginform">
        <h3 class="text-center">Log in</h3>
        <form id="formLogin" class="form-signin" method="POST" action="login.php">
            <div class="form-group">
                <input id="inputUsername" name="username" class="form-control" placeholder="Username" type="text" required="" autofocus="">
                <input id="inputPassword" name="password" class="form-control"  placeholder="Password" type="password" required="" autofocus="">
            
                <input id="inputSubmit" name="submit" class="btn btn-lg btn-primary btn-block" value="OK" type="submit">
            </div>
        </form>
    </div>
</section>

<footer>
    <div class="centered">
        <p>&copy; 2018-<?php echo date("Y");?></p>
    </div>
</footer>

</body>
</html>

<?php 
    if(isset($_POST["submit"]) === true) 
    {
        
            $sql = "SELECT * FROM employee
                    WHERE eId = '".$_POST["username"]."'; ";
            
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id     = $row["eId"] ;
                    $name   = $row["eName"];
                    $pass   = $row["password"];
                    $type   = $row["type"];
                    $status = $row["status"];
                }

                if(crypt($_POST["password"],'abzjobs') == $pass) {
                    session_start();
                    $_SESSION["S-username"] = $name;
                    $_SESSION["S-eid"]      = $id;
                    $_SESSION["S-type"]     = $type;
                    $_SESSION["S-status"]   = $status;
                    
                    if($_SESSION["S-type"] == 'manager') 
                        header("Location: welcome.php");
                    else if($_SESSION["S-type"] == 'director')
                        header("Location: welcomedir.php");
                }
                else echo "<p class='container'>Incorrect password!</p>";
            }
            else echo "<p class='container'>Invalid username!</p>";    
    }
?>