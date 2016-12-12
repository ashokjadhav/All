<!-- Start of the main content -->
<div id="main_content">
<?php if ($error) { ?>
                <div class="alert error">
                    <span></span><span class="hide">x</span>
                    <?php echo $error; ?>
                </div>
            <?php } ?>

    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/leadership/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/user-worker-boss.png" alt="" width="16"
                         height="16">
                    <h3>Leaders</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/leadership/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Name :
                        </label>
                        <div>
                           <input type="text" class="required" id="writer" value="<?php if (isset($leaderDetailsArr[0]['name'])) {
                            echo $leaderDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>" name="name">
<?php echo form_error('name'); ?>
                        <input type="hidden" name="empid" id="empid" value="<?php echo $leaderDetailsArr[0]['user_id'];?>">
                        </div>
                    </div>

					 <div class="section _100">
                        <label>
                            Post :
                        </label>
                        <div>
                           <input type="text" class="required" id="post" value="<?php if (isset($leaderDetailsArr[0]['post'])) {
                            echo $leaderDetailsArr[0]['post'];
                        } else {
                            echo set_value('writer');
                        } ?>" name="post">
<?php echo form_error('post'); ?>
                        </div>
						</div>
						<div class="section _100">
                        <label>
                            Profile :
                        </label>
                        <div>
                          <input type="file" class="fileupload" name="logo" id="logo">
						  <span style="color:red;" > * Please Upload Images of Size (105px * 105px)</span>
						<?php if ($leaderDetailsArr[0]['img']!='') { ?>
                    <img src="<?php echo base_url();?>files/<?php echo $leaderDetailsArr[0]['img'];?>" width="50" height="50">
					<input type="hidden" id="logo" name="logo" value="<?php echo $leaderDetailsArr[0]['img'];?>" width="80" height="80">
			<?php }else{ ?>
			<img src="<?php echo base_url();?>public/images/no-images.jpg" width="80" height="80">
			<?php }?>

                                     <?php echo form_error('logo'); ?>

                        </div>
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



    $("#writer").autocomplete({
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