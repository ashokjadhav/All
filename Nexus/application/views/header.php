<script type="text/javascript" src="<?php echo base_url();?>public/jquery/chat.js"></script>
<div class="head_section">
                    <div class="clearfix">
                        <div class="search_group right">
                            <a href="<?php echo site_url('about_us');?>">
                                <img alt="carnival group" src="<?php echo base_url();?>public/images/carnival.png">
                            </a>
                        </div>
						<?php  if($this->uri->segment(1)=='library'){?>
						<div class="search right">
                            <div class="clearfix">
                                <form id="search" method="post" action="<?php echo site_url('library/index');?>" autocomplete='off'>
                                    <div class="text_input left">
                                        <input type="text" id="seach" name="search" required>
                                    </div>
                                    <div class="search_button left">
                                        <input type="submit" id="submit" name="submit" value="" class="submit_btn">
                                    </div>
                                </form>
                            </div>
                        </div>
						<?php }else{?>
                        <div class="search right">
                            <div class="clearfix">
                                <form id="searchfrm" method="post" action="<?php echo site_url('search');?>" autocomplete='off'>
                                    <div class="text_input left">
                                        <input type="text" id="seach" name="search" required>
                                    </div>
                                    <div class="search_button left">
                                        <input type="submit" id="submit" name="submit" value="" class="submit_btn">
                                    </div>
                                </form>
                            </div>
                        </div><?php }?>
                        <div class="right display_date">
                            <span class="date_disp">
                               <?php echo date('d M, Y l');?>
                            </span>
                        </div>
                        <div class="right display_time">
                            <span class="time_disp">
							<?php
							date_default_timezone_set("Asia/Kolkata");

							echo date('h : i  A');?>
                            </span>
                        </div>
                    </div>
					<?php if($this->uri->segment(1)=='induction'){?>
					<div class="optional_head">
                                <a href="#">
                                    <h3>induction</h3>
                                </a>
                            </div>
					<?php } elseif($this->uri->segment(1)=='locations' || $this->uri->segment(1)=='holiday_list' || $this->uri->segment(1)=='utilities' ||$this->uri->segment(1)=='library' ){
							}
							elseif($this->uri->segment(1)=='job_openings'){?>
							<div class="optional_head">
                                <a href="#">
                                    <h3>job openings</h3>
                                </a>
                            </div>

							<?php }
							elseif($this->uri->segment(1)=='books'){?>
							<div class="optional_head">
                                <a href="#">
                                    <h3>books</h3>
                                </a>
                            </div>
							<?php }
							elseif($this->uri->segment(1)=='periodicals'){?>
							<div class="optional_head">
                                <a href="#">
                                    <h3>periodicals</h3>
                                </a>
                            </div>
							<?php }
							elseif($this->uri->segment(1)=='dvd'){?>
							<div class="optional_head">
                                <a href="#">
                                    <h3>dvds</h3>
                                </a>
                            </div>
							<?php }
							elseif($this->uri->segment(1)=='others'){?>
							<div class="optional_head">
                                <a href="#">
                                    <h3>others</h3>
                                </a>
                            </div>
							<?php }
							else{?>
                    <div class="quick_links_list clearfix">
                        <ul>
                            <li>
                                <a class="yellow_bg" href="<?php echo site_url('about_us');?>">carnival group</a>
                            </li>
                            <li>
                                <a class="red_bg" href="<?php echo site_url('vision_mission');?>">vision &amp; mission</a>
                            </li>
                            <li>
                                <a class="maron_bg" href="<?php echo site_url('leadership');?>">leadership</a>
                            </li>
                            <li>
                                <a class="blue_bg" href="<?php echo site_url('policies');?>">policies</a>
                            </li>
                            <li>
                                <a class="green_bg" href="<?php echo site_url('quicklinks');?>">quick links</a>
                            </li>
                        </ul>
                    </div>
					<?php }?>
                    <?php if($this->uri->segment(1)=='hr_help_desk'){?>
                        
                    <?php }
					if($this->uri->segment(1)=='it_helpdesk'){
					?>
					   
					 <?php } ?>
                </div>
