<script>
 $(document).ready(function() {
     $('#table').change(function(){
         var cid = $(this).val();
         if(cid ==null){
            return false;
         }else{
            window.location = "<?php echo site_url('hr_help_desk/index');?>/"+cid;
        }
        });
    });

</script>
<style type="text/css">
.emp_listing .table {
    background: none repeat scroll 0 0 #e6567a;
    border: 1px solid #FFFFFF;
    height: 22px;
    color: rgb(255, 255, 255);
    margin-top: 3px;
    font-family: monospace;
    font-weight: bold;
}
a.link {
    color: white;
    margin: 0px 0px 0px 27px;
}
</style>
<div class="inner_section">


                    <div class="emp_listing mb12">
                        <h3>
                            HR Help Desk
                        <a href="<?php echo site_url('faqs');?>" class="link" style="float:right;">HR FAQs</a>
                        <a href="<?php echo site_url('hr_forms');?>" class="link" style="float:right;">HR FORMS</a>
                    <select id="table" class="table" style="float:right;width:30%;">
                    <option value="">Select Location</option>
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
                        <div class="emp_det_list">
                            <ul>
                            <?php 
                            if($hr_help_details){
                            foreach($hr_help_details as $hr_details){?>
                                <li>
                                    <div class="clearfix">
                                        <div class="">
                                            <div class="clearfix bir_desc_up">
                                                <div class="birt_info">
                                                    <span class="birt_name">
                                                    <?php echo $hr_details->name; ?> - <?php echo $hr_details->designation; ?></span>
                                                </div>
                                                <span class="birt_date">
                                                                                                                                         extn no: <?php echo $hr_details->extn;?>
                                                </span>
                                            </div>
                                            <div class="clearfix bir_desc_down">
                                                <div class="birt_desc">
                                                    <span class="birt_designation">
                                                        Contact For - <?php echo $hr_details->contactfor; ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                              <?php }}else{ ?>
                                    <li>
                                    <div class="clearfix">
                                        <div class="">
                                            <div class="clearfix bir_desc_up">
                                                <div class="birt_info">
                                                    <span class="birt_name">
                                                    No Data Found
                                                </div>
                                                
                                        </div>
                                            
                                    </div>

                                </div>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
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
                                            <!--<ul class="pagination_list">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                            </ul>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>