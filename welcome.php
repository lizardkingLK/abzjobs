<?php   
    session_start();
    require 'configuration.php';
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/customized.script_Test.js"></script>
    <script src="./js/customized.script_A.js"></script>
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
                                    <img class="rounded-circle" id="dp" src="./img/1.jpeg" alt="Your Display Picture!">
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
                        <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<section>
    <div class="container">
        <!--////////SWITCH MENU BUTTON//////-->
        <div class="col-md-8">
            <button class="btn btn-lg btn-link float-right" id="switchmode">Switch <i class="fas fa-chevron-circle-right"></i></button>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!--////////ADD CATEGORY MENU///////////////-->
                <div class="card" id="categorymenu">
                    <div class="card-header">
                        Add Job Category Details
                        <p id="currentTime" class="float-right text-xs"></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-info float-left">Add a new job category</h5><small class="text-success float-right" id="catcan"></small><small class="text-warning float-right" id="catwarn"></small><small class="text-danger float-right" id="catcannot"></small><div class="clearfix"></div>
                            <form id="addcatform">
                                <input type="text" class="form-control form-control-md" id="typejobcat" name="jobcategory">
                                <button type="submit" class="btn btn-sm btn-link" id="typejobcatbtn">Add</button>
                            </form>
                            <script>
                                document.getElementById('addcatform').addEventListener('submit',sendCat);

                                function sendCat(e) {
                                    e.preventDefault();

                                    var jobcatname = document.getElementById('typejobcat').value;
                                    var red = document.getElementById('catcannot');
                                    var green = document.getElementById('catcan');
                                    var yellow = document.getElementById('catwarn');

                                    red.innerHTML = green.innerHTML = yellow.innerHTML = "";

                                    if(jobcatname.length != 0) {
                                        // Creates a new ajax request with XMLHttpRequest caller(object).
                                        var xhr = new XMLHttpRequest();

                                        // Declares the object Parameters (GET method)
                                        xhr.open('GET','sendcat.php?jobcategory='+jobcatname,true);

                                        // When request is still processing
                                        xhr.onprogress = function() {
                                            //console.log('Request processing...');
                                            //console.log(xhr.readyState);
                                            var txt = this.responseText;
                                            if(txt == 0) {
                                                red.innerHTML = '<i class="fas fa-exclamation-circle"></i> Category already exists';
                                            }
                                            else if(txt == 1) {
                                                green.innerHTML = '<i class="fas fa-check-circle"></i> Category added';
                                            }    
                                        }

                                        // When request is processed
                                        xhr.onload = function() {
                                            if(this.state == 200) {
                                                //
                                            }
                                        }

                                        // Sends the request
                                        xhr.send();
                                    }
                                    else 
                                        yellow.innerHTML = '<i class="fas fa-question-circle"></i> Please enter a job category in the field';
                                }
                            </script>
                            
                            <!--<button class="btn btn-sm btn-link">undo</button>-->
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title text-sm text-info">Select a job category</h5>
                                <select class="form-control form-control-md" id="choosecategory" name="chosencategory">
                                    <option selected>Choose...</option>
                                    <script>
                                        /////////////
                                            document.getElementById('choosecategory').addEventListener('click',loadCats);
                                            
                                            var csel = document.getElementById('choosecategory');
                                              
                                            function loadCats() {
                                                var V = csel.selectedIndex;
                                                // Removes still available categories
                                                if(csel.length>1) {
                                                    for(var c=csel.length;c>0;c--) {
                                                        if(csel.selectedIndex == c)
                                                            continue;
                                                        else
                                                            csel.remove(c);
                                                    }
                                                    V = csel.selectedIndex;
                                                }
                                                // Creates a new ajax request with XMLHttpRequest caller(object).
                                                var xhr = new XMLHttpRequest();
                                                
                                                // Declares the object parameters
                                                xhr.open('GET','choosecatloading.php',true);

                                                // When request is still processing
                                                xhr.onprogress = function() {
                                                    //console.log(xhr.readyState);
                                                }

                                                // When request is processed
                                                xhr.onload = function() {
                                                    if(this.status == 200) {
                                                        var cats = JSON.parse(this.responseText);
                                                        //console.log(cats);

                                                        var choosecatId = '';
                                                        var choosecatName = '';

                                                        for(var i in cats) {
                                                            choosecatId = cats[i].catId;
                                                            choosecatName = cats[i].catName;

                                                            //console.log(choosecatId+","+choosecatName);

                                                            var option = document.createElement('option');
                                                            option.value = choosecatId;
                                                            option.text = choosecatName;
                                                            csel.add(option);
                                                        }
                                                    }
                                                }
                                                xhr.send();
                                            }
                                        /////////////
                                    </script>
                                </select><small class="text-warning float-right" id="catwarned"></small><div class="clearfix"></div>
                            </div>
                            <div class="col-md-6">    
                                <h5 class="card-title text-sm text-info">Add a job subcategory</h5>
                                    <input type="text" class="form-control form-control-md" id="typejobsubcat" name="jobsubcategory">
                                    <button class="btn btn-sm btn-link" id="choosesubcategory">Add</button><small class="text-success float-right" id="subcatcan"></small><small class="text-warning float-right" id="subcatwarn"></small><small class="text-danger float-right" id="subcatcannot"></small><div class="clearfix"></div>
                                    <script>
                                        document.getElementById('choosesubcategory').addEventListener('click',sendsubcats);

                                        function sendsubcats(e) {
                                            e.preventDefault();

                                            var jobcatname = document.getElementById('choosecategory').value;
                                            var jobsubcatname = document.getElementById('typejobsubcat').value;
                                            var exred = document.getElementById('catwarned');
                                            var red = document.getElementById('subcatcannot');
                                            var green = document.getElementById('subcatcan');
                                            var yellow = document.getElementById('subcatwarn');
                                                                                                                                        
                                            red.innerHTML = green.innerHTML = yellow.innerHTML = exred.innerHTML = "";

                                            if(jobcatname != 'Choose...') {
                                                if(jobsubcatname.length != 0) {
                                                    // Creates a new ajax request with XMLHttpRequest caller(object).
                                                    var xhr = new XMLHttpRequest();

                                                    // Declares the object Parameters (GET method)
                                                    xhr.open('GET','savenewsubcat.php?jobsubcategory=' +jobsubcatname+ '&chosencategory=' +jobcatname, true);

                                                    // When request is still processing
                                                    xhr.onprogress = function() {
                                                        // console.log('Processing...');
                                                        // console.log(this.responseText);
                                                        var txt = this.responseText;
                                                        if(txt == 0) {
                                                            red.innerHTML = '<i class="fas fa-exclamation-circle"></i> Subcategory already exists';
                                                        }
                                                        else if(txt == 1) {
                                                            green.innerHTML = '<i class="fas fa-check-circle"></i> Subcategory added';
                                                        }    
                                                    }

                                                    // When request is processed
                                                    xhr.onload = function() {
                                                        //console.log('Processed...');
                                                        //console.log(this.responseText);
                                                    }
                                                    xhr.send();
                                                }
                                                else
                                                    yellow.innerHTML = '<i class="fas fa-question-circle"></i> Please enter a job subcategory in the field';
                                            }
                                            else 
                                                exred.innerHTML = '<i class="fas fa-question-circle"></i> Please select a job category before adding';
                                        }
                                    </script>
                                    <!--<button class="btn btn-sm btn-link">undo</button>-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--//////////DESIGN MENU///////////////////-->
                <div class="card" id="designmenu">
                    <div class="card-header">
                        Design
                        <p id="currentTime" class="float-right text-xs"></p>
                    </div>
					
                    <div class="card-body"> <!--card starts-->
                        <h5 class="card-title">Job ID:
                        <?php 
                            $sql_a = "SELECT (MAX(vacancyId)+1) as 'newvacId' FROM vacancy;";
                            $result_a = $conn->query($sql_a);

                            if($result_a->num_rows>0) {
                                while($row = $result_a->fetch_assoc()) {
                                    $jId = $row['newvacId'];
                                }
                                echo $jId; 
                            }
                            else
                                echo '1';

                        ?>
                        </h5>
						
                        <p class="card-text">Insert new vacancy to following form to Preview.</p>
						
                        <div class="row"> <!--A row starts-->
                            <div class="col-md-6"> <!--A col starts-->
                                <div class="input-group input-group-lg mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Company</span>
                                    </div>
                                    <input type="text" class="form-control" id="inputcompany" aria-label="Sizing example input" name="company" aria-describedby="inputGroup-sizing-sm">
                                </div>

                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectCategory">Job Category</label>
                                        </div>
                                        <select class="custom-select" id="selectCategory" name="category">
                                            <option selected>Choose...</option>
                                                    <?php 
                                                    $sql_b = "SELECT * FROM category;";
                                                    $result_b = $conn->query($sql_b);

                                                    if($result_b->num_rows>0) {
                                                        while($row = $result_b->fetch_assoc()) {
                                                            $cId   = $row['catId'];
                                                            $cName = $row['catName']; 
                                                ?>
                                                        <option value="<?php echo $cId; ?>"><?php echo $cName; ?></option>
                                                <?php
                                                        }
                                                    }
                                                    else {
                                                ?>    
                                                        <option value="empty">(empty)</option>
                                                <?php 
                                                    }
                                                ?>
                                        </select>
                                    </div>

                                    <div class="input-group mb-2"> <!--input group starts-->
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="selectsubCategory">Job subcategory</label>
                                        </div>
                                        <select class="custom-select" id="selectsubCategory" name="subcategory">
                                            <option selected>Choose...</option>
                                            <script>
                                                //////////////
                                                    document.getElementById('selectsubCategory').addEventListener('click',loadText);

                                                    var sel = document.getElementById('selectsubCategory');

                                                        function loadText() {
                                                            var sI = sel.selectedIndex;
                                                            // Removes still available categories
                                                            if(sel.length>1) {
                                                                for(var c=sel.length;c>0;c--) {
                                                                    if(sel.selectedIndex == c)
                                                                        continue;
                                                                    else
                                                                        sel.remove(c);
                                                                }
                                                                sI = sel.selectedIndex;
                                                            }

                                                            // Creates a new ajax request with XMLHttpRequest caller(object).
                                                            var xhr = new XMLHttpRequest();
                                                            
                                                            // Declares the object parameters
                                                            xhr.open('GET','subcatloading.php',true);
                                                            
                                                            // When request is still processing
                                                            xhr.onprogress = function() {
                                                                //console.log(xhr.readyState);
                                                            }

                                                            // When request is processed
                                                            xhr.onload = function() {
                                                                if(this.status == 200) {
                                                                    var subcats = JSON.parse(this.responseText);
                                                                    // console.log(subcats);
                                                                    
                                                                    var prescId = '';
                                                                    var prescName = '';

                                                                    for(var i in subcats) {
                                                                        prescId = subcats[i].presubcatId;
                                                                        prescName = subcats[i].presubcatName;

                                                                        // console.log(prescId+","+prescName);
                                                                        
                                                                        var option = document.createElement('option');
                                                                        option.value = prescId;
                                                                        option.text = prescName;
                                                                        sel.add(option);
                                                                    }
                                                                }
                                                            }
                                                            xhr.send();
                                                        }
                                                    //////////////
                                            </script>
                                        </select>
                                        
                                        

                                    </div> <!--input group ends-->
                                
                            </div> <!--div starts-->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Description</span>
                                    </div>
                                        <textarea rows="2" cols="5" class="form-control" id="textdescription" aria-label="With textarea" placeholder="maximum 200 characters" name="description"></textarea>
                                </div> <br>             

                            <div class="card">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Date of Expire</span>
                                    </div>
                                        <input class="form-control" id="datepicker" name="expdate" type="date">
                                </div>
            </div> <!--col ends-->
        </div> <!--row ends-->
                                <br>
                            </div>
                        </div> <!--card ends-->
                </div> <!--card ends-->
            </div> <!--col ends-->

					<div class="col-md-4"> <!--div starts-->
                        <div class="card" id="searchtable">
                            <div class="card-header">
                                <div class="row">
                                        <div class="col-md-10 col-sm-10">
                                            <input class="form-control form-control-sm float-left" id="inputSearch" name="searchcategory" type="text" placeholder="Search category">
                                        </div>
                                        <div class="col-md-2 col-sm-2">
                                            <button class="btn btn-sm btn-outline-primary rounded-circle float-right" id="inputSearchbtn">
                                                <i class="fas fa-search"></i></button>
                                        </div>
                                </div>
                            </div>

                            <script>
                                document.getElementById('inputSearchbtn').addEventListener('click',getCategory);
                                //document.getElementById('inputSearch').addEventListener('keydown',getCategory);

                                function getCategory(e) {
                                    e.preventDefault();
                                    var inputText = encodeURIComponent(document.getElementById('inputSearch').value);
                                    var dispcat = document.getElementById('displaycat');
                                    var dispscat = document.getElementById('displaysubcat');

                                    if(inputText.length == 0) {

                                    }
                                    else {
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('GET','getcategory.php?searchcategory=' +inputText,true);

                                        xhr.onprogress = function() {
                                            //console.log(this.responseText);
                                            var result = JSON.parse(this.responseText); 
                                            console.log(result);
                                            var col_A = '';
                                            var col_B = '';

                                            for(var i in result) {
                                                col_A = result[i];
                                                dispcat.innerHTML = col_A;
                                                
                                                    col_B = result[i].subcatName;
                                                    dispscat.innerHTML = col_B;
                                                
                                            }
                                        }

                                        xhr.onload = function() {
                                            // console.log(this.responseText);
                                            // dispcat.innerHTML = this.responseText;
                                            // dispscat.innerHTML = this.responseText;
                                        }

                                        xhr.send();
                                    }
                                }

                            </script>
                            
                            <div class="class-body">
                                <small class="text-success float-right"><small class="text-warning float-right" id="catwarn"></small></small><div class="clearfix"></div>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div class="col">
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th class="text-center">Category</th>
                                                            <th class="text-center">Subcategory</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-center" id="displaycat"></td>
                                                            <td class="text-center" id="displaysubcat"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					    <div class="card" id="postpreview"> <!--card starts-->
							<div class="card-header text-center text-primary">
								Preview
							</div>
							<div class="card-body">
								<h6 class="card-title text-info">Company</h6>
								<p class="card-text text-success text-sm text-center" id="previewcompany"></p>
                                <div class="clearfix"></div>
                                
                                <h6 class="card-title text-info">Job category</h6>
								<p class="card-text text-success text-sm text-center" id="previewjobcategory"></p>
                                <div class="clearfix"></div>

                                <h6 class="card-title text-info">Job subcategory</h6>
								<p class="card-text text-success text-sm text-center" id="previewjobsubcategory"></p>
                                <div class="clearfix"></div>
                                
                                <h6 class="card-title text-info">Description</h6>
								<p class="card-text text-success text-sm text-center" id="previewtextdescription"></p>
                                <div class="clearfix"></div>
								
                                <h6 class="card-title text-info">Expires on</h6>
								<p class="card-text text-success text-sm text-center" id="previewdatepicker"></p>
                                <div class="clearfix"></div>

                                <button class="btn btn-success btn-sm float-right" id="allsubmit">Publish</button>
                                
                                <script>
                                    document.getElementById('allsubmit').addEventListener('click',sendPost);

                                    function sendPost(e) {
                                        e.preventDefault();

                                            function getpstdate() {
                                                var dT = new Date();
                                                var pst = '';
                                                if(dT.getMonth()<10) {
                                                    if(dT.getDate()<10)
                                                        pst = dT.getFullYear()+"-0"+(dT.getMonth()+1)+"-0"+dT.getDate();
                                                    else
                                                        pst = dT.getFullYear()+"-0"+(dT.getMonth()+1)+"-"+dT.getDate();
                                                }
                                                else {
                                                    if(dT.getDate()<10)
                                                        pst = dT.getFullYear()+"-"+(dT.getMonth()+1)+"-0"+dT.getDate();
                                                    else
                                                        pst = dT.getFullYear()+"-"+(dT.getMonth()+1)+"-0"+dT.getDate();
                                                }
                                                return pst;
                                            }

                                        var com = encodeURIComponent(document.getElementById('inputcompany').value);
                                        var cat = encodeURIComponent(document.getElementById('selectCategory').value);
                                        var subcat = encodeURIComponent(document.getElementById('selectsubCategory').value);
                                        var descrip = encodeURIComponent(document.getElementById('textdescription').value);
                                        var exp = encodeURIComponent(document.getElementById('datepicker').value);
                                        var pstdt = encodeURIComponent(getpstdate());
                                        var xhr = new XMLHttpRequest();
                                        
                                        xhr.open('GET','addingthevacancy.php?company=' +com+ '&category=' +cat+ '&subcategory=' +subcat+ '&description=' +descrip+ '&expdate=' +exp+ '&postdate=' +pstdt ,true);
                                            //console.log(com+" "+cat+" "+subcat+" "+descrip+" "+exp);
                                        xhr.onprogress = function() {
                                            //console.log("Processing..."+xhr.readystate);
                                            //console.log(this.responseText);
                                        }

                                        xhr.onload = function() {
                                            //console.log("Processed..."+xhr.readystate);
                                            //console.log(this.responseText);
                                        }

                                        xhr.send();
                                    }
                                </script>
							</div>
						</div> <!--card ends-->
					</div> <!--div ends-->
					
        </div> <!--row ends-->
    </div> <!--container ends-->
