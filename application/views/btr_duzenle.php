<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">

    <title>Düzeneleme formu</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.grid.css") ?>">
</head>
<body>

<div class="container">
    <br><br>
    <h4 class="text-center"> Düzeneleme Formuna Hoş Geldiniz ?? </h4>
    <hr>
    <br><br>

    <div class="d-flex justify-content-center">
        <form action="<?php echo base_url("btr/update/$btr->id");?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <input type="text" name="ad_soyad" class="form-control" placeholder="Adı..." value="<?php echo $btr->ad_soyad;?> ">
                
            </div>
            
            <div class="form-group">

                <input type="text" name="email" class="form-control"  placeholder="Email" value="<?php echo $btr->email; ?>">
            </div>

            <div class="form-group">
                <input type="text"  name="telefon" class="form-control"  placeholder="Telefonu" value="<?php echo $btr->telefon; ?>">
            </div>

            <div class="form-group">
                <input type="text"  name="okul" class="form-control"  placeholder="Okulu..." value="<?php echo $btr->okul; ?>">
            </div>

            <div class="form-group">
                <input type="text"  name="adres" class="form-control"  placeholder="Adres..." value="<?php echo $btr->adres; ?>">
            </div>

            <div class="form-group">
                <label for=""> Resim Ekle</label>
                <input type="file"  name="img_id" class="form-control" >
            </div>



           
            <button  type="submit" class="btn btn-success">Kaydet</button>
            <a class="btn btn-danger"  href="<?php echo base_url("/");?>" > İptal</a>
        </form>

    </div>
</div>

</body>
</html>