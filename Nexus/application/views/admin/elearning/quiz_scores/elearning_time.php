<script>
 $(document).ready(function() {
	  $('#table_name').change(function(){
      var table_name = $('#table_name').val();
      window.location = "<?php echo site_url('admin/elearning_totaltime/index');?>/"+table_name;
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
                url: baseURL+"admin/elearning_totaltime/set_status/"+id+"/"+table_name,
                success: function(response) {
                    var h=0;
					var i=0;
					var s=0;
					//console.log(response);
					$.each(response, function(p, item) {
					h= h +parseInt(item.h, 10);
					i= i +parseInt(item.i, 10);
					s= s +parseInt(item.s, 10);
						if(s>59){
							s = s-60;
							i = i+1;
						}
						if(i>59){
							i = i-60;
							h = h+1;
						}
					});
					$('#total').html();
					var a = $('#total').text();
					
					$('#total').text(h+' Hours '+i+' Minutes '+s+' Seconds');
                }
});

        } else {
			//alert(id);
            // checkbox is not checked -> do something different
			$.ajax({
                type: "POST",
                dataType: "json",
                url: baseURL+"admin/elearning_totaltime/unset_status/"+id+"/"+table_name,
                success: function(response) {
                    var h=0;
					var i=0;
					var s=0;
					//console.log(response);
					$.each(response, function(p, item) {
					h= h +parseInt(item.h, 10);
					i= i +parseInt(item.i, 10);
					s= s +parseInt(item.s, 10);
						if(s>59){
							s = s-60;
							i = i+1;
						}
						if(i>59){
							i = i-60;
							h = h+1;
						}
					});
					$('#total').html();
					var a = $('#total').text();
					
					$('#total').text(h+' Hours '+i+' Minutes '+s+' Seconds');
                }
});
        }
 });
 $('#table-example').dataTable( {
				"aoColumnDefs": [
				 { 'bSortable': false, 'aTargets': [0,3,4] }
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

        <?php foreach($employeeslist as $employee){?>
          <option value="<?php echo $employee['id'];?>" <?php if($employee['id']==$table)echo 'selected';?>><?php echo $employee['name'];?></option>
        <?php }?>
      </select>
            <h2 class="grid_12">Elearning Total Time
            </h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>public/images/user-business-boss.png" width="16" height="16">
                        <h3>Total Time Spent</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
			<form name="frmproducts" id="frmproducts" method="post">

                        <table id="table-example" class="table">
                            <thead>

                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
                                    <th>Sr.No.</th>
									<th>DATE</th>
									<th>TOTAL TIME</th>
									<th>PUBLISH</th>
                                </tr>
                            </thead>
							 <?php if($timesdetails){?>
                            <tbody>
                                <?php $x = 1; ?>
                               
                                <?php foreach ($timesdetails as $time): ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $time['id']; ?>" name="delete[]" class="chkbox"></td>
                                        <td><?php echo $x++; ?></td>

									  <td>
                                            <?php echo date('d M Y ',strtotime($time['login_date'])); ?>
                                        </td>
                                      <td>
                                            <?php echo $time['h'].' Hours '.$time['i'].' Minutes '.$time['s'].' Seconds '; ?>
                                        </td>
										<td>
                                            <input type="checkbox"  class="status" id="<?php echo  $time['id'];?>" name="status" value='<?php echo  $time['id'];?>'
											<?php if($time['status']=='1'){?>checked<?php }?>>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
								
                            </tbody>
							<tfoot>
								<tr>
									<th colspan='3'>TOTAL SPENT TIME</th>
									<th id='total'><?php if($elearning_time) {?>
										<p style="font-size:0.9em;">
										<?php
											$h=0;$i=0;$s=0;
											foreach ($elearning_time as $time) {
												$h+=$time['h'];
												$i+=$time['i'];
												$s+=$time['s'];
												if($s>59){
													$s = $s-60;
													$i = $i+1;
												}
												if($i>59){
													$i = $i-60;
													$h = $h+1;
												}

											}
											echo $h.' Hours '.$i.' Minutes '.$s.' Seconds ';?></p>
										<?php  }?>
									</th>
									<th></th>
								</tr>
                            </tfoot>
							<?php }?>
                        </table><?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['elearning_totaltime'])&& in_array(3,$priv['elearning_totaltime'])){
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