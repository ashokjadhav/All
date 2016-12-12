<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Nexus</title>
<link href="<?php echo base_url();?>public/css/style.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/tabs.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/jquery.bxslider.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/colorbox.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/form.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/structure.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/theme.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url();?>public/css/datetimepicker.css" type="text/css" rel="stylesheet">
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>public/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>public/css/screen.css" />
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>public/css/flippopup.css" />
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

<style>

		div#container {
				height: 300px;
				position: relative;
				width: 100%;
		}
</style>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->

<script src="<?php echo base_url();?>public/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>public/jquery/tytabs.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/jquery/flexy-menu.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/jquery/jquery.cycle.all.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/jquery/jquery.bxslider.min.js" type="text/javascript"></script>
<script type='text/javascript' src='<?php echo base_url();?>public/jquery/script.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>public/jquery/jquery.modal.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>public/jquery/jquery.datetimepicker.js'></script>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
</script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type='text/javascript' src='<?php echo base_url();?>public/jquery/jquery.colorbox-min.js'></script>
 <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type='text/javascript'>

var baseUrl = "<?php echo base_url()?>";

var userNAME = "<?php echo $this->session->userdata('site_user1')?>";
var name = "<?php echo $this->session->userdata('site_name')?>";
</script>

<script type='text/javascript' src='<?php echo base_url();?>public/jquery/ohsnap.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>public/jquery/jquery.popupoverlay.js'></script>
<!--<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->

</head>
<body>
   <div class="container">
        <!-- left section starts here -->
         <?php { $this->load->view('sidebar');}?>
        <!-- left section ends here -->
        <!-- right section starts here -->
            <div class="main">
              <?php {$this->load->view('header');}?>
			<?php {$this->load->view($middle);}?>
		<!-- right section ends here -->
    </div>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js">
	</script>
	
</body>
</html>