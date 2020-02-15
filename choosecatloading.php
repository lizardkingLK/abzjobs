<?php
    require 'configuration.php';
?>

<?php
    // The query to load categories
    $sql_a = "SELECT * FROM category";

        // Executing query
        $result_a = mysqli_query($conn, $sql_a);

        // Fetch all rows at once
        $cats = mysqli_fetch_all($result_a, MYSQLI_ASSOC);
        
        // Resend the data as responseText (JSON)
        echo json_encode($cats);

?>