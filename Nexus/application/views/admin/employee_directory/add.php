
<!-- Start of the main content -->
<div id="main_content">
<?php if ($error) { ?>
                <div class="alert error">
                    <span></span><span class="hide">x</span>
                    <?php echo $error; ?>
                </div>
            <?php } ?>
<h2 class="grid_12">Add<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/employee_directory/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/user-business-boss.png" alt="" width="16"
                         height="16">
                    <h3>Employees</h3>
                    <span></span>
                </div>
                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/employee_directory/add/');?>" enctype="multipart/form-data">

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            *Employee Id :
                        </label>
                        <div>
                            <input type="text" name="emp" id="emp" class="required" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            *Name :
                        </label>
                        <div>
                            <input type="text" name="name" id="name" class="required" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Username :
                        </label>
                        <div>
                            <input type="text" name="username" id="username"  value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Password :
                        </label>
                        <div>
                            <input type="password" name="password" id="password" maxlength="10"  value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>

                    <div class="section _100">
                        <label>
                            *Email :
                        </label>
                        <div>
                            <input type="email" name="email" id="email" class="required" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            *DOB :
                        </label>
                        <div>
                            <input type="text" name="dob" id="dob" class="required" value="<?php echo set_value('dob') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            *Department :
                        </label>
                        <div>
                            <input type="text" name="department" id="department" class="required" value="<?php echo set_value('department') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            *Designation :
                        </label>
                        <div>
                            <input type="text" name="designation" id="designation" class="required" value="<?php echo set_value('designation') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Description (optional): 
                        </label>
                        <div>
                            <textarea rows="5" cols="40" name="description" id="description" maxlength='1000'></textarea>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            *Company :
                        </label>
                        <div>
                            <input type="text" name="company" id="company" class="required" value="<?php echo set_value('company') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					  <div class="section _100">
                        <label>
                            *Joining Date :
                        </label>
                        <div>
                            <input type="text" name="joining_date" id="jdate" class="required" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Floor :
                        </label>
                        <div>
                            <input type="text" name="floor" id="floor" class="" value="<?php echo set_value('floor') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>


						<div class="section _100">
                        <label>
                            Ext no :
                        </label>
                        <div>
                            <input type="digits"  maxlength='5' name="extn" id="extn" class="" value="<?php echo set_value('extn') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Contact no :
                        </label>
                        <div>
                            <input type="digits" maxlength='10' name="contact" id="contact" class="" value="<?php echo set_value('contact') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
						</div>
					<div class="section _100">
                        <label>
                            Location :
                        </label>
                        <div>
                            <select id="location" name="location" class="table_name" style="">
                                <?php if($company_location_details){
                                    foreach ($company_location_details as $key => $value) {
                                        ?>
                                <option value="<?php echo $value['id'];?>"><?php echo $value['location_name'];?></option>
                                <?php }}?>
                    			<!-- <option value="mumbai">Mumbai</option>
                    			<option value="kerala">Kerala</option>
                    			<option value="pondicherry">Pondicherry</option>
                    			<option value="ajmer">Ajmer</option> -->
                            </select>

                        </div></div>
						<div class="section _100">
                        <label>
                            Employee Type :
                        </label>
                        <div>
                            <select id="type" name="type" class="table_name" style="">
			<option value="new">New</option>
			<option value="existing">Existing</option>

		</select>
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Profile Photo :
                        </label>
                        <div>
                            <input type="file" class="fileupload" name="logo" id="logo">
							<span style="color:red;" > * Please Upload Image of Size (250px * 150px)</span>
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
$('#username').keydown(function(e) {
        if (e.keyCode == 32) // 32 is the ASCII value for a space
            e.preventDefault();
    });
</script>