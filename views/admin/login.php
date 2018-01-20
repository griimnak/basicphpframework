<?php if(count(get_included_files()) ==1) exit("Direct access not permitted."); ?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  <meta name="format-detection" content="telephone=no">
  <meta charset="UTF-8">

  <meta name="description" content="SuperFlat Responsive Admin Template">
  <meta name="keywords" content="SuperFlat Admin, Admin, Template, Bootstrap">

  <title>Login to continue</title>

  <link href="static/admin/css/animate.min.css" rel="stylesheet">
  <link href="static/admin/css/material-design-iconic-font.min.css" rel="stylesheet">
  <link href="static/admin/css/app.min.css" rel="stylesheet">
</head>
<body class="login-content">
  <!-- Login -->
  <div class="lc-block toggled" id="l-login">
    <div class="lcb-float"><i style="color:#fff" class="zmdi zmdi-lock"></i></div>
      <br />
      <?php if(isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
          <strong>Error: </strong><?php echo($_SESSION['error']); unset($_SESSION['error']); ?>
        </div>
      <?php } ?>
      <p>Please login below to continue.</p>
    <form method="post">
      <div class="form-group">
        <input name="username" type="text" class="form-control" placeholder="Username">
      </div>

      <div class="form-group">
        <input name="password" type="password" class="form-control" placeholder="Password">
      </div>

      <div class="clearfix"></div>
      <input name="login-submit" type="submit" class="btn btn-block btn-primary btn-float bg-bluegray m-t-25" value="Login">
    </form>

  </div>
  <script src="static/admin/js/jquery.min.js"></script>
  <script src="static/admin/js/bootstrap.min.js"></script>
  <script src="static/admin/js/functions.js"></script>
</body>
</html>