</section>



<div class="clearfix"></div>

<section>
<div class="container"> <!--container starts-->
    <div class="row"> <!--A row starts-->
        <div class="col"> <!--A col starts-->
        <br>
            <a href="#vactable" class="btn btn-sm text-primary text-left" id="vaclist">All vacancies list</a>
            <div id="vactable" class="table-responsive">
            <br>
                <table class="table table-striped table-bordered"> <!--A table starts-->
                    <thead>
                        <tr class="success">
                            <th class="text-center">Vacancy ID</th>
                            <th class="text-center">Company</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Subcategory</th>
                            <th class="text-center">Posted Date</th>
                            <th class="text-center">Expiry Date</th>
                            <th class="text-center">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $sql_d = "SELECT * FROM vacancy;";
                                
                                $result_d = $conn->query($sql_d);

                                if($result_d->num_rows>0) {
                                    while($row = $result_d->fetch_assoc()) {
                                        $vId    = $row['vacancyId'];
                                        $com    = $row['company'];
                                        $vctId  = $row['catId'];
                                        $vsctId = $row['subCatId'];
                                        $des    = $row['description'];
                                        $postDt = $row['postDate'];
                                        $expDt  = $row['expDate'];
                            ?>
                             <tr>            
                                <td class="text-center text-info"><?php echo $vId; ?></td>
                                <td class="text-center"><?php echo $com; ?></td>
                                <td class="text-center"><?php $sql_e = "SELECT catName as vctNm FROM category WHERE catId='".$vctId."' ;"; $result_e=$conn->query($sql_e); $row=$result_e->fetch_assoc(); $vctName=$row['vctNm']; echo $vctName; ?></td>
                                <td class="text-center"><?php $sql_f = "SELECT subcatName as vsctNm FROM subcategory WHERE subcatId='".$vsctId."' ;"; $result_f=$conn->query($sql_f); $row=$result_f->fetch_assoc(); $vsctName=$row['vsctNm']; echo $vsctName; ?></td>
                                <td class="text-center"><?php echo $postDt; ?></td>
                                <td class="text-center"><?php echo $expDt; ?></td>
                                <td class="text-center"><small> <?php echo $des; ?> </small></td>
                             </tr>
                            <?php
                                    }
                                }
                                else
                                    echo 'No records found!';
                            ?>
                    </tbody>
                </table> <!--A table ends-->
            </div>
        </div>
    </div>
</div>
</section>

<footer>
    <div class="text-center">
        <p>&copy; 2018-<?php echo date("Y");?></p>
    </div>
</footer>

</body>
</html>