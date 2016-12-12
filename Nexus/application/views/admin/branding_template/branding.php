<script>
	$(document).ready(function() {
		$(".status").live("click", function(){
			var id=$(this).val();
			var baseURL = "<?php echo base_url();?>";
			if($(this).is(":checked")) {
				$.ajax({
					type: "POST",
					dataType: "json",
					url: baseURL+"admin/branding_template/set_status/"+id,
					success: function(response) {

					}
				});

			} else {

				$.ajax({
					type: "POST",
					dataType: "json",
					url: baseURL+"admin/branding_template/unset_status/"+id,
					success: function(response) {

					}
				});
			}
		});
		$('.checkall').click(function () {
		    if ($(this).attr('checked')=='checked'){
		        $('input:checkbox.chkbox').attr('checked', 'checked');
		    }
		    else{
		        $('input:checkbox.chkbox').removeAttr('checked');
		    }
	    });
		$('#table-example').dataTable( {
			"aoColumnDefs": [
				{ 'bSortable': false, 'aTargets': [0,2,3,4] }
			]
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

            <h2 class="grid_12">Branding Templates
                <div style="float:right;margin-right:5%;">
                    <a href="<?php echo site_url('admin/branding_template/add') ?>"><font size=2>Add Branding Template</font></a>
                </div></h2>
            <div class="grid_12">
                <div class="box">
                    <div class="header">
                        <img src="<?php echo base_url(); ?>/design/Template/img/icons/packs/fugue/16x16/shadeless/photo-album.png" width="16" height="16">
                        <h3>Branding Templates</h3><span></span>
                    </div>
                    <div class="content">

                        <?php //echo form_open('admin/delete_multiple_products'); ?>
						<form name="frmproducts" id="frmproducts" method="post">
                        <table id="table-example" class="table">
                            <thead>
                                <tr>
                                    <th><input  type="checkbox" class = 'checkall' id="checkall"/></th>
                                    <th>Sr.No.</th>
                                    <th>TEMPLATE</th>
                                    <th>PUBLISH</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1; ?>
                                <?php //foreach($articles as $article):?>
                                <?php foreach ($brandingDetails as $branding): ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $branding['id']; ?>" name="delete[]" class="chkbox"></td>
                                        <td><?php echo $x++; ?></td>


                                       <!-- <td style="text-align:justify;">
                                            <?php echo $thought['description']; ?>
                                        </td>-->

										<?php if($branding['img']!=''){?>
									<td><img src="<?php echo base_url();?>files/<?php echo $branding['img'];?>" width="50" height="50"></td>
									<?php }else{?>
									<td><img src="<?php echo site_url();?>public/images/no-images.jpg" width="50" height="50"></td>
									<?php } ?>
								<td>
                                            <input type="checkbox"  class="status" id="<?php echo  $branding['id'];?>" name="status" value='<?php echo  $branding['id'];?>'
											<?php if($branding['status']=='1'){?>checked<?php }?>>
                                        </td>
										 <td>
                                            <a title="Edit Item" href="<?php echo site_url('admin/branding_template/edit/'. $branding['id']); ?>"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/019.png'/></a>&nbsp; | &nbsp;
                                            <a class="delete tooltip" href="javascript: void(0)'" title="Delete Item" onclick="javascript : deleteConfirm('<?php echo site_url("admin/branding_template/delete/".$branding['id']); ?>');"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
						<?php $priv = $this->session->userdata('privileges');

						if($priv=='All') {?>
<?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>

					   <?php } else if(is_array($priv['approve_authority'])&& in_array(3,$priv['approve_authority'])){
						?>
                       <?php echo form_button(array('name'=>'mysubmit','id'=>'mysubmit'), 'Delete');?>
					   <?php } ?>
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



