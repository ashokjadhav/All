
<!-- Start of the main content -->
<div id="main_content">
<?php if ($error) { ?>
                <div class="alert error">
                    <span class="icon"></span><span class="hide">x</span><strong>Error</strong>
                    <?php echo $error; ?>
                </div>
            <?php } ?>

    <h2 class="grid_12">Add<div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/travel_airlines/') ?>"><font size=2> List</font></a>
                </div></h2>
    <div class="clean"></div>
    <center>
        <div class="grid_6" style="width:95%;">

            <div class="box">
                <div class="header">
                    <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/user-business-boss.png" alt="" width="16"
                         height="16">
                    <h3>Airline</h3>
                    <span></span>
                </div>
                <form id="frm" method="post" class="validate" action="<?php echo site_url('admin/travel_airlines/add');?>" enctype="multipart/form-data">

                <div class="content no-padding">
				<div class="section _100">
                        <label>
                            Airline Type :
                        </label>
                        <div>
                           <select name="type" id="type">
						   <option value="domestic">DOMESTIC</option>
						   <option value="international">INTERNATIONAL</option>
						   </select>
                        </div>
                    </div>

                    <div class="section _100">
                        <label>
                            Name Of Airline :
                        </label>
                        <div>
                            <input type="text" name="name" id="name" class="required" value="<?php echo set_value('name');?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Website URL :
                        </label>
                        <div>
                            <input type="text" name="url" id="url" class="required" value="<?php echo set_value('url');?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
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