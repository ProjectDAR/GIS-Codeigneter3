


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  

<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <b><p class="login-box-msg">Register Sebagai Admin</p></b>

   <?php  echo form_open('user/registrasi');?>
      <div class="form-group has-feedback">
       <input class="form-control" name="nama_user" placeholder="Nama user" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

       <div class="form-group has-feedback">
       <input class="form-control" name="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
  
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" readonly>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    
      <div class="row">
      
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <?php echo form_close() ?>
        <!-- /.col -->
      </div>


    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->


