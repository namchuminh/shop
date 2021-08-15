<?php
include "../config/database.php";
$conn = connectDB();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    if(isset($id)){
        $sqlData = "SELECT * FROM products WHERE product_id=".$id;
        $resultData = $conn->query($sqlData);
        $resultData = $resultData->fetch_assoc();
    }
    echo json_encode($resultData);
}


?>