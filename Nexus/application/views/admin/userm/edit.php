
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Edit User</h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/user-business-boss.png" alt="" width="16"
                         height="16">
                    <h3>User</h3>
                    <span></span>
                </div>
                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/usermanagement/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">
				
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                           Select Role : 
                        </label>
                        <div>
                          <select id="role" class="required" name="role">
                          <?php foreach($role as $category){?>
                            <option value="<?php echo $category['id'];?>" <?php if($user_role[0]['role'] == $category['role']){echo 'selected';}?>><?php echo $category['role'];?></option>
                            <?}?>
                            </select>  
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Name 
                        </label>
                        <div>
                            <input type="text" name="empname" id="empname" class="required" value="<?php echo $user_role[0]['name'];?> "  readonly/>
                            
                        </div>
                    </div>
                    
                    <div class="section _100">
                        <label>
                            Username 
                        </label>
                        <div>
                            <input type="text" name="name" id="name" class="required" value="<?php echo $user_role[0]['username'];?> "  readonly/>
                            
                        </div>
                    </div>
                    
					<div class="section _100">
                        <label>
                            Password 
                        </label>

                        <div>
                            <input type="password" name="pass" id="pass" class="" value=""/>
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
               
	 
    
    $("#empname").autocomplete({
      source: array
    });
	   }
	   });
  });
  </script>