<?php 
include "../config/database.php";
$conn = connectDB();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error;
    $id = $_POST['id'];
    if(isset($id)){
        $sqlDelete = "DELETE FROM products WHERE product_id=".$id;
        $conn->query($sqlDelete);
    }
    if (!isset($error)) {
        echo TRUE;
    }else{
        echo $error;
    }
}


?>