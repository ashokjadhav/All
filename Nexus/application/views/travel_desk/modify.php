<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href='<?php echo base_url()?>public/css/book_form.css' rel='stylesheet' type='text/css'>
<style>
	#modify_form label.error {
	  color:#FB3A3A;
	  font-weight:bold;
	}
	#book_modify1 img{
	margin-left:45%;
	}
</style>
<script type="text/javascript">

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

</script>
<?php 
$this->load->view('travel_desk/index'); 
if ($this->session->flashdata('success')) {?>
        <div class="form-style-10">
			<h1>Success</h1>
                <label id='msg' style='color:red'><?php echo $this->session->flashdata('success'); ?></label></div>
        <?php }else{ ?>
<div class="form-style-10 Ticket">
<h1>Modify Ticket!</h1>

<form method='post' id='modify_form' name='modify_form' action='<?php echo site_url('travel_desk/modify');?>' novalidate="novalidate">

		<label id='msg' style='color:red'>To modify your Ticket  please enter the Ticket PNR number</label>
		<div class="section 1"><span>1</span>TICKET PNR/NUMBER :</div>
    <div class="inner-wrap">
      <label><input type="text" name="pnr" id="pnr" /></label>
	  <label id='error' style='display:none;color:red'>NO DATA FOUND</label>
	  <label id='validate' style='display:none;color:red'>Please Enter Ticket/PNR Number</label>
    </div>
	<div id='book_modify1' style='display:none'>
	<img src='http://nexus.php-dev.in/public/images/gif-load.gif'/></div>
	<div id='book_modify' style='display:none;'>
		<div class="section 2"><span>2</span>Booking Information</div>
    <div class="inner-wrap">
	<input type="hidden" name="user" id="user" value='<?php echo $this->session->userdata('site_userid');?>'/>
	<label>SELECT MODE :</label>
	<select id="mode" name="mode">
		<option value=''>--Select--</option>
		<option value='AIR'>AIR</option>
		<option value='RAIL'>RAIL</option>
		<option value='ROAD'>ROAD</option>
		<option value='OTHERS'>OTHERS</option>

		</select>
	<div id='onlyflight'style='display:none'>
		<label>FLIGHT TYPE :</label>
		<div>
			<input type="radio" name="radio" id="radio1" class="radio" />
			<label for="radio1">DOMESTIC</label>
		</div>
		<div>
			<input type="radio" name="radio" id="radio2" class="radio"/>
			<label for="radio2">INTERNATIONAL</label>
		</div>

		<select id="type" name="type">
		<option value=''>--Select--</option>
		</select>
		<input type="hidden" name="airid" id="airid">
	</div>
        <label>FROM :<select id='from' name='from'>
		<option value=''>--Select--</option>
		<?php foreach($locations as $location){?>
			<option value='<?php echo $location['name'];?>'><?php echo $location['name'];?></option>
		<?php } ?>
		</select></label>

		<label> TO :<select id='to' name='to'>
		<option value=''>--Select--</option>
		<?php foreach($locations as $location){?>
			<option value='<?php echo $location['name'];?>'><?php echo $location['name'];?></option>
		<?php } ?>
		</select>
		<div style='margin-left:100px;height:80px;width:250px;float:left'>
			<input type="radio" name="radio1" id="radio5" class="radio" checked />
			<label for="radio5">ONE WAY</label>
		</div>
		<div style='margin-right:80px;height:80px;width:250px;float:left'>
			<input type="radio" name="radio1" id="radio6" class="radio"/>
			<label for="radio6">ROUND TRIP</label>
		</div>
		<label>NEW DATE :<input type="text" name="travel_date" id="travel_date" /></label>
		
		<label>PREFFERED TIME :<div style="width:250px;float:right;">TO:<input type="text" name="travelt_time" id="travelt_time" style="width:40%;" /></div><div style="width:250px;float:right;">FROM:<input type="text" name="travel_time" id="travel_time" style="width:40%;" /></div></label>
		<br><br>
		<div id='return' style='display:none'>
			<label>RETURN DATE :<input type="text" name="return_date" id="return_date" /></label>
			<label>RETURN PREFFERED TIME :<div style="width:250px;float:right;">TO:<input type="text" name="R_travelt_time" id="R_travelt_time" style="width:40%;" /></div><div style="width:250px;float:right;">FROM:<input type="text" name="R_travel_time" id="R_travel_time" style="width:40%;" /></div></label>
		</div>


    </div>
	<div class="section"><span>3</span>APPROVING AUTHORITY</div>
    <div class="inner-wrap">
     <label>HOD NAME :<select id='authority' name='authority'>
		<option value=''>--Select--</option>
		<?php foreach($authorities as $authority){?>
		<option value='<?php echo $authority['user_id'];?>'><?php echo $authority['name'];?></option>
		<?php }?>
		</select></label>
    </div>

<div class="section 3"><span>4</span>REASON FOR CHANGE :</div>
    <div class="inner-wrap">
      <label><textarea rows='5' cols='40' id='reason1' name='reason1'></textarea></label>
    </div>
<div class="section"><span>5</span>OTHER BOOKINGS :</div>
		<div class='other' style='width:750px;height:70px'>

		<div>
			<input type="checkbox" name="radio3" id="radio3" class="radio" />
			<label for="radio3">would you like to book hotel</label>

		</div>


	</div>
	</br>
	<div id='other_booking' class="inner-wrap" style='display:none'>
		<label>PLACE OF STAY<select id="stayplace" name="stayplace">
		<option value=''>--Select--</option>
		<?php foreach($locations as $location){?>
			<option value='<?php echo $location['name'];?>'><?php echo $location['name'];?></option>
		<?php } ?>
		</select>
		</select>
		<label>CHECK IN DATE<input type="text" name="chkindate" id="chkindate"/></label>
		<label>CHECK OUT DATE<input type="text" name="chkoutdate" id="chkoutdate"/></label>
		<label>SPECIAL INSTRUCTIONS<textarea id='instructions' name='instructions'></textarea></label>
	</div>
	<div class='other1' style='width:750px;height:70px'>

		<div>
			<input type="checkbox" name="radio4" id="radio4" class="radio" />
			<label for="radio4">would you like to book guest house</label>

		</div>


	</div>
	</br>
	<div id='other_booking1' class="inner-wrap" style='display:none'>
		<label>PLACE OF STAY<select id="stayplace1" name="stayplace1">
		<option value=''>--Select--</option>
		<?php foreach($locations as $location){?>
			<option value='<?php echo $location['name'];?>'><?php echo $location['name'];?></option>
		<?php } ?>
		</select>
		</select>
		<label>CHECK IN DATE<input type="text" name="chkindate1" id="chkindate1"/></label>
		<label>CHECK OUT DATE<input type="text" name="chkoutdate1" id="chkoutdate1"/></label>
		<label>SPECIAL INSTRUCTIONS<textarea id='instructions1' name='instructions1'></textarea></label>
	</div>
	<input type="hidden" name="extra_book" id="extra_book">
	<input type="hidden" name="extra_book1" id="extra_book1">



    <div class="button-section">
     <input type="submit" name="modify" id='modify' value='Submit'>

    </div>
	</div>
	<div class="button-section butt">
      <button type="button" id='mod'>Submit</button>


    </div>
	<?php }?>
</form>
</div>
<script type='text/javascript' src='<?php echo base_url()?>public/jquery/modify.js'></script>
