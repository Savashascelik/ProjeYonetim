<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title> BTR LİSTESİ</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
</head>
<body>

 <h3 class="text-center">BTR LİSTESİ</h3>
 <hr>




  <?php // print_r($listeleme);  bu satır controllerde oluşturulan viewdatanın verisidir. ?>

<div class="container">

    <?php

    $alert=$this->session->userdata("alert");
    if ($alert){ ?>

        <div class="alert alert-<?php echo $alert["type"]; ?>">

            <strong><?php echo $alert["title"];?></strong>
            <div>
                <?php echo $alert["message"]; ?>

            </div>

        </div>

    <?php }

    ?>



    <a class="btn btn-success" href="<?php echo base_url("btr/insert_form");?>">Yeni Ekle</a>

    <div class="d-flex justify-content-center">


    <br><br>
    <table class="table table-hover">
        <thead>
        <th>#id </th>
        <th>Resim </th>
        <th>Ad <a href="<?php echo base_url("btr/order/ad_soyad/ASC") ?>">[A-z]</a> <a href="<?php echo base_url("btr/order/ad_soyad/DESC") ?>">[Z-a]</a></th>
        <th>email <a href="<?php echo base_url("btr/order/email/ASC") ?>">[A-z]</a> <a href="<?php echo base_url("btr/order/email/DESC") ?>">[Z-a]</a></th>
        <th>telefon<a href="<?php echo base_url("btr/order/telefon/ASC") ?>">[0-9]</a> <a href="<?php echo base_url("btr/order/telefon/DESC") ?>">[9-0]</a></th>
        <th>okul<a href="<?php echo base_url("btr/order/okul/ASC") ?>">[A-z]</a> <a href="<?php echo base_url("btr/order/okul/DESC") ?>">[Z-a]</a></th>
        <th>adres <a href="<?php echo base_url("btr/order/adres/ASC") ?>">[A-z]</a> <a href="<?php echo base_url("btr/order/adres/DESC") ?>">[Z-a]</a></th>
        <th>İşlemler </th>

        </thead>
        <tbody>

        <?php foreach ($listeleme as $row ) { ?>
        <tr >
            <td><?php echo $row->id; ?></td>
            <td>
                <?php if($row->img_id) { ?>

                         <img style="width: 50px" src="<?php echo base_url("upload/profil/$row->img_id");?>" alt="">
                    <?php } else { ?>
                <img style="width: 50px" src="<?php echo base_url("upload/profil/default.jpg");?>" alt="">

                   <?php } ?>



            </td>
            <td ><?php echo $row->ad_soyad; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->telefon; ?></td>
            <td><?php echo $row->okul; ?></td>
            <td><?php echo $row->adres; ?></td>
            <td>

                <a class="btn btn-xs btn-info" href="<?php echo base_url("btr/update_form/$row->id"); ?>">Düzenle</a>
                <a class="btn btn-xs btn-danger" href="<?php echo base_url("btr/delete/$row->id"); ?>">Sil</a>

            </td>

        </tr>

        <?php } ?>

        </tbody>


    </table>



    </div>
</div>
</body>
</html>