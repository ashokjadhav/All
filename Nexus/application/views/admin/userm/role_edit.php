<script>
 $(document).ready(function() {
	 $('.checkall1').click(function () {  
		    if ($(this).attr('checked')=='checked')
		    {        
		        $('input:checkbox.chkbox1').attr('checked', 'checked');
		    }
		    else
		    {
		        $('input:checkbox.chkbox1').removeAttr('checked');
		    }
	 });
	 $('.checkall2').click(function () {  
		    if ($(this).attr('checked')=='checked')
		    {        
		        $('input:checkbox.chkbox2').attr('checked', 'checked');
		    }
		    else
		    {
		        $('input:checkbox.chkbox2').removeAttr('checked');
		    }
	 });
	 $('.checkall3').click(function () {  
		    if ($(this).attr('checked')=='checked')
		    {        
		        $('input:checkbox.chkbox3').attr('checked', 'checked');
		    }
		    else
		    {
		        $('input:checkbox.chkbox3').removeAttr('checked');
		    }
	 });
	 $('.checkall4').click(function () {  
		    if ($(this).attr('checked')=='checked')
		    {        
		        $('input:checkbox.chkbox4').attr('checked', 'checked');
		    }
		    else
		    {
		        $('input:checkbox.chkbox4').removeAttr('checked');
		    }
	 });
	 $('.checkall5').click(function () {  
		    if ($(this).attr('checked')=='checked')
		    {        
		        $('input:checkbox.chkbox5').attr('checked', 'checked');
		    }
		    else
		    {
		        $('input:checkbox.chkbox5').removeAttr('checked');
		    }
	 });
 });
