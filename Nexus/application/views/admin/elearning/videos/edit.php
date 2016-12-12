
<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    function videotype(){



       if(document.getElementById('type').value=="Upload"){
           //alert('Hii');
           document.getElementById('upload').style.display="block";
           document.getElementById('codes').style.display="none";
       }else if(document.getElementById('type').value=="Embed"){
           document.getElementById('codes').style.display="block";
		   document.getElementById('upload').style.display="none";

       }}

</script>
<!-- Start of the main content -->
<div id="main_content">
    <h2 class="grid_12">Edit<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/elearning_videos/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/film.png" alt="" width="16"
                         height="16">
                    <h3>Videos</h3>
                    <span></span>
                </div>
               <?php echo form_open_multipart('admin/elearning_videos/edit/'.$this->uri->segment(4,0),array('class'=>'validate'));?>

								<div class="content no-padding">


									<div class="section _100">
										<label>
											Title :
										</label>
										<div>
											<input type="text" name="title" id="title" class="required" value="<?php if (isset($videoDetailsArr[0]['title'])) {
                            echo $videoDetailsArr[0]['title'];
                        } else {
                            echo set_value('title');
                        } ?>"/>

											<label><?php echo form_error('title'); ?></label>
										</div>
									</div>
									<div class="section _100">
                        <label>
                         Category :
                        </label>
                        <div>
                            <select id="category" class="required" name="category"><?php foreach($categorydetails as $category){?>
							<option value="<?php echo $category['id'];?>" <?php if($videoDetailsArr[0]['categoryid']==$category['id']){echo 'selected';}?>><?php echo $category['name'];?></option>
							<?}?>
							</select>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>

						<div class="section _100">
						<span class="label">Sub-Category:</span>
								<div>
					          <select id="sub_category" class="required" name="sub_category">
                            <option value="VIDEOS" <?php if($videoDetailsArr[0]['sub_category']=='VIDEOS'){echo 'selected';}?>>VIDEOS</option>
                            <option value="MUST STUDY" <?php if($videoDetailsArr[0]['sub_category']=='MUST STUDY'){echo 'selected';}?>>MUST STUDY</option>
							</select>
								</div>
						</div>
					<div class="section _100" style='height:80px'>
						<span class="label">Type:</span>
						<div>
					        <select onchange="videotype()" id="type" class="required" name="type">
							<option value="">--Select--</option>
                            <option value="Upload"<?php if($videoDetailsArr[0]['type']=='Upload'){echo 'selected';}?>>Upload</option>
                            <option value="Embed" <?php if($videoDetailsArr[0]['type']=='Embed'){echo 'selected';}?>>Embed</option>
							</select>
						</div>
					</div>

					<div class="section _100">
						<label>
						Video Download Permission:
						</label>
						<div>
							<input style='width:10%;float:left;'type="checkbox" class="chkbox" name="copyrights"
							<?php if($videoDetailsArr[0]['copyrights']=='1'){ ?>checked<?php }?>>

						</div>
					</div>
					<div class="section _100" id= "upload" style='display:none'>
                        <label>
                            Upload Video :
                        </label>
                        <div>
                            <input type="file" class="fileupload" name="video" id="video">
                            <span style="color:red;" >Please Upload Video In .mp4 Format.</span>
                        </div>
                    </div>
					<div class="section _100" id= "codes" style='display:none'>
                        <label>
                           Youtube Link:
                        </label>
                        <div>
                          <input type="text" name="code" id="code" value="<?php if (isset($videoDetailsArr[0]['code'])) {
                            echo $videoDetailsArr[0]['code'];
                        } else {
                            echo set_value('code');
                        }?>"/>
						<span style="color:red;" >Eg.(https://www.youtube.com/v/KtPv7IEhWRA)</span>

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
