<?php
    require 'configuration.php';
?>

<?php 

    if(isset($_POST['action'])) {
        $sql_f = "SELECT *
                  FROM presubcategory;";
            $result_d = $conn->query($sql_f);

        $sql_e ="DELETE FROM presubcategory;";

        if($result_d->num_rows>0) {
            $conn->query($sql_e);
        }

        
        $sql_c = "SELECT c.catId, s.subCatId, s.subCatName
                  FROM category c, subcategory s
                  WHERE c.catId=s.catId AND c.catId='".$_POST['action']."' ;";

        $result_c = $conn->query($sql_c);
        if($result_c->num_rows>0) {
            while($row = $result_c->fetch_assoc()) {
                $ctId    = $row['catId'];
                $sctId   = $row['subCatId'];
                $sctname = $row['subCatName'];

                $sql_d = "INSERT INTO presubcategory
                (presubcatId,precatId,presubcatName)
                VALUES('".$sctId."','".$ctId."','".$sctname."');";
            $conn->query($sql_d);          
            }
        }
    } 

?>
