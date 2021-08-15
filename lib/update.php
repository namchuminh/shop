<?php
    include "../config/database.php";
    $conn = connectDB();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $error;
        $id = $_POST['id'];
        $name = $_POST['name1'];
        $price = $_POST['price1'];
        $quantity = $_POST['quantity1'];
        $description = $_POST['description1'];
        $cate_id = $_POST['cate_id1']; 
        if(isset($_FILES['image1'])){
            $image = $_FILES['image1'];
        }
        if(empty($name) && empty($price) && empty($quantity) && empty($description) && empty($cate_id)){
            $error = "Bạn chưa chỉnh sửa gì!";
        }else{
            if(isset($image)){
                if(move_uploaded_file($_FILES['image1']['tmp_name'], 'E:\xampp\htdocs\shop/image/'.$_FILES['image1']['name'])){
                    $image_dir = "http://localhost/shop/image/".$_FILES['image1']['name'];
                    $sqlUpdate = "UPDATE products SET 
                    product_name='".$name."', 
                    price='".$price."',
                    quantity='".$quantity."',
                    image='".$image_dir."',
                    description='".$description."',
                    cate_id='".$cate_id."'
                    WHERE product_id=".$id;
                    $conn->query($sqlUpdate);
                }else{
                    $error = "Có lỗi khi upload ảnh!";
                }
            }else{
                $sqlUpdate = "UPDATE products SET 
                    product_name='".$name."', 
                    price='".$price."',
                    quantity='".$quantity."',
                    description='".$description."',
                    cate_id='".$cate_id."'
                    WHERE product_id=".$id;
                $conn->query($sqlUpdate);
            }
        }

        if (!isset($error)) {
            echo $cate_id;
        }else{
            echo $error;
        }
    }


?>