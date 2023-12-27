<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Công ty</title>
        <?php include './index.php'; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
    if (isset($_POST) && isset($_POST['tencongty'])) {
        $tencongty = $_POST['tencongty'];
	$tencongty=hex2bin($tencongty);
	echo "<h2>" . $tencongty . "</h2>";
        $total_rows = $db->countData("SELECT * FROM congty WHERE tencongty like '%$tencongty%'");
        $sql_danhsach = "SELECT * FROM congty WHERE tencongty like '%$tencongty%'";
        $danhsachcongty = $db->fetchAll($sql_danhsach);
    }
    ?>
    <body>
        <div class="search__company__containter">
            <form action="" method="POST">

                <div class="search__form">
                    <div class="search__form__wrap">
                        <i class="fas fa-search"></i>
                        <input class="search__form__input" name="tencongty" type="text" size="40" placeholder="Nhập tên công ty cần tìm kiếm ?">
                        <button class="search__form__button" type="submit"><span class="search__form__button__title">Tìm kiếm</span></button>
                    </div>
                </div>

            </form>
            <div class="company__show__number__result">
                <?php if (!empty($total_rows)) : ?>
                    <p>Số lượng các công ty phù hợp: <?php echo $total_rows ?></p>
                <?php endif; ?>
            </div>
        </div>


        <div class="grid-container">
            <?php if (!empty($danhsachcongty)) : ?>
                <?php foreach ($danhsachcongty as $item) : ?>
                    <div class="grid-item">
                        <div><img src="<?php echo $item['duongdanhinhanh'] ?>" alt="alt"/></div>
                        <!--<div><img src="<?php echo "assets/img/" . $item['duongdanhinhanh'] ?>" alt="alt"/></div>-->
                        <div><?php echo $item['tencongty'] ?></div>
                    </div>
                <?php endforeach ?>
            <?php endif; ?>
        </div>


    </body>

</html>
