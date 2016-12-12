<script>
 $(document).ready(function() {
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
    $(".status").live("click", function(){
     
        var id=$(this).val();
		var baseURL = "<?php echo base_url();?>";
        if($(this).is(":checked")) {
            //alert(id);
            // checkbox is checked -> do something
        $.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/usermanagement/set_status_role/"+id,
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
                url: baseURL+"admin/usermanagement/unset_status_role/"+id,
                success: function(response) {
                    // success function is called when data came back
                    // for example: get your content and display it on your site
                    //alert(response);
                }
});
        }
 });
 $('#table-example').dataTable( {
				"aoColumnDefs": [
				 { 'bSortable': false, 'aTargets': [2,3] }
			]
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
     
            <h2 class="grid_12">User Management
                <div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/usermanagement/add_role') ?>"><font size=2>Add Role</font></a>
                </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>public/images/user-business-boss.png" width="16" height="16">
                        <h3>USER MANAGEMENT</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
            <form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Sr.No.</th>
                                    <th>ROLE</th>
                                    <th>PUBLISH</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php //foreach($articles as $article):?>
                                <?php foreach ($role_data as $resource): ?>    
                                    <tr>
                                       
                                        <td><?php echo $x++; ?></td>
                                        <td>
                                            <?php echo $resource['role']; ?>
                                        </td>
                                        
                                        <td>
                                            <input type="checkbox"  class="status" id="<?php echo  $resource['id'];?>" name="status" value='<?php echo  $resource['id'];?>'
                                            <?php if($resource['status']=='1'){?>checked<?php }?>>
                                        </td>
                                        

                                        <td>
                                            <a title="Edit Item" href="<?php echo site_url('admin/usermanagement/edit_role/'. $resource['id']); ?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/019.png'/></a>&nbsp; | &nbsp;
                                            <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/usermanagement/delete_role/".$resource['id']); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                       
                        </form>
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