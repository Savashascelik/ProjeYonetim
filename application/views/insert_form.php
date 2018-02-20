<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">

    <title>Kayıt formu</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.grid.css") ?>">
</head>
<body>

<div class="container">
    <br><br>
    <h4 class="text-center"> Kayıt Formuna Hoş Geldiniz ?? </h4>
    <hr>
    <br><br>

    <div class="d-flex justify-content-center">
        <form action="<?php echo base_url("btr/insert");?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
               <input type="text" name="ad_soyad" class="form-control" placeholder="Adı...">
                
            </div>
            
            <div class="form-group">

                <input type="text" name="email" class="form-control"  placeholder="Email">
            </div>

            <div class="form-group">
                <input type="text"  name="telefon" class="form-control"  placeholder="Telefonu">
            </div>

            <div class="form-group">
                <input type="text"  name="okul" class="form-control"  placeholder="Okulu...">
            </div>

            <div class="form-group">
                <input type="text"  name="adres" class="form-control"  placeholder="Adres...">
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