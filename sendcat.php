<?php
    require 'configuration.php';
?>

<?php
    if(isset($_GET['jobcategory'])) {
        $sql_a = "SELECT * FROM category 
                    WHERE catName = '".$_GET['jobcategory']."' ";
        
        $result_a = $conn->query($sql_a);

        if($result_a->num_rows>0) {
            echo 0;
        }
        else {
            $sql_b = "INSERT INTO category 
                    (catName) 
                    VALUES 
                    ('".$_GET['jobcategory']."')";

            if($conn->query($sql_b))
                echo 1;
        }
    }
?>