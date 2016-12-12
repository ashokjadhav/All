<script>
 $(document).ready(function() {
	 $('.checkall').click(function () {
		    if ($(this).attr('checked')=='checked')
		    {
		        $('input:checkbox.chkbox').attr('checked', 'checked');
                $('input:checkbox.userid').attr('checked', 'checked');
		    }
		    else
		    {
		        $('input:checkbox.chkbox').removeAttr('checked');
                $('input:checkbox.userid').removeAttr('checked');
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
                url: baseURL+"admin/team_leaders/set_status/"+id,
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
                url: baseURL+"admin/team_leaders/unset_status/"+id,
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
				 { 'bSortable': false, 'aTargets': [0,3,4,5,6] }
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

            <h2 class="grid_12">Team Leaders
                <div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/team_leaders/add') ?>"><font size=2>Add New</font></a>
                </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>public/images/user-business-boss.png" width="16" height="16">
                        <h3>Team Leader</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
            <form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
                                    <th>Sr.No.</th>
                                    <th>NAME</th>
		                            <th>TEAM MEMBERS</th>
									<th>ADD MEMBER</th>
									<th>PUBLISH</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $x=1;?>
                                <?php foreach ($tlDetails as $tl){ ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $tl['id']; ?>" name="delete[]" class="chkbox">
                                        <td><?php echo $x++; ?></td>
                                        <td>
                                            <?php echo $tl['emp_name']; ?>
                                        </td>
			<td>
                    <a href="#" class="view-answer" id="<?php echo $tl['id']; ?>">View</a>
                    <div class="dialog" id="dialog_<?php echo $tl['id']; ?>" title="<?php echo $tl['emp_name']; ?> | <b>Team Members</b>"  style="display:none;">
					<?php if($tl['juniors']){?>
                   <table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
				 
					<tr>
						<td><b>SR. NO.</b></td>
						<td><b>NAME</b></td>
						<td><b>ACTION</b></td>
					</tr>
				
                        <?php 
						$a = 1;
						foreach($tl['juniors'] as $junior){?>
			
				<tr>
					<td><?php echo $a++;?></td>
					<td><span style="font-size:14px"><?php echo $junior['name']; ?></span></td>
					<td><span><a style="color:red;" href="<?php echo site_url('admin/team_leaders/remove_junior/'.$junior['id']);?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a></span></td>
				</tr>
			
                 
                        <?php }?>
				</table>

				<?php }else{?>
				<p>No any member assign to this team.</p>
				<?php }?>

				</td>

									    <td>
                                            <a class="delete tooltip" title="Add Item" href="<?php echo site_url('admin/team_leaders/add_juniors/'.$tl['id']);?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/103.png'/></a>
                                        </td>
                                        <td>
                                            <input type="checkbox"  class="status" id="<?php echo  $tl['id'];?>" name="status" value='<?php echo  $tl['id'];?>'
                                            <?php if($tl['status']=='1'){?>checked<?php }?>>
                                        </td>


                                        <td>
                                            
                                            <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/team_leaders/delete/".$tl['id'])."/".$tl['user_id']; ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
                                        </td>
                                    </tr>
                                            <?php }?>
                            </tbody>
                        </table><?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['team_leaders'])&& in_array(3,$priv['team_leaders'])){
						?>
                       <?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>
					   <?php } ?></form>
                        
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