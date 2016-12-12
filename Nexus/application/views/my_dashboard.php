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
    left: 0px !important;
  display: none;
  background: #eac14d;
  padding: 25px 20px 20px;
  top:120px;
  overflow: auto;
  z-index: 1001;
  position: absolute;
  width: 600px;
  height: auto;
}
.closeBtn {
    background: url("./public/images/closeBtn.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    display: block;
    height: 22px;
    right: 10px;
    position: absolute;
    top: 12px;
    width: 22px;
}
.login{
	width:335px;
	//height:300px;
	float:left;
	margin-top: 20px;
	//margin-left: 50px;
	margin-right: 20px;
	background:url("../images/where.png")no-repeat 0 4px #4ec287;padding:0 12px 5px;
	text-align: right;
	}

.login h1,h6{
	text-align:left;
	margin:15px 30px 30px 30px;
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

.elegant-aero label>span {
    float: right;
    margin-top: 10px;
    color: #fff;
}
.elegant-aero label {
    display: block;
    margin: 0px 0px 5px;
}
.elegant-aero label>span {
    float: right;
    width: 20%;
    text-align: right;
    padding-right: 15px;
    margin-top: 10px;
    font-weight: bold;
}
.elegant-aero input[type="text"], .elegant-aero input[type="email"],.elegant-aero textarea,
.elegant-aero select {
    color: #888;
    width: 70%;
	//margin-left: 27px;
    padding: 0px 0px 0px 5px;
    border: 1px solid #C5E2FF;
    background: #FBFBFB;
    outline: 0;
   // -webkit-box-shadow:inset 0px 1px 6px #ECF3F5;
    box-shadow: inset 0px 1px 6px #ECF3F5;
    font: 200 12px/25px Arial, Helvetica, sans-serif;
    height: 30px;
    line-height:15px;
    margin: 2px 6px 16px 0px;
	//float:left;
	//text-align:center;
}
.elegant-aero input[type="password"]{
color: #888;
    width: 70%;
	//margin-left: 27px;
    padding: 0px 0px 0px 5px;
    border: 1px solid #C5E2FF;
    background: #FBFBFB;
    outline: 0;
   // -webkit-box-shadow:inset 0px 1px 6px #ECF3F5;
    box-shadow: inset 0px 1px 6px #ECF3F5;
    font: 200 12px/25px Arial, Helvetica, sans-serif;
    height: 30px;
    line-height:15px;
    margin: 2px 6px 16px 0px;
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
    background: #66C1E4;
    border: none;
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
h3{
 margin-left:30px;}
 h6{
 margin-left:0px;}
 .medal_list h6{    margin: 6px 21px 7px 13px;}
</style>

</head>
<div class="inner_section">
     <div class="emp_listing_2 mb12"><h3>My Dashboard<?php if($travel_authority){?>
	 <a href="<?php echo site_url('travel_requests');?>"style="float:right;">Travel Requests</a><?php }?>
		<div class="overlay"></div>
					<div class="modal">
					<div class="medal_list dash_box mb20">
					<h6 style="font-size:0.7em;">MY SCORECARD</h6></div>
				<a href="#" class="closeBtn"></a>
				<div style="margin-bottom:30px;" class="appointment_table black_color">
				<?php if($medalsDetails){?>

					 <table>
                            <thead>
                              <tr>
                                <th>MEDALS</th>
                                <th>TOTAL</th>
                                <th>PERIOD</th>
                              </tr>
                            </thead>
                            <tbody>
							<?php foreach($medalsDetails as $medal){?>
							<tr>
                                <td>GOLD</td>
								<td><?php echo $medal['gold'];?></td>
                                <td><?php echo date('d M,Y',strtotime($medal['from_date'])).' TO '.date('d M,Y',strtotime($medal['to_date']));?></td>

							</tr>
							<tr>
                                <td>SILVER</td>
                                <td><?php echo $medal['silver'];?></td>
						<td><?php echo date('d M,Y',strtotime($medal['from_date'])).' TO '.date('d M,Y',strtotime($medal['to_date']));?></td>


							</tr>
							<tr>
                                <td>BRONZE</td>
								<td><?php echo $medal['bronze'];?></td>
					<td><?php echo date('d M,Y',strtotime($medal['from_date'])).' TO '.date('d M,Y',strtotime($medal['to_date']));?></td>

							</tr>


                            <?php }?></tbody>
                        </table><?php }else{?>

                          <p style="font-size:0.6em;">There are no Medals Available</p>

						   <?php }?>


						   </div>


				<div class="appointment_table black_color">
				<?php if($programsDetails){?>

					 <table>
                            <thead>
                              <tr>
                                <th>Training Programs Attended</th>
                                <th>Training Hours Completed</th>
                                <th>PERIOD</th>
                              </tr>
                            </thead>
                            <tbody>
							<?php foreach($programsDetails as $program){?>
							<tr>
                                <td><?php echo strtoupper($program['programname']);?></td>
								<td><?php echo $program['total_hours'];?></td>
                                <td><?php echo date('d M,Y',strtotime($program['start_date'])).' TO '.date('d M,Y',strtotime($program['deadline']));?></td>

							</tr>



                            <?php }?>
							<tr>
                                <td><?php echo count($programsDetails);?></td>
								<td><?php $sum=0; foreach ($programsDetails as $program) {
								    $sum += $program['total_hours'];


               }
								echo $sum;?></td>
                                <td><?php //echo $medal['from_date'].' TO '.$medal['to_date'];?></td>

							</tr>
                                </tbody>
                        </table><?php }else{?>

                          <p style="font-size:0.6em;">There are no Training Programs Available</p>

						   <?php }?>


						   </div>
						   <div style="margin-top:30px;" class="appointment_table black_color">
				<?php if($quiz_scores){?>

					 <table>
                            <thead>
                              <tr>
                                <th>QUIZ SUBCATEGORY</th>
                                <th>LEARNING DOMAIN</th>
                                <th>TOTAL SCORE</th>
                              </tr>
                            </thead>
                            <tbody>
							<?php foreach($quiz_scores as $score){?>
							<tr>
                                <td><?php echo strtoupper($score['subcategory']);?></td>
								<td><?php echo strtoupper(urldecode($score['category']));?></td>
                                <td><?php echo $score['score'];?></td>

							</tr>



                            <?php }?>
							<!--<tr>
                                <td><?php echo count($programsDetails);?></td>
								<td><?php $sum=0; foreach ($programsDetails as $program) {
								    $sum += $program['total_hours'];


               }
								echo $sum;?></td>
                                <td><?php //echo $medal['from_date'].' TO '.$medal['to_date'];?></td>

							</tr>-->
                                </tbody>
                        </table><?php }else{?>

                          <p style="font-size:0.6em;">There are no Quiz Solved By You!!!</p>

						   <?php }?>


						   </div>

						<div style="margin-top:30px;" class="appointment_table black_color">

						<?php if($elearning_time) {?>
                          <p style="font-size:0.9em;">Total Elearning Time: <?php
							$h=0;$i=0;$s=0; foreach ($elearning_time as $time) {
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

								}echo $h.' Hours '.$i.' Minutes '.$s.' Seconds ';?></p>
						  <?php  }else{?>
                          <p style="font-size:0.6em;">Total Elearning Time: 0</p>
						  <?php }?>
						</div>
				</div>

					</h3></div>


                    <div class="medal_list blue_box mb20">

                        <h6>my medals
						<span style="float:right;">
					<a class="modalLink" href="#" style="color: #fff;">SCORECARD</a></span>
						</h6>
						<?php if($medalsDetails){?>
						<?php foreach($medalsDetails as $medal){?>
                        <div class="clearfix">
                            <ul>
                                <li>
                                    <span class="medal_title">gold</span>
									<?php for($i=0;$i<$medal['gold'];$i++){?>
                                    <span class="gold_medal"></span><?}?>

                                </li>
                                <li>
                                    <span class="medal_title">silver</span>
									<?php for($i=0;$i<$medal['silver'];$i++){?>
                                    <span class="silver_medal"></span><?}?>

                                </li>
                                <li>
                                    <span class="medal_title">bronze</span>
									<?php for($i=0;$i<$medal['bronze'];$i++){?>
                                    <span class="bronze_medal"></span><?}?>

                                </li>
                            </ul></div>
                            <div class="medal_details">
                                <h6>medal for : </h6>
                                <p><?php echo $medal['medalfor'];?></p>
                            </div><?php }}else{?>
							 <div class="clearfix">
                            <ul>
                                <li><p>There are no Medals Available</p></li>
                           </ul>
						   </div><?php }?>
						</div>
                    </div>
                    <div class="medal_list grn_blue_box mb20">
                        <h6>my special assignments</h6>
						<?php if($assignmentsDetails){?>
                        <div class="clearfix">

                            <ul><?php foreach($assignmentsDetails as $assignment){?>
                                <li>
                                    <span class="medal_title"><b><?php echo strtoupper($assignment['subject']);?></b></span>
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
                         <ul><li><p>There are no Special Assignments Available</p></li></ul></div><?}?>
                    </div>
                    <div class="medal_list light_red_box mb20">
                        <h6>my KRAs</h6>
                        <div class="clearfix">
						<?php if($kraDetails){?>
                            <ul><?php foreach($kraDetails as $kradetail){?>
                                <li>
                                    <p><?php echo $kradetail['details'];?><p>
                                </li>
                                <?php }?>
                            </ul>
							<?php }else{?>
                      <ul><li><p>There are no KRAs Available</p></li></ul><?php }?>
                        </div>
                    </div>
                    <div class="medal_list light_green_box mb20">
                        <h6>my Goals</h6>
                        <div class="clearfix">
                           <?php if($kpiDetails){?>
                            <ul><?php foreach($kpiDetails as $kpidetail){?>
                                <li>
                                    <p><?php echo $kpidetail['details'];?><p>
                                </li>
                                <?php }?>
                            </ul>
							<?php }else{?>
                      <ul><li><p>There are no Goals Available</p></li></ul><?php }?>
                        </div>
                    </div>
                    <div class="medal_list grn_box mb20">
                        <h6>my training programs</h6>
                       <?php if($programsDetails){?>
                        <div class="clearfix">

                            <ul><?php foreach($programsDetails as $programsDetail){?>
                                <li>
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
<script type="text/javascript">
	$(document).ready(function(){
    $('.modalLink').modal({
        trigger: '.modalLink',
        olay:'div.overlay',
        modals:'div.modal',
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