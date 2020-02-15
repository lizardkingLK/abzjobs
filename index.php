<?php 
    session_start();
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
</head>
<body>

<nav>
    <div class="container">
    <h1 class="page-header"><a href="./index.php" id="branding">abzjobs</a> <small>| MENU</small></h1>
        <p id="currentTime" class="float-right bg-danger"></p>
        <p class="lead"><mark>Welcome!</mark> 
                <?php if(!empty($_SESSION["S-username"]))
                        echo $_SESSION["S-username"];
                      else 
                        echo "guest";
                ?>
        </p>
        <div class="clearfix"></div>
    </div>
</nav>

<section id="ind-showcase">
    <div class="container">
        <h1 clsss="color">Hello</h1>
        <h4 class="text-center"><em>abzjobs server manager</em></h4>
    </div>
</section>

<div class="clearfix"></div>

<div class="centered" id="functions">
    <h5>
        <?php 
            if(!empty($_SESSION["S-username"])) {
                if($_SESSION["S-type"] == 'manager')
                    echo '<a href="./welcome.php">Back</a> to change the posts.<br><a class="text-danger" href="./logout.php">Log Out</a></h5>';
                elseif($_SESSION["S-type"] == 'director')
                    echo '<a href="./welcome.php">Back</a> to view reports.<br><a class="text-danger" href="./logout.php">Log Out</a></h5>';
            }
            else
                echo '<a href="./login.php">Log In</a> to continue.</h5>';
        ?>
</div>

<div class="clearfix"></div>

<footer>
    <div class="text-center">
        <p>&copy; 2018-<?php echo date("Y");?></p>
    </div>
</footer>

</body>
</html>