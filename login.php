<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/myStyle.css" rel="stylesheet">
</head>
<body background="css/images/corak.jpg">
    <div class="col-md-4 col-md-offset-4 form-login">
    
    <?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <strong>Warning!</strong> <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?> 


        <div class="outter-form-login box-shadow">
        <div class="logo-login">

        </div>
            <form action="AllProcess.php?action=login" class="inner-login" method="post">
            <h2 class="text-center title-login">SMPN 1 Silaen</h2>
            <center><img src="css/images/logo.jpg" style="width:80px; height: 80px;"></center><br><br>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div><br>
                
                <b><input type="submit" class="btn btn-block btn-custom-green" value="LOGIN"/></b>
            </form>
        </div>
    </div>
    </table>
  </body>
</html>