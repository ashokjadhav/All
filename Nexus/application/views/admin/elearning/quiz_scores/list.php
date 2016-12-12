<script>
 $(document).ready(function() {
     $('#table_name').change(function(){
			var table_name = $('#table_name').val();
			window.location = "<?php echo site_url('admin/quiz_scores/index');?>/"+table_name;
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
                url: baseURL+"admin/quiz_scores/set_status/"+id,
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
                url: baseURL+"admin/quiz_scores/unset_status/"+id,
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
				 { 'bSortable': false, 'aTargets': [0,3,6,7] }
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
					<option value="<?php echo $category['id'];?>" <?php if($category['id']==$table)echo 'selected';?>><?php echo $category['name'];?></option>
				<?php }?>
			</select>
            <h2 class="grid_12">Score Listing
              </h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>public/images/user-business-boss.png" width="16" height="16">
                        <h3>Scores</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
			<form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
                                    <th>Sr.No.</th>
									<th>EMP.CODE</th>
									<th>NAME</th>
									<th>DESIGNATION</th>
									<th>DEPARTMENT</th>
									<th>SCORE DETAILS</th>
									<th>PUBLISH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>

                                <?php foreach ($scoresdetails as $score): ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $score['id']; ?>" name="delete[]" class="chkbox"></td>
                                       <td><?php echo $x++;?></td>
										<td>
                                            <?php echo $score['emp_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $score['name']; ?>
                                        </td>
                                       
										<td>
                                            <?php echo $score['designation']; ?>
                                        </td>

										<td>
                                            <?php echo $score['department']; ?>
                                        </td>

                                        <td>
										<a href="#" class="view-answer" id="<?php echo $score['id']; ?>">View</a>
										<div class="dialog" id="dialog_<?php echo $score['id']; ?>" title="<?php echo $score['name']; ?>"  style="display:none;">
	<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
		<tr>									
			<td><span style="font-size:14px"><strong>QUIZ SUBCATEGORY</strong></span></td>
			<td><span style="font-size:14px"><?php echo $score['subcategory']; ?></span></td>
		</tr>
		<tr>
			<td><span style="font-size:14px"><strong>SCORE</strong></span></td>
			<td><span style="font-size:14px"><?php echo $score['score']; ?></span></td>
		</tr>
	</table>
										</td>
										<td>
                                            <input type="checkbox"  class="status" id="<?php echo  $score['id'];?>" name="status" value='<?php echo  $score['id'];?>'
											<?php if($score['status']=='1'){?>checked<?php }?>>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['quiz_scores'])&& in_array(3,$priv['quiz_scores'])){
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