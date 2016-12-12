<head>
<style>

.alert {
  padding: 15px;
  margin-bottom: 20px;
  border: 1px solid #eed3d7;
  border-radius: 4px;
  position: fixed;
  bottom: 0px;
  right: 21px;
  /* Each alert has its own width */
  float: right;
  clear: right;
}

.alert-red {
  color: white;
  background-color: #DA4453;
}
.alert-green {
  color: white;
  background-color: #37BC9B;
}
.alert-blue {
  color: white;
  background-color: #4A89DC;
}
.alert-yellow {
  color: white;
  background-color: #F6BB42;
}
.alert-orange {
  color:white;
  background-color: #E9573F;
}
</style>
</head>
<script>
 $(document).ready(function() {
     $('.table_name').change(function(){
		 var cid = $(this).data('cid');
			var table_name = $('#table_name_'+cid).val();
			//alert(cid);
			//return false;
			window.location = "<?php echo site_url('library/index');?>/"+table_name;
		});
$('.table').change(function(){
		 //var cid = $(this).data('cid');
			var table_name = $('#table').val();
			//alert(table_name);
			//return false;
			window.location = "<?php echo site_url('library/index');?>/"+table_name;
		});
	ohSnap('Your Request for library resource goes to librarian..!!', 'green');
	});

</script>

<div class="inner_section">
    <div class="emp_listing_1 mb12">
	<?php if ($this->session->flashdata('success')) {
                ?><div id="ohsnap"></div><?php }?>
       <h3>library  <select id="table" class="table" style="float:right;width:30%;">
					<option value="">Select</option>
					<?php foreach($categories as $cat){
						 //print_r($subcat['sub_category']);

					?>

					<option value="<?php echo $cat['name'];?>" <?php
						if(urldecode($this->uri->segment(3))==$cat['name']){echo 'selected';}?>><?php echo str_replace('_', ' ',$cat['name']);?>
					</option>
							 <?php }?>
				</select></h3>
		<?php if($categoryitems){

		//echo $this->uri->segment(3);exit;?>

		<div class="Lib_heading">
		<?php echo str_replace('_', ' ', strtoupper($this->uri->segment(3)));?></div>
		 <div class="emp_det_list">
				<ul><?php if(!empty($categoryitems)){?>
				<?php foreach($categoryitems as $citem){
				?>
				<li>
                                    <div class="clearfix library_info_up">
                                        <div class="library_info">
                                            <span class="birt_name">Title : <?php echo $citem['name']?></span>
                                            <span class="birt_designation">Author Name : <?php echo $citem['author']?></span>
                                             <span class="catn">Category : <?php echo $citem['sub_category']?></span>
										</div>


                                    </div>
                                    <div class="clearfix bir_desc_down">
                                        <div class="birt_desc">
                                            <div>
                                                <span class="birt_designation">
                                                    publisher : <?php echo $citem['publisher']?>
                                                </span>
                                            </div>

                                            <div>
                                                <span class="birt_designation">
                                                   purchase date : <?php echo date('d M Y',strtotime($citem['dop']));?>
                                                </span>
                                            </div>
                                        </div><?php if($citem['borrow_status']=='return' || $citem['borrow_status']==''){?>
                                          <div class="availbvility">
                                            		<div class="sts">Status :  Available</div>
                                                    <div class="bkng"><a href="<?php echo site_url('library/hirenow/'.$citem['id'].'/'.$this->uri->segment(3).'/'.$this->session->userdata('site_userid'));?>"><img src="<?php echo site_url();?>/public/images/btn_hire.jpg"></a></div>
                                            </div>
                                    </div><?php }else{?><div class="availbvility">
                                            		<div class="sts">Status :  Not Available</div>
                                                    <div class="bkng"><a href="<?php echo site_url('library/hirenow/'.$citem['id'].'/'.$this->uri->segment(3).'/'.$this->session->userdata['site_userid']);?>"><img src="<?php echo site_url();?>/public/images/brn_booknow.jpg"></a></div>
                                            </div>
                                    </div>
									<?php }?>

                                </li><?php }}else{?>
								<li>
                           <div class="clearfix library_info_up">
                               <div class="library_info">
									<span class="birt_designation" >No Data found</span>
						   </div>
						   </div>
						</li><?php }?>

								<ul>
								</div>

		<?php }else{?>
	   <?php foreach($categories as $category){ ?>
			<div class="Lib_heading">
			<?php echo str_replace('_', ' ', strtoupper($category['name']));?>
				<select id="table_name_<?php echo $category['id']; ?>" data-cid="<?php echo $category['id']; ?>" class="table_name" style="float:right;width:30%;">
					<option value="">Select</option>
					<?php foreach($category['subcat'] as $subcat){
						 //print_r($subcat['sub_category']);

					?>

					<option value="<?php echo $subcat['sub_category'];?>" <?php
						if(urldecode($this->uri->segment(3))==$subcat['sub_category']){echo 'selected';}?>><?php echo $subcat['sub_category'];?>
					</option>
							 <?php }?>
				</select>
			</div>
            <div class="emp_det_list">
				<ul>
                 <?php if($category['cat']){
						 foreach($category['cat'] as $item){?>
                           <li>
                             <div class="clearfix library_info_up">
                                 <div class="library_info">
                                    <span class="birt_name">Title : <?php echo $item['name']?></span>
                                    <span class="birt_designation">Author Name : <?php echo $item['author']?></span>
                                    <span class="catn">Category : <?php echo $item['sub_category']?></span>
                                 </div>
                              </div>
                              <div class="clearfix bir_desc_down">
                                   <div class="birt_desc">
                                        <div>
                                             <span class="birt_designation">
                                                 publisher : <?php echo $item['publisher']?>
                                             </span>
                                        </div>

                                         <div>
                                               <span class="birt_designation">
                                                   purchase date : <?php echo date('d M Y',strtotime($item['dop']));?>
                                               </span>
                                         </div>

									</div>
                                    <?php
									if($item['borrow_status']=='return' || $item['borrow_status']==''){?>
										<div class="availbvility">
											 <div class="sts">Status :<?php echo 'Available';?></div>
												 <div class="bkng"><a href="<?php echo site_url('library/hirenow/'.$item['id'].'/'.$category['name'].'/'.$this->session->userdata['site_userid']);?>"><img src="<?php echo site_url();?>/public/images/btn_hire.jpg"></a>
												 </div>

										</div><?php }
										else{?>
										<div class="availbvility">
                                            <div class="sts">Status :<?php echo 'Not Available';?></div>
											<div class="bkng"><a href="<?php echo site_url('library/hirenow/'.$item['id'].'/'.$category['name'].'/'.$this->session->userdata['site_userid']);?>"><img src="<?php echo site_url();?>/public/images/brn_booknow.jpg"></a></div>
										</div>
										<?php }?>

                              </div>
                         </li><?php }
					}else{?>
						<li>
                           <div class="clearfix library_info_up">
                               <div class="library_info">
									<span class="birt_designation" >No Data found</span>
						   </div>
						   </div>
						</li>
						<?php }?>

                            </ul>
                        </div><?php }}?>
                        <!-- booke end here -->

                        <!-- start 2nd -->

                        <!-- end 2nd here -->




                          <!-- start 3rd -->

                        <!-- end 3rd here -->


                        <div class="nav_pagination clearfix">
                            <div class="right">
                                <div class="clearfix">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
