<?php 
    require 'configuration.php';
?>

<?php
    // The query to load subcategories
    $sql_c = "SELECT * FROM presubcategory;";

        // Executing query
        $result_c = mysqli_query($conn, $sql_c);

        // Fetch all rows at once 
        $presubcats = mysqli_fetch_all($result_c, MYSQLI_ASSOC);

        // Resend the data as responseText (JSON)
        echo json_encode($presubcats);
?> 
