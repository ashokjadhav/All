<script>
 $(document).ready(function() {
     $('#table_name').change(function(){
      var table_name = $('#table_name').val();
      window.location = "<?php echo site_url('admin/ticket_cancelled/index');?>/"+table_name;
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

        var id=$(this).val();
		var baseURL = "<?php echo base_url();?>";
        if($(this).is(":checked")) {
            //alert(id);
            // checkbox is checked -> do something
        $.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/category/set_status/"+id,
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
                url: baseURL+"admin/category/unset_status/"+id,
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
				 { 'bSortable': false, 'aTargets': [0,3,4,5,6,7] }
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
  <option value="AIR" <?php if($table=='AIR'){echo 'selected';}?>>AIR</option>
  <option value="RAIL" <?php if($table=='RAIL'){echo 'selected';}?>>RAIL</option>
  <option value="ROAD" <?php if($table=='ROAD'){echo 'selected';}?>>ROAD</option>
  <option value="OTHERS" <?php if($table=='OTHERS'){echo 'selected';}?>>OTHERS</option>
</select>
<h2 class="grid_12">Cancel 
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
        <?php foreach ($cancelled_managementDetails as $request): ?>
            <tr>
               <td><input type="checkbox" value="<?php echo $request['id']; ?>" name="delete[]" class="chkbox"></td>
                <td><?php echo $x++; ?></td>
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
                <div class="dialog" id="dialog_<?php echo $request['id']; ?>" title="<?php echo $request['name']; ?>"  style="display:none;">
                <table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
                    <tr>
                        <th colspan="2">
                           TICKETS DETAILS      
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
                        <td><span style="font-size:14px"><strong>DATE OF TRAVEL </strong></span></td>
                        <td><span style="font-size:14px"><?php echo date('d M Y',  strtotime($request['travel_date'])); ?></span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size:14px"><strong>PURPOSE OF TRAVEL </strong></span></td>
                        <td><span style="font-size:14px"><?php echo $request['purpose']; ?></span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size:14px"><strong>PNR No.</strong></span></td>
                        <td><span style="font-size:14px"><?php echo $request['PNR']; ?></span></td>
                    </tr>
                    <tr>
                        <td><span style="font-size:14px"><strong>DATE OF REQUISITION </strong></span></td>
                        <td><span style="font-size:14px"><?php echo date('d M Y',  strtotime($request['created_date'])); ?></span></td>
                    </tr>
                </table>
	<?php
     if($request['hotel']!='0'){    ?>
	
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
</br>
<?php if($request['guesthouse']!='0'){?>

    <table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
    <tr>
        <th colspan="2">
                GUESTHOUSE REQUEST
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

                                        </td>
										<td>
										  <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/ticket_cancelled/delete/".$request['id']); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
										</td>
                                    </tr>
                                <?php endforeach;?>

                            </tbody>
                        </table>



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