<script>
 $(document).ready(function() {
     $('#table_name').change(function(){
      var table_name = $('#table_name').val();
      window.location = "<?php echo site_url('admin/hotel_requests/index');?>/"+table_name;
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

 $('#table-example').dataTable( {
				"aoColumnDefs": [
				 { 'bSortable': false, 'aTargets': [0,5,6] }
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
          <option value="book_hotel" <?php if($table=='book_hotel'){echo 'selected';}?>>HOTEL</option>
		  <option value="book_guesthouse" <?php if($table=='book_guesthouse'){echo 'selected';}?>>GUESTHOUSE</option>
      </select>
            <h2 class="grid_12">Requests Listing
                <div style="float:right;margin-right:5%;">
    </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>public/images/user-business-boss.png" width="16" height="16">
                        <h3>Travel Request</h3><span></span>
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
                                    <th>REQUEST DETAILS</th>
                                     <th>ACTION</th>
									 </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php //foreach($articles as $article):?>
                                <?php foreach ($requests_managementDetails as $request): ?>
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
										<a href="#" class="view-answer" id="<?php echo $request['id']; ?>">View</a>
										<div class="dialog" id="dialog_<?php echo $request['id']; ?>" title="<?php echo $request['name']; ?>"  style="display:none;">
										<ul style='list-style-type:circle;'>


	<li><p><span style="font-size:14px"><strong>&nbsp;PLACE OF STAY:&nbsp;&nbsp; </strong><span style="font-size:14px"><?php echo $request['stayplace']; ?></span></li>

	<li><p><span style="font-size:14px"><strong>&nbsp;CHECKIN DATE:&nbsp;&nbsp; </strong><span style="font-size:14px"><?php echo $request['checkin_date']; ?></span></li>
	<li><p><span style="font-size:14px"><strong>&nbsp;CHECKOUT DATE:&nbsp;&nbsp; </strong><span style="font-size:14px"><?php echo $request['checkout_date']; ?></span></li>
	<li><p><span style="font-size:14px"><strong>&nbsp;SPECIAL INSTRUCTIONS:&nbsp;&nbsp; </strong><span style="font-size:14px"><?php echo $request['instructions']; ?></span></li>
	</ul>
	 <form id="request" method="post" class="validate" action="<?php echo site_url('admin/hotel_requests/update/'.$table);?>" enctype="multipart/form-data">
   <input type="hidden" name="id" id="id"  value="<?php echo $request['id'];  ?>"/>
   CODE NO.: <input type="text" name="ticketnumber" id="ticketnumber" class="required"/>
    <input type="submit" id="submit" name="submit" value="SUBMIT"/>
	 </form>

                                        </td>
										<td>
										<a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/hotel_requests/delete/".$request['id'].'/'.$table);?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
										</td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>




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