<script>
 $(document).ready(function() {
    $('#table_name').change(function(){
      var table_name = $('#table_name').val();
      window.location = "<?php echo site_url('admin/boardDirectors/index');?>/"+table_name;
    })
	 $(".status").live("click", function(){

        var id=$(this).val();
		var baseURL = "<?php echo base_url();?>";
        if($(this).is(":checked")) {
            //alert(id);
            // checkbox is checked -> do something
        $.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/boardDirectors/set_status/"+id,
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
                url: baseURL+"admin/boardDirectors/unset_status/"+id,
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
				 { 'bSortable': false, 'aTargets': [0,3,4] }
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
            <select id="table_name" class="table_name" style="width:30%;">
            <!-- <option value="">Select</option> -->
        <?php foreach($company_details as $employee){?>
          <option value="<?php echo $employee['id'];?>" <?php if($employee['id']==$table)echo 'selected';?>><?php echo $employee['name'];?></option>
        <?php }?>
      </select>
            <h2 class="grid_12">Board Directors
                <div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/boardDirectors/add/'.$table) ?>">
                    <font size=2>Add Directors</font></a>
                </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>/design/Template/img/icons/packs/fugue/16x16/shadeless/user-gray.png" width="16" height="16">
                        <h3>Board Directors</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
						<form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
                                    <th>Sr.No.</th>
                                    <th>Key Persons</th>
                                    <th>PUBLISH</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php //foreach($articles as $article):?>
                                <?php foreach ($DirectorsDetails as $hrhelp): ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $hrhelp['id']; ?>" name="delete[]" class="chkbox"></td>
                                        <td><?php echo $x++; ?></td>

                                        <td>
                                            <?php echo $hrhelp['name']; ?>
                                        </td>
                                        
									
										<td>
                                            <input type="checkbox"  class="status" id="<?php echo  $hrhelp['id'];?>" name="status" value='<?php echo  $hrhelp['id'];?>'
											<?php if($hrhelp['status']=='1'){?>checked<?php }?>>
                                        </td>


										 <td>
                                            <a title="Edit Item" href="<?php echo site_url('admin/boardDirectors/edit/'.$table.'/'. $hrhelp['id']); ?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/019.png'/></a>&nbsp; | &nbsp;
                                            <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/boardDirectors/delete/".$hrhelp['id']); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['boardDirectors'])&& in_array(3,$priv['boardDirectors'])){
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



