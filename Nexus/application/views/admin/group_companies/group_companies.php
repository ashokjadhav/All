<script>
 $(document).ready(function() {
	 $(".status").live("click", function(){

        var id=$(this).val();
		var baseURL = "<?php echo base_url();?>";
        if($(this).is(":checked")) {

            // checkbox is checked -> do something
        $.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/group_companies/set_status/"+id,
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
                url: baseURL+"admin/group_companies/unset_status/"+id,
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
		$('#table-example').dataTable( {
				"aoColumnDefs": [
				 { 'bSortable': false, 'aTargets': [0,3,4,5,6] }
			]
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

            <h2 class="grid_12">Group Companies
                <div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/group_companies/add') ?>"><font size=2>Add </font></a>
                </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>/design/Template/img/icons/packs/fugue/16x16/shadeless/home.png" width="16" height="16">
                        <h3>Group Companies</h3>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
<form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"></th>
                                    <th>Sr.No.</th>
                                    <th>COMPANY NAME</th>
                                    
                                    <th>LOCATION</th>
                                    <th>CONTACT NO.</th>
									 <th>PUBLISH</th>
									<th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php foreach($group_companiesDetails as $group_companies):?>

                                    <tr>
                                        <td><input type="checkbox" value="<?php echo $group_companies['id']; ?>" name="delete[]" class="chkbox"></td>
                                        <td><?php echo $x++; ?></td>

                                        <td>
                                            <?php echo $group_companies['name']; ?>
                                        </td>
                                        <!-- <td>
                                        <a href="#" class="view-answer" id="<?php echo $group_companies['id']; ?>">View</a>
                                        <div class="dialog" id="dialog_<?php echo $group_companies['id']; ?>" title="<?php echo $group_companies['name']; ?>"  style="display:none;">
                <p><span style="font-family:verdana,geneva,sans-serif; font-size:14px"> <?php echo $group_companies['desc']; ?></span></p>
                                        </td> -->
                                        
										<td>
										<a href="#" class="view-answer" id="<?php echo $group_companies['id']; ?>">View</a>
										<div class="dialog" id="dialog_<?php echo $group_companies['id']; ?>" title="<?php echo $group_companies['name']; ?>"  style="display:none;">
				<p><span style="font-family:verdana,geneva,sans-serif; font-size:14px"> <?php echo $group_companies['address']; ?></span></p>
										</td>
                                        <td>
                                            <?php echo $group_companies['contact']; ?>
                                        </td>

                                        <td>
                                            <input type="checkbox"  class="status" id="<?php echo  $group_companies['id'];?>" name="status" value='<?php echo  $group_companies['id'];?>'
											<?php if($group_companies['status']=='1'){?>checked<?php }?>>
                                        </td>

                                        <td>
                                            <a title="Edit Item" href="<?php echo site_url('admin/group_companies/edit/' . $group_companies['id'] ); ?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/019.png'/></a>&nbsp; | &nbsp;

                      <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/group_companies/delete/".$group_companies['id']); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['group_companies'])&& in_array(3,$priv['group_companies'])){
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