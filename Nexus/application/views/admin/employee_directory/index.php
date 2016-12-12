<script>
	$(document).ready(function() {
		$(".status").live("click", function(){

        var id=$(this).val();
		var baseURL = "<?php echo base_url();?>";
        if($(this).is(":checked")) {
            //alert(id);
            // checkbox is checked -> do something
        $.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/employee_directory/set_status/"+id,
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
                url: baseURL+"admin/employee_directory/unset_status/"+id,
                success: function(response) {
                    // success function is called when data came back
                    // for example: get your content and display it on your site
                    //alert(response);
                }
});
        }
 });
		/*$('#table_name').change(function(){
			var table_name = $('#table_name').val();
			window.location = "<?php echo site_url('admin/employee_directory/index');?>/"+table_name;

		});*/

             $('#table-example').dataTable( {
				"aoColumnDefs": [
				 { 'bSortable': false, 'aTargets': [0,3,,5,6] }
			]
				});
		$('a.import-window').click(function() {

			$("#import").dialog({
				//height:300,
				width : 550
			});
		});

		$('a.description-window').click(function(){
		var id = $(this).attr('id');
		//console.log(id);
		$( "#dialog_"+id ).dialog({
			width:400
		});
		});
		$('.checkall').click(function (){
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
<div id="main_content" style="padding:0px">
	<?php if($this->session->flashdata('success')){
	?>
	<div class="alert success">
		<span class="icon"></span><span class="hide">x</span><strong>Success</strong>
			<?php echo $this -> session -> flashdata('success'); ?>
	</div>
			<?php }else if($this->session->flashdata('error')){ ?>
	<div class="alert error">
		<span class="icon"></span><span class="hide">x</span><strong>Error</strong>
			<?php echo $this -> session -> flashdata('error'); ?>
	</div>
			<?php } ?>

	<h2 class="grid_12">Employees Details
		<div style="float:right;margin-right:5%;">
				<!-- <a href="<?php echo site_url('admin/create_table'); ?>"><font size=2>Create Table</font></a> -->
			<a href="#import-box" class="import-window"><font size=2>Import Data</font></a>
				&nbsp;| &nbsp;
			<a href="<?php echo site_url('admin/employee_directory/add/');?>"><font size=2>Add Employee</font></a>
		</div>
	</h2>

	<div class="import" id="import" title="Import data" style="display:none;">
		<div style="border:1px solid #ddd;color:#ff0000;margin-bottom:10%;">
			<p><h4>Instructions for preparing excel:</h4></p>
			<p>Refer demo excel file in 'upload/record/ci_test.xls'</p>
			<br/>

			<ul>
				<li>File name should be same as table_name.xls</li>
				<li>First row with field names.</li>
				<li>Leave 1 row blank.</li>
				<li>Then start records values and no row should be left blank in between that.</li>
			</ul>
		</div>
					<!-- <center><b><u>Add New Image</u></b></center> -->
		<table style="vertical-align:none;">

			<?php echo form_open_multipart('admin/employee_directory/import_record', array('class' => 'validate')); ?>

			<tr style="vertical-align:none;">
				<td style="vertical-align: none !important;width:150px;">Record Excelsheet : </td>
				<td style="vertical-align: none !important;">
					<input type="file" name="userfile" id="userfile" class="required" />
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type="submit" class="submit" id="submit" value="Submit"/></td>
			</tr>
			<?php echo form_close(); ?>

		</table>
	</div>
	<div class="clear"></div>

		<div class="grid_12">
			<div class="box">
				<div class="header">
					<img src="<?php echo base_url(); ?>/design/Template/img/icons/packs/fugue/16x16/user-business-boss.png" width="16" height="16">
					<h3>Employees</h3><span></span>
				</div>
				<div class="content">

					<?php //echo form_open('admin/delete_multiple_products'); ?>

					<form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
						<thead>

						<th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
						<th>EMPLOYEE CODE</th>
						<th>NAME</th>
						<th>EMPLOYEE DETAILS</th>

						<th>EXTN</th>
						<th>PUBLISH</th>
						<th>ACTIONS</th>


						</thead>
						<tbody>
						<?php $x = 1 ;?>
						<?php //foreach($articles as $article):?>
						<?php foreach($records as $record):?>
						<tr>
						<td><input type="checkbox" class = 'chkbox' id="chkbox" name='delete[]' value='<?php echo $record['id'];?>'/></td>
						<td><?php echo $record['emp_id'];?></td>

						 <td>
						<?php echo $record['name']; ?>
						</td>

						<td>
						<a href="#" class="view-answer" id="<?php echo $record['id']; ?>">View</a>
						<div class="dialog" id="dialog_<?php echo $record['id']; ?>" title="<?php echo $record['name']; ?>"  style="display:none;">
						<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
						<?php if($record['email']!=''){ ?>
						<tr>
							<td><span style="font-size:14px"><strong>EMAIL ID</strong></span></td>
							<td><span style="font-size:14px"><?php echo $record['email']; ?></span></td>
						</tr>
							<?php }?>
						<?php if($record['dob']!=''){ ?>
						<tr>
							<td><span style="font-size:14px"><strong>DATE OF BIRTH </strong></span></td>
							<td><span style="font-size:14px"> <?php echo date('d M Y',strtotime($record['dob'])); ?></span></td>
						</tr>
							<?php }?>
						<?php if($record['department']!=''){ ?>
							<tr>
							<td><span style="font-size:14px"> <strong>&nbsp;DEPARTMENT</strong></span></td>
							<td><span style="font-size:14px"><?php echo $record['department']; ?></span></td>
						</tr>
							<?php }?>
						<?php if($record['designation']!=''){ ?>
						<tr>
							<td>
							<span style="font-size:14px"><strong>DESIGNATION</strong></span></td>
							<td><span style="font-size:14px"><?php echo $record['designation']; ?></span></td>
						</tr>
							<?php }?>
						<?php if($record['company']!=''){ ?>
							<tr>
							<td><span style="font-size:14px"><strong>COMPANY</strong></span></td>
							<td><span style="font-size:14px"><?php echo $record['company']; ?></span></td>
						</tr>
							<?php }?>
						<?php if($record['floor']!=''){ ?>
						<tr>
							<td><span style="font-size:14px"><strong>FLOOR</strong></span></td>
							<td><span style="font-size:14px"><?php echo $record['floor']; ?></span></td>
						</tr>
							<?php }?>
						<?php if($record['location']!=''){ ?>
							<tr>
							<td><span style="font-size:14px"><strong>LOCATION</strong></span></td>
							<td><span style="font-size:14px"><?php echo $record['location']; ?></span></td>
						</tr>
							<?php }?>
					</table>
						</td>


						<td>
							<?php echo $record['extn']; ?>
						</td>
						 <td>
                                  <input type="checkbox"  class="status" id="<?php echo  $record['id'];?>" name="status" value='<?php echo  $record['id'];?>'
                                    <?php if($record['status']=='1'){?>checked<?php }?>>
                                    </td>

						<td>
						<a title="Edit Item" href="<?php echo site_url('admin/employee_directory/edit/'.$record['id']);?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/019.png'/></a>&nbsp; | &nbsp;
						 <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/employee_directory/delete/".$record['id']); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
						</td>

						</tr>
						<?php endforeach;?>

						<?php //endforeach;?>
						</tbody>
						</table><?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['employee_directory'])&& in_array(3,$priv['employee_directory'])){
						?>
                       <?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>
					   <?php } ?> </form>
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





