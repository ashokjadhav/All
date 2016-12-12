
<style>
    form {
	margin-left:2%;
        margin-right:2%;
	width: 150%;
}
</style>
<script type="text/javascript" src="<?php echo base_url(); ?>design/ckeditor/ckeditor.js"></script>
    <div id="main_content">
        <?php 
        if ($error) {
                ?>
                <div class="alert error">
                    <span class="icon"></span><span class="hide">x</span><strong>Error</strong>
                    <?php echo $error; ?>
                </div>
            <?php }?>
        <h2 class="grid_12">History & Milestone</h2>
        <div class="clean"></div>
            <div class="grid_8">
            <div class="box">
                <div class="header" style="width: 150%;margin-left:2%;margin-right:2%;">
                    <img src="<?php echo base_url(); ?>/design/Template/img/icons/packs/fugue/16x16/shadeless/home.png" width="16" height="16">
                    <h3>History & Milestone</h3>
                </div>
               <form id="frmedit" method="post" class="validate" action="<?php echo site_url('admin/group_companies/history_milestone/'.$description[0]['id']);?>" enctype="multipart/form-data">
               <div class="content no-padding">
                    
                       <div>
                            <textarea name="tadescription" id="tadescription"  class="ckeditor" style="width:50%;resize:none;">
                              <?php echo $description[0]['history_milestone'];
                              echo set_value('history_milestone');?>
                            </textarea>
                            <label class="error"><?php echo form_error('history_milestone'); ?></label>
                        </div>
                    
                </div>
                    <div class="actions">

                            <div class="actions-right">
                                    <input type="submit" id="submit" name='submit' value="Update Content"/>
                            </div>
                    </div>
               </form>
            </div>
    </div>
					
</div>

