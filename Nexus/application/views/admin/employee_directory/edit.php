<!-- Start of the main content -->

<div id="main_content">
<?php if ($error) { ?>
                <div class="alert error">
                    <span></span><span class="hide">x</span>
                    <?php echo $error; ?>
                </div>
            <?php } ?>

    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/employee_directory/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/user-business-boss.png" alt="" width="16"
                         height="16">
                    <h3> Employees</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/employee_directory/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">

                <div class="content no-padding">
					<div class="section _100">
                        <label>
                            *Employee Id :
                        </label>
                        <div>
                            <input type="text" name="emp" id="emp" class="required" value="<?php if (isset($userDetailsArr[0]['emp_id'])) {
                            echo $userDetailsArr[0]['emp_id'];
                        } else {
                            echo set_value('emp');
                        } ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            *Name :
                        </label>
                        <div>
                           <input type="text" class="required" id="name" value="<?php if (isset($userDetailsArr[0]['name'])) {
                            echo $userDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>" name="name">
<?php echo form_error('name'); ?>
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Username :
                        </label>
                        <div>
                           <input type="text" class="required" id="username" value="<?php if (isset($userDetailsArr[0]['username'])) {
                            echo $userDetailsArr[0]['username'];
                        } else {
                            echo set_value('username');
                        } ?>" name="username">
<?php echo form_error('username'); ?>
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Password :
                        </label>
                        <div>
                           <input type="password" class="" id="password"  value="" name="password">
<?php echo form_error('password'); ?>
                        </div>
                    </div>

					 <div class="section _100">
                        <label>
                            *Email :
                        </label>
                        <div>
                           <input type="text" class="required" id="email" value="<?php if (isset($userDetailsArr[0]['email'])) {
                            echo $userDetailsArr[0]['email'];
                        } else {
                            echo set_value('email');
                        } ?>" name="email">
<?php echo form_error('name'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            *DOB :
                        </label>
                        <div>
                           <input type="text" class="required" id="dob" value="<?php if (isset($userDetailsArr[0]['dob'])) {
                            echo $userDetailsArr[0]['dob'];
                        } else {
                            echo set_value('dob');
                        } ?>" name="dob">
<?php echo form_error('dob'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            *Department :
                        </label>
                        <div>
                           <input type="text" class="required" id="department" value="<?php if (isset($userDetailsArr[0]['department'])) {
                            echo $userDetailsArr[0]['department'];
                        } else {
                            echo set_value('department');
                        } ?>" name="department">
<?php echo form_error('department'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            *Designation :
                        </label>
                        <div>
                           <input type="text" class="required" id="designation" value="<?php if (isset($userDetailsArr[0]['designation'])) {
                            echo $userDetailsArr[0]['designation'];
                        } else {
                            echo set_value('designation');
                        } ?>" name="designation">
<?php echo form_error('designation'); ?>
                        </div>
                    </div>
                    <div class="section _100">
                     <label>
                            Description :
                        </label>
                        <div>
                            <textarea id="description" rows="5" cols="40" name="description"  maxlength='1000'><?php if (isset($userDetailsArr[0]['description'])) {
                            echo $userDetailsArr[0]['description'];
                        } else {
                            echo set_value('description');
                        } ?></textarea>
<?php echo form_error('description'); ?>
                        </div>
      </div>
					 <div class="section _100">
                        <label>
                            *Company :
                        </label>
                        <div>
                           <input type="text" class="required" id="company" value="<?php if (isset($userDetailsArr[0]['company'])) {
                            echo $userDetailsArr[0]['company'];
                        } else {
                            echo set_value('company');
                        } ?>" name="company">
<?php echo form_error('company'); ?>
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            *Joining Date :
                        </label>
                        <div>
                           <input type="text" class="required" id="jdate" value="<?php if (isset($userDetailsArr[0]['joining_date'])) {
                            echo $userDetailsArr[0]['joining_date'];
                        } else {
                            echo set_value('joining_date');
                        } ?>" name="joining_date">
<?php echo form_error('joining_date'); ?>
        </div>
		</div>
					<div class="section _100">
                        <label>
                            Floor :
                        </label>
                        <div>
                           <input type="text" class="" id="floor" value="<?php if (isset($userDetailsArr[0]['floor'])) {
                            echo $userDetailsArr[0]['floor'];
                        } else {
                            echo set_value('floor');
                        } ?>" name="floor">
<?php echo form_error('floor'); ?>
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Extn No:
                        </label>
                        <div>
                           <input type="digits" maxlength="5" class="" id="extn" value="<?php if (isset($userDetailsArr[0]['extn'])) {
                            echo $userDetailsArr[0]['extn'];
                        } else {
                            echo set_value('extn');
                        } ?>" name="extn">
<?php echo form_error('extn'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Contact No:
                        </label>
                        <div>
                           <input type="digits" maxlength="10" class="" id="contact" value="<?php if (isset($userDetailsArr[0]['contact'])) {
                            echo $userDetailsArr[0]['contact'];
                        } else {
                            echo set_value('contact');
                        } ?>" name="contact">
<?php echo form_error('contact'); ?>
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Location :
                        </label>
                        <div>
                            <select id="location" name='location' class="location" style="">
                            <?php if($company_location_details){
                                    foreach ($company_location_details as $key => $value) {
                                        ?>
                           <option value="<?php echo $value['id'];?>"<?php if($userDetailsArr[0]['location_id']==$value['id']){echo 'selected';}?>><?php echo $value['location_name'];?></option>
                                <?php }}?>

		                    </select>
                        </div></div>
<div class="section _100">
                        <label>
                            Employee Type :
                        </label>
                        <div>
                            <select id="type" name="type" style="">
			<?php //echo $table;?>
			<option value="New" <?php if($userDetailsArr[0]['type']=='New')echo 'selected'?>>New</option>
			<option value="Existing" <?php if($userDetailsArr[0]['type']=='Existing')echo 'selected'?>>Existing</option>

		</select>
                        </div></div>


					<!-- <div class="section _100">
                        <label>
                            Address :
                        </label>
                        <div>
                           <textarea id="address" rows="5" cols="40" name="address" class="required"><?php if (isset($userDetailsArr[0]['address'])) {
                            echo $userDetailsArr[0]['address'];
                        } else {
                            echo set_value('address');
                        } ?></textarea>
<?php echo form_error('address'); ?>
                        </div>
						</div>-->
						<div class="section _100">
                        <label>
                            Profile :
                        </label>
                        <div>
                          <input type="file" class="fileupload" name="logo" id="logo">
						  <span style="color:red;" > * Please Upload Image of Size (250px * 150px)</span>
						<?php if ($userDetailsArr[0]['img']!='') { ?>
                    <img src="<?php echo base_url();?>files/<?php echo $userDetailsArr[0]['img'];?>" width="80" height="80">
					<input type="hidden" id="logo" name="logo" value="<?php echo $userDetailsArr[0]['img'];?>">
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
$('#username').keydown(function(e) {
        if (e.keyCode == 32) // 32 is the ASCII value for a space
            e.preventDefault();
    });
</script>