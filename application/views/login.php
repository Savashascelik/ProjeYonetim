<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css");?>">
    <link href="<?php echo base_url("assets/css/signin.css");?>" rel="stylesheet">
    <title>Giriş sayfası</title>
</head>
<body>


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


        <form class="form-signin" action="<?php echo base_url("kullanici/login");?>" method="post">
            <h2 class="form-signin-heading">Lütfen Giriş Yapın</h2>

            <input type="email" id="inputEmail" class="form-control" placeholder="Email Adresi" name="email" required autofocus>

            <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="captcha" placeholder="Kod" required>

                </div>
                <div class="col-md-6">
                    <?php echo $captcha; ?>
                </div>


            </div>
            <br>



            <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
        </form>

</div>




</body>
</html>