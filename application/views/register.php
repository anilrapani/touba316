<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Touba | Admin System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/touba.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>    
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Touba</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Registration</p>
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
        
        <form action="<?php echo base_url(); ?>registerNow" method="post" role="form" id="addUser">
          <div class="form-group has-feedback">
            <input type="text" class="form-control required" placeholder="Full Name" id="fname" name="fname"  />
            <span class="form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control required email" placeholder="Email" id="email" name="email"  maxlength="128" />
            <span class="form-control-feedback"></span>
          </div>
            
          <div class="form-group has-feedback">
            <input type="password" class="form-control required" placeholder="Password" id="password" name="password"  maxlength="10" />
            <span class="form-control-feedback"></span>
          </div>
            <div class="form-group has-feedback">
            <input type="password" class="form-control required equalTo" placeholder="Confirm Password" id="cpassword" name="cpassword"  maxlength="10" />
            <span class="form-control-feedback"></span>
          </div>
           <div class="form-group has-feedback">
               <input type="text" class="form-control required digits" placeholder="Mobile" id="mobile" name="mobile"  maxlength="10"/>
            <span class="form-control-feedback"></span>
          </div>
            
          <div class="form-group has-feedback">
               <select class="form-control required" id="role" name="role">
                                            <option value="0">Select Role</option>
                                            <?php
                                            if(!empty($roles))
                                            {
                                                foreach ($roles as $rl)
                                                {
                                                    ?>
                                            <option value="<?php echo $rl->id ?>"><?php echo ucfirst($rl->name) ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
               </select>
             
          </div>
            
          <div class="row">
            <div class="col-xs-8">    
            </div>
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
            </div>
          </div>
        </form>
        <a href="<?php echo base_url() ?>login">Login</a><br>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>
    <script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
    <script src="http://localhost/touba316/assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="http://localhost/touba316/assets/js/validation.js" type="text/javascript"></script>
  </body>
</html>