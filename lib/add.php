<?php 
	include "../config/database.php";
	$conn = connectDB();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
	  $error;
	  $name = $_POST['name'];
	  $price = $_POST['price'];
	  $quantity = $_POST['quantity'];
	  $image = $_FILES['image'];
	  $description = $_POST['description'];
	  $cate_id = $_POST['cate_id'];
	  if(!isset($name) || !isset($price) || !isset($quantity) || !isset($image) || !isset($description) || !isset($cate_id)){
	  	$error = "Vui lòng nhập đầy đủ thông tin!";
	  }else{
	  	if ($price <= 0 || $quantity <= 0) {
	  		$error = "Price hoặc quantity phải lớn hơn 0!";
	  	}else{
	  		if(move_uploaded_file($_FILES['image']['tmp_name'], 'E:\xampp\htdocs\test/image/'.$_FILES['image']['name'])){
	  			$image_dir = "http://localhost/test/image/".$_FILES['image']['name'];
	  			$sqlAdd = "INSERT INTO products (product_name, price, quantity, image, description, cate_id)
						VALUES ('".$name."', 
						'".$price."', 
						'".$quantity."', 
						'".$image_dir."', 
						'".$description."', 
						'".$cate_id."')";
				$conn->query($sqlAdd);
	  		}else{
	  			$error = "Có lỗi khi upload ảnh!";
	  		}
	  	}
	  }
	}
	if (!isset($error)) {
		echo TRUE;
	}else{
		echo $error;
	}
 ?>