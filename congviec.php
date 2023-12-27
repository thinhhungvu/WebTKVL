<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Công việc</title>
        <?php include './index.php'; ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
    $nganhnghe = $db->fetchAll("SELECT * FROM nganhnghe");
    ?>
    <body>
        <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>DropDown List</title>
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>
        <body>
            <form action="" method="GET">
                <div class="containter__job">
                    <div class="search__job__containter">
                        <div>
                            <input class="search__form__input search__job__input" name="tencongviec" type="text" placeholder="Nhập tên công việc ?">
                        </div>
                        <div class="select-box">
                            <select name="nganhnghe"  class="fa" >
                                <option value="all">Tất cả ngành nghề</option>
                                <?php foreach ($nganhnghe as $item) : ?>
                                    <option value="<?php echo $item['manganhnghe'] ?>"><?php echo $item['tennganhnghe'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="row">
                            <button class="btn btn--primary btn--normal" type="submit" name="form" value="submit">Tìm kiếm</button>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET["tencongviec"]) && isset($_GET["nganhnghe"])) {
                        echo "<h1>" . "Bạn đã thực hiện tìm kiếm với tên công việc là: "
                        . $_GET["tencongviec"] . "</h1>";
                        $nganhnghe = $_GET['nganhnghe'];
                        $tencongviec = $_GET['tencongviec'];
                        $query = "";
                        if ($nganhnghe == "all") {
                            $query = "SELECT congviec.tencongviec AS cv, congty.tencongty AS cty , 
              congty.duongdanhinhanh AS imgcty FROM congty
              INNER JOIN congty_nganhnghe ON congty.macongty = congty_nganhnghe.macongty
              INNER JOIN nganhnghe ON congty_nganhnghe.manganhnghe = nganhnghe.manganhnghe
              INNER JOIN congviec ON nganhnghe.manganhnghe = congviec.manganhnghe
              WHERE (congviec.tencongviec LIKE '%$tencongviec%')";
                        } else {
                            $query = "SELECT congviec.tencongviec AS cv, congty.tencongty AS cty,
                congty.duongdanhinhanh AS imgcty FROM congty
              INNER JOIN congty_nganhnghe ON congty.macongty = congty_nganhnghe.macongty
              INNER JOIN nganhnghe ON congty_nganhnghe.manganhnghe = nganhnghe.manganhnghe
              INNER JOIN congviec ON nganhnghe.manganhnghe = congviec.manganhnghe
              WHERE (congviec.tencongviec LIKE '%$tencongviec%' and nganhnghe.manganhnghe = $nganhnghe)";
                        }

                        $rs = $db->fetchAll($query);
                        $total_rows = $db->countData($query);
                    }
                    ?>


                    <?php if (!empty($rs)) : ?>
                        <?php foreach ($rs as $item) : ?>
                            <div class="containter__job__item">
                                <img src=<?php echo $item['imgcty'] ?> alt="Avatar" >
                                <div class="containter__job__item__title">
                                    <div class="containter__job__item__title_one">
                                        <?php echo $item['cv'] ?>
                                    </div>
                                    <div class="containter__job__item__title_two">
                                        <?php echo $item['cty']; ?>
                                    </div>
                                </div>
                                <div class="containter__job__item--ungtuyen">
                                    <button class="btn btn--primary btn--normal btn--size-s" type="submit" name="form" value="submit">Ứng tuyển</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>




                </div>

            </form>
        </body>
    </html>
</body>
</html>
