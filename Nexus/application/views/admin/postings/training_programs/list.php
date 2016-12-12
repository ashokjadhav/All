<script>
 $(document).ready(function() {
	 $('#table-example').dataTable( {
				"aoColumnDefs": [
				 { 'bSortable': false, 'aTargets': [0,4,6,7,8] }
			]
				});

	 $(".status").live("click", function(){

        var id=$(this).val();
		var baseURL = "<?php echo base_url();?>";
        if($(this).is(":checked")) {
            //alert(id);
            // checkbox is checked -> do something
        $.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/training_programs/set_status/"+id,
                success: function(response) {
                    // success function is called when data came back
                    // for example: get your content and display it on your site
                    //alert(response);
                }
});

        } else {
            //alert(id);
            // checkbox is not checked -> do something different
            $.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/training_programs/unset_status/"+id,
                success: function(response) {
                    // success function is called when data came back
                    // for example: get your content and display it on your site
                    //alert(response);
                }
});
        }
 });
	 $('.checkall').click(function () {
		    if ($(this).attr('checked')=='checked')
		    {
		        $('input:checkbox.chkbox').attr('checked', 'checked');
		    }
		    else
		    {
		        $('input:checkbox.chkbox').removeAttr('checked');
		    }
	    });
  $('#mysubmit').click(function(){

    if(confirm('Do you want to Delete?')){ $('#frmproducts').submit(); }
  });
 });

 function deleteConfirm(url)
 {
  if(confirm('Do you want to Delete?'))
  {
   window.location.href=url;
  }
 }
</script>
<div id="main_content">
            <?php if ($this->session->flashdata('success')) {
                ?>
                <div class="alert success">
                    <span class="icon"></span><span class="hide">x</span><strong>Success</strong>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php } elseif ($this->session->flashdata('error')) { ?>
                <div class="alert error">
                    <span class="icon"></span><span class="hide">x</span><strong>Error</strong>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>

            <h2 class="grid_12"> Training Programs
                <div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/training_programs/add') ?>"><font size=2>Add </font></a>
                </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>/design/Template/img/icons/packs/fugue/16x16/shadeless/report--pencil.png" width="16" height="16">
                        <h3>Training Programs</h3>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
<form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"></th>
                                    <th>Sr.No.</th>
                                   <th>NAME</th>

                                    <th>PROGRAM NAME</th>
                                    <th>PROGRAM DETAILS</th>
									<th>DEADLINE</th>
									<th>TOTAL HOURS</th>

									<th>PUBLISH</th>
									<!--<th>PERIODS</th>-->
									<th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php foreach($programsDetails as $programsDetail):?>

                                    <tr>
                                        <td><input type="checkbox" value="<?php echo $programsDetail['id']; ?>" name="delete[]" class="chkbox"></td>
                                        <td><?php echo $x++; ?></td>

                                        <td>
                                            <?php echo $programsDetail['name']; ?>
                                        </td>
										<td>
                                            <?php echo $programsDetail['programname']; ?>
                                        </td>


										  <td>

										<a href="#" class="view-answer" id="<?php echo $programsDetail['id']; ?>">View</a>
										<div class="dialog" id="dialog_<?php echo $programsDetail['id']; ?>" title="<?php echo $programsDetail['name']; ?>"  style="display:none;">
										
	<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>									<tr>	
			<td><span style="font-size:14px"><strong>LEARNING AREAS</strong></span></td>
			<td><span style="font-size:14px"><?php echo $programsDetail['learning_areas']; ?></span></td>
		</tr>
		<tr>
			<td><span style="font-size:14px"><strong>PROCESS</strong></span></td>
			<td><span style="font-size:14px"> <?php echo $programsDetail['process']; ?></span></td>
		</tr>
		<tr>
			<td><span style="font-size:14px"><strong>LEVEL OF IMPORTANCE</strong></span></td>
			<td><span style="font-size:14px"><?php echo $programsDetail['importance_level']; ?></span></td>
		</tr>
	</table>
                                        </td>
										<td>
                                            <?php echo $programsDetail['deadline']; ?>
                                        </td>
										<td>
                                            <?php echo $programsDetail['total_hours']; ?>
                                        </td>

                                        <td><input type="checkbox"  class="status" id="<?php echo  $programsDetail['id'];?>" name="status" value='<?php echo  $programsDetail['id'];?>'
                                            <?php if($programsDetail['status']=='1'){?>checked<?php }?>></td>


                                        <td>
                                            <a title="Edit Item" href="<?php echo site_url('admin/training_programs/edit/' . $programsDetail['id'] ); ?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/019.png'/></a>&nbsp; | &nbsp;

                      <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/training_programs/delete/".$programsDetail['id']); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['training_programs'])&& in_array(3,$priv['training_programs'])){
						?>
                       <?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>
					   <?php } ?></form>
                        <!--<input type="submit" value="Delete" id="delete" />-->
                        <!-- <input type="button" id="delete" value="Delete" style="width:10%;"/> -->
                        <?php //echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>




<script defer src="<?php echo base_url(); ?>design/Template/js/mylibs/jquery-fallr-1.2.js"></script>
<script defer src="<?php echo base_url(); ?>design/Template/js/mylibs/jquery.dataTables.js"></script>

<script>
                                            /*$(window).load(function() {
                                             $('#accordion').accordion();
                                             $(window).resize();
                                             });*/

                                            $(window).load(function () {
                                                $('#table-example').dataTable();
                                                $(window).resize();
                                            });



</script>