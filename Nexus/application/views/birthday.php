<style type="text/css">
    .pagination_list li a.current{font-weight:bold;background:#fff;color:#000;border-radius:10px;}
</style>
<div class="inner_section">
    <div class="birthday_banner mb12">
        <img alt="happy birthday" src="<?php echo base_url();?>public/images/birthday-banner.jpg">
    </div>
<?php if($this->uri->segment(3)<2){?>
    <div class="todays_birthday mb12">
        <h3>
            today's birthdays
        </h3>
        <div class="todays_birth_list clearfix">
            <ul>
    		<?php
                foreach($todaybirthdays as $birthday){
        		$today = explode('-',$birthday['dob']);
                $current = explode('-',date('Y-m-d'));
        		if(($today[1]===$current[1]) && ($today[2]===$current[2])){?>
                <li>
                    <div class="birth_blue_block">
                        <div class="clearfix">
                            <div class="tod_birth_pic">
    						<?php if($birthday['img']){?>
                                <img alt="birthday person" src="<?php echo base_url();?>files/<?php echo $birthday['img'];?>" width="65" height="65">
    						<?php }else{?>
                                <img alt="person" src="<?php echo base_url();?>public/images/no-images.jpg" width="65" height="65">
    						<?php }?>
                            </div>
                            <div class="tod_birth_desc">
                                <span class="tod_birth_name"><?php echo $birthday['name'];?></span>
                                <span class="tod_birth_desgn">(<?php echo $birthday['designation'];?>)</span>
                                <span class="tod_birth_dept"><?php echo $birthday['department'];?></span>
                            </div>
                        </div>
                        <span class="tod_birth_des"><?php echo $birthday['location'];?></span>
                    </div>
                </li>
    			<?php }}?>
            </ul>
        </div>
    </div>
	<?php }?>
    <div class="emp_listing mb12">
        <h3>
            upcoming birthdays
        </h3>
        <div class="emp_det_list">
            <ul>
			<?php
            if($birthdays){
                foreach($birthdays as $birthday){
                $today = explode('-',$birthday->dob);
                $current = explode('-',date('Y-m-d'));
                if(!(($today[1]===$current[1]) && ($today[2]===$current[2]))){?>
                <li>
                    <div class="clearfix">
                        <div class="bir_image">
						<?php if($birthday->img){?>
                            <img alt="birthday person" src="<?php echo base_url();?>files/<?php echo $birthday->img;?>" width="65" height="65">
						<?php }else{?>
                            <img alt="person" src="<?php echo base_url();?>public/images/no-images.jpg" width="65" height="65">
						<?php }?>
                        </div>
                        <div class="bir_desc">
                            <div class="clearfix bir_desc_up">
                                <div class="birt_info">
                                    <span class="birt_name"><?php echo $birthday->name;?></span>
                                    <span class="birt_designation">( <?php echo $birthday->designation;?>)</span>
                                </div>
                                <span class="birt_date">
                               <?php
            					$monthNum  = $today[1];
            					$dateObj   = DateTime::createFromFormat('!m', $monthNum);
            					$monthName = $dateObj->format('F'); // March
            					echo $today[2].' '.$monthName;
            					?>
                                </span>
                            </div>
                            <div class="clearfix bir_desc_down">
                                <div class="department">
                                    <span class="birt_dept">
                                       <?php echo $birthday->department;?>
                                    </span>
                                </div>
                                <div class="birt_desc">
                                    <span class="birt_location">
                                        <?php echo $birthday->location;?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
			    <?php 
                }
                }
            }else{?>
    			<div class="bir_desc">
                    <div class="clearfix bir_desc_up">
    				    <div class="birt_info">
                            <span class="birt_designation">No Results Found</span>
                        </div>
                    </div>
                </div>
	  <?php }?>
            </ul>
        </div>
		<?php if($birthdays){?>
        <div class="nav_pagination clearfix">
            <div class="right">
                <div class="clearfix">
                    <div class="left">
                        <div class="clearfix">
                            <ul class="nav_list"></ul>
                        </div>
                    </div>
                    <div class="left">
                        <div class="clearfix">
                            <ul class="pagination_list">
						      <li><?php echo $links; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			<?php }?>
            </div>
        </div>
    </div>
</div>