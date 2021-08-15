$(document).ready(function() {
    var id;
    $("#addProduct").click(function(event) {
        var name = $("#name").val();
        var price = $("#price").val();
        var quantity = $("#quantity").val();
        var description = $("#description").val();
        var cate_id = $("#cate_id").val();
        // lay ra cac thuoc tinh trong file dau tien 
        var file_data = $('#image').prop('files')[0];
        //lấy ra kiểu file
        var type = file_data.type;
        //lay ra kich thuoc
        var size = file_data.size;

        //Xét kiểu file được upload
        var match = ["image/jpeg", "image/png", "image/jpg", ];
        //kiểm tra kiểu file
        if (type == match[0] || type == match[1] || type == match[2]) {
            if (size <= 2000000) {
                //khởi tạo đối tượng form data
                var form_data = new FormData();
                //thêm cac truong du lieu vao form
                form_data.append('name', name);
                form_data.append('price', price);
                form_data.append('quantity', quantity);
                form_data.append('image', file_data);
                form_data.append('description', description);
                form_data.append('cate_id', cate_id);
                //sử dụng ajax post
                $.ajax({
                    url: 'http://localhost/shop/lib/add.php', // dia chi gui du lieu den
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(res) {
                        if (res == 1) {
                            location.reload();
                        } else {
                            $('.status').text(res);
                            $('#image').val('');
                        }

                    }
                });
            }
        } else {
            $('.status').text('Chỉ được upload file ảnh');
            $('#image').val('');
        }
    });

    $(".delete").click(function(event) {
        var id = $(this).val();
        var c = confirm("Bạn có đồng ý xóa sản phẩm?");
        if (c == true) {
            $.post("http://localhost/shop/lib/delete.php", { id: id }, function(res) {
                if (res == 1) {
                    alert("Xóa thành công!");
                    location.reload();
                }
            });
        }
    });

    $(".update").click(function(event) {
        id = $(this).val();
        $("#id").val(id)
        $.post("http://localhost/shop/lib/data.php", { id: id }, function(res) {
            res = JSON.parse(res);
            $("#name1").val(res.product_name);
            $("#price1").val(res.price);
            $("#quantity1").val(res.quantity);
            $("#description1").val(res.description);
            $("#cate_id1").val(res.cate_id);
        });
    });

    $('#updateProduct').click(function(event) {
        var name1 = $("#name1").val();
        var price1 = $("#price1").val();
        var quantity1 = $("#quantity1").val();
        var description1 = $("#description1").val();
        var cate_id1 = $("#cate_id1").val();
        var file_data = $('#image1').prop('files')[0];

        if (typeof file_data != 'undefined') {
            var type = file_data.type;
            //lay ra kich thuoc
            var size = file_data.size;
            //Xét kiểu file được upload
            var match = ["image/jpeg", "image/png", "image/jpg", ];
            //kiểm tra kiểu file
            var form_data = new FormData();
            //thêm cac truong du lieu vao form
            form_data.append('id', id);
            form_data.append('name1', name1);
            form_data.append('price1', price1);
            form_data.append('quantity1', quantity1);
            form_data.append('image1', file_data);
            form_data.append('description1', description1);
            form_data.append('cate_id1', cate_id1);

            if (type == match[0] || type == match[1] || type == match[2]) {
                if (size <= 2000000) {
                    $.ajax({
                        url: 'http://localhost/shop/lib/update.php', // gửi đến file update.php 
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function(res) {
                            if (res == 1) {
                                location.reload();
                            } else {
                                alert(res)
                            }
                        }
                    });
                }
            } else {
                $('.status').text('Chỉ được upload file ảnh');
                $('#image').val('');
            }
        } else {
            var form_data = new FormData();
            //thêm cac truong du lieu vao form
            form_data.append('id', id);
            form_data.append('name1', name1);
            form_data.append('price1', price1);
            form_data.append('quantity1', quantity1);
            form_data.append('description1', description1);
            form_data.append('cate_id1', cate_id1);

            $.ajax({
                url: 'http://localhost/shop/lib/update.php', // gửi đến file update.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(res) {
                    if (res == 1) {
                        location.reload();
                    } else {
                        alert(res)
                    }
                    $('#file').val('');
                }
            });
        }
    });



});