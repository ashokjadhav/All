<!-- Start of the main content -->
<div id="main_content">
<?php if ($error) { ?>
                <div class="alert error">
                    <span></span><span class="hide">x</span>
                    <?php echo $error; ?>
                </div>
            <?php } ?>
    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/it_help_desk/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/user-black.png" alt="" width="16"
                         height="16">
                    <h3>IT person</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/it_help_desk/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Name :
                        </label>
                        <div>
                           <input type="text" class="required" id="name" value="<?php if (isset($ithelpDetailsArr[0]['name'])) {
                            echo $ithelpDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>" name="name">
<?php echo form_error('name'); ?>
                   <input type="hidden" name="empid" id="empid" value="<?php echo $ithelpDetailsArr[0]['user_id'];?>">
                        </div>
                    </div>

                    <!-- <div class="section _100">
                        <label>
                            Location : 
                        </label>
                        <div>
                            <select id="comp_loc_id" name="comp_loc_id" class="table_name" style="">
                            <?php if($company_location_details){
                                    foreach ($company_location_details as $key => $value) {
                                        ?>
                           <option value="<?php echo $value['id'];?>"<?php if($ithelpDetailsArr[0]['location_id']==$value['id']){echo 'selected';}?>><?php echo $value['location_name'];?></option>
                                <?php }}?>
                            </select>                            
                           
                        </div>
                    </div> -->
					 <div class="section _100">
                        <label>
                            Contact for :
                        </label>
                        <div>
                           <input type="text" id="contactfor" name="contactfor" class="required" value="<?php if (isset($ithelpDetailsArr[0]['contactfor'])) {
                            echo $ithelpDetailsArr[0]['contactfor'];
                        } else {
                            echo set_value('contactfor');
                        } ?>">
<?php echo form_error('contactfor'); ?>
                        </div>
						</div>

                <div class="actions">

                    <div class="actions-right">
                        <input type="submit" id="submit" name="submit" value="Submit"/>
                    </div>
                </div>
                 </form>

            </div> <!-- End of .box -->
        </div> <!-- End of .grid_6 -->
    </center>
    <div class="clear"></div>
    <div class="clear"></div>

</div> <!-- End of #main_content -->
<div class="clear"></div>

</div> <!-- End of #content-wrapper -->
<div class="clear push"></div>

</div> <!-- End of #height-wrapper -->
<script>
  $(function() {
	  var baseURL = "<?php echo base_url();?>";
	  $.ajax({
                type: "GET",
                dataType: "json",
                url: baseURL+"admin/employee_directory/list_employee_name/",
                success: function(data) {

                   if(data!=''){
				      a= data.map(function(elem){
					  return elem.name;
				      }).join(',');

				var array = a.split(',');
				//console.log(array);

				   }



    $("#name").autocomplete({
      source: array,
	select: function(event, ui) {
		  var name = ui.item.value;
		 $.ajax({
					type: "GET",
					dataType: "json",
					url: baseURL+"admin/employee_directory/get_emp_id/"+name,
					success: function(response) {
                    $.each(response, function(i, v) {
                       $("#empid").val(v.id);
                     });
					}
				});
    },
    });
	   }
	   });
  });
  </script>