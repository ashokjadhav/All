<script>
 $(document).ready(function() {
     $('#table').change(function(){
         var cid = $(this).val();
         if(cid ==null){
            return false;
         }else{
            window.location = "<?php echo site_url('employee_directory/index');?>/"+cid;
        }
        });
    });

</script>
<style type="text/css">
.nav_list li a.current{font-weight:bold;background:#fff;color:#000;border-radius:10px;}
.emp_listing .table {
    background: none repeat scroll 0 0 #e6567a;
    border: 1px solid #FFFFFF;
    height: 22px;
    color: rgb(255, 255, 255);
    margin-top: 3px;
    font-family: monospace;
    font-weight: bold;
}


</style>
<div class="inner_section">
    <div class="emp_listing mb12">
        <h3>
            Employees
            <select id="table" class="table" style="float:right;width:30%;">
                    
                <?php if($company_location_details){
                    foreach ($company_location_details as $key => $value) {

                        if($this->uri->segment(3,0) == $value['id']){
                            $flag = 'selected';
                        }
                        else{
                            $flag = '';
                        }
                        ?>
                <option value="<?php echo $value['id'];?>" <?php echo $flag;?> ><?php echo $value['location_name'];?></option>
                <?php }}?>
            </select>
        </h3>
    <?php

        if($office){?>
        <div class="emp_det_list">
            <ul>
            <?php 
                foreach($office as $new_joinee){?>
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
                                if($new_joinee['department']){?>
                                    <span class="birt_date">
                                        Department : <?php echo $new_joinee['department'];?>
                                    </span>
                                <?php
                                }else{
                                ?>
                                <span class="birt_date">
                                    Department :<?php echo 'N/A';?>
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
                                <div class="birt_desc_search">
                                    <span class="birt_designation">
                                        email id : <?php if($new_joinee['email']){ echo $new_joinee['email'];}else{echo 'N/A';}?>
                                    </span>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </li>
            <?php }}?>

        </ul>
    </div>              <?php if($office){?>
                        <div class="nav_pagination clearfix">
                            <div class="right">
                                <div class="clearfix">
                                    <div class="left">
                                        <div class="clearfix">
                                            <ul class="nav_list">
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
                        <?php }?>
                    </div>
                </div>
