<script>
 $(document).ready(function() {
     $('#table_name').change(function(){
			var table_name = $('#table_name').val();
			window.location = "<?php echo site_url('admin/elearning_quiz/index');?>/"+table_name;
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
                url: baseURL+"admin/elearning_quiz/set_status/"+id+'/'+table_name,
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
                url: baseURL+"admin/elearning_quiz/unset_status/"+id+'/'+table_name,
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

				<?php foreach($categorydetails as $category){?>
					<option value="<?php echo $category['id'];?>" <?php
					if($category['id']==$table)echo 'selected';?>><?php echo $category['name'];?></option>
				<?php }?>
			</select>
            <h2 class="grid_12">Quiz Listing
                <div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/elearning_quiz/add/'.$table);?>"><font size=2>Add Question</font></a>
                </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>public/images/user-business-boss.png" width="16" height="16">
                        <h3>Question</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
			<form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
                                    <th>Sr.No.</th>
									<th>SUB-CATEGORY</th>
									<th>QUESTION DETAILS</th>
									<th>PUBLISH</th>
									<th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php //foreach($articles as $article):?>
                                <?php foreach ($questionsDetails as $question): ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $question['id']; ?>" name="delete[]" class="chkbox"></td>
                                       <td><?php echo $x++;?></td>
										<td>
                                            <?php echo $question['sub_category']; ?>
                                        </td>

                                        <td>
										<a href="#" class="view-answer" id="<?php echo $question['id']; ?>">View</a>
										<div class="dialog" id="dialog_<?php echo $question['id']; ?>" title="<?php echo $question['question']; ?>"  style="display:none;">
	<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
		<tr>								
			<td><span style="font-size:14px"><strong>1</strong></span></td>
			<td><span style="font-size:14px"><?php echo $question['answer1']; ?></span></td>
		</tr>
		<tr>
			<td><span style="font-size:14px"><strong>2</strong></span></td>
			<td><span style="font-size:14px"> <?php echo $question['answer2']; ?></span></td>
		</tr>
		<tr>
			<td><span style="font-size:14px"><strong>3</strong></span></td>
			<td><span style="font-size:14px"><?php echo $question['answer3']; ?></span></td>
		</tr>
		<tr>
			<td><span style="font-size:14px"><strong>4</strong></span></td>
			<td><span style="font-size:14px"><?php echo $question['answer4']; ?></span></td>
		</tr>
		
	</table>
	<table  class="table" bgcolor=#bebebe border=1 width=80% height=80%>
		<tr>
			<td><span style="font-size:16px"><strong>Correct Option</strong></span></td>
			<td><span style="font-size:16px;color:red""><?php echo $question['answer']; ?></span></td>
		</tr>
	</table>
		
										</td>
										<td>
                                            <input type="checkbox"  class="status" id="<?php echo  $question['id'];?>" name="status" value='<?php echo  $question['id'];?>'
											<?php if($question['status']=='1'){?>checked<?php }?>>
                                        </td>
                                        <td>
						<a title="Edit Item" href="<?php echo site_url('admin/elearning_quiz/edit/'.$question['id'].'/'.$table);?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/019.png'/></a>&nbsp; | &nbsp;
						 <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/elearning_quiz/delete/".$question['id'].'/'.$table); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
						</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
<?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['elearning_quiz'])&& in_array(3,$priv['elearning_quiz'])){
						?>
                       <?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>
					   <?php } ?> </form>
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