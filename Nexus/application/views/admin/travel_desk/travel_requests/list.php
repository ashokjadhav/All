<script>
$(document).ready(function() {
	var baseURL = "<?php echo base_url();?>";
	$('#table_name').change(function(){
		var table_name = $('#table_name').val();
		window.location = "<?php echo site_url('admin/travel_requests/index');?>/"+table_name;
	})
	$('.checkall').click(function () {
		if ($(this).attr('checked')=='checked'){
			$('input:checkbox.chkbox').attr('checked', 'checked');
		}
		else{
			$('input:checkbox.chkbox').removeAttr('checked');
		}
	});
	$( ".approval" ).change(function() {
		var a = $(this).attr('id');
		var splitid = a.split('_');
		var id = splitid[1];
		var value = $(this).val();
		$.ajax({
			type: "POST",
			dataType: "json",
			url: baseURL+"admin/travel_requests/set_approval_status/"+id+"/"+value,
			success: function(response) {
				if(response.status =='1'){
					$('#bksts_'+id).show();
				}else{
					$('#bksts_'+id).hide();
				}
			}
		});
	});
	$('#mysubmit').click(function(){
		if(confirm('Do you want to Delete?')){
			var data = $('#frmproducts').serialize();
			var baseURL = "<?php echo base_url();?>";
			$.ajax({
				type: "post",
				url: baseURL+"admin/travel_requests/multi_delete_travelrequests",
				cache: false,
				data :data,
				success: function(){
					window.location.reload();
				}
			});
		}
	});
	$('#table-example').dataTable( {
		"aoColumnDefs": [
			{ 'bSortable': false, 'aTargets': [0,3,4,5,6,7] }
		]
	});
	$("select.status").change(function(){
		var id=$(this).attr('data-cid');
		var thisValue = $(this).val();
		if (thisValue != "2"){
			$("#hotel_"+id).hide();
			$("#guesthouse_"+id).hide();
			$("#pnr_"+id).hide();
		}
		if (thisValue == "2"){
			$("#hotel_"+id).show();
			$("#guesthouse_"+id).show();
			$("#pnr_"+id).show();
		}
	});
	$(".date").click(function(){
		var a = $(this).data('cid');
		var rev =$('#d_'+a).html();
		//alert(rev);
		$('#d_'+a).html('<input type="text" class="datepicker" id="datepicker_'+a+'">');
		$('.datepicker').datepicker({
			dateFormat: "yy-mm-dd",
			altField: "#" + $(this).attr('id'),
			changeMonth: true,
			changeYear: true,
			onSelect: function(date, instance) {
				$.ajax({
					type: "Post",
					url: baseURL+"admin/travel_requests/update_traveldate/"+a,
					data: "date="+date,
					success: function(result){
						$('#datepicker_'+a).remove();
						$('#d_'+a).text(result);
					}
				});  
			}
		});
		$('#rev_'+a).click(function(){
			$('#d_'+a).html(rev);
		});
	});

});

