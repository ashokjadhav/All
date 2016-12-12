<head>


		<!-- The HTML5-Boilerplate CSS styling -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprite.tables.css">

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
    background: url("../public/images/closeBtn.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
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
	background:url("../images/where.png")no-repeat 0 4px #9359bc;padding:0 12px 5px;
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
</style>
</head>

<script type="text/javascript">
      //jQuery(document).ready(function(){
         jQuery(window).load(function () {
		jQuery('#example').dataTable( {

      		"bLengthChange": false,
			"bAutoWidth": true,
			"bInfo": false,
      		"iDisplayLength": 10,
          	"sPaginationType": "simple_numbers",
				});
jQuery(window).resize();
});
</script>
<div>
   <div class="question_head mb12">
      <h3>Travel Requests
<a href="<?php echo site_url('my_dashboard');?>"style="color:#fff;float:right;">Back To My Dashboard</a>
	</h3>

     </div>


<h2>Travel Requests</h2>
<?php if ($this->session->flashdata('success')) {
                ?>
				<div class="form-style-10">

                <label id='msg' style='color:red'><?php echo $this->session->flashdata('success'); ?></label></div>
            <?php }?>

     <table  id="example" width="750px" class="home_product_list">

						<thead>
                                  <tr style="background-color:#9EB0E9; font-size:13px; font-weight:bold; color:#fff;">
								  <th>Employee Name</th>
                                  <th>Designation</th>
								   <th>Requisition date</th>
								   <th>Request Details</th>
									 <th>Status</th>
                                    </tr>
                            </thead>
							 <tbody>

								<?php


							    foreach($requestsdetails as $request)
								 {

							    ?>

                                    <tr style="background-color:#efefef;">
                                            <td>
                                           <?php echo $request['name'];?>
                                            </td>
                                         <td>
                                           <?php echo $request['designation'];?>
                                            </td>
											<td>
                                           <?php echo date('d M Y',strtotime($request['created_date']));?>
                                            </td>
											<td>
                                           <a class="modalLink" id="<?php echo $request['id'];?>">VIEW</a>
                                            </td>
                                            <td>
                                           <?php if($request['approved_status']=='0'){echo 'Not Approved';}elseif($request['approved_status']=='2'){
									     echo 'Need to Discuss';}?>
                                            </td>



                                    </tr>

										 <?php

									  }

							  ?>

					</tbody>
			   </table>
<div class="overlay"></div>
           <div class="modal">
				<a href="#" class="closeBtn"></a>
<?php if($requestsdetails){

foreach($requestsdetails as $request){?>
	  <div class='demo app_<?php echo $request['id'];?>'  style='display:none'>
	  <div  class="appointment_table black_color">
      <h1 style="margin-top:50px;">Travel Request Details</h1>
	  <table style="margin-top:50px;">

                    <tbody>
                        <tr>
                                                        <td><b>Name</b></td>
                                                        <td><?php echo  $request['name'];?></td>

                                                </tr>
                                                <tr>
                                                        <td><b>Transport mode</b></td>
                                                        <td><?php echo $request['mode'];?></td>

                                                </tr>
							<tr>
                                <td><b>Source location</b></td>
                                <td><?php echo $request['from'];?></td>

							</tr>
							<tr>
                                <td><b>Destination location</b></td>
								<td><?php echo $request['to'];?></td>

							</tr>
							<tr>
                                <td><b>Travel date</b></td>
								<td><?php echo date('d M Y',strtotime($request['travel_date']));?></td>

							</tr>
							<tr>
                                <td><b>Transport purpose</b></td>
								<td><?php if($request['purpose']){echo $request['purpose'];}else{echo '<font style="color:red;">Not Specified</font>';}?></td>

							</tr>
							<tr>
                                <td><b>Band / grade</b></td>
								<td><?php if( $request['band_grade']){echo $request['band_grade'];}else{echo '<font style="color:red;">Not Specified</font>';}?></td>

							</tr>


                            </tbody>
                        </table>
       </div>
			<form action="<?php echo site_url('travel_requests/update/'.$request['id']);?>" method="post" enctype="multipart/form-data" autocomplete="off"  class="wufoo" name="" id="">
			<h1 style="color:#222;">Approval</h1>
		<ul>

			<li class="phone notranslate" id="fo435li9"><br><br>
			<label for="Field9" id="title9" class="desc">
				Phone Number
				<span class="req" id="req_9">*</span>
			</label>
			<span>
			<select style="width:150%;" id="status_<?php echo $request['id'];?>" data-cid="<?php echo $request['id']; ?>"  class="status" name="status">
   <option value="1">APPROVED</option>
   <option value="3">NOT APPROVED</option>
   <option value="2">DISCUSS</option>
   </select>
			</span>
		</li>
<!--			<li class="date notranslate" id="pnr_<?php echo $request['id'];?>">
				<label for="Field10" id="title10" class="desc">
					PNR NO.
					<span class="req" id="req_10">*</span>
				</label>
				<span>
					<input type="text" style="width:200%;" class="field text ashok" name="pnr" id="pnr_<?php echo $request['id'];?>" required>
				</span>
		   </li>-->
			<li class="buttons "><br>
				<div>
					<input type="submit"  value="Submit" class="btTxt submit" name="submit" id="saveForm">
				</div>
			</li>
		</ul>
	  </form>
	  </div><?php }}?>
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
	$('a.modalLink').click(function(e){
		$('.demo').hide();
	   var id=e.target.id;
	   //$(this).a
	var a = $(this).attr('id');
	     $('.modal').show();
         
		$('.app_'+a).show();

		});
//$("select.status").change(function(){
//		var id=$(this).attr('data-cid');
//
//        var thisValue = $(this).val();
//        if (thisValue != "1"){
//        $("#pnr_"+id).hide();
//        $("input#pnr_"+id).removeAttr('required');
//		}else{
//        $("#pnr_"+id).show();
//    $("input#pnr_"+id).prop('required',true);}
//    });
});
</script>
