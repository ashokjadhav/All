<head>
<style>
.overlay {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1000;
  display: none;
}

.modal {
  display: none;
  background: #eac14d;
  padding: 0 20px 20px;
  top:120px;
  overflow: auto;
  z-index: 1001;
  position: absolute;
  width: 500px;
  min-height: 300px;
}

.closeBtn {
    background: url(".../public/images/closeBtn.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    display: block;
    height: 22px;
    right: 10px;
    position: absolute;
    top: 12px;
    width: 22px;
}
/* Elegant Aero */
.juniors{
	width:270px;
	float:left;
	margin-top: 30px;
	background:url("../images/where.png")no-repeat 0 4px #dd934d;padding:0 12px 5px;
	text-align: center;
	}

.juniors h1,h6{
	text-align:left;
	margin:15px 30px 30px 30px;
	}
.login{
	width:335px;
	float:left;
	margin-top: 50px;
	margin-left: 15px;
	margin-right: 20px;
	background:url("../images/where.png")no-repeat 0 4px #dd934d;padding:0 12px 5px;
	text-align: left;
	}

.login h1,h6{
	text-align:left;
	margin:15px 30px 30px 30px;
	}
.dashboard{
	width:460px;
	margin-top: 18px;
	float:right;
	background:url("../images/where.png")no-repeat 0 4px #fff;padding:0 12px 5px;
	//border:1px inset black;
	}
.dashboard h1,h6{
	text-align:left;
	//margin:15px 30px 30px 30px;
	}
.elegant-aero {
    margin-left:auto;
    margin-right:auto;
	//margin-top:50px;

    max-width: 500px;
    background: ;
    padding: 0px 20px 20px 20px;
    font: 12px Arial, Helvetica, sans-serif;
    color: #666;
}
.elegant-aero h1 {
    font: 24px "Trebuchet MS", Arial, Helvetica, sans-serif;
    padding: 10px 10px 10px 20px;
    display: block;
    background: #C0E1FF;
    border-bottom: 1px solid #B8DDFF;
    margin: -20px -20px 15px;
}
.elegant-aero h1>span {
    display: block;
    font-size: 11px;
}

.elegant-aero a {
    float: left;
    //margin-top: 10px;
    color: #fff;
	font-weight: normal;
	font-size: 15px;
}

.elegant-aero h1>span {
    display: block;
    font-size: 11px;

}

.elegant-aero label>span {
    float: left;
    margin-top: 10px;
    color: #5E5E5E;
	font-size: 16px;
}
.elegant-aero label {
    display: block;
    margin: 0px 0px 15px;
	float:left;
	width: 100%;
	font-size: 16px;
	margin-top: 8px;
}
.elegant-aero label>span {
    float: left;
    width: 20%;
    text-align: left;
    padding-right: 15px;
    margin-top: 10px;
    font-weight: bold;
	 color: #ffffff;
}

.blue_box_1{background:#4EC2BE;padding:0 8px 5px;width: 400px;margin-top: 5px;margin-right: 20px;float: right;}
.grn_blue_box_1 {background:#308099;padding:0 8px 5px;width: 400px;margin-top: 5px;margin-right: 20px;float: right;}
.light_red_box_1 {background:#E6567A;padding:0 8px 5px;width: 400px;margin-top: 5px;margin-right: 20px;float: right;}
.light_green_box_1 {background:#00C0E4;padding:0 8px 5px;width: 400px;margin-top: 5px;margin-right: 20px;float: right;}
.grn_box_1 {background:#4EC287;padding:0 8px 5px;width: 400px;margin-top: 5px;margin-right: 20px;float: right;}
.elegant-aero input[type="text"], .elegant-aero input[type="email"],.elegant-aero textarea,
.elegant-aero select {
    color: #888;
    width: 100%;
	//margin-left: 27px;
    padding: 0px 0px 0px 5px;
    border: 1px solid #C5E2FF;
    background: #FBFBFB;
    outline: 0;
   // -webkit-box-shadow:inset 0px 1px 6px #ECF3F5;
    box-shadow: inset 0px 1px 6px #ECF3F5;
    font: 200 12px/25px Arial, Helvetica, sans-serif;
   // height: 30px;
    line-height:15px;
    margin: 2px 6px 16px 0px;
	float:left;
	//text-align:center;
}
.elegant-aero input[type="text"], input[type="digits"]{
	color: #888;
    width: 65%;

    padding: 0px 0px 0px 5px;
    border: 1px solid #C5E2FF;
    background: #FBFBFB;
    outline: 0;

    box-shadow: inset 0px 1px 6px #ECF3F5;
    font: 200 12px/25px Arial, Helvetica, sans-serif;
    height: 30px;
    line-height:15px;
    margin: 2px 6px 16px 0px;

}
.log input[type="text"], input[type="password"]{
	color: #888;
    width: 65%;
	padding: 0px 0px 0px 5px;
    border: 1px solid #C5E2FF;
    background: #FBFBFB;
    outline: 0;
    box-shadow: inset 0px 1px 6px #ECF3F5;
    font: 200 12px/25px Arial, Helvetica, sans-serif;
    height: 30px;
    line-height:15px;
    margin: 2px 6px 16px 0px;
	float:right;
}

.elegant-aero select {
    background: #fbfbfb url('down-arrow.png') no-repeat right;
    background: #fbfbfb url('down-arrow.png') no-repeat right;
   appearance:none;
   // -webkit-appearance:none;
   //-moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width: 70%;
	//margin-left: 27px;
	//text-align:center;
}
.elegant-aero .button{
    padding: 10px 30px 10px 30px;
    background: #4b98dc;
    border: none;
	display: block;
	margin: 0 auto;
    color: #FFF;
    box-shadow: 1px 1px 1px #4C6E91;
   // -webkit-box-shadow: 1px 1px 1px #4C6E91;
    //-moz-box-shadow: 1px 1px 1px #4C6E91;
    text-shadow: 1px 1px 1px #5079A3;

}
.elegant-aero .button:hover{
    background: #3EB1DD;
	cursor:pointer;
}
.elegant-aero h3{
  font-size: 25px;
}
h3{
 margin-left:30px;}

</style>
</head>

<div class="inner_section">
	<div class="emp_listing_5 mb12">
     <h3>
			Dashboard Postings


	 <?php if($this->session->userdata('dplogin')==TRUE){?>
	  <span style="float:right;">
					<a class="logout" href="<?php echo site_url('dashboard_posting/logout');?>">LOGOUT</a>
					</span>
					<?php }?>
		 </h3>
	</div>
<?php if($this->session->userdata('dplogin')==False){?>
<div class="login">
	<h6>LOGIN</h6>
	<form id=""action="<?php echo site_url('dashboard_posting/check'); ?>" method="post" class="elegant-aero">
	<?php if ($this->session->flashdata('error')) { ?>
                <div class="alert error">
                    <span class="icon"></span><span class="hide">x</span>
                    <h1 class='error' style='color: rgb(255,0,0);'><span><?php echo $this->session->flashdata('error'); ?></span></h1>
                </div>
            <?php } ?>

                             <label class='log'><span>Username</span>
                                <input type="text" placeholder="username" id="Field12-1" name="username" required ></label>


                              <label class='log'><span>Password</span>
                                <input type="password" placeholder="password" name="password" required>
                    </label>


                              <label><span>&nbsp;</span><input type="submit" class="button" id='submit' name='submit' value="LOGIN"></label>


                        </form>

    </div>

<?php }else{?>
<div class="juniors">
<h6 style="margin-left:0;">Team Members</h6>
<div class='elegant-aero'>
<?php if($juniors){
//$count=1;
foreach($juniors as $junior){?>

<label><span></span><a href="<?php echo site_url('dashboard_posting/get_details/'.$junior['id']);?>"><?php echo $junior['name'];?></a></label>
<?php }}else{?>
<label><p>This Team Leader does not have any members..</p></label>
<?php }?>
</div>
</div>
<?php }?>
<?php if($medalsDetails!=='' || $assignmentsDetails!=='' || $kraDetails!=='' || $kpiDetails!=='' || $programsDetails!==''){?>
<div class='dashboard'>
		<div class="medal_list blue_box_1 mb20">

                        <h6>my medals
						<span style="float:right;">
					<a style='color:#fff;' class="modalLink" id="medals" href="#">EDIT</a></span>
						</h6>
						<?php if($medalsDetails){?>
						<?php foreach($medalsDetails as $medal){?>
                        <div class="clearfix">
                            <ul>
                                <li>
                                    <span class="medal_title">gold</span>
									<?php for($i=0;$i<$medal['gold'];$i++){?>
                                    <span class="gold_medal"></span><?php }?>

                                </li>
                                <li>
                                    <span class="medal_title">silver</span>
									<?php for($i=0;$i<$medal['silver'];$i++){?>
                                    <span class="silver_medal"></span><?php }?>

                                </li>
                                <li>
                                    <span class="medal_title">bronze</span>
									<?php for($i=0;$i<$medal['bronze'];$i++){?>
                                    <span class="bronze_medal"></span><?php }?>

                                </li>
                            </ul>
                            <div class="medal_details">
                                <h6>medal for : </h6>
                                <p><?php echo $medal['medalfor'];?></p>
                            </div></div><?php }} else{?>
							 <div class="clearfix">
                            <ul>
                                <li><p>There are no Medals Available</p></li>
                           </ul>
						   </div><?php }?>
                    </div>
                    <div class="medal_list grn_blue_box_1 mb20">
                        <h6>my special assignments<span style="float:right;">
						<a style='color:#fff;' class="modalLink" id="assignments" href="#">ADD</a></span>
						</h6>

						<?php if($assignmentsDetails){?>
                        <div class="clearfix">

                            <ul><?php foreach($assignmentsDetails as $assignment){?>
                                <li>
                                    <span class="medal_title"><b><?php echo strtoupper($assignment['subject']);?></b></span>
									<a href='<?php echo site_url('dashboard_posting/delete_special_assignments/'.$assignment['id'].'/'.$assignment['user_id'])?>'><p style='float:right'><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></p></a>
									<p>Details:&nbsp;&nbsp;<?php echo $assignment['details'];?></p>
									<p>Special_Comments:&nbsp;&nbsp;<?php echo $assignment['comments'];?></p>
                                    <p>Deadline:&nbsp;&nbsp;<?php echo $assignment['deadline'];?></p>


                                </li>
								<?php }?>
                                <!--<li>
                                    <span class="medal_title">lorem_ipsum</span>
                                </li>
                                <li>
                                    <span class="medal_title">lorem_ipsum</span>
                                </li>-->
                            </ul>

                        </div><?php }else{?>
							<div class="clearfix">
                         <ul><li><p>There are no Special Assignments Available</p></li></ul></div><?php }?>
                    </div>
                    <div class="medal_list light_red_box_1 mb20">
                        <h6>my KRAs
						<span style="float:right;">
						<a style='color:#fff;' class="modalLink" id="kra" href="#">ADD</a></span>
						</h6>
                        <div class="clearfix">
						<?php if($kraDetails){?>
                            <ul><?php foreach($kraDetails as $kradetail){?>
                                <li>
								<a href='<?php echo site_url('dashboard_posting/delete_kra/'.$kradetail['id'].'/'.$kradetail['user_id'])?>'><p style='float:right'><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></p></a>
                                    <p><?php echo $kradetail['details'];?><p>
                                </li>
                                <?php }?>
                            </ul>
							<?php }else{?>
                      <ul><li><p>There are no KRAs Available</p></li></ul><?php }?>
                        </div>
                    </div>
                    <div class="medal_list light_green_box_1 mb20">
                        <h6>my KPIs<span style="float:right;">
						<a style='color:#fff;' class="modalLink" id="kpi" href="#">ADD</a></span></h6>
                        <div class="clearfix">
                           <?php if($kpiDetails){?>
                            <ul><?php foreach($kpiDetails as $kpidetail){?>
                                <li>
								<a href='<?php echo site_url('dashboard_posting/delete_kpi/'.$kpidetail['id'].'/'.$kpidetail['user_id'])?>'><p style='float:right'><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></p></a>
                                    <p><?php echo $kpidetail['details'];?><p>
                                </li>
                                <?php }?>
                            </ul>
							<?php }else{?>
                      <ul><li><p>There are no KPIs Available</p></li></ul><?php }?>
                        </div>
                   </div>
                    <div class="medal_list grn_box_1 mb20">
                        <h6>my training programs<span style="float:right;">
						<a style='color:#fff;' class="modalLink" id="programs" href="#">ADD</a></span></h6>
                       <?php if($programsDetails){?>
                        <div class="clearfix">

                            <ul><?php foreach($programsDetails as $programsDetail){?>
                                <li>
								<a href='<?php echo site_url('dashboard_posting/delete_training_programs/'.$programsDetail['id'].'/'.$programsDetail['user_id'])?>'><p class="medal_title" style='float:right'><b>Delete</b></p></a>
                                    <span class="medal_title"><b><?php echo strtoupper($programsDetail['programname']);?></b></span>
									<p>Learning Areas Recommended:&nbsp;&nbsp;<?php echo $programsDetail['learning_areas'];?></p>
									<p>Process:&nbsp;&nbsp;<?php echo $programsDetail['process'];?></p>
									<p>Level Of Importance:&nbsp;&nbsp;<?php echo $programsDetail['importance_level'];?></p>
                                    <p>Deadline:&nbsp;&nbsp;<?php echo $programsDetail['deadline'];?></p>


                                </li>
								<?php }?>
                                <!--<li>
                                    <span class="medal_title">lorem_ipsum</span>
                                </li>
                                <li>
                                    <span class="medal_title">lorem_ipsum</span>
                                </li>-->
                            </ul>

                        </div><?php }else{?>
							<div class="clearfix">
                         <ul><li><p>There are no Training Programs Available</p></li></ul></div><?php }?>
                    </div>
			</div>

<?php }?>
</div>
<div class="overlay"></div>
           <div class="modal elegant-aero">
				<a href="#" class="closeBtn"></a>
			<div class="box elegant-aero" style="display:none;">
                <div class="header">
                    <h3>Medals</h3>
                    <span></span>
                </div>

                <?php echo form_open('dashboard_posting/medals/'.$this->uri->segment(3), array('class' => 'validate')); ?>
                <div class="content no-padding">


                    <div class="section _100">
                        <label>
                            Date of Posting :
                        </label>
                        <div>
                            <input type="text" name="dop" id="dop" class="required" value="<?php if (isset($medalsDetails[0]['dop'])) {
                            echo $medalsDetails[0]['dop'];
                        } else {
                            echo set_value('dop');
                        } ?>"/>
						<?php echo form_error('dop'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                            Medal For:
                        </label>
                        <div>
                            <input type="text" name="medalfor" id="medalfor" class="required valid" value="<?php if (isset($medalsDetails[0]['medalfor'])) {
                            echo $medalsDetails[0]['medalfor'];
                        } else {
                            echo set_value('medalfor');
                        } ?>"/>
						<?php echo form_error('medalfor'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                     <div class="section _100">
                        <label>
                            Gold :
                        </label>
                        <div>
                            <input type="digits" name="gold" id="totalmedal" class="required valid" value="<?php if (isset($medalsDetails[0]['gold'])) {
                            echo $medalsDetails[0]['gold'];
                        } else {
                            echo set_value('gold');
                        } ?>"/>
							<?php echo form_error('gold'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Silver :
                        </label>
                        <div>
                            <input type="digits" name="silver" id="totalmedal" class="required valid" value="<?php if (isset($medalsDetails[0]['silver'])) {
                            echo $medalsDetails[0]['silver'];
                        } else {
                            echo set_value('silver');
                        } ?>"/>
							<?php echo form_error('silver'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Bronze :
                        </label>
                        <div>
                            <input type="digits" name="bronze" id="totalmedal" class="required valid" value="<?php if (isset($medalsDetails[0]['bronze'])) {
                            echo $medalsDetails[0]['bronze'];
                        } else {
                            echo set_value('bronze');
                        } ?>"/>
							<?php echo form_error('bronze'); ?>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                  </div>
                <div class="actions">
                    <div class="actions-right">
                        <input type="submit" class="button" id="submit" name="submit" value="Submit"/>
                    </div>
                </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
          </div> <!-- End of .box -->

		  <div class="box2" style="display:none;">
              <div class="header">

                <h3>Special Assignments</h3>
                <span></span>
              </div>


              <?php echo form_open('dashboard_posting/assignment/'.$this->uri->segment(3), array('class' => 'validate')); ?>

                <div class="content no-padding">


                  <div class="section _100">
                     <label>
                            Subject :
                        </label>
                        <div>
                            <input type="text" class="required" id="subject" name="subject">
<?php echo form_error('subject'); ?>
                        </div>
                  </div>
                  <div class="section _100">
                     <label>
                            Details :
                        </label>
                        <div>
                             <textarea id="desc" rows="5" cols="40" name="details" class="required" maxlength='1000'></textarea>
<?php echo form_error('details'); ?>
                        </div>
                  </div>
                  <div class="section _100">
                     <label>
                            Deadline :
                        </label>
                        <div>
                            <input type="text" class="required" id="deadline" name="deadline">
<?php echo form_error('deadline'); ?>
                        </div>
                  </div>

                  <div class="section _100">
                     <label>
                            Special Comments :
                        </label>
                        <div>
                            <textarea id="specialcomments" rows="5" cols="40" name="specialcomments" class="required" maxlength='1000'></textarea>
<?php echo form_error('comments'); ?>
                        </div>
      </div>


                </div>
                <div class="actions">

                  <div class="actions-right">
                    <input type="submit" class="button" id="submit" name="submit" value="Submit"/>
                  </div>
                </div>
              <!-- </form> -->
              <?php echo form_close(); ?>
            </div> <!-- End of .box2 -->
			<div class="box3" style="display:none;">
                <div class="header">

                    <h3>KRA's</h3>
                    <span></span>
                </div>
                <?php echo form_open('dashboard_posting/kra/'.$this->uri->segment(3), array('class' => 'validate')); ?>
                <div class="content no-padding">


                    <div class="section _100">
                        <label>
                            Details:
                        </label>
                        <div>
                            <textarea rows="5" cols="40" name="details" id="details" class="required"></textarea>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div><!-- End of .box -->

                </div>
                <div class="actions">
                    <div class="actions-right">
                        <input type="submit" class="button" id="submit" name="submit" value="Submit"/>
                    </div>
                </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
            </div>
			<div class="box4" style="display:none;">
                <div class="header">

                    <h3>KPI's</h3>
                    <span></span>
                </div>
                <?php echo form_open('dashboard_posting/kpi/'.$this->uri->segment(3), array('class' => 'validate')); ?>
                <div class="content no-padding">

                    <div class="section _100">
                        <label>
                            Details:
                        </label>
                        <div>
                            <textarea rows="5" cols="40" name="details" id="details" class="required"></textarea>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>


                </div>
                <div class="actions">
                    <div class="actions-right">
                        <input type="submit" class="button" id="submit" name="submit" value="Submit"/>
                    </div>
                </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
            </div><!-- End of .box4 -->
      <div class="box5" style="display:none;">
                <div class="header">

                    <h3>Training Programs</h3>
                    <span></span>
                </div>
                <?php echo form_open('dashboard_posting/training_programs/'.$this->uri->segment(3), array('class' => 'validate')); ?>
                <div class="content no-padding">
					<div class="section _100">
                        <label>
                            Program Name :
                        </label>
                        <div>
                            <input type="text" name="programname" id="name" class="required" value="<?php echo set_value('programname') ?>"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Learning Areas :
                        </label>
                        <div>
                            <input type="text" name="learning" id="name" class="required"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Process:
                        </label>
                        <div>
                            <textarea  class="required" id="details" name="process" cols="40" rows="5"></textarea>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
                    <div class="section _100">
                        <label>
                           Level Of Importance :
                        </label>
                        <div>
                            <input type="text" name="importance" id="importance" class="required" value=""/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					 <div class="section _100">
                        <label>
                            Start Date :
                        </label>
                        <div>
                            <input type="text" name="sdate" id="sdate" class="required valid"/>
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>

                     <div class="section _100">
                        <label>
                            Deadline :
                        </label>
                        <div>
                            <input type="text" name="deadline" id="deadline1" class="required valid" />
                            <!--<label><?php echo form_error($field->name); ?></label>-->
                        </div>
                    </div>
					<div class="section _100">
                        <label>
                            Total Hours :
                        </label>
                        <div>
                            <input type="digits" maxlength="2" name="hours" id="hours" class="required valid"/>

                        </div>
                    </div>

                </div>
                <div class="actions">
                    <div class="actions-right">
                        <input type="submit" class="button" id="submit" name="submit" value="Submit"/>
                    </div>
                </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
            </div> <!-- End of .box -->

		   </div>
<script type="text/javascript">
	$(document).ready(function(){
    $('.modalLink').modal({
        trigger: '.modalLink',
        olay:'div.overlay',
        modals:'div.modal',
        //animationEffect: 'overlay',
        //animationSpeed: 400,
        //moveModalSpeed: 'slow',
        background: '00c2ff',
        opacity: 0.8,
        openOnLoad: false,
        docClose: true,
        closeByEscape: true,
        //moveOnScroll: true,
        resizeWindow: false,
        //video:'http://player.vimeo.com/video/9641036?color=eb5a3d',
        close:'.closeBtn'
    });
});
	</script>
	<script>
  $(document).ready(function(){
	  $('#assignments').removeClass('modalLink');
	  $('#kra').removeClass('modalLink');
	  $('#kpi').removeClass('modalLink');
	  $('#programs').removeClass('modalLink');
   $('a#medals').click(function() {
	    //$('#medals').aClass('modalLink');

		$('.box').show();
        $('.box2').hide();
		$('.box3').hide();
		$('.box4').hide();
		$('.box5').hide();

		});
	$('a#assignments').click(function() {
	    //$('#medals').aClass('modalLink');

		$('.box2').show();
		$('.box').hide();
		$('.box3').hide();
		$('.box4').hide();
		$('.box5').hide();

		});
	$('a#kra').click(function() {

		$('.box3').show();
		$('.box').hide();
		$('.box2').hide();
		$('.box4').hide();
		$('.box5').hide();


		});
		$('a#kpi').click(function() {

		$('.box4').show();
		$('.box').hide();
		$('.box2').hide();
		$('.box3').hide();
		$('.box5').hide();

		});
		$('a#programs').click(function() {

		$('.box5').show();
		$('.box').hide();
		$('.box2').hide();
		$('.box3').hide();
		$('.box4').hide();


		});
	$('#dop').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
	//minDate: 0,
 closeOnDateSelect: true,

});
$('#deadline').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
	//minDate: 0,
closeOnDateSelect: true,

});

$('#sdate').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
	//minDate: 0,
	onSelectDate: function(){
		 var x= $('#sdate').val();
		 $('#deadline1').datetimepicker({
			 format:'Y-m-d',
	 timepicker:false,
	 minDate: x,
	  formatDate:'Y-m-d',
closeOnDateSelect: true

})

	 },
closeOnDateSelect: true,

});

	});
	</script>