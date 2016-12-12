 <div class="clearfix">
                    <div class="main_container">
						<div class="notice_board mb12" id='pause'>								
                            <a href="<?php echo site_url('notification');?>">
                                <h3>notice board</h3>
                            </a><div id="s7"><?php
							if($notices){
							foreach($notices as $notice){?>
                            <div class="notification_wrap">

                                 <h6 class='title'><?php echo $notice['title'];?></h6>
                                <span class="year_month_red mb12">
                                    <?php
									$orderdate = explode('-',$notice['from_date']);
									$monthNum  = $orderdate[1];
									$dateObj   = DateTime::createFromFormat('!m', $monthNum);
									$monthName = $dateObj->format('F'); // March
									echo $monthName.' '.$orderdate[2].','.$orderdate[0] ?>
                                </span>
                                <p><?php $limited_word = word_limiter($notice['description'],30);
								echo $limited_word;?></p>

								<!--<p>No Notice To Display</p>-->
								 <?//php// }?>
                            </div>
							<?php }}
								//else{
								?>
                        </div></div>
						
						<DIV STYLE="text-align:center; padding-bottom:15px">
								<p style="font-family:helvetica-neue-medium; font-weight:bold; font-size:16px; color:#cc0000">SRK says, "Watch Dilwale at Carnival Cinemas"</p>
								<video width="500" controls>
								  <source src="<?php echo base_url();?>files/srk.mp4" type="video/mp4">
								  
								Your browser does not support the video tag.
								</video>
								
						</DIV>
						<div STYLE="text-align:center; padding-bottom:15px">
						<p style="font-family:helvetica-neue-medium; font-weight:bold; font-size:16px; color:#cc0000">Carnival Motion Picture Presents - "Adi Kapyare Kootamani", Releasing this Christmas at your nearby Multiplex."</p>
							<img src="<?php echo base_url();?>files/adi-kapyare-kootamani.jpg" width="500" />
						</div>
                        
                        <div class="schedule_wrap mb12">
                            <div class="schedule_head">
                                <a href="">
                                    <h5>what is on ...?</h5>
                                </a>
                            </div>
                            <div class="event_list clearfix">
                                <ul>
								<?php if($upcomings){
								foreach($upcomings as $event){?>
                    <li style="background-color:#add8e6">
                        <div class="event_image">
                            <a href="<?php echo site_url('what_is_on_today');?>">
							<?php if($event['img']!=''){?>
                                <img alt="event" src="<?php echo base_url();?>public/images/Events/<?php echo $event['Resize'];?>"width="168" height="218">
								<?php }else{?>
			<img src="<?php echo site_url();?>public/images/no-images1.jpg" width="168" height="218">
								<?php }?>
                            </a>
                        </div>
                        <p><?php echo $event['description'];?></p>
                    </li>
									<?php }}else{?>
									<div class='notice_board'>
									 <div class="notification_wrap">
									 <p>No Upcoming Events</p>
									 </div>
									 </div>

									<?php }?>

                                </ul>
                            </div>
                        </div>
                        <div class="members_block mb12" id='sliders' style="position: relative; overflow: hidden;">
                            <div class="member_head">

                                    <h3>new members</h3>
                               <?php if(count($new_joinees)>=2){
								 ?>
								<script>
									var slidenumber = 2;
									var slidew = 170;
								</script>
                                <a class="forward_arrow sprite" id='next2'></a>
                                <a class="backward_arrow sprite" id='prev2'></a>
								<?php }else if(count($new_joinees)>0){?>
								<script>
									var slidenumber = 1;
									var slidew = 110;
								</script>
									<?php }?>
                            </div>
                            <div class="member_list clearfix">

                                <ul class="bxslider">
								<?php if($new_joinees){
								foreach($new_joinees as $new_joinee){?>

                                    <li>
                                        <a href="<?php echo site_url('new_joinee');?>">
                                            <div class="member_profile">
                                                <div class="member_image">
                                                   <!-- <img alt="member" src="<?php echo base_url();?>files/<?php echo $new_joinee['img']; ?>" width='250' height='150'>-->
												   <?php if($new_joinee['Resize']!=''){?>
												   <img alt="member" src="<?php echo base_url();?>files/<?php echo $new_joinee['img']; ?>" width="250" height="150">
												   <?php }else{?>
												   <img alt="member" src="<?php echo base_url();?>public/images/no-images.jpg" width="250" height="150">
												   <?php }?>
                                                </div>
                                                <div class="member_detail">
                                                    <div>
                                                        <span class="member_name"><?php echo $new_joinee['name']; ?></span>
                                                    </div>
                                                    <div>
                                                        <span class="member_field"><?php echo $new_joinee['designation']; ?></span>
                                                    </div>
                                                    <span class="read_member_detail sprite"></span>
                                                </div>
                                            </div>
                                        </a>

                                    </li>
									<?php } }else{?>
								<div class="notification_wrap">
									<p style='color:red;'>No New Members this Week</p>
									 </div>

									<?php }?>

									</ul>

                            </div>

                        </div>
                        <div class="quotes_wrap mb12">
                            <div class="quote_head">
                                <a href="#">
                                    <h5>thought of the day</h5>
                                </a>
                            </div>
                            <div class="thought_wrap">
                                <div class="clearfix">
								<?php foreach($thoughts as $thought){?>
                                    <div class="quote_image">
                                        <img alt="thought by" src="<?php echo base_url();?>Resize/<?php echo $thought['Resize'];?>">
                                        <span class="quotes sprite"></span>
                                    </div>
                                    <div class="quote_desc">
                                        <?php echo $thought['description'];?>
                                        
                                        <span>- <?php echo $thought['writer'];?> </span>
                                    </div>
									<?php }?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="right_bar">
                        <div class="birthday_notify mb12">
                            <div class="birth_head">
                                <a href="<?php echo site_url('birthday');?>">
                                    <h3></h3>
                                </a>
                            </div>
                            <span class="birth_count"><?php echo count($birthdays); ?></span>
                            <div class="birth_margin">
							<?php if($birthdays){ ?>
                                <ul class='bxslider1'>
								<?php

									foreach($birthdays as $birthday){

								/*	$today = explode('-',$birthday['dob']);
									//var_dump($today);
									//exit;
									$current = explode('-',date('Y-m-d'));

									if(($today[1]===$current[1]) && ($today[2]===$current[2])){*/

									?>

                                    <li>
                                        <div class="notify_wrap clearfix">
                                            <div class="birth_image">
											<?php if($birthday['img']){?>
                                                <img alt="birth person" src="<?php echo base_url();?>files/<?php echo $birthday['img']; ?>" width="65" height="65">
												<?php }else{?>
<img alt="person" src="<?php echo base_url();?>public/images/no-images.jpg" width="65" height="65">
												<?php }?>
                                            </div>
                                            <a class="birth_name"><?php echo $birthday['name']; ?></a>
                                        </div>
                                    </li>
									<?php  }?>

                                </ul>
								<?php }?>
                            </div>
                        </div>
                        <div class="status_box mb12">

                            <a href="<?php echo site_url('who_is_where');?>">

                                <h3>who is where</h3>
                            </a>
                            <div class="status_list">

                            </div>
                        </div>
                        <div class="dash_box mb12">
                            <div class="dash_head">
                                <a href="<?php echo site_url('my_dashboard');?>">
                                    <h3>my dashboard</h3>
                                </a>
                            </div>
                            
                        </div>


                        <div class="dash_post_box mb12">
                            <div class="dash_head">
                                <a href="<?php echo site_url('dashboard_posting');?>">
                                    <h3>dashboard posting</h3>
                                </a>
                            </div>
                        </div>


                       <!--  <div class="question_block mb12">
                            <div class="question_head">
                                <a href="<?php echo site_url('iconnect');?>">
                                    <h3>i-Connect</h3>
                                </a>
                            </div>
                        </div> -->
                         <div class="question_block mb12">
                            <div class="question_head">
                                <a href="<?php echo site_url('utsav_newsletter');?>">
                                    <h3>Utsav Newsletter</h3>
                                </a>
                            </div>
                        </div>
                        <div class="holiday_list mb12">
                            <div class="holiday_list_head">
                                <a href="<?php echo site_url('holiday_list');?>">
                                    <h3>list of holidays</h3>
                                </a>
                            </div>
							<?php
							if($upcoming_holiday){
							foreach($upcoming_holiday as $holiday){
							$orderdate = explode('-',$holiday->holiday_date);

									$monthNum  = $orderdate[1];
									$dateObj   = DateTime::createFromFormat('!m', $monthNum);
									$monthName = $dateObj->format('F'); // March
							?>




                            <ul>

                                <li>

                                    <a href="<?php echo site_url('holiday_list');?>">
                                         <div class="holiday_details">

											<p><?php

									echo $monthName.'  '.$orderdate[2].', '.$orderdate[0].' | '.date('l',strtotime($holiday->holiday_date)); ?></p>

                                            <p class="holiday_det"><?php echo $holiday->desc;?>(<?php echo $holiday->city;?>)</p>
                                        </div>
                                    </a>

                                </li>

                            </ul>
							<?php }}else{echo '<ul><li><div class="holiday_details"><p class="holiday_det">No Upcoming Holidays Found</p></div></li></ul>';}?>
                        </div>
                        <div class="box_wrap mb12">
                            <div class="bx_wrap">
                                <div class="file_directory">
                                    <a href="<?php echo site_url('employee_directory');?>">
                                        <span class="sprite file_icon"></span>
                                        <div>Directory</div>
                                    </a>
                                </div>
                                <!-- <div class="brand_template">
                                    <a href="<?php echo site_url('branding_template')?>">
                                        <span class="sprite template_icon"></span>
                                        <div>Branding &amp; template</div>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<?php if(count($notices) > 1){?>
			<script type="text/javascript">
	
$(document).ready(function(){
								//var slidenumber;
	$('#s7').cycle({
    fx:'turnDown',
	pause: 0, 
	containerResize: 1, 
    delay: -1000
	});
	$('#pause').hover(function() {
		$('#s7').cycle('pause');
		}, function() {
		$('#s7').cycle('resume');
	});
	});
  </script>
  <?php }?>
<script type="text/javascript">
	
$(document).ready(function(){
	$('.bxslider').bxSlider({

	  minSlides: slidenumber,
	  maxSlides: 4,
	  slideWidth: 360,
	  slideWidth: slidew,
	  hideControlOnEnd: true,
	  slideMargin: 10,
	  pager:false


	});
	$('.bxslider1').bxSlider({
	pagerLocation: 'top',
	minSlides: 2,
	maxSlides: 2,
	mode:'vertical',
	slideWidth: 360,
	slideMargin: 10,
	controls:false


	});
	

	});
  </script>