<!-- Start of the main content -->
<div id="main_content">

    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/sub_category/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/book--pencil.png" alt="" width="16"
                         height="16">
                    <h3>SubCategory</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/sub_category/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">
                <div class="content no-padding">

                 <div class="section _100" style='min-height:180px'>
                        <label>
                            Category :
                        </label>
                        <div><?php //var_dump($subcategoryDetailsArr[0]['category']);exit;?>
                            <select name="category"><?php foreach($categorydetails as $category){
							//var_dump($subcategoryDetailsArr[0]['category']);exit;?>

							<option value="<?php echo $category['name'];?>"<?php if($subcategoryDetailsArr[0]['category']==$category['name']){echo 'selected';}?>><?php echo $category['name'];?></option>
							<?}?>
							</select>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>

                    <div class="section _100">

                        <label>
                           Name Of SubCategory :
                        </label>
                        <div>
                           <input type="text" class="required" id="subcategory" value="<?php if (isset($subcategoryDetailsArr[0]['sub_category'])) {
                            echo $subcategoryDetailsArr[0]['sub_category'];
                        } else {
                            echo set_value('sub_category');
                        } ?>" name="subcategory">
<?php echo form_error('sub_category'); ?>
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