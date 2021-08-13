<?php
function connectDB(){
	$conn = new mysqli("localhost", "root", "","shop");
	return $conn;
}

?>