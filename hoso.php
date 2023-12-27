<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Hồ sơ</title>
        <?php include './layout/header.php'; ?>
        <?php include './index.php'; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
    
    if (isset($_POST['upload'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($file_parts));
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'Kích thước file không được lớn hơn 2MB';
        }
        $image = $_FILES['image']['name'];
	echo $image;
        $target = realpath("assets/img/") . "/" . basename($image);
        $d = $db->delete("DELETE FROM images");
        $q = $db->query("INSERT INTO images (id,image) VALUES (1,'$image')");
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo '<script language="javascript">alert("Đã upload thành công!");</script>';
        } else {
            echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
        }
        $imageone = $db->fetchOne("SELECT * FROM images");
    }
    if (isset($_POST["action"]) 
            && isset($_REQUEST["n_hovaten"]) 
            && isset($_REQUEST["n_gioitinh"]) 
            && isset($_REQUEST["n_ngaysinh"]) 
            && isset($_REQUEST["n_diachi"]) 
            && isset($_REQUEST["n_email"]) 
            && isset($_REQUEST["n_sodienthoai"]) 
            && isset($_REQUEST["n_hocvan"]) 
            && isset($_REQUEST["n_tencongviec"]) 
            && isset($_REQUEST["n_chitietungtuyen"]) 
            && isset($_REQUEST["n_motakinhnghiem"])) {

        $hovaten = $_REQUEST["n_hovaten"];
        $gioitinh = $_REQUEST["n_gioitinh"];
        $ngaysinh = $_REQUEST["n_ngaysinh"];
        $diachi = $_REQUEST["n_diachi"];
        $email = $_REQUEST["n_email"];
        $sodienthoai = $_REQUEST["n_sodienthoai"];
        $hocvan = $_REQUEST["n_hocvan"];
        $tencongviec = $_REQUEST["n_tencongviec"];
        $chitietungtuyen = $_REQUEST["n_chitietungtuyen"];
        $motakinhnghiem = $_REQUEST["n_motakinhnghiem"];
        $taikhoan = $_REQUEST["taikhoan"];
        
        $sql = "UPDATE hoso SET hovaten = '" . $hovaten .
                "', gioitinh='" . $gioitinh .
                "',ngaysinh='" . $ngaysinh .
                "',diachi='" . $diachi .
                "',email='" . $email .
                "',sodienthoai='" . $sodienthoai .
                "',hocvan='" . $hocvan .
                "',tencongviec='" . $tencongviec .
                "',chitietungtuyen='" . $chitietungtuyen .
                "',motakinhnghiem='" . $motakinhnghiem . "' WHERE taikhoan = '" . $taikhoan . "'";
        $db->query($sql);
        //echo "<script type='text/javascript'>alert('Lưu thành công'); window.location.href = 'hoso.php';</script>";
    //header('location:hoso.php');
        
            }   
    ?>
    <body>
        <?php $hoso = $db->fetchOne("SELECT * FROM hoso");?>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="profile__containter">
                <div class="profile__containter__1">
                    <div class="profile__containter__title">Ảnh đại diện</div>
                    <div class="profile__containter__image">   
                        <?php
                        $imageone = $db->fetchOne("SELECT * FROM images");
                        echo "<img src='assets/img/" . $imageone['image'] . "' width='150px'>";
                        ?>
                        <input type="file" name="image">  
                        <button type="submit" name="upload">Cập nhật</button>  
                    </div>
                </div>
        </form>

        <div class="profile__containter__2">
            <form action="" method="POST">
                <input type="hidden" name="taikhoan" value="<?php echo($_SESSION["user"]); ?>">
                <div class="profile__containter__title">Thông tin cơ bản</div>
                <div class="hoten__gioitinh__form">

                    <div class="profile__containter__2__hoten">
                        <p> Họ tên </p>
                        <input type="text" value="<?php echo($hoso["hovaten"]); ?>" name="n_hovaten" class="input_form" placeholder="Họ và tên" required>
                    </div>


                    <div class="profile__containter__2__gioitinh">
                        <p>Giới tính</p>
                        <?php if ($hoso["gioitinh"] == 'nam') : ?>
                            <input type="radio" name="n_gioitinh" value="nam" checked="checked">
                            <span>Nam</span>
                            <input type="radio" name="n_gioitinh" value="nu"">
                            <span>Nữ</span>
                        <?php else : ?>
                            <input type="radio" name="n_gioitinh" value="nam"">
                            <span>Nam</span>
                            <input type="radio" name="n_gioitinh" value="nu" checked="checked">
                            <span>Nữ</span>
                        <?php endif; ?>
                    </div>

                </div>
                <div> 
                    <p> Ngày sinh </p>
                    <input class="birthday_form" type="date" name="n_ngaysinh" value="<?php echo($hoso["ngaysinh"]); ?>">
                </div>
                <div>
                    <p> Địa chỉ </p>
                    <input type="text" value="<?php echo($hoso["diachi"]); ?>" name="n_diachi" class="input_form input_diachi" placeholder="Nhập địa chỉ" required>
                </div>
                <div>
                    <p> Email </p>
                    <input type="text" value="<?php echo($hoso["email"]); ?>" name="n_email" class="input_form" placeholder="Nhập Email" required>
                </div>
                <div>
                    <p> Số điện thoại </p>
                    <input type="text" value="<?php echo($hoso["sodienthoai"]); ?>" name="n_sodienthoai" class="input_form" placeholder="Nhập số điện thoại" required>
                </div>

                <div>
                    <p> Học vấn </p>
                    <select name="n_hocvan" style="font-size: 20px;">
                        <?php if ($hoso["hocvan"] == 'THPT') : ?>
                        <option value="THPT" selected>THPT</option>
                        <?php else : ?>
                        <option value="THPT">THPT</option>
                        <?php endif; ?>
                        
                        <?php if ($hoso["hocvan"] == 'Đại học') : ?>
                        <option value="Đại học" selected>Đại học</option>
                        <?php else : ?>
                        <option value="Đại học">Đại học</option>
                        <?php endif; ?>
                        
                        <?php if ($hoso["hocvan"] == 'Cao Đẳng') : ?>
                        <option value="Cao Đẳng" selected>Cao Đẳng</option>
                        <?php else : ?>
                        <option value="Cao Đẳng">Cao Đẳng</option>
                        <?php endif; ?>
                        
                        <?php if ($hoso["hocvan"] == 'Trung cấp') : ?>
                        <option value="Trung cấp" selected>Trung cấp</option>
                        <?php else : ?>
                        <option value="Trung cấp">Trung cấp</option>
                        <?php endif; ?>
                       
                    </select>
                </div>
                <div>
                    <div class="profile__containter__title">Công việc ứng tuyển</div>
                    <p>Tên công việc</p>
                    <input type="text" class="input_form" placeholder="Tên công việc" value="<?php echo($hoso["tencongviec"]); ?>" name="n_tencongviec">
                </div>
                <div>
                    <p> Chi tiết ứng tuyển </p>
                    <textarea id="i_motachitiet" name="n_chitietungtuyen" ></textarea>
                    <script>
                        // Define the function to set the default value
                        function setDefaultValue() {
                            var textarea = document.getElementById('i_motachitiet');
                            textarea.value = '<?php echo($hoso["chitietungtuyen"]); ?>';
                        }

                        // Call the function to set the default value
                        setDefaultValue();
                    </script>
                </div>
        </div>

        <div class="profile__containter__3">
            <div class="profile__containter__title">Kinh nghiệm làm việc</div>
            <div>
                <p> Mô tả kinh nghiệm </p>

                <input type="text" value="<?php echo($hoso["motakinhnghiem"]); ?>" name="n_motakinhnghiem" class="input_form" placeholder="Nhập kinh nghiệm làm việc" required>
            </div>
            <div class="profile__containter__3_button">
                <button class="btn btn--primary btn--normal" type="submit" name="action" value="save">Lưu hồ sơ</button>
                <button class="btn btn--primary btn--normal" type="button">Xuất pdf</button>
            </div>
        </form>
    </div> 

</div>

</body>
</html>
