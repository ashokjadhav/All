<article class="content-box minimizer" id="category_article">
	<header>
		<h2>PROJECT CATEGORY</h2>
		<nav>
			<ul class="tab-switch">
				<li><a class="tooltip" href="<?php echo base_url().'index.php/admin/project_category'; ?>"  id="list" title="List" >LIST</a></li>
				<li><a  class="tooltip" href="<?php echo base_url().'index.php/admin/project_category/add'; ?>" title="Add" id="Add New Category" >ADD</a></li>
			</ul>
		</nav>
	</header>
	<section>
	<?php if($this->uri->segment(3) == 'add') { ?>
	<div> 
		<form class="horizontal-form" action="<?php echo base_url().'index.php/admin/project_category/add';?>" method="post">
			<fieldset>
				<legend>ADD PROJECT CATEGORY</legend>
				<dl>
					<dt><label>PROJECT CATEGORY NAME : <span>*</span></label></dt>
					<dd><input type="text" class="high" name="txt_title">
					<?php echo form_error('txt_title', '<div class="error">', '</div>'); ?></dd>

					<!--<dt><label>MAIN MENU : <span>*</span></label></dt>
					<dd><select name="selmenu" id="selmenu"><option value="-1"></option>
					<?php foreach($items as $item){?>
						<option value="<?php echo $item['menu_id']?>"><?php echo $item['menu_title'];?></option>
						<?php } ?></select>
						<?php echo form_error('selmenu', '<div class="error">', '</div>'); ?>
					</dd>

					<dt><label>CATEGORY : <span>*</span></label></dt>
					<dd><select name="selcat[]" id="selcat" multiple="multiple" style="width:160px;">
						<option value="-1"></option>
					</select>
					<?php echo form_error('selcat', '<div class="error">', '</div>'); ?>
					</dd>-->

					<dt><label>DISPLAY STATUS</label></dt>
					<dd><input type="checkbox" name="display_status" id="display_Status" value="1"></dd>

				</dl>
			</fieldset>
			<input type="submit" name="submit" value="ADD">&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url().'index.php/admin/project_category'; ?>">Cancel</a>
		</form >
	</div>
	<?php } if($this->uri->segment(2)  && !($this->uri->segment(3) == 'add') && !($this->uri->segment(3) == 'edit')) { ?>
	<div>
		<h3 class="clearfix">PROJECT CATEGORY List</h3>
		<table>
			<thead>
				<tr>
					<th>Sr.no.</th>

					<th>PROJECT CATEGORY</th>

					

					<th>IMAGES</th>
					<th>PDF</th>

					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($List as $off_set ){ ?>
				<tr id="row_<?php echo $off_set['subcat_id']; ?>">

					<td><?php echo $i; ?></td>

					<td><?php echo $off_set['subcat_title']; ?></td>

					

					<td>
						<a href="<?php echo base_url().'index.php/admin/project_category/project_preview_img/'.$off_set['subcat_id']; ?>" class="view tooltip" original-title="view current images">
							<img src="<?php echo base_url(); ?>public/admin/img/icons/buttons/image2_2.png">
						</a>
					</td>
					<td>
						<a href="<?php echo base_url().'index.php/admin/projects/index/'.$off_set['subcat_id']; ?>" class="view tooltip" original-title="view current Videos">
							<img src="<?php echo base_url(); ?>public/admin/img/icons/buttons/image2_2.png">
						</a>
					</td>

					<td>
						<ul class="actions">
							<li><a href="<?php echo base_url().'index.php/admin/animationsubcategory/add/'.$off_set['subcat_id'] ; ?>" class="add tooltip" original-title="Add PDF">Add Videos</a></li>

							<li><a href="<?php echo base_url().'index.php/admin/subcategory/project_add_img/'.$off_set['subcat_id'] ; ?>" class="add tooltip" original-title="Add Images">Add Images</a></li>

							<li><a title="Edit Sub Category" class="edit tooltip" id="useredit" href="<?php echo base_url().'index.php/admin/subcategory/edit/'. $off_set['subcat_id']; ?>"> edit</a></li>

							<li><a title="Delete Sub Category" class="delete tooltip" name="<?php echo $off_set['subcat_id']; ?>" href="javascript:void(0);" title="Delete"> delete</a></li>

						</ul>
					</td>
				</tr>
				<?php $i++; }  ?>
			</tbody>
			<tfoot>
				<thead>
					<th>Sr.no.</th>

					<th>PROJECT CATEGORY</th>

					
					<th>IMAGES</th>
					<th>PDF</th>

					<th>ACTION</th>
				</thead>
				<tr>
					<td colspan="9"><?php echo $links;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
	<?php } if($this->uri->segment(3) == 'edit') { 
					
		$selectedcat = explode(',',$List[0]['category_id']);

	echo '<div>';

	$mandatory = array('class' => 'mandatory');

	$title = array('class' => 'high','name'=> 'edit_txt_title','value'=> $List[0]['subcat_title'],);

	$select_menu = 'id="select_menu"';	
	
	$select_cat = 'id="select_cat" multiple="multiple" style="width:160px;" ';	

	if($List[0]['display_status'] == 1 ){ $checked = "checked" ; } else { $checked = ""; }

	$data = array(
		'name'        => 'edit_display_status',
		'id'          => 'edit_display_status',
		'value'       => '1',
		'checked'	  => $checked
	);	

	echo form_open_multipart('/admin/project_category/edit/'.$List[0]['subcat_id']);

	echo form_fieldset('EDIT PROJECT-CATEGORY');

	echo '<dl><dt>'.form_label('PROJECT-CATEGORY NAME','titlez').'</dt>';

	echo '<dd>'.form_input($title).form_error('edit_txt_title','<div class="error">','</div>').'</dd>';

	/*echo '<dt>'.form_label('MAIN MENU','MM').'</dt>';

	$drpArray=array();

	foreach($items as $value){
		$drpArray[$value['menu_id']]=$value['menu_title'];
	}

	echo '<dd>'.form_dropdown('select_menu',$drpArray,$List[0]['menu_id'],$select_menu).form_error('select_name','<div class="error">','</div>').'</dd>';

	echo '<dt>'.form_label('CATEGORY','Cat').'</dt>';

	$drpArray=array();

	foreach($cat as $cats){
			$drpArray[$cats['category_id']]= $cats['category_title'];
		}

	echo '<dd>'.form_dropdown('select_cat[]',$drpArray,$selectedcat[0],$select_cat).form_error('select_cat','<div class="error">','</div>').'</dd>';*/

	echo '<dt>'.form_label('DISPLAY STATUS').'</dt>';

	echo '<dd>'.form_checkbox($data).'</dd>';

	echo form_submit('Submit','UPDATE');

	echo '&nbsp;&nbsp;&nbsp;<a href="'.base_url().'index.php/admin/project_category">Cancel</a></dl>';

	echo form_fieldset_close();

	echo form_close();

	echo '</div>';
	 } ?>
	 </section>	
</article>
<script type="text/javascript">

	

	

$(".delete").live('click',function(){

	id = $(this).attr('name');

	if(confirm("Are you Sure You want to delete this Project Category Menu?")){

		$.ajax({
			url: '<?php echo base_url();?>index.php/admin/project_category/delete',
			type: 'POST',
			data:{'cat_menu_id':id},
			success: function(response) {
				$('#row_'+id).remove();
			}
		});
	}

});

</script>