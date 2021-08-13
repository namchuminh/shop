<?php
function viewProduct($conn){
	$sqlView = "SELECT * FROM products";
	$resultView = $conn->query($sqlView);
	return $resultView;
}


?>