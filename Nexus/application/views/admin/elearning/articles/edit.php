<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
<div id="main_content">


    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/articles/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/calendar.png" alt="" width="16"
                         height="16">
                    <h3>Articles</h3>
                    <span></span>
                </div>


                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/articles/edit/'.$this->uri->segment(4,0));?>" enctype="multipart/form-data">

                <div class="content no-padding">

             <div class="section _100">
                   <label>
                            Title :
                  </label>
                  <div>
                            <input type="text" class="required" id="title" value="<?php if (isset($articlesDetailsArr[0]['title'])) {
                            echo $articlesDetailsArr[0]['title'];
                        } else {
                            echo set_value('title');
                        } ?>" name="title">
<?php echo form_error('title'); ?>
                  </div>
            </div>
      <div class="section _100">
                        <label>
                            Category :
                        </label>
                        <div>
                            <select name="category" id="category"><?php  foreach($categorydetails as $category){
							//var_dump($subcategoryDetailsArr[0]['category']);exit;?>

							<option value="<?php echo $category['id'];?>" <?php if($articlesDetailsArr[0]['categoryid']==$category['id']){echo 'selected';}?>><?php echo $category['name'];?></option>
							<?}?>
							</select>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
						</div>
            <div class="section _100">
                     <label>
                            Description :
                      </label>
                     <div>
                            <textarea id="desc" rows="15" cols="40" name="desc" class="ckeditor" style="width:50%;resize:none;"><?php if (isset($articlesDetailsArr[0]['desc'])) {
                            echo $articlesDetailsArr[0]['desc'];
                        } else {
                            echo set_value('desc');
                        } ?></textarea>
<?php echo form_error('desc'); ?>
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