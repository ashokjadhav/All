<script>
 $(document).ready(function() {
     $('#table_name').change(function(){
			var table_name = $('#table_name').val();
			window.location = "<?php echo site_url('admin/resource_management/index');?>/"+table_name;
		})
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
		var table_name = $('#table_name').val();
        var id=$(this).val();
		var baseURL = "<?php echo base_url();?>";
        if($(this).is(":checked")) {
			//alert(id);
            // checkbox is checked -> do something
		$.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/resource_management/set_status/"+id+'/'+table_name,
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
                url: baseURL+"admin/resource_management/unset_status/"+id+'/'+table_name,
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
				 { 'bSortable': false, 'aTargets': [0,3,4,5] }
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
     <select id="table_name" class="table_name" style="width:30%;">

				<?php foreach($categoryDetails as $category){?>
					<option value="<?php echo $category['name'];?>" <?php if($category['name']==$table)echo 'selected';?>><?php echo $category['name'];?></option>
				<?php }?>
			</select>
            <h2 class="grid_12">Resource Management
                <div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/resource_management/add/'.$table);?>"><font size=2>Add Resource</font></a>
                </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>design/Template/img/icons/packs/fugue/16x16/book.png" width="16" height="16">
                        <h3>Resource</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
			<form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
                                    <th>Sr.No.</th>
									<th>RESOURCE NAME</th>
									<th>RESOURCE DETAILS</th>
									<th>PUBLISH</th>
									
									<th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php //foreach($articles as $article):?>
                                <?php foreach ($resource_managementDetails as $resource): ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $resource['id']; ?>" name="delete[]" class="chkbox"></td>
                                        <td><?php echo $x++; ?></td>
										<td>
                                            <?php echo $resource['name']; ?>
                                        </td>

                                        <td>
										<a href="#" class="view-answer" id="<?php echo $resource['id']; ?>">View</a>
										<div class="dialog" id="dialog_<?php echo $resource['id']; ?>" title="<?php echo $resource['name']; ?>"  style="display:none;">
									<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
									<tr>
										<td><span style="font-size:14px"><strong>Resource Sub Category</strong></span></td>
										<td><span style="font-size:14px"><?php echo $resource['sub_category']; ?></span></td>
									</tr>
									<tr>
										<td><span style="font-size:14px"><strong>Author </strong></span></td>
										<td><span style="font-size:14px"> <?php echo $resource['author']; ?></span></td>
									</tr>
									<tr>
										<td><span style="font-size:14px"> <strong>Publisher</strong></span></td>
										<td><span style="font-size:14px"><?php echo $resource['publisher']; ?></span></td>
									</tr>
									<tr>
										<td><span style="font-size:14px"><strong>Price</strong></span></td>
										<td><span style="font-size:14px">Rs. <?php echo $resource['price']; ?>/-</span></td>
									</tr>
									<tr>
										<td><span style="font-size:14px"><strong>Date Of Purchase</strong></span></td>
										<td><span style="font-size:14px"><?php echo date('d M Y',strtotime($resource['dop'])); ?></span></td>
									</tr>
									<tr>
										<td><span style="font-size:14px"><strong>Code Number </strong></span></td>
										<td><span style="font-size:14px"><?php echo $resource['code']; ?></span></td>
									</tr>
								</table>
									
									</td>
										<td>
                                            <input type="checkbox"  class="status" id="<?php echo  $resource['id'];?>" name="status" value='<?php echo  $resource['id'];?>'
											<?php if($resource['status']=='1'){?>checked<?php }?>>
                                        </td>
										
                                        <td>
						<a title="Edit Item" href="<?php echo site_url('admin/resource_management/edit/'.$resource['id'].'/'.$table);?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/019.png'/></a>&nbsp; | &nbsp;
						 <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/resource_management/delete/".$resource['id'].'/'.$table); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
						</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['resource_management'])&& in_array(3,$priv['resource_management'])){
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