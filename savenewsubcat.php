<?php 
    require 'configuration.php';
?>

<?php
    $sql_a = "SELECT * FROM subcategory 
                WHERE subCatName = '".$_GET['jobsubcategory']."' 
                ";
    
    $result_a = $conn->query($sql_a);

    if($result_a->num_rows>0)
        echo 0;
    else {
        $sql_b = "INSERT INTO subcategory 
                    (catId,subCatName)
                    VALUES
                    ('".$_GET['chosencategory']."','".$_GET['jobsubcategory']."')
                    ";
        if($conn->query($sql_b))
            echo 1;
    }
?>