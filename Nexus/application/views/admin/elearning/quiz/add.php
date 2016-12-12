<!-- Start of the main content -->
<div id="main_content">
<?php if ($error) { ?>
                <div class="alert error">
                    <span class="icon"></span><span class="hide">x</span><strong>Error</strong>
                    <?php echo $error; ?>
                </div>
            <?php } ?>

    <h2 class="grid_12">Add
		<div style="float:right;margin-right:5%;">
            <a href="<?php echo site_url('admin/elearning_quiz/index/'.$table) ?>">
			<font size=2>List</font>
			</a>
        </div>
	</h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/user-business-boss.png" alt="" width="16"
                         height="16">
                    <h3>Question</h3>
                    <span></span>
                </div>
                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/elearning_quiz/add/'.$table);?>" enctype="multipart/form-data">

                <div class="content no-padding">
					<div class="section _100">
                        <label>
                          Sub-Category :
                        </label>
                        <div>
                            <select id="sub_category" class="required" name="sub_category"><?php foreach($subcategory as $sub){?>
							<option value="<?php echo $sub['sub_category'];?>"><?php echo $sub['sub_category'];?></option>
							<?}?>
							</select>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Question :
                        </label>
                        <div>
                            <input type="text" name="question" id="question" class="required" value="<?php echo set_value('question');?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>



                    <div class="section _100">
                        <label>
                            1
                        </label>
                        <div>
                            <input type="text" name="answer1" id="answer1" class="required" value="<?php echo set_value('answer1') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            2
                        </label>
                        <div>
                            <input type="text" name="answer2" id="answer2" class="required" value="<?php echo set_value('answer2') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					  <div class="section _100">
                        <label>
                            3
                        </label>
                        <div>
                            <input type="text" name="answer3" id="answer3" class="required" value="<?php echo set_value('answer3') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            4
                        </label>
                        <div>
                            <input type="text" name="answer4" id="answer4" class="required" value="<?php echo set_value('answer4') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
</div>
                    <div class="section _100">
                        <label>
                            Correct Ans. :
                        </label>
                        <div>
                            <input type="text" name="answer" id="answer" class="required" value="<?php echo set_value('answer') ?>"/>
                            <span style="color:red;" > * Only fill the option no. (e.g. 1)</span>
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