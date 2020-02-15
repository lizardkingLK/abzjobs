<?php 
    session_start();
    require 'configuration.php';
?>

<?php
    $sql_c = "INSERT INTO vacancy 
                (company,description,postDate,expDate,catId,subCatId,eId)
                VALUES
                ('".$_GET['company']."','".$_GET['description']."','".$_GET['postdate']."','".$_GET['expdate']."','".$_GET['category']."','".$_GET['subcategory']."','".$_SESSION['S-eid']."' );
                ";
    
    $result_c = $conn->query($sql_c);
    
    if($result_c == true) 
        echo "DONE!"; 
    else 
        echo "NOT DONE!"; 
?>