</script>
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Edit</h2>
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
                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/usermanagement/edit_role/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">
				<?php
				$checked = "checked=checked";
				$priv = unserialize($record[0]['privileges']);
				?>
                <div class="content no-padding">
                    
                    <div class="section _100">
                        <label>
                            Role 
                        </label>
                        <div>
                            <input type="text" name="role" id="role" class="required" value="<?php echo $record[0]['role']; ?>"/>
                            
                        </div>
                    </div>
                    
					<div class="section _100">
                        <div id="accordion" style='width:100%;'>
									
									<h4><a href="#">Dashboard</a></h4>
									<div>
						<table class='table'>
						   <thead>
							<tr>
								<th><input type="checkbox" class = 'checkall1' id="checkall1"/></th>
								<th><b>Controller</b></th>
								<th><b>View</b></th>
								<th><b>Add</b></th>
								<th><b>Edit</b></th>
								<th><b>Delete</b></th>
							</tr>
							</thead>
							<tbody>
								<?php $x = 1;
								foreach ($Allcontroller as $key => $value) { ?>
                            <tr>
								<td><?php echo $x++;?></td>
                                <td><?php echo ucfirst(str_replace('_', ' ',$key)); ?></td>

                                <td>
								<?php if(in_array("index", $value)){?>
								<input type="checkbox" class="chkbox1" name='permission[<?php echo $key; ?>][]' value="0" <?php echo (isset($priv[$key]) && in_array(0, $priv[$key])) ? $checked : '' ?>>
								<?php }?></td>


                        <td>
						<?php if(in_array("add", $value)){?>
						<input type="checkbox" class="chkbox1" name='permission[<?php echo $key; ?>][]' value="1" <?php echo(isset($priv[$key]) && in_array(1, $priv[$key])) ? $checked : '' ?>>
						<?php }else{?>
								
								<?php }?></td>
                                <td>
								<?php if(in_array("edit", $value) || in_array("update", $value)){?>
								<input type="checkbox" class="chkbox1" name='permission[<?php echo $key; ?>][]' value="2" <?php echo(isset($priv[$key]) && in_array(2, $priv[$key])) ? $checked : '' ?> >
								<?php }?>
								</td>
                                <td>
								<?php if(in_array("delete", $value)){?>
								<input type="checkbox" class="chkbox1" name='permission[<?php echo $key; ?>][]' value="3" <?php echo (isset($priv[$key]) && in_array(3, $priv[$key])) ? $checked : '' ?> >
								<?php }?></td>


                            </tr>
							<?php } ?>
							</tbody>
                    </table>
					</div>
									<h4><a href="#">Library</a></h4>
										<div>
										<table class='table'>
						   <thead>
							<tr>
								<th><input type="checkbox" class = 'checkall2' id="checkall2"/></th>
								<th><b>Controller</b></th>
								<th><b>View</b></th>
								<th><b>Add</b></th>
								<th><b>Edit</b></th>
								<th><b>Delete</b></th>
							</tr>
							</thead>
							<tbody>
								<?php $x= 1;
								foreach ($librarycontroller as $key => $value) { ?>
                            <tr>
								<td><?php echo $x++;?></td>
                                <td><?php echo ucfirst(str_replace('_', ' ',$key)); ?></td>

                                <td>
								<?php if(in_array("index", $value)){?>
								<input type="checkbox" class="chkbox2" name='permission[<?php echo $key; ?>][]' value="0" <?php echo (isset($priv[$key]) && in_array(0, $priv[$key])) ? $checked : '' ?>>
								<?php }?></td>


                        <td>
						<?php if(in_array("add", $value)){?>
						<input type="checkbox" class="chkbox2" name='permission[<?php echo $key; ?>][]' value="1" <?php echo(isset($priv[$key]) && in_array(1, $priv[$key])) ? $checked : '' ?>>
						<?php }else{?>
								
								<?php }?></td>
                                <td>
								<?php if(in_array("edit", $value) || in_array("update", $value)){?>
								<input type="checkbox" class="chkbox2" name='permission[<?php echo $key; ?>][]' value="2" <?php echo(isset($priv[$key]) && in_array(2, $priv[$key])) ? $checked : '' ?> >
								<?php }?>
								</td>
                                <td>
								<?php if(in_array("delete", $value)){?>
								<input type="checkbox" class="chkbox2" name='permission[<?php echo $key; ?>][]' value="3" <?php echo (isset($priv[$key]) && in_array(3, $priv[$key])) ? $checked : '' ?> >
								<?php }?></td>


                            </tr>
							<?php } ?>
							</tbody>
                    </table>
					</div>
									<h4><a href="#">Dashboard Posting</a></h4>
										<div style='height:auto;'>
										<table class='table'>
						   <thead>
							<tr>
								<th><input type="checkbox" class = 'checkall3' id="checkall3"/></th>
								<th><b>Controller</b></th>
								<th><b>View</b></th>
								<th><b>Add</b></th>
								<th><b>Edit</b></th>
								<th><b>Delete</b></th>
							</tr>
							</thead>
							<tbody>
								<?php $x = 1;
									foreach ($Dashcontroller as $key => $value) { ?>
                            <tr>
								<td><?php echo $x++;?></td>
                                <td><?php echo ucfirst(str_replace('_', ' ',$key)); ?></td>

                                <td>
								<?php if(in_array("index", $value)){?>
								<input type="checkbox" class="chkbox3" name='permission[<?php echo $key; ?>][]' value="0" <?php echo (isset($priv[$key]) && in_array(0, $priv[$key])) ? $checked : '' ?>>
								<?php }?></td>


                        <td>
						<?php if(in_array("add", $value)){?>
						<input type="checkbox" class="chkbox3" name='permission[<?php echo $key; ?>][]' value="1" <?php echo(isset($priv[$key]) && in_array(1, $priv[$key])) ? $checked : '' ?>>
						<?php }else{?>
								
								<?php }?></td>
                                <td>
								<?php if(in_array("edit", $value) || in_array("update", $value)){?>
								<input type="checkbox" class="chkbox3" name='permission[<?php echo $key; ?>][]' value="2" <?php echo(isset($priv[$key]) && in_array(2, $priv[$key])) ? $checked : '' ?> >
								<?php }?>
								</td>
                                <td>
								<?php if(in_array("delete", $value)){?>
								<input type="checkbox" class="chkbox3" name='permission[<?php echo $key; ?>][]' value="3" <?php echo (isset($priv[$key]) && in_array(3, $priv[$key])) ? $checked : '' ?> >
								<?php }?></td>


                            </tr>
							<?php } ?>
							</tbody>
                    </table>
					</div>
									<h4><a href="#">Elearning</a></h4>
										<div style='height:auto;'>
						<table class='table'>
						   <thead>
							<tr>
								<th><input type="checkbox" class = 'checkall4' id="checkall4"/></th>
								<th><b>Controller</b></th>
								<th><b>View</b></th>
								<th><b>Add</b></th>
								<th><b>Edit</b></th>
								<th><b>Delete</b></th>
							</tr>
							</thead>
							<tbody>
								<?php $x = 1;
									foreach ($Elearncontroller as $key => $value) { ?>
                            <tr>
								<td><?php echo $x++;?></td>
                                <td><?php echo ucfirst(str_replace('_', ' ',$key)); ?></td>

                                <td>
								<?php if(in_array("index", $value)){?>
								<input type="checkbox" class="chkbox4" name='permission[<?php echo $key; ?>][]' value="0" <?php echo (isset($priv[$key]) && in_array(0, $priv[$key])) ? $checked : '' ?>>
								<?php }?></td>


                        <td>
						<?php if(in_array("add", $value)){?>
						<input type="checkbox" class="chkbox4" name='permission[<?php echo $key; ?>][]' value="1" <?php echo(isset($priv[$key]) && in_array(1, $priv[$key])) ? $checked : '' ?>>
						<?php }else{?>
								
								<?php }?></td>
                                <td>
								<?php if(in_array("edit", $value) || in_array("update", $value)){?>
								<input type="checkbox" class="chkbox4" name='permission[<?php echo $key; ?>][]' value="2" <?php echo(isset($priv[$key]) && in_array(2, $priv[$key])) ? $checked : '' ?> >
								<?php }?>
								</td>
                                <td>
								<?php if(in_array("delete", $value)){?>
								<input type="checkbox" class="chkbox4" name='permission[<?php echo $key; ?>][]' value="3" <?php echo (isset($priv[$key]) && in_array(3, $priv[$key])) ? $checked : '' ?> >
								<?php }?></td>


                            </tr>
							<?php } ?>
							</tbody>
                    </table>
					</div>
					<h4><a href="#">Travel desk</a></h4>
					<div style='height:auto;'>
						<table class='table'>
						   <thead>
							<tr>
								<th><input type="checkbox" class = 'checkall5' id="checkall5"/></th>
								<th><b>Controller</b></th>
								<th><b>View</b></th>
								<th><b>Add</b></th>
								<th><b>Edit</b></th>
								<th><b>Delete</b></th>
							</tr>
							</thead>
							<tbody>
								<?php $x = 1;
								foreach ($Travelcontroller as $key => $value) { ?>
                            <tr>	
								<td><?php echo $x++;?></td>
                                <td><?php echo ucfirst(str_replace('_', ' ',$key)); ?></td>

                                <td>
								<?php if(in_array("index", $value)){?>
								<input type="checkbox" class="chkbox5" name='permission[<?php echo $key; ?>][]' value="0" <?php echo (isset($priv[$key]) && in_array(0, $priv[$key])) ? $checked : '' ?>>
								<?php }?></td>


                        <td>
						<?php if(in_array("add", $value)){?>
						<input type="checkbox" class="chkbox5" name='permission[<?php echo $key; ?>][]' value="1" <?php echo(isset($priv[$key]) && in_array(1, $priv[$key])) ? $checked : '' ?>>
						<?php }else{?>
								
								<?php }?></td>
                                <td>
								<?php if(in_array("edit", $value) || in_array("update", $value)){?>
								<input type="checkbox" class="chkbox5" name='permission[<?php echo $key; ?>][]' value="2" <?php echo(isset($priv[$key]) && in_array(2, $priv[$key])) ? $checked : '' ?> >
								<?php }?>
								</td>
                                <td>
								<?php if(in_array("delete", $value)){?>
								<input type="checkbox" class="chkbox5" name='permission[<?php echo $key; ?>][]' value="3" <?php echo (isset($priv[$key]) && in_array(3, $priv[$key])) ? $checked : '' ?> >
								<?php }?></td>


                            </tr>
							<?php } ?>
							</tbody>
                    </table>
                   </div>
									
									
									
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