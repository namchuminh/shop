<?php
function categorie($conn){
	$sqlCate = "SELECT * FROM categories";
	$resultCate = $conn->query($sqlCate);
	return $resultCate;
}


?>