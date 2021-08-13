$(document).ready(function() {
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
                    url: 'http://localhost/test/lib/add.php', // dia chi gui du lieu den
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
            $.post("http://localhost/test/lib/delete.php", { id: id }, function(res) {
                if (res == 1) {
                    alert("Xóa thành công!");
                    location.reload();
                }
            });
        }
    });
});