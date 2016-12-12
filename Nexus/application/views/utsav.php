<header>
    <h1 style="color: #f82f53;text-align:center;">Utsav Newsletter</h1>
</header>
<div class="data_all">       
	<hr class="divider">
	<?php if($AllUtsav){
		foreach ($AllUtsav as $key => $value) {?>
		<a href="<?php echo site_url('utsav_newsletter/download/'.$value['id']);?>">
			<h2><?php echo $value['name']?></h2>
		</a>
		<!-- <br> -->
		<hr class="divider">			
		<?php }}?>

</div>