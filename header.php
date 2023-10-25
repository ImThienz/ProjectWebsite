<!--Phần trên homepage-->

<?php
//include './cart-function.php'; 
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
$user = (isset($_SESSION['user']) ? $_SESSION['user'] : []);

?>

<!--Area of header-->
<div class="header">
    <div class="header_top">
        <p title="Khung giờ hoạt động">Mon-Sun: 7:00 AM - 18:00 PM</p>
        <p title="Địa chỉ">Address: 22ĐHTT01 - 010100085405</p>
        <div class="header_contact">
            <p title="Liên hệ">Call: 024 xxxx xxxx</p>
            <a href="#"><i class="fab fa-facebook-square" title="Facebook"></i></a>
            <a href="#"><i class="fab fa-instagram" title="Instagram"></i></a>
        </div>
    </div>
    <div class="header_bot">
        <div class="header_icon">
            <a href="./home.php"><img src="./img/logo.png" alt="icon" width="50px" height="55px" title="Trang chủ"></a>
        </div>
        <div class="header_menu" style="font-weight: 600;">
            <ul>
                <li style="background-color:aqua; cursor: pointer; height: 40px; width: 120px; border-radius: 20px; border: 3px solid blue; background-color: ocean; font-size: 15px; font-weight: 600; color: blue; margin-top: 6px; display:flex; align-items:center; justify-content:center;">Phân Loại:</li>
                <li><a href="collections_gaming.php?category=gaming">Gaming</a></li>
                <li><a href="collections_macbook.php?category=macbook">MacBook</a></li>
                <li><a href="collections_hoc_tap.php?category=hoc-tap-van-phong">Học tập, văn phòng</a></li>
            </ul>
        </div>
        <div class="deals">
            <button>Deals</button>
        </div>
        <div class="header_accout">
            <ul>
                <li><a href="search.php"><i class="fas fa-search"></a></i></li>
                <li class="cart">
                    <a href="./view-cart.php"><i class="fas fa-shopping-cart"></a></i>
                    <span class="number_cart"><?php echo count($cart) ?></span> <!-- thay count($cart) bằng total_item($cart) nếu muốn hiển thị số sản phẩm theo số lượng -->
                </li>
                <?php if (isset($user['user_name'])) { ?>
                    <li class="dropdown" id="dropdownn">
                        <img class="img_user" src="./img/<?php echo $user['avatar'] ?>">
                        <p class="dropdown-toggle" data-toggle="dropdown"><?php echo $user['name'] ?><b class="caret"></b></p>
                        <ul class="dropdown-menu login-menu">
                            <!--<li><a href="./login.php">Đăng kí</a></li>
                            <li><a href="./dangky.php">Đăng nhập</a></li>-->
                            <li><a href="profile_users.php?v=<?php echo $user['name'] ?>">Thông tin</a></li>
                            <?php if ($_SESSION['user']['role'] == 1) { ?>
                                <li><a href="admin.php">Quản lí</a></li>
                            <?php } ?>
                            <li><a href="./setting/logout.php">Đăng xuất</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="dropdown" id="dropdownn">
                        <p class="dropdown-toggle" data-toggle="dropdown">Tài khoản<b class="caret"></b></p>
                        <ul class="dropdown-menu">
                            <li><a href="./login.php">Đăng nhập</a></li>
                            <li><a href="./dangky.php">Đăng ký</a></li>
                            <!--<li><a href="logout.php">Đăng xuất</a></li>-->
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var menuItems = document.querySelectorAll('#dropdownn .dropdown-menu');

                    for (var i = 0; i < menuItems.length; i++) {
                        var menuItem = menuItems[i];
                        var parentMenuItem = menuItem.parentElement;

                        parentMenuItem.addEventListener('click', function() {
                            var subMenu = this.querySelector('.dropdown-menu');

                            if (subMenu) {
                                if (subMenu.style.display === 'none') {
                                    subMenu.style.display = 'block';
                                } else {
                                    subMenu.style.display = 'none';
                                }
                            }
                        });

                        parentMenuItem.addEventListener('mouseleave', function() {
                            var subMenu = this.querySelector('.dropdown-menu');

                            if (subMenu) {
                                subMenu.addEventListener('mouseenter', function() {
                                    this.style.display = 'block';
                                });

                                subMenu.addEventListener('mouseleave', function() {
                                    this.style.display = 'none';
                                });
                            }
                        });
                    }
                });
            </script>
        </div>
    </div>
</div>