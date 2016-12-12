<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login - Nexus</title>

    <link rel="stylesheet" href="<?php echo base_url();?>public/css/style1.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/animated.css" media="screen" type="text/css" />

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
</head>

<body class="login-container">


  <!--<h6 style="font-size:50px;font-family:monospace;margin-left:23%;margin-top:20%;color:#ea4c88">Nexus</h6>-->
  <div class="login-logo"> <img  style="width:158px;" src="<?php echo site_url();?>public/images/logo/carnival-group-login-logo.png"></div>
 <?php if($this->session->flashdata('error')){ ?>
	<div class="alert alert-danger animated shake">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
<?php echo $this->session ->flashdata('error'); ?>
	</div>
			<?php } ?>
    <div class="container">

      <div id="login">

        <form action="<?php echo site_url('site_login/check');?>" method="post">

          <fieldset class="clearfix">

            <p class="login-row"><img src="<?php echo site_url();?>public/images/message.png"><input type="text" name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''"  required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p class="login-row"><img src="<?php echo site_url();?>public/images/key.png"><input type="password" name="password"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" value="Sign In"></p>

          </fieldset>

        </form>


      </div> <!-- end login -->

    </div>


</body>

</html>