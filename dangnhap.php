<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->

<html>
    <head>
        <?php include './layout/header.php'; ?>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
if (isset($_SESSION['user'])) {
    header("location:./index.php");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"]) || empty($_POST['password'])) {
            http_response_code(400);
            echo "<script>alert('KO dc de trong')</script>";
        } else {
            $userName = $_POST["username"];
            $password = $_POST["password"];
            $sql = "select * from nguoidung where taikhoan = '$userName' and matkhau = '$password' ";
            $rs = $db->fetchOne($sql);
            if ($rs > 0) {
		http_response_code(200);
                echo "Đăng Nhập Thành Công";
                $_SESSION['user'] = $rs['taikhoan'];
                $taikhoan = $_SESSION['user'];
                //header("location:./index.php?taikhoan=$taikhoan");
                header("location:./index.php");
            } else {
		http_response_code(400);
                echo "Đăng Nhập Thất Bại";
            }
        }
    }
}
?>
    <body>
        <form action="" class="signin-form" method="POST">
        <div class="auth-form">
            <div class="auth-form__container">

                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng nhập</h3>
                    <span class ="auth-form__switch-btn">Đăng ký</span> 
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <div><input type="text" name="username" class="auth-form__input" placeholder="Nhập username"></div>
                        <div><input type="password" name="password" class="auth-form__input" placeholder="Nhập password"></div>

                    </div>
                </div>
                <div class="auth-form__aside">
                    <div class="auth-form__help">
                        <a href="" class="auth-form__help-link">Quên mật khẩu</a>
                        <span class="auth-form__help-separate"></span>
                        <a href="" class="auth-form__help-link">Cần trợ giúp ?</a>
                    </div>
                </div>


                <div class="auth-form__controls">
                    <button class="btn auth-form__controls-back btn--normal">TRỞ LẠI</button>
                    <button class="btn btn--primary btn--normal" name="submit" value="login">ĐĂNG NHẬP</button>
                </div>
            </div>

            <div class="auth-form__socials">
                <a href="" class="auth-form__socials--facebook btn btn--with-icon btn--size-s">
                    <i class="auth-form__socials-icon fab fa-facebook-square"></i> 
                    <span class="auth-form__socials-title">
                        Kết nối với facebook
                    </span>
                </a>
                <a href="" class="auth-form__socials--google btn btn--with-icon btn--size-s">
                    <i class="auth-form__socials-icon fab fa-google"></i>
                    <span class="auth-form__socials-title">
                        Kết nối với google
                    </span>
                </a>
            </div>
        </div>
            </form>
    </body>
</html>
