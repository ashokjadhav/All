<!-- Start of the main content -->
<div id="main_content">
<?php if ($error) { ?>
                <div class="alert error">
                    <span></span><span class="hide">x</span>
                    <?php echo $error; ?>
                </div>
            <?php } ?>
    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/resource_management/index/'.$table) ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/user-business-boss.png" alt="" width="16"
                         height="16">
                    <h3>Resource</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/resource_management/edit/'.$this->uri->segment(4,0).'/'.$table);?>" enctype="multipart/form-data">

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                           Name Of Resource :
                        </label>
                        <div>
                           <input type="text" class="required" id="name" value="<?php if (isset($resource_managementDetailsArr[0]['name'])) {
                            echo $resource_managementDetailsArr[0]['name'];
                        } else {
                            echo set_value('name');
                        } ?>" name="name">
<?php echo form_error('name'); ?>
                        </div>
                    </div>

					<div class="section _100">
                        <label>
                            Sub-Category :
                        </label>
                        <div><?php //var_dump($subcategoryDetailsArr[0]['category']);exit;?>
                            <select name="sub_category" id="sub_category"><?php foreach($subcategory as $sub){
							//var_dump($subcategoryDetailsArr[0]['category']);exit;?>

							<option value="<?php echo $sub['sub_category'];?>"<?php if($resource_managementDetailsArr[0]['sub_category']==$sub['sub_category']){echo 'selected';}?>><?php echo $sub['sub_category'];?></option>
							<?}?>
							</select>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
						</div>
					<div class="section _100">
                        <label>
                            Author :
                        </label>
                        <div>
                           <input type="text" class="required" id="author"  name="author" value="<?php if (isset($resource_managementDetailsArr[0]['author'])) {
                            echo $resource_managementDetailsArr[0]['author'];
                        } else {
                            echo set_value('author');
                        } ?>">
<?php echo form_error('author'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Publisher :
                        </label>
                        <div>
                           <input type="text" class="required" id="publisher" value="<?php if (isset($resource_managementDetailsArr[0]['publisher'])) {
                            echo $resource_managementDetailsArr[0]['publisher'];
                        } else {
                            echo set_value('publisher');
                        } ?>" name="publisher">
<?php echo form_error('publisher'); ?>
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Price :
                        </label>
                        <div>
                           <input type="text" class="required" id="price" value="<?php if (isset($resource_managementDetailsArr[0]['price'])) {
                            echo $resource_managementDetailsArr[0]['price'];
                        } else {
                            echo set_value('price');
                        } ?>" name="price">
<?php echo form_error('price'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Date Of Purchase :
                        </label>
                        <div>
                           <input type="text" class="required" id="dop" value="<?php if (isset($resource_managementDetailsArr[0]['dop'])) {
                            echo $resource_managementDetailsArr[0]['dop'];
                        } else {
                            echo set_value('dop');
                        } ?>" name="dop">
<?php echo form_error('dop'); ?>
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Code Number :
                        </label>
                        <div>
                           <input type="text" class="required" id="code" value="<?php if (isset($resource_managementDetailsArr[0]['code'])) {
                            echo $resource_managementDetailsArr[0]['code'];
                        } else {
                            echo set_value('code');
                        } ?>" name="code">
<?php echo form_error('code'); ?>
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