
<style type="text/css">
.last{
padding:10px 0 8px;border-top:1px solid #e9e9ea;
}
</style>
<div class="inner_section">
    <div class="emp_listing mb12">
        <h3>
            new joinees
        </h3>
	<?php 
        if($new_joinees){?>
        <div class="emp_det_list">
            <ul>
			<?php 
                foreach($new_joinees as $new_joinee){?>
                <li>
                    <div class="clearfix">
                        <div class="bir_image">
						<?php
                        if($new_joinee['Resize']){ ?>
                            <img alt="person" src="<?php echo base_url();?>files/<?php echo $new_joinee['img'];?>" width="65" height="65">
					   <?php 
                        }else{?>
                            <img alt="person" src="<?php echo base_url();?>public/images/no-images.jpg" width="65" height="65">
						<?php
                        } ?>
                        </div>
                        <div class="bir_desc">
                            <div class="clearfix bir_desc_up">
                                <div class="birt_info">
                                    <span class="birt_name"><?php echo $new_joinee['name'];?></span>
                                    <span class="birt_designation">( <?php echo $new_joinee['designation'];?>)</span>
                                </div>
                                <?php
                                if($new_joinee['contact']){?>
                                    <span class="birt_date">
                                        contact no : <?php echo $new_joinee['contact'];?>
                                    </span>
                                <?php
                                }else{
                                ?>
								<span class="birt_date">
                                    contact no :<?php echo 'N/A';?>
                                </span>
								<?php
                                }?>
                            </div>
                            <div class="clearfix bir_desc_down">
                                <div class="department">
                                    <span class="birt_designation">Extn.:
                                       <?php if($new_joinee['extn']){ echo $new_joinee['extn'];}else{
									   echo 'N/A';}?>
                                    </span>
                                </div>
                                <div class="birt_desc">
                                    <span class="birt_designation">
                                        email id : <?php if($new_joinee['email']){ echo $new_joinee['email'];}else{echo 'N/A';}?>
                                    </span>
                                </div>
                            </div>
                            <?php if($new_joinee['description']){?>
                            <div class="clearfix bir_desc_down last">
                                <span id="<?php echo $new_joinee['id']?>">
                                <?php
                                    $limited_word =character_limiter($new_joinee['description'],70);
                                    echo $limited_word;
                                ?>
                                <a id="<?php echo $new_joinee['id'];?>" data-role="<?php echo $new_joinee['id'];?>" class="readmore">Read More</a>
                               </span>
                            </div>
                            <?php }?>
                        </div>

                    </div>
                </li>
			<?php }}?>

        </ul>
    </div>
                        <div class="nav_pagination clearfix">
                            <div class="right">
                                <div class="clearfix">
                                    <div class="left">
                                        <div class="clearfix">
                                            <ul class="nav_list">
                                               <!-- <li><a href="#">previous</a></li>
                                                <li><a href="#">next</a></li>-->
												<li><?php echo $links; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="left">
                                        <div class="clearfix">
                                            <ul class="pagination_list">
                                               <!-- <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<script type="text/javascript">
    $('.readmore').on("click",function(){
        var ID = $(this).data('role');
        $.ajax({
            type: "POST",
            url: "new_joinee/readmore/"+ID,
            dataType:'json',
            cache: false,
            success: function(response){
                $('span[id='+ID+']').empty();
                $('span[id='+ID+']').html(response);
                $('a[id='+ID+']').remove();
            }
        });
    });

</script>