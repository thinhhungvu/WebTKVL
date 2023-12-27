<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <?php include './layout/header.php'; ?>
        <title>TODO supply a title</title>
        <link rel="stylesheet" href="./assets/css/base.css">
        <link rel="stylesheet" href="./assets/css/main.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>


        <div class="auth-form">
            <div class="auth-form__container">

                <div class="auth-form__header">
                    <h3 class="auth-form__heading">Đăng ký</h3>
                    <span class ="auth-form__switch-btn">Đăng nhập</span> 
                </div>

                <div class="auth-form__form">
                    <div class="auth-form__group">
                        <div><input type="text" class="auth-form__input" placeholder="Nhập username"></div>
                        <div><input type="password" class="auth-form__input" placeholder="Nhập password"></div>
                        <div><input type="password" class="auth-form__input" placeholder="Nhập lại password"></div>

                    </div>
                </div>

                <div class="auth-form__aside">
                    <p class="auth-form__policy-text">
                        Bằng việc đăng ký, bạn đã đồng ý với TopCV về
                        <a href="" class="auth-form__text-link">Điều khoản dịch vụ</a>&
                        <a href="" class="auth-form__text-link">Chính sách bảo mật</a>
                    </p>
                </div>

                <div class="auth-form__controls">
                    <button class="btn auth-form__controls-back btn--normal">TRỞ LẠI</button>
                    <button class="btn btn--primary btn--normal">ĐĂNG KÝ</button>
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

    </body>
</html>
