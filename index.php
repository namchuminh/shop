<?php 
	include "./static/layout/top.php";
	include "./config/database.php";
  include "./lib/category.php";
  include './lib/view.php';
	$conn = connectDB();
	$resultView = viewProduct($conn);
  $resultCateView = categorie($conn);
  $resultCateUpdate = categorie($conn);
?>
<div class="container">
  <div class="title-box">
    <h1>TRANG QUẢN LÝ SẢN PHẨM</h1>
  </div>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add">Add Product</button> 
<div class="noti"></div>
</div>
  <table class="table table-bordered grocery-crud-table table-hover">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
    		<th>Image</th>
    		<th>Description</th>
    		<th>Cate Id</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="list-details">
    <?php while($rowView = $resultView->fetch_assoc()) {?>
      <tr>
        <td>
          <?php echo $rowView['product_id'];?>
        </td>
        <td>
          <?php echo $rowView['product_name'];?>
      	</td>
        <td>
          <?php echo $rowView['price'];?>
      	</td>
        <td>
          <?php echo $rowView['quantity'];?>%
      	</td>
        <td>
          <img src="<?php echo $rowView['image']; ?>" alt="Image" width="100" height="100">
      	</td>
        <td>
          <?php echo $rowView['description'];?>
      	</td>
        <td>
          <?php echo $rowView['cate_id'];?>
      	</td>
        <td>
          <button type="button" class="btn btn-primary update" value="<?php echo $rowView['product_id'];?>" data-toggle="modal" data-target="#update">Update</button>
          <button type="button" class="btn btn-danger delete" value="<?php echo $rowView['product_id'];?>">Delete</button>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>

<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD PRODUCT</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <h2 style="color: red;text-align: center;font-size: 14px;" class="status"></h2>
        <form  enctype="multipart/form-data" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="name">Product Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Product name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">Price</label>
      </div>
      <div class="col-75">
        <input type="text" id="price" name="price" placeholder="Price..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="quantity">Quantity</label>
      </div>
      <div class="col-75">
        <input type="text" id="quantity" name="quantity" placeholder="Quantity..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="image">Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="image" name="image">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">
        <textarea name="description" id="description" placeholder="Description...."></textarea>
      </div>
    </div>  
    <div class="row">
      <div class="col-25">
        <label for="country">Cate Id</label>
      </div>
      <div class="col-75">
        <select id="cate_id" name="cate_id">
          <?php while($rowCateView = $resultCateView->fetch_assoc()) {?>
            <option value="<?php echo $rowCateView['cate_id'];?>"><?php echo $rowCateView['cate_name'];?></option>
          <?php }?>
        </select>
      </div>
    </div>
    <div class="row">
      <button type="button" class="btn btn-success" id="addProduct">Add Product</button>
    </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
</div>

<div id="update" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">UPDATE PRODUCT</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <h2 style="color: red;text-align: center;font-size: 14px;" class="status1"></h2>
        <form  enctype="multipart/form-data" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="name">Product Id</label>
      </div>
      <div class="col-75">
        <input type="text" id="id" name="id" disabled>
      </div>
    </div>    
    <div class="row">
      <div class="col-25">
        <label for="name">Product Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name1" name="name1" placeholder="Product name.." value="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="price">Price</label>
      </div>
      <div class="col-75">
        <input type="text" id="price1" name="price1" placeholder="Price..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="quantity">Quantity</label>
      </div>
      <div class="col-75">
        <input type="text" id="quantity1" name="quantity1" placeholder="Quantity..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="image">Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="image1" name="image1">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="description">Description</label>
      </div>
      <div class="col-75">
        <textarea name="description1" id="description1" placeholder="Description...."></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Cate Id</label>
      </div>
      <div class="col-75">
        <select id="cate_id1" name="cate_id1">
          <?php while($rowCateUpdate = $resultCateUpdate->fetch_assoc()) {?>
            <option value="<?php echo $rowCateUpdate['cate_id'];?>"><?php echo $rowCateUpdate['cate_name'];?></option>
          <?php }?>
        </select>
      </div>
    </div>  
    <div class="row">
      <button type="button" class="btn btn-primary" id="updateProduct" style="float: right;">Update Product</button>
    </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  </div>
</div>


<?php include "./static/layout/bottom.php"; ?>