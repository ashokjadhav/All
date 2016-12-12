<?php
    header('X-Frame-Options: GOFORIT');
	include_once('config.php');
    function is_chrome(){
		$agent=$_SERVER['HTTP_USER_AGENT'];
		if( preg_match("/like\sGecko\)\sChrome\//", $agent) ){	// if user agent is google chrome
			if(!strstr($agent, 'Iron')) // but not Iron
				return true;
			}
			return false;	// if isn't chrome return false
		}
		if(($config['feature']['browserExtensions']==true)&&(is_chrome()))
			//echo '<a href="ytdl.user.js" class="userscript btn btn-mini" title="Install chrome extension to view a \'Download\' link to this application on Youtube video pages."> Install Chrome Extension </a>';

?>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>public/css/button.css" />
<style>
	.downloadable_li{color:#fff;margin-top:5px;/* margin-right: 78px; */margin-left: 31px;text-transform:capitalize;}

	.downloadable_ul{list-style:none;width: 95%;float: left;}

	.overlay {
		  width: 100%;
		  height: 100%;
		  position: fixed;
		  top: 0;
		  left: 0;
		  z-index: 1000;
		  display: none;
	}

	.modal {
		  display: none;
		  background: #FFFFFF;
		  padding: 25px 20px 20px;
		  top:120px;
		  overflow: auto;
		  left:21%;
		  z-index: 1001;
		  position: fixed;
		  width: 800px;
		  height: auto;
		  border-radius: 2px 30px 2px;
		  box-shadow: 10px 10px 5px #888888;
	}
	.closeBtn {
		  background: url("/public/images/closeBtn.png") no-repeat scroll 0 0 rgba(8, 168, 222, 0.99);
		  border: medium none;
		  display: block;
		  height: 22px;
		  right: 10px;
		  position: absolute;
		  top: 12px;
		  width: 22px;
	}
	.login{
   		  width:335px;
		  float:left;
		  margin-top: 20px;
		  margin-right: 20px;
		  background:url("../images/where.png")no-repeat 0 4px #4ec287;padding:0 12px 5px;
		  text-align: right;
	}

	.login h1,h6{
		 text-align:left;
		 margin:15px 30px 30px 30px;
	}

   .elegant-aero {
         margin-left:auto;
         margin-right:auto;
		 background: ;
		 padding: 0px 20px 20px 20px;
		 font: 12px Arial, Helvetica, sans-serif;
		 color: #666;
	}
	.elegant-aero h1 {
		font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
		padding: 10px 10px 10px 20px;
		display: block;
		background: #C0E1FF;
		border-bottom: 1px solid #B8DDFF;
		margin: -20px -20px 15px;
	}
	.elegant-aero h1>span {
		display: block;
		font-size: 11px;
	}

	.elegant-aero label>span {
		float: right;
		margin-top: 10px;
		color: #fff;
	}
	.elegant-aero label {
	}
	.elegant-aero label>span {
		float: right;
		width: 20%;
		text-align: right;
		padding-right: 15px;
		margin-top: 10px;
		font-weight: bold;
	}
	.elegant-aero input[type="text"], .elegant-aero input[type="email"],.elegant-aero textarea,
	.elegant-aero select {
		color: #888;
		width: 70%;
		padding: 0px 0px 0px 5px;
		border: 1px solid #C5E2FF;
		background: #FBFBFB;
	    outline: 0;
		box-shadow: inset 0px 1px 6px #ECF3F5;
		font: 200 12px/25px Arial, Helvetica, sans-serif;
		height: 30px;
		line-height:15px;
		margin: 2px 6px 16px 0px;
	}
	.elegant-aero input[type="password"]{
		color: #888;
		width: 70%;
		padding: 0px 0px 0px 5px;
		border: 1px solid #C5E2FF;
		background: #FBFBFB;
		outline: 0;
		box-shadow: inset 0px 1px 6px #ECF3F5;
		font: 200 12px/25px Arial, Helvetica, sans-serif;
		height: 30px;
		line-height:15px;
		margin: 2px 6px 16px 0px;
	}
	.elegant-aero select {
		background: #fbfbfb url() no-repeat right;
		background: #fbfbfb url() no-repeat right;
		appearance:none;
		text-indent: 0.01px;
		text-overflow: '';
		width: 70%;
	}
	.elegant-aero .button{
		padding: 10px 30px 10px 30px;
		background: #66C1E4;
		border: none;
		color: #FFF;
		box-shadow: 1px 1px 1px #4C6E91;
		text-shadow: 1px 1px 1px #5079A3;

	}
	.elegant-aero .button:hover{
		background: #3EB1DD;
		cursor:pointer;
	}
	h3{
		margin-left:30px;
	}
	h6{
		margin-left:0px;
	}

   .link-arrow > img{ display: block; margin: 0 auto;}
</style>
</head>
	<div class="inner_section">
		<div class="emp_listing_2 mb12">
			<h3>E-Learning
				<?php if($this->session->userdata('ellogin')==TRUE){?>
				<span style="float:right;">
					<a class="logout" href="<?php echo site_url('elearning/logout');?>">LOGOUT</a>
				</span>
				<?php } ?>
			</h3>
		</div>
        <?php if($this->session->userdata('ellogin')==False){?>
			<script type="text/javascript">
				<?php if($total_time!=''){?>
					$(document).ready(function(){
						setTimeout(function() {
						$.fn.colorbox({html:'<div class="Lib_heading">Total time spent on Elearning:<?php  echo $total_time["h"]." Hours ".$total_time["m"]." Minutes ".$total_time["s"]." Seconds ";?></div><?php if($scores){?><div style="width:568px;height:294px;background-color:#EAC14D" class="clearfix library_info_up"><?php foreach($scores as $score){?><div class="library_info"><span class="birt_name">Category  :<?php echo $score["category"];?> </span><span class="birt_designation">Subcategory:<?php echo $score["subcategory"];?> </span><span class="catn"> Quiz Score :<?php echo $score["score"];?></span></div><?php }?></div><?php }?>', open:true});
					}, 400);

					});
				<?php }?>
			</script>
		<div class="login">
		<?php if($this->uri->segment(2)=='forgot_password'){?>
			<h6>FORGOT PASSWORD</h6>
			<form id=""action="<?php echo site_url('elearning/forgot_password'); ?>" method="post" class="elegant-aero">
			<?php if ($this->session->flashdata('failure')) { ?>
				<div class="alert error">
					<span class="icon"></span>
					<span class="hide">x</span>
					<h1 class='error' style='color: rgb(255,0,0);'>
						<span><?php echo $this->session->flashdata('failure'); ?></span>
					</h1>
				</div>
            <?php } ?>
				<label>
					<span>Email</span>
					<input type="email" placeholder="email" id="email" name="email" required >
				</label>

				<label>
					<span>&nbsp;</span>
					<input type="submit" class="button" id='submit1' name='submit1' value="Submit">
				</label>
			</form>
		<?php }elseif($this->uri->segment(2)=='reset_password'){?>
			<h6>RESET PASSWORD</h6>
			<form id=""action="<?php echo site_url('elearning/update_reset_password/'.$token); ?>" method="post" class="elegant-aero">

				<label>
					<span>New Password</span>
					<input type="password" placeholder="newpassword" id="npwd" name="npwd" required >
				</label>

				<label>
					<span>Confirm Password</span>
					<input type="password" placeholder="confirmpassword" id="cpwd" name="cpwd" required >
				</label>

				<input type="hidden" value="<?php echo $user_id; ?>" name="txtHidUserId">

				<label>
					<span>&nbsp;</span>
					<input type="submit" class="button" id='submit2' name='submit2' value="Submit">
				</label>
			</form>

		<?php }else{?>
			<h6>LOGIN</h6>
			<form id=""action="<?php echo site_url('elearning/check'); ?>" method="post" class="elegant-aero">
			<?php if ($this->session->flashdata('success')) { ?>
				<div class="alert error">
					<span class="icon"></span>
					<span class="hide">x</span>
                    <h1 class='error' style='color: rgb(255,0,0);'>
						<span><?php echo $this->session->flashdata('success'); ?></span>
					</h1>
                </div>
            <?php } ?>

			<?php if ($this->session->flashdata('error')) { ?>
                <div class="alert error">
					<span class="icon"></span>
					<span class="hide">x</span>
                    <h1 class='error' style='color: rgb(255,0,0);'>
						<span><?php echo $this->session->flashdata('error'); ?></span>
					</h1>
                </div>
            <?php } ?>

				<label>
					<span>Username</span>
					<input type="text" placeholder="username" id="Field12-1" name="username" required >
				</label>


				<label>
					<span>Password</span>
					<input type="password" placeholder="password" name="password" required>
				</label>

				<a style="color:#fff; float:left;font-weight:bold;" href="<?php echo base_url('elearning/forgot_password');?>">Forgot Password?</a>


				<label>
					<span>&nbsp;</span>
					<input type="submit" class="button" id='submit' name='submit' value="LOGIN">
				</label>

			</form>
		</div>

		<?php }}else{ if($this->uri->segment(3)==''){?>
		<div class="black_color">

			<?php //echo $this->session->userdata('logintime');?>
				<div class="learningdomains_List">
					<ul>
					<?php foreach($categorydetails as $category){?>
						<li>
							<a href="<?php echo site_url('elearning/index/'.$category['id']);?>"	class="link-arrow">
								<img src='<?php echo base_url()?>/public/images/lear_arrow.png'/>
							</a>
							<?php echo $category['name'];?>
						</li>
                       <?php }?>
                      </ul>
				</div>
		</div>
		<?php }else{?>
		<div class="medal_list blue_box mb20">
			<h6 style='font-size:18;'>ARTICLES</h6>
				<div class="clearfix">
				<?php if($articles){?>
					<div class="accordian_list blue_acc_bg mb12">
						<ul>
						<?php foreach($articles as $article){?>
							<li>
								<a class="policy_toggle" href="javascript:void(0)">
									<span id="icon" class="plus_icon"><?php echo $article['title'];?></span>
                                    <div class="policy_info mt12" id='policy'>
										<?php echo $article['desc'];?>
                                    </div>
                                 </a>
                             </li>
						<?php }?>
						</ul>
					</div>
				<?php }else{?>
						<ul>
							<li>
								<p>No Articles Available
								</p>
							</li>
						</ul>
				<?php }?>

				<div class="medal_details">
					<h6 style='font-size:18;'>PPT/PDF: </h6>
					<p style='color:red;font-weight:bold;font-size:1em;display:none' id='error1'>Slide/Pdf can't be downloded due to copyrights reserved.</p>
					<?php if($files){?>
	<ul class='downloadable_ul'>
		<?php foreach($files as $file){
				$path = base_url()."files/ppt&pdf/". $file['file_name'];
							$data = pathinfo($path);
							if($data['extension'] == 'pdf'){
			?>

				<li class='downloadable_li'>
				<p><?php echo $file['title'];?>
				<?php if($file['copyrights']=='1'){?>
					<a style='float:right;font-weight: 100;margin-left:12px;' class="action-button animate yellow" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" download>Download</a>
					<a target='_blank' style='float:right;font-weight: 100;margin-right:12px;' class="action-button animate red" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" >VIEW</a>

				<?php }else{?>
					<a style='float:right;font-weight: 100;margin-left:12px;' class="action-button animate yellow reserved1">Download</a>
					<a target='_blank' style='float:right;font-weight: 100;margin-right:12px;' class="action-button animate red" href='<?php echo site_url('elearning/displaypdf/'.$file['file_name']);?>' >VIEW</a>


					<?php }?></p>


			<?php }}?>
			</ul>

			<ul class='downloadable_ul'>

		<?php foreach($files as $file){
				$path = base_url()."files/ppt&pdf/". $file['file_name'];
							$data = pathinfo($path);
							if($data['extension'] != 'pdf'){
			?>

				<li class='downloadable_li'>
				<p><?php echo $file['title'];?>
				<?php if($file['copyrights']=='1'){?>
					<a style='float:right;font-weight: 100;' class="action-button animate yellow" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" download>Download</a>
					<!--<a target='_blank' style='float:right;font-weight: 100;' class="action-button animate red" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" >VIEW</a>-->

				<?php }else{?>
					<a style='float:right;font-weight: 100;' class="action-button animate yellow reserved1"  >Download</a>
					<!--<a target='_blank' style='float:right;font-weight: 100;' class="action-button animate red" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" >VIEW</a>-->


					<?php }?></p>


			<?php }}?>
			</ul>

						<?php }?>


					</div>
				</div>
			</div>
			<div class="medal_list grn_blue_box mb20">
				<h6 style='font-size:18;'>BOOK TITLES & GIST</h6>
					<div class="clearfix">
					<?php if($book_summaries){?>
						<ul>
						<?php foreach($book_summaries as $book){?>
							<li>
								<h6 style='font-size:12;'><?php echo $book['title'];?></h6>
								<li id="<?php echo $book['id']?>">
									<?php $limited_word =  character_limiter($book['description'],500);
									echo $limited_word;?>
									<a id="<?php echo $book['id'];?>" data-role="<?php echo $book['id'];?>" class="readmore" style="color:blueviolet;">Read More</a>
								</li>
							</li>
						<?php }?>
						</ul>
					<?php } else{?>
						<ul>
							<li>
								<p>No BOOK TITLES & GIST Available.
								</p>
							</li>
						</ul>
					<?php }?>
					</div>
				</div>

				<div class="medal_list light_red_box mb20">
					<h6 style='font-size:18;'>MUST STUDY</h6>
						<div class="clearfix">

							<h6 style='font-size:14;'>TEXT</h6>

							<ul>
							<?php if($muststudy_summaries){
									foreach($muststudy_summaries as $summary){?>
								<li>
									<h6><?php echo $summary['title'];?></h6>
									<li id="<?php echo $summary['id']?>"><?php $limited_word =  character_limiter($summary['description'],500);
									echo $limited_word;?>
										<a id="<?php echo $summary['id'];?>" data-role="<?php echo $summary['id'];?>" class="readmore" style="color:blueviolet;">Read More</a>
								</li>
									<?php }}else{?>
								 <li>
									<p>No Text Materials Available.
									</p>
								</li>
									<?php }?>
							</ul>

							<h6 style='font-size:14;'>SLIDES</h6>
							<p style='color:green;font-weight:bold;font-size:1em;display:none' id='error5'>Slide/Pdf can't be downloded due to copyrights reserved.</p>
			<?php if($muststudy_slides){?>
	<ul class='downloadable_ul'>
		<?php foreach($muststudy_slides as $file){
				$path = base_url()."files/ppt&pdf/". $file['file_name'];
							$data = pathinfo($path);
							if($data['extension'] == 'pdf'){
			?>

				<li class='downloadable_li'>
				<p><?php echo $file['title'];?>
				<?php if($file['copyrights']=='1'){?>
					<a style='float:right;font-weight: 100;margin-left:12px;' class="action-button animate yellow" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" download>Download</a>
					<a target='_blank' style='float:right;font-weight: 100;margin-right:12px;' class="action-button animate red" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" >VIEW</a>

				<?php }else{?>
					<a style='float:right;font-weight:bold;font-size:1em;margin-left:12px;' class="action-button animate yellow reserved5"  >Download</a>
					<a target='_blank' style='float:right;font-weight: 100;margin-right:12px;' class="action-button animate red" href='<?php echo site_url('elearning/displaypdf/'.$file['file_name']);?>' >VIEW</a>


					<?php }?></p>


			<?php }}?>
			</ul>

			<ul class='downloadable_ul'>

		<?php foreach($muststudy_slides as $file){
				$path = base_url()."files/ppt&pdf/". $file['file_name'];
							$data = pathinfo($path);
							if($data['extension'] != 'pdf'){
			?>

				<li class='downloadable_li'>
				<p><?php echo $file['title'];?>
				<?php if($file['copyrights']=='1'){?>
					<a style='float:right;font-weight: 100;' class="action-button animate yellow" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" download>Download</a>
					<!--<a target='_blank' style='float:right;font-weight: 100;' class="action-button animate red" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" >VIEW</a>-->

				<?php }else{?>
					<a style='float:right;font-weight: 100;' class="action-button animate yellow reserved5"  >Download</a>
					<!--<a target='_blank' style='float:right;font-weight: 100;' class="action-button animate red" href="<?php echo base_url();?>files/ppt&pdf/<?php echo $file['file_name'];?>" >VIEW</a>-->


					<?php }?></p>


			<?php }}?>
			</ul>

						<?php }else{?>
						<ul><li><p>No Slides Available</p></li></ul>
							<?php }?>

						<h6 style='font-size:14;'>VIDEOS</h6>
						<p style='color:red;font-weight:bold;font-size:1em;display:none' id='error4'>Video can't be downloaded due to copyrights reserved.</p>
						<?php if($muststudy_videos){?>
							<ul class='downloadable_ul'>
							<?php foreach($muststudy_videos as $video){
									if($video['type']=='Embed'){?>
								<li class='downloadable_li'>
									<p><?php echo $video['title'];?>
										<a class="modalLink action-button animate red" style="float: right; font-weight: 100;" id='<?php echo $video['id'];?>'>&nbsp;&nbsp;&nbsp;PLAY</a>
									</p>
								</li>
									<?php }
							}?>
							</ul>

							<ul class='downloadable_ul'>

							<?php foreach($muststudy_videos as $video){
									if($video['type']=='Upload'){?>
								<li class='downloadable_li'>
									<p>
										<?php echo $video['title'];?>
										<?php if($video['copyrights']=='1'){?>
										<a class="action-button animate yellow" style="float: right; font-weight: 100;" href='<?php echo base_url();?>files/videos/<?php echo $video['file_name']?>' download>&nbsp;&nbsp;&nbsp;DOWNLOAD</a>
										<?php }else{?>
										<a id='reserved4' class="action-button animate yellow reserved"  style="float: right; font-weight: 100;">
										&nbsp;&nbsp;&nbsp;DOWNLOAD</a>
										<?php }?>
									</p>


								</li>
									<?php }}?>
							</ul>
							<?php }else{?>
						<ul><li><p>No Videos Available</p></li></ul>
							<?php }?>
						 </div>
                    </div>

					<div class="medal_list light_green_box mb20">
						<h6 style='font-size:18;'>VIDEOS</h6>
						<p style='color:red;font-weight:bold;font-size:1em;display:none' id='error'>Video can't be downloaded due to copyrights reserved.</p>
                        <div class="clearfix"><?php if($videos){?>
							<ul class='downloadable_ul'>
							<?php foreach($videos as $video){
									if($video['type']=='Embed'){?>
								<li class='downloadable_li'>
									<p><?php echo $video['title'];?>
										<a class="modalLink action-button animate red" style="float: right; font-weight: 100;" id='<?php echo $video['id'];?>'>&nbsp;&nbsp;&nbsp;PLAY</a>
									</p>
								</li>
									<?php }}?>
							</ul>

							<ul class='downloadable_ul'>

							<?php foreach($videos as $video){
									if($video['type']=='Upload'){?>
								<li class='downloadable_li'>
									<p>
										<?php echo $video['title'];?>
										<?php if($video['copyrights']=='1'){?>
										<a class="action-button animate yellow" style="float: right; font-weight: 100;" href='<?php echo base_url();?>files/videos/<?php echo $video['file_name']?>' download>&nbsp;&nbsp;&nbsp;DOWNLOAD</a>
										<?php }else{?>
										<a id='reserved' class="action-button animate yellow reserved"  style="float: right; font-weight: 100;">
										&nbsp;&nbsp;&nbsp;DOWNLOAD</a>
										<?php }?>
									</p>


								</li>
									<?php }}?>
							</ul>
							<?php }else{?>
						<ul><li><p>No Videos Available</p></li></ul>
							<?php }?>
						</div>
					</div>

					<div class="medal_list grn_box mb20">
						<h6 style='font-size:18;'>QUIZ</h6>
						<div class="clearfix">
						<?php if($quiz_sub_categories){?>
							<form class="elegant-aero" action="<?php echo site_url('elearning_quiz');?>" method="post">
								<p>Please Select Category To Start Quiz!!</p>
								<input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="category" id="category">
								<select style="width:80%;" class="table" id="subcategory" name="subcategory">
								<?php foreach($quiz_sub_categories as $subcategory){					?>
									<option value="<?php echo $subcategory['sub_category'];?>"><?php echo $subcategory['sub_category'];?></option>
								<?php }?>
								</select>

								<label>
									<span>&nbsp;</span>
									<input type="submit" value="SUBMIT" name="submit" id="submit" class="button">
								</label>
							</form>
						<?php }else{?>
						<ul>
							<li>
								<p>There are no QUIZ Available For This Learning Domain.
								</p>
							</li>
						</ul>
						<?php }?>
                       </div>
						<?php }} ?>
				</div>

				<div class="overlay"></div>
				<div class="modal">
					<a href="#" class="closeBtn"></a>
					<?php if($videos){
							foreach($videos as $video){?>
					<div  class='demo app_<?php echo $video['id'];?>' style='display:none'>
						<?php if($video['type']=='Embed'){
								$a = explode('/',$video['code']);
								$url = 'https://www.youtube.com/watch?v='.$a[4];
								parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );?>
						<embed width="800" height="400"src="<?php echo $video['code'];?>">
						<?php if($video['copyrights']=='1'){?>
						<form class="form-download" method="get" id="download" action="<?php echo site_url();?>getvideo.php">
							<br/>
							<input type="hidden" name="videoid" id="videoid" size="40" placeholder="VideoID" value='<?php echo $my_array_of_vars['v'];?>' />
							<input class="action-button animate yellow" type="submit" name="type" id="type" value="Download" />
						</form>
						<?php } else{?>
						<input class="action-button animate yellow" id='reserved2' type="button" value="Download" />
						<?php }?>
						<p style='color:red;font-weight:bold;font-size:1em;display:none' id='error2'>Video can't be downloded due to copyrights reserved.</p>
						<?php }?>
					</div>
					<?php }}?>
					<?php if($muststudy_videos){
							foreach($muststudy_videos as $video){?>
					<div  class='demo app_<?php echo $video['id'];?>' style='display:none'>
						<?php if($video['type']=='Embed'){
								$a = explode('/',$video['code']);
								$url = 'https://www.youtube.com/watch?v='.$a[4];
								parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );?>
						<embed width="800" height="400"src="<?php echo $video['code'];?>">
						<?php if($video['copyrights']=='1'){?>
						<form class="form-download" method="get" id="download" action="<?php echo site_url();?>getvideo.php">
							<br/>
							<input type="hidden" name="videoid" id="videoid" size="40" placeholder="VideoID" value='<?php echo $my_array_of_vars['v'];?>' />
							<input class="action-button animate yellow" type="submit" name="type" id="type" value="Download" />
						</form>
						<?php } else{?>
						<input class="action-button animate yellow" id='reserved2' type="button" value="Download" />
						<?php }?>
						<p style='color:red;font-weight:bold;font-size:1em;display:none' id='error2'>Video can't be downloded due to copyrights reserved.</p>
						<?php }?>
					</div>
					<?php }}?>

				</div>

	<script type="text/javascript">
		$(".policy_toggle").click(function() {
			$(this).find('span#icon').toggleClass("minus_icon");
			$(this).find('.policy_info').slideToggle();
		});
	</script>
	<script type="text/javascript">

	//display more information about the section
	$('.readmore').on("click",function(){
		var ID = $(this).data('role');
		$.ajax({
			type: "POST",
			url: baseUrl+"elearning/readmore/"+ID,
			dataType:'json',
			cache: false,
			success: function(response){
				$('li[id='+ID+']').empty();
				$('li[id='+ID+']').html(response);
				$('a[id='+ID+']').remove();
			}
		});
	});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){

		//display pop up modal
		$('.modalLink').modal({
			trigger: '.modalLink',
			olay:'div.overlay',
			modals:'div.modal',
			background: '00c2ff',
			opacity: 0.8,
			openOnLoad: false,
			docClose: true,
			closeByEscape: true,
			resizeWindow: false,
			close:'.closeBtn'
		});
		$('a.modalLink').click(function(e){
			$('.demo').hide();
			var id=e.target.id;
			var a = $(this).attr('id');
			$('.modal').show();
			$('.app_'+a).show();

		});
		$('.reserved').click(function(){
			$('#error').show();
			setTimeout(function() { $("#error").fadeOut(1000); },1500)
		});
		$('.reserved1').click(function(){
			$('#error1').css('display','inline');
			setTimeout(function() { $("#error1").fadeOut(1000); },1500)

		});
		$('#reserved2').click(function(){
			$('#error2').css('display','inline');
			setTimeout(function() { $("#error2").fadeOut(1000); },1500)

		});
		$('.reserved4').click(function(){
			$('#error4').show();
			setTimeout(function() { $("#error4").fadeOut(1000); },1500)
		});
		$('.reserved5').click(function(){
			$('#error5').show();
			setTimeout(function() { $("#error5").fadeOut(1000); },1500)
		});
	});

</script>
