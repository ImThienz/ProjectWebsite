<!--Thêm vào giỏ hàng >> Đặt hàng (cần đky tài khoản người dùng)--> 


<?php
//include './setting/connect.php';

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);

$hangg = mysqli_query($conn, "SELECT * FROM hang");
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $cpu = $_POST['cpu'];
    $ram = $_POST['ram'];
    $o_cung = $_POST['o_cung'];
    $card_do_hoa = $_POST['card_do_hoa'];
    $trong_luong = $_POST['trong_luong'];
    $mau_sac = $_POST['mau_sac'];
    $kich_thuoc = $_POST['kich_thuoc'];
    $price = $_POST['price'];
    $sale_price = $_POST['sale_price'];
    $category = $_POST['category'];
    $id_hang = $_POST['id_hang'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $file_name = $file['name'];
        move_uploaded_file($file['tmp_name'], 'img/' . $file_name);
    }
    $add_sql = "INSERT INTO product(name,image,quantity,id_hang,cpu,ram,o_cung,card_do_hoa,trong_luong,mau_sac,kich_thuoc,price,sale_price,category,status) VALUES ('$name','$file_name','$quantity','$id_hang','$cpu','$ram','$o_cung','$card_do_hoa','$trong_luong','$mau_sac','$kich_thuoc','$price','$sale_price','$category','$status')";

    $query = mysqli_query($conn, $add_sql);

    if ($query) {
        $add_success = "Đã thêm sản phẩm";
        //header('location: admin.php?type=manager_product');
    } else {
        $add_error = "Lỗi khi thêm sản phẩm";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="icon" href="./img/logo.jpg">
    <link rel="stylesheet" href="./Css/styles.css">
    <link rel="stylesheet" href="./Css/responsive_home.css">  

</head>

<body>
    <div class="header_add_product">
        <div class="title_add_product">
            <h3>Thêm sản phẩm</h3>
        </div>
        <div class="operation_add_product">
            <button><a href="admin.php?type=manager_product">Danh sách sản phẩm</a></button>
        </div>
        <div class="frame_form_add_product">
            <form class="" action="" method="POST" role="form" enctype="multipart/form-data">
                <div class="form_add_product">
                    <div>
                        <div class="form-group">
                            <label class="title_info" for="">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="" name="name" placeholder="Nhập tên sản phẩm" required="required">
                        </div>
                        <div class="form-group img_product">
                            <label class="title_info" for="">Ảnh sản phẩm:</label>
                            <input type="file" class="form-control" id="" name="image" placeholder="Ảnh sản phẩm" required="required">
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Số lượng:</label>
                            <input type="text" class="form-control" id="" name="quantity" placeholder="Nhập số lượng sản phẩm" required="required">
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Tên hãng:</label>
                            <select name="id_hang" id="input" class="form-control" required="required">
                                <option value="">Chọn hãng đi nè :3</option>
                                <?php foreach ($hangg as $cet) : ?>
                                    <option value="<?php echo $cet['id'] ?>"><?php echo $cet['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">CPU:</label>
                            <textarea type="text" class="form-control content_product" id="" name="cpu" placeholder="CPU của sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Ram:</label>
                            <textarea type="text" class="form-control content_product" id="" name="ram" placeholder="Ram của sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Ổ cứng:</label>
                            <textarea type="text" class="form-control content_product" id="" name="o_cung" placeholder="Ổ cứng của sản phẩm"></textarea>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label class="title_info" for="">Card đồ họa:</label>
                            <textarea type="text" class="form-control content_product" id="" name="card_do_hoa" placeholder="Card đồ họa của sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Trọng lượng:</label>
                            <input type="text" class="form-control" id="" name="trong_luong" placeholder="Trọng lượng của sản phẩm" required="required">
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Màu sắc:</label>
                            <input type="text" class="form-control" id="" name="mau_sac" placeholder="Màu sắc của sản phẩm" required="required">
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Kích thước:</label>
                            <input type="text" class="form-control" id="" name="kich_thuoc" placeholder="Kích thước của sản phẩm" required="required">
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Giá sản phẩm:</label>
                            <input type="text" class="form-control" id="" name="price" placeholder="Nhập giá sản phẩm (lưu ý: 1 triệu thì nhập 1.000)" required="required">
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Giá khuyến mãi:</label>
                            <input type="text" class="form-control" id="" name="sale_price" placeholder="Nhập giá khuyến mãi (lưu ý: 1 triệu thì nhập 1.000)" required="required">
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Loại sản phẩm:</label>
                            <input type="text" class="form-control" id="" name="category" placeholder="Nhập loại vd: gaming, hoc-tap-van-phong, macbook" required="required">
                        </div>
                        <div class="form-group">
                            <label class="title_info" for="">Trạng thái:</label>
                            <div class="checkboxx">
                                <div class="checkbox-container">
                                    <label>Còn hàng</label>
                                    <input type="radio" name="status" value="1" id="duyet" checked="checked">
                                </div>
                                <div class="checkbox-container checkbox-sold-out">
                                    <label>Hết hàng</label>
                                    <input type="radio" name="status" value="0" id="chuaduyet" checked="checked">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
</body>

</html>