<?php
    require 'configuration.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>abzjobs|WELCOME</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/customized.stylesheet.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/customized.script_Test.js"></script>
    <script src="./js/customized.script_B.js"></script>
</head>
<body>
<nav>
<div class="container">
        <!--////////USER DETAILS//////-->
        <h1 class="page-header"><a href="./index.php" id="branding">abzjobs</a> <small>| MENU</small></h1>
        <a class="btn btn-danger btn-sm float-right" id="logoutbutton" href="./logout.php" role="button">Log Out</a>
    </div>
        <div class="bg-success" id="finebar">
            <div class="container">
                <p class="lead"><mark>Welcome!</mark>
                    <button class="btn btn-sm btn-outline-danger" id="userbutton" data-toggle="modal" data-target="#user">
                        <?php echo $_SESSION["S-username"]; ?>
                    </button>
                </p>
            </div>
        </div>
    <div class="container">
        <!--user modal-->
        <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="userModalCenterUser" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalCenterUser">
                            User
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>  
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="centered">
                                <h3 class="text-danger"><?php echo $_SESSION["S-username"]; ?></h3>
                                <div>
                                    <img class="rounded-circle" id="dp" src="./img/1.jpg" alt="Your Display Picture!">
                                    <!--<i class="fas fa-user-circle"></i>-->
                                    <br><br>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row"> <!--row starts-->
                                <div class="col">
                                    <h5 class="text-center"> Your ID: </h5>
                                </div>
                                <div class="col">
                                    <h5 class="text-center"> <?php echo $_SESSION["S-eid"]; ?> </h5>
                                </div>
                            </div> <!--row ends-->
                            <div class="row"> <!--row starts-->
                                <div class="col">
                                    <h5 class="text-center"> Profile: </h5>
                                </div>
                                <div class="col">
                                    <h5 class="text-center"> <?php echo $_SESSION["S-status"]; ?> </h5>
                                </div>
                            </div> <!--row ends-->
                            <div class="row"> <!--row starts-->
                                <div class="col">
                                    <h5 class="text-center"> Account type: </h5>
                                </div>
                                <div class="col">
                                    <h5 class="text-center"> <?php echo $_SESSION["S-type"]; ?> </h5>
                                </div>
                            </div> <!--row ends-->
                        </div> <!--container ends-->
                    </div> <!--modal-body ends-->
                    <div class="modal-footer"> <!--modal-footer starts-->
                        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<section>
    <div class="container">

    </div>
</section>

<footer>
    <div>
        <p>&copy; 2018-<?php echo date("Y");?></p>
    </div>
</footer>

</body>
</html>