<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/elearning_slides/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/calendar.png" alt="" width="16"
                         height="16">
                    <h3>Slides & Pdfs</h3>
                    <span></span>
                </div>
               <?php echo form_open_multipart('admin/elearning_slides/edit/'.$this->uri->segment(4,0),array('class'=>'validate'));?>

								<div class="content no-padding">


									<div class="section _100">
										<label>
											Title :
										</label>
										<div>
											<input type="text" name="title" id="title" class="required" value="<?php if (isset($slideDetailsArr[0]['title'])) {
                            echo $slideDetailsArr[0]['title'];
                        } else {
                            echo set_value('title');
                        } ?>"/>
											<!-- <label class="error red" for="category" style="display:none;width:45%;">Please select category</label> -->
											<label><?php echo form_error('title'); ?></label>
										</div>
									</div>
									<div class="section _100">
                        <label>
                         Category :
                        </label>
                        <div>
                            <select id="category" class="required" name="category"><?php foreach($categorydetails as $category){?>
							<option value="<?php echo $category['id'];?>"<?php if($slideDetailsArr[0]['categoryid']==$category['id']){echo 'selected';}?>><?php echo $category['name'];?></option>
							<?}?>
							</select>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>

						<div class="section _100">
						<span class="label">Sub-Category: </span>
								<div>
					          <select id="sub_category" class="required" name="sub_category">
                            <option value="ARTICLES & SLIDES"<?php if($slideDetailsArr[0]['sub_category']=='ARTICLES & SLIDES'){echo 'selected';}?>>ARTICLES & SLIDES</option>
                            <option value="MUST STUDY"<?php if($slideDetailsArr[0]['sub_category']=='MUST STUDY'){echo 'selected';}?>>MUST STUDY</option>
							</select>
								</div>
									</div>
<div class="section _100">
                        <label>
                            File :
                        </label>
                        <div>
                            <input type="file" class="fileupload" name="slide" id="slide">

                        </div>
                    </div>
				<div class="section _100">
						<label>
						 Download Permission:
						</label>
						<div>
							<input style='width:10%;float:left;'type="checkbox" name="copyrights" class="chkbox"<?php if($slideDetailsArr[0]['copyrights']=='1'){ ?>checked<?php }?>>

						</div>
					</div>
								</div>
								<div class="actions">

									<div class="actions-right">
										<input type="submit" id="submit" name='submit' value="Submit"/>
									</div>
								</div>
							<!-- </form> -->
							<?php echo form_close();?>

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
