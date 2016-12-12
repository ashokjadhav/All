<script>
 $(document).ready(function() {
     $('#table_name').change(function(){
      var table_name = $('#table_name').val();
      window.location = "<?php echo site_url('admin/lending_management/index');?>/"+table_name;
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
				 { 'bSortable': false, 'aTargets': [0,2,4,5,6,7,8] }
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
            <h2 class="grid_12">Request List
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

                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
                                    <th>Sr.No.</th>
                                    <th>RESOURCE DETAILS</th>
                                    <th>SUBSCIBER'S NAME</th>

                                    <th>DEPARTMENT</th>
                                    <th>DATE OF SUBSCRIPTION</th>
                    <th>DUE DATE</th>
                  <th>APPROVED</th>
				  <th>ACTIONS</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php //foreach($articles as $article):?>
                                <?php foreach ($lending_managementDetails as $resource): ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $resource['id']; ?>" name="delete[]" class="chkbox"></td>
                                        <td><?php echo $x++; ?></td>
										<td>
										<a href="#" class="view-answer" id="<?php echo $resource['id']; ?>">View</a>
										<div class="dialog" id="dialog_<?php echo $resource['id']; ?>" title="<?php echo $resource['name']; ?>"  style="display:none;">
		<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
			<tr>
				<td><span style="font-size:14px"><strong>RESOURCE CATEGORY</strong></span></td>
				<td><span style="font-size:14px"><?php echo $resource['category']; ?></span></td>
			</tr>
			<tr>
				<td><span style="font-size:14px"><strong>CODE NUMBER</strong></span></td>
				<td><span style="font-size:14px"><?php echo $resource['code']; ?></span></td>
			</tr>
		</table>

                                      </td>
                                        <td>
                                            <?php echo $resource['subscriber']; ?>
                                        </td>
                                        <td>
                                            <?php echo $resource['department']; ?>
                                        </td>
     <form id="request" method="post" class="validate" action="<?php echo site_url('admin/lending_management/edit/'.$resource['id']);?>" enctype="multipart/form-data">
        <input type="hidden" name="category" id="category"  value="<?php echo $resource['category'];  ?>"/>
        <input type="hidden" name="resource_id" id="resource_id"  value="<?php echo $resource['resource_id'];  ?>"/>
        <input type="hidden" name="user_id" id="user_id"  value="<?php echo $resource['user_id'];  ?>"/>

                                        <td>
                                          <input type="text" name="dos" id="dos_<?php echo $resource['id'];?>" class="dos" value="<?php echo $resource['dos'];  ?>"/>
                                        </td>
                    <td>
                                           <input type="text" name="due_date" id="due_date_<?php echo $resource['id'];?>" class="dos" value="<?php echo $resource['due_date']; ?>"/>
                                        </td>


                     <td>
                          <input type="submit" id="submit" name="submit" value="Borrow"/>
                                        </td>
               </form>
			   <td><a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/lending_management/delete/".$resource['id']); ?>');"><img src='<?php echo	base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a></td>


                                    </tr>
                                <?php endforeach; ?>
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