<script>
 $(document).ready(function() { 
     $('#table_name').change(function(){
			var table_name = $('#table_name').val();
			window.location = "<?php echo site_url('admin/borrowed/index');?>/"+table_name;
		})
			$('.checkall').click(function () {  
		    if ($(this).attr('checked')=='checked')
		    {        
		        $('input:checkbox').attr('checked', 'checked');
		    }
		    else
		    {
		        $('input:checkbox').removeAttr('checked');
		    }
	    });
  $('#mysubmit').click(function(){
  
    if(confirm('Do you want to Delete?')){ $('#frmproducts').submit(); }
  });
  
  $("#lost").live("click", function(){
     
        var status=$('#status').val();
		var id=$('#borrowid').val();
		var baseURL = "<?php echo base_url();?>";
		var category=$('#category').val();
		//alert(category);
		if(status=='pending')
	  {
			status='lost';
			 $.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/borrowed/set_lost_status/"+id+'/'+status+'/'+category	,
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
				 { 'bSortable': false, 'aTargets': [1,6,7] }
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
            <h2 class="grid_12">Borrower List
                <div style="float:right;margin-right:5%;">
				<!-- <a href="<?php echo site_url('admin/create_table'); ?>"><font size=2>Create Table</font></a> -->
			<a href="<?php echo site_url('admin/lending_management/index/'.$table);?>" class=""><font size=2>Requests</font></a>
				&nbsp;| &nbsp;
				<a href="<?php echo site_url('admin/borrowed/index/'.$table);?>" class=""><font size=2>View Borrowed</font></a>
				&nbsp;| &nbsp;
				<a href="<?php echo site_url('admin/returned/index/'.$table);?>" class=""><font size=2>View Returned</font></a>
				&nbsp;| &nbsp;
			<a href="<?php echo site_url('admin/lost/index/'.$table);?>"><font size=2>View Lost</font></a>
		</div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>public/images/user-business-boss.png" width="16" height="16">
                        <h3>Resource</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
      <form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <!--<th><input  type="checkbox" class = 'checkall' id="checkall"/></th> -->
                                    <th>Sr.No.</th>
									<th>RESOURCE DETAILS</th>
									<th>SUBSCIBER'S NAME</th>
									<th>DEPARTMENT</th>
                                    <th>DATE OF BORROW</th>
								    <th>DUE DATE</th>
									
									<th>STATUS</th>
									
									<th>ACTION</th>
									
	                            </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                               
                                <?php foreach ($borrowedDetails as $borrow): ?>  
                                    <tr>
                                       <!--<td><input type="checkbox" value="<?php echo $borrow['id']; ?>" name="delete[]"></td>-->
                                        <td><?php echo $x++; ?></td>
                                         <td>
                                           <a href="#" class="view-answer" id="<?php echo $borrow['id']; ?>">View</a>
					<div class="dialog" id="dialog_<?php echo $borrow['id']; ?>" title="<?php echo $borrow['name']; ?>"  style="display:none;">
			<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
				<tr>
					<td><span style="font-size:14px"><strong>RESOURCE CATEGORY</strong></span></td>
					<td><span style="font-size:14px"><?php echo $borrow['category']; ?></span></td>
				</tr>
				<tr>
					<td><span style="font-size:14px"><strong>CODE NUMBER</strong></span></td>
					<td><span style="font-size:14px"><?php echo $borrow['code']; ?></span></td>
				</tr>
		   </table>					
                                        </td>
                                        
                                       
                                        <td>
                                            <?php echo $borrow['subscriber']; ?>
                                        </td>
                                       
                                        <td>
                                            <?php echo $borrow['department']; ?>
                                        </td>
                                        <td>
                                            <?php echo $borrow['dos']; ?>
                                        </td>
										<td>
                                            <?php echo $borrow['due_date']; ?>
                                        </td>
										
										<td>
                                            <?php echo $borrow['borrow_status']; ?>
											
                                        </td>
										<td>
                                          <a href="<?php echo site_url('admin/borrowed/set_status/'.$borrow['id'].'/'.$borrow['category'].'/'.$borrow['resource_id']);?>" class=""><font size=2>Return</font></a> 
										  &nbsp;| &nbsp;
										  <a href="<?php echo site_url('admin/borrowed/set_lost_status/'.$borrow['id'].'/'.$borrow['category'].'/'.$borrow['resource_id']);?>" class=""><font size=2>Lost</font></a>  
										</td>
										

										
                                       
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!--<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>-->
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