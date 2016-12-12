<style type="text/css">
.nav_list li a.current{font-weight:bold;background:#fff;color:#000;border-radius:10px;}
</style>
<div class="inner_section">
    <div class="emp_listing mb12">
        <h3>
            search results for <?php echo $key;?> (<?php echo count($total);?>&nbsp;&nbsp;Found)
        </h3>
        <div class="emp_det_list">
            <ul>
			<?php if($searchresult){
			foreach($searchresult as $search){?>
                <li>
                    <div class="clearfix">
                        <div class="bir_image">
                           <?php if($search->img){?>
                            <img alt="birthday person" src="<?php echo base_url();?>files/<?php echo $search->img;?>" width="65" height="65">
							<?php }else{?>
<img alt="person" src="<?php echo base_url();?>public/images/no-images.jpg" width="65" height="65">
							<?php }?>
                        </div>
                        <div class="bir_desc">
                            <div class="clearfix bir_desc_up">
                                <div class="birt_info">
                                    <span class="birt_name"><?php echo $search->name;?></span>
                                    <span class="birt_designation"><?php if($search->designation){?>(<?php echo $search->designation;?> )<?php }?></span>
                                </div>
                                
                            </div>
                            <div class="clearfix bir_desc_down">
                                <div class="department">
                                    <span class="birt_dept">
                                       <?php echo $search->department;?>
                                    </span>    
                                </div>
                                <div class="birt_desc">  
                                    <span class="birt_location">
                                       <?php echo $search->location;?>
                                    </span>    
                                </div>												
                            </div>
							<div class="clearfix bir_desc_down">
								<div class="birt_desc_search">  
                                    <span class="birt_designation">
                                       Email Id : <?php echo $search->email;?>
                                    </span>    
                                </div>
							</div>
							<div class="clearfix bir_desc_down">
								<div class="birt_desc">  
                                    <span class="birt_designation">
                                       Extn No. <?php echo $search->extn;?>
                                    </span>    
                                </div> 
							</div>
                        </div>

                    </div>
                </li>
				<?php } }else{?>
				<li>
                    <div class="clearfix">
                        No Results Found
                    </div>
                </li>
				<?php }?>
            </ul>
        </div>
        <?php if($searchresult){?>
        <div class="nav_pagination clearfix">
            <div class="right">
                <div class="clearfix">
                    <div class="left">
                        <div class="clearfix">
                            <ul class="nav_list">
                              <li><?php echo $links;?></li>
                            </ul>
                        </div>    
                    </div>
                    <div class="left">
                        <div class="clearfix">
                        </div>    
                    </div>
                </div>        
            </div>
        </div>
        <?php } ?>
    </div>
</div>