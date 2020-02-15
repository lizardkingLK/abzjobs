<?php 
    require 'configuration.php';
?>

<?php
    if(isset($_GET['searchcategory'])) {
        $sql_a = "SELECT catName,catId FROM category WHERE catName LIKE '%".$_GET['searchcategory']."%' ;";
        $result_a = $conn->query($sql_a);

        if($result_a->num_rows>0) {
            while($row = $result_a->fetch_assoc()) {
                $category = $row['catName'];
                $catid    = $row['catId'];
                $arr = array($category);
                
                $sql_b = "SELECT subCatName FROM subcategory WHERE catId = '".$catid."' ;";
                $result_b = $conn->query($sql_b);

                if($result_b->num_rows>0) {
                    $subcategory = mysqli_fetch_all($result_b, MYSQLI_ASSOC);
                    $arr = array($category => $subcategory);
                }
                echo json_encode($arr);
            }
        }
    }
?>