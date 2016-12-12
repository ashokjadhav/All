
<?php $priv = $this->session->userdata('privileges');
//print_r($priv);exit; ?>
<div id="main_content">
<?php if($msg = $this->session->flashdata('error')):?>
		<div class="alert error"><span class="hide">x</span><strong>Permission Denied:</strong> <?php echo $msg;?></div>
						<?php endif;?>
	<h2 class="grid_12">Dashboard</h2>
	<div class="clean"></div>
	<div class="cpanel-left">
		<div class="cpanel">


						<?php
		if($priv == 'All'){ ?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/employee_directory');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/user.png"  width="25" height="25" >
						<span>Employee Directory</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/history_milestones');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/info---about.png"  width="25" height="25" >
						<span>Company Milestones</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/leadership');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/admin-user.png"  width="25" height="25" >
						<span>Leaders</span>
					</a>
				</div>
			</div>

			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/vision_mission');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/vimeo-2.png"  width="25" height="25" >
						<span>Vision & Mission</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/policies');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/powerpoint-documents.png"  width="25" height="25" >
						<span>Policies</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/branding_template');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/camera.png"  width="25" height="25" >
						<span>Branding Templates</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/group_companies');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/companies.png"  width="25" height="25" >
						<span>Group Companies</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/boardDirectors');?>">
						<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/recycle-symbol.png" width=25 height=25 alt="">
						<span>Org Structure</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/noticeboard');?>">
						<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/note-book.png" width=25 height=25 alt="">
						<span>Notice Board</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/what_is_on');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/day-calendar.png"  width="25" height="25" >
						<span>Events</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/jobopenings');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/bag-2.png"  width="25" height="25" >
						<span>Job Openings</span>
					</a>
				</div>
			</div>
			
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/thought');?>">
						<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/american-express.png" width=25 height=25 alt="">
						<span>Thought Of The Day</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/utsav');?>">
						<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/balloons.png" width=25 height=25 alt="">
						<span>Utsav Newsletter</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/holiday_list');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/day-calendar.png"  width="25" height="25" >
						<span>Holidays List</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/hr_help_desk'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/user-2.png"  width="25" height="25" >
						<span>HR Help-Desk</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/hr_forms'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/pdf-document.png"  width="25" height="25" >
						<span>HR Forms</span>
					</a>
				</div>
			</div>

			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/it_help_desk'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/group.png"  width="25" height="25" >
						<span>IT Help-Desk</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/it_policies'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/text-document.png"  width="25" height="25" >
						<span>IT Policies</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/location_master'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/loc.png"  width="25" height="25" >
						<span>Location Master</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/team_leaders');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/admin-user.png"  width="25" height="25" >
						<span>Team Leaders</span>
					</a>
				</div>
			</div>
			
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/location'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/marker.png"  width="25" height="25" >
						<span>Locations</span>
					</a>
				</div>
			</div>

			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/faq');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/packs/fugue/24x24/question.png"  width="25" height="25" >
						<span>FAQs</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/usermanagement/view_role');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/walking-man.png"  width="25" height="25" >
						<span>User Roles</span>
					</a>
				</div>
			</div>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/usermanagement');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/joomla.png"  width="25" height="25" >
						<span>Assign Roles</span>
					</a>
				</div>
			</div>

<?php  } else if((!isset($priv['employee_directory'])) && (!isset($priv['leadership'])) && (!isset($priv['noticeboard'])) && (!isset($priv['what_is_on'])) && (!isset($priv['jobopenings'])) && (!isset($priv['thought'])) && (!isset($priv['group_companies'])) && (!isset($priv['holiday_list'])) && (!isset($priv['hr_help_desk'])) && (!isset($priv['hr_forms'])) && (!isset($priv['it_help_desk'])) && (!isset($priv['it_policies'])) && (!isset($priv['branding_template'])) && (!isset($priv['policies'])) && (!isset($priv['location'])) && (!isset($priv['faq'])) && (!isset($priv['team_leaders']))){ ?>
<div class="alert error"><strong>Permission Denied:</strong>You  are not authorize to access this Modules!!</div>
<?php }else{?>
			<?php  if(isset($priv['employee_directory'])){?>
				<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/employee_directory');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/user.png"  width="25" height="25" >
						<span>Employee Directory</span>
					</a>
				</div>
			</div>
			<?php }?>
			<?php if(isset($priv['history_milestones'])){ ?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/history_milestones');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/info---about.png"  width="25" height="25" >
						<span>Company Milestones</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['leadership'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/leadership');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/admin-user.png"  width="25" height="25" >
						<span>Leaders</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['vision_mission'])){ ?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/vision_mission');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/vimeo-2.png"  width="25" height="25" >
						<span>Vision & Mission</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['policies'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/policies');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/powerpoint-documents.png"  width="25" height="25" >
						<span>Policies</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['branding_template'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/branding_template');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/camera.png"  width="25" height="25" >
						<span>Branding Templates</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['group_companies'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/group_companies');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/companies.png"  width="25" height="25" >
						<span>Group Companies</span>
					</a>
				</div>
			</div>
			<?php }  ?>
			<?php if(isset($priv['boardDirectors'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/boardDirectors');?>">
						<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/recycle-symbol.png" width=25 height=25 alt="">
						<span>Org Structure</span>
					</a>
				</div>
			</div>
			<?php }?>

			<?php if(isset($priv['noticeboard'])){?>

			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/noticeboard');?>">
						<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/note-book.png" width=25 height=25 alt="">
						<span>Notice Board</span>
					</a>
				</div>
			</div>
			<?php }?>

			<?php if(isset($priv['what_is_on'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/what_is_on');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/day-calendar.png"  width="25" height="25" >
						<span>Events</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['jobopenings'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/jobopenings');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/bag-2.png"  width="25" height="25" >
						<span>Job Openings</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['thought'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/thought');?>">
						<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/american-express.png" width=25 height=25 alt="">
						<span>Thought Of The Day</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['utsav'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/utsav');?>">
						<img src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/balloons.png" width=25 height=25 alt="">
						<span>Utsav Newsletter</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['holiday_list'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/holiday_list');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/day-calendar.png"  width="25" height="25" >
						<span>Holidays List</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['hr_help_desk'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/hr_help_desk'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/user-2.png"  width="25" height="25" >
						<span>HR Help-Desk</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['hr_forms'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/hr_forms'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/users.png"  width="25" height="25" >
						<span>HR Forms</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['it_help_desk'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/it_help_desk'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/group.png"  width="25" height="25" >
						<span>IT Help-Desk</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['it_policies'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/it_policies'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/group-2.png"  width="25" height="25" >
						<span>IT Policies</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['company_location'])){ ?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/location_master'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/loc.png"  width="25" height="25" >
						<span>Location Master</span>
					</a>
				</div>
			</div>
			<?php }?>
			<?php if(isset($priv['team_leaders'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/team_leaders');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/admin-user.png"  width="25" height="25" >
						<span>Team Leaders</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['location'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo base_url('admin/location'); ?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/25x25/blue/marker.png"  width="25" height="25" >
						<span>Locations</span>
					</a>
				</div>
			</div>
			<?php } ?>
			<?php if(isset($priv['faq'])){?>
			<div class="icon-wrapper">
				<div class="icon">
					<a href="<?php echo site_url('admin/faq');?>">
						<img alt="" src="<?php echo base_url();?>/design/Template/img/icons/packs/fugue/24x24/question.png"  width="25" height="25" >
						<span>FAQs</span>
					</a>
				</div>
			</div>
			<?php } ?>
			
<?php } ?>

			</div>
		</div>
	</div>
</div>