function deleteConfirm(url){
	if(confirm('Do you want to Delete?')){
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
<option value="AIR" <?php if($table=='AIR'){echo 'selected';}?>>AIR</option>
<option value="RAIL" <?php if($table=='RAIL'){echo 'selected';}?>>RAIL</option>
<option value="ROAD" <?php if($table=='ROAD'){echo 'selected';}?>>ROAD</option>
<option value="OTHERS" <?php if($table=='OTHERS'){echo 'selected';}?>>OTHERS</option>
</select>
<h2 class="grid_12">Book
<div style="float:right;margin-right:5%;">
<a href="<?php echo site_url('admin/travel_requests/index/'.$table);?>" class=""><font size=2>Book Ticket Request</font></a>
&nbsp;| &nbsp;
<a href="<?php echo site_url('admin/ticket_modified/index/'.$table);?>" class=""><font size=2>Modify Ticket Request</font></a>
&nbsp;| &nbsp;
<a href="<?php echo site_url('admin/ticket_cancelled/index/'.$table);?>" class=""><font size=2>Cancel Ticket Request</font></a>
&nbsp;| &nbsp;
<a href="<?php echo site_url('admin/ticket_approved/index/'.$table);?>" class=""><font size=2>Booked Tickets</font></a>
</div>
</h2>
<div class="grid_12">
<div class="box">
<div class="header">
<img src="<?php echo base_url(); ?>public/images/user-business-boss.png" width="16" height="16">
<h3>Ticket Request</h3><span></span>
</div>
<div class="content">
<?php //echo form_open('admin/delete_multiple_products'); ?>
<!--<form name="frmproducts" id="frmproducts" method="post">-->
<table id="table-example" class="table">
<thead>
<tr>
<th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
<th>Sr.No.</th>
<th>NAME</th>
<th>DESIGNATION</th>
<th>DEPARTMENT</th>
<th>BAND & GRADE</th>
<th>REQUEST DETAILS</th>
<th>ACTION</th>
</tr>
</thead>
<tbody>
<?php $x = 1; ?>
<?php //foreach($articles as $article):?>
<?php foreach ($requests_managementDetails as $request){?>
<tr>
<td>
<input type="checkbox" value="<?php echo $request['id']; ?>" name="delete[]" class="chkbox">
</td>
<td>
<?php echo $x++; ?>
</td>
<td>
<?php echo $request['name']; ?>
</td>
<td>
<?php echo $request['designation']; ?>
</td>
<td>
<?php echo $request['department']; ?>
</td>
<td>
<?php echo $request['band_grade']; ?>
</td>
<td>
<a href="#" class="view-answer" id="<?php echo $request['id']; ?>">View</a>
<div class="dialog"  id="dialog_<?php echo $request['id']; ?>" title="<?php echo $request['name']; ?>"  style="display:none;">

<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
<tr>
<th colspan="2">
BOOKING DETAILS
</th>
</tr>
<tr>
<td><span style="font-size:14px"><strong>FROM </strong></span></td>
<td><span style="font-size:14px"><?php echo $request['from']; ?></span></td>
</tr>
<tr>
<td><span style="font-size:14px"><strong>TO </strong></span></td>
<td><span style="font-size:14px"><?php echo $request['to']; ?></span></span></td>
</tr>
<tr>
<td id="rev_<?php echo $request['id'];?>"><span style="font-size:14px"><strong>DATE OF TRAVEL </strong></span></td>
<td><span style="font-size:14px" class="date" id="d_<?php echo $request['id'];?>" data-cid="<?php echo $request['id'];?>"><?php echo date('d M Y',  strtotime($request['travel_date'])); ?></span></td>
</tr>
<?php if($request['return_date']){?>
<tr>
<td><span style="font-size:14px"><strong>DATE OF RETURN </strong></span></td>
<td><span style="font-size:14px"><?php echo date('d M Y',  strtotime($request['return_date'])); ?></span></td>
</tr>
<?php }?>
<tr>
<td><span style="font-size:14px"><strong>PURPOSE OF TRAVEL </strong></span></td>
<td><span style="font-size:14px"><?php echo $request['purpose']; ?></span></td>
</tr>
<tr>
<td><span style="font-size:14px"><strong>DATE OF REQUISITION </strong></span></td>
<td><span style="font-size:14px"><?php echo date('d M Y',  strtotime($request['created_date'])); ?></span></td>
</tr>
</table>

<?php
if($request['hotel']!='0'){?>
<br>
<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
<tr>
<th colspan="2">
	HOTEL DETAILS
</th>
</tr>
<tr>
<td><span style="font-size:14px"><strong>STAY PLACE </strong></span></td>
<td><span style="font-size:14px"><?php echo $request['stayplace']; ?></span></td>
</tr>
<tr>
<td><span style="font-size:14px"><strong>CHECK IN DATE </strong></span></td>
<td><span style="font-size:14px"><?php echo date('d M Y',  strtotime($request['checkin_date'])); ?></span></span></td>
</tr>
<tr>
<td><span style="font-size:14px"><strong>CHECK OUT DATE </strong></span></td>
<td><span style="font-size:14px"><?php echo date('d M Y',  strtotime($request['checkout_date'])); ?></span></td>
</tr>
<tr>
<td><span style="font-size:14px"><strong>INSTRUCTIONS</strong></span></td>
<td><span style="font-size:14px"><?php echo $request['instructions']; ?></span></td>
</tr>

</table>

<?php }?>
<?php 
if($request['guesthouse']!='0'){?>
<br>
<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
<tr>
<th colspan="2">
GUESTHOUSE DETAILS
</th>
</tr>
<tr>
<td><span style="font-size:14px"><strong>STAY PLACE </strong></span></td>
<td><span style="font-size:14px"><?php echo $request['guest_place']; ?></span></td>
</tr>
<tr>
<td><span style="font-size:14px"><strong>CHECK IN DATE </strong></span></td>
<td><span style="font-size:14px"><?php echo date('d M Y',  strtotime($request['guest_checkin'])); ?></span></span></td>
</tr>
<tr>
<td><span style="font-size:14px"><strong>CHECK OUT DATE </strong></span></td>
<td><span style="font-size:14px"><?php echo date('d M Y',  strtotime($request['guest_checkout'])); ?></span></td>
</tr>
<tr>
<td><span style="font-size:14px"><strong>INSTRUCTIONS</strong></span></td>
<td><span style="font-size:14px"><?php echo $request['guest_instr']; ?></span></td>
</tr>

</table>
<?php }?>
<br>
<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
<tr>
<th colspan="2">
	APPROVAL
</th>
</tr>
<tr>
<td>
	<select style="width:300%;" id="book_<?php echo $request['id'];?>" class="approval" data-cid="">
		<option value="0">--Select--</option>
		<option value="1" 
<?php 
	if($request['approved_status']=='1'){echo 'selected';}?>
	>Approved</option>
	<option value="3"
<?php if($request['approved_status']=='3'){echo 'selected';}?>        
>Not Approved</option>
<option value="2"
<?php if($request['approved_status']=='2'){echo 'selected';}?>        
>Need To Discuss</option>
</select>
</td></tr> 
</table>
<br>
<form id="request" action="<?php echo site_url('admin/travel_requests/update/'.$table.'/'.$request['id']);?>" method="post"class="validate">
<div id='bksts_<?php echo $request['id'];?>' class='booking_status' 
<?php 
//echo $request['approved_status'];exit;
if($request['approved_status']!='1'){?>
style='display:none;'
<?php }?>>
<input type="hidden" name="id" id="id"  value="<?php echo $request['id'];?>"/>

<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
	<tr><th colspan="2">
		BOOKING STATUS
	</th></tr>
	<tr><td>
		<select style="width:300%;" id="status_<?php echo $request['id'];?>" name="status" class="status" data-cid="<?php echo $request['id'];?>">
			<option value="2">Booked</option>
			<option value="1">Canceled</option>
		</select>
	</td></tr>
	<tr><td>
		<label id="pnr_<?php echo $request['id'];?>">
		PNR NO.
		<input type="text" name="pnr" id="pnr" class="required"/>
		</label>
	</td></tr>
</table>
</div>
<input type="submit" id="submit" name="submit" value="SUBMIT"/>
</form>


</div>  
</td>

<td>
	<a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/travel_requests/delete/".$table.'/'.$request['id']); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>




<script defer src="<?php echo base_url(); ?>design/Template/js/mylibs/jquery-fallr-1.2.js"></script>
<script defer src="<?php echo base_url(); ?>design/Template/js/mylibs/jquery.dataTables.js"></script>

<script>


$(window).load(function () {
$('#table-example').dataTable();
$(window).resize();
});



</script>