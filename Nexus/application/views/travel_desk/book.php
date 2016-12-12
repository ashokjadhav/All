<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href='<?php echo base_url()?>public/css/book_form.css' rel='stylesheet' type='text/css'>
<style>
	#book_form label.error {
	  color:#FB3A3A;
	  font-weight:bold;
	}
	.emp_listing {
    background: none repeat scroll 0 0 #34495e;
    padding: 0 5px;
}
</style>

<?php
$this->load->view('travel_desk/index'); 
	if ($this->session->flashdata('success')) {
                ?>
				<div class="form-style-10">
			<h1>Success</h1>
                <label id='msg' style='color:red'><?php echo $this->session->flashdata('success'); ?></label></div>
            <?php }else{ ?>

<div class="form-style-10 Ticket">
<h1>Book Ticket Now!</h1>

<form method='post' id='book_form' name='book_form' action='<?php echo site_url('travel_desk/book'); ?>' novalidate="novalidate">
    <div class="section"><span>1</span>Booking Information</div>
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
		<label>DATE OF TRAVEL :<input type="text" name="travel_date" id="travel_date" /></label>
		<label>PREFFERED TIME :<div style="width:250px;float:right;">TO:<input type="text" name="travelt_time" id="travelt_time" style="width:40%;" /></div><div style="width:250px;float:right;">FROM:<input type="text" name="travel_time" id="travel_time" style="width:40%;" /></div></label>
		<br><br>
		<div id='return' style='display:none'>
			<label>RETURN DATE :<input type="text" name="return_date" id="return_date" /></label>
			<label>RETURN PREFFERED TIME :<div style="width:250px;float:right;">TO:<input type="text" name="R_travelt_time" id="R_travelt_time" style="width:40%;" /></div><div style="width:250px;float:right;">FROM:<input type="text" name="R_travel_time" id="R_travel_time" style="width:40%;" /></div></label>
		</div>

    </div>

    <div class="section"><span>2</span>Personal Information</div>
    <div class="inner-wrap">
        <label>NAME :<input type="text" name="name" id='name' value='<?php echo $Details[0]['name']  ?>' readonly/></label>
        <label>DESIGNATION :<input type="text" name="designation" id='designation' value='<?php echo $Details[0]['designation'] ?>' readonly/></label>
		<label>AGE<input type="text" name="age" id='age' /></label>
		<label>DEPARTMENT : <input type="text" name="department" id='department' value='<?php echo $Details[0]['department']  ?>' readonly/></label>
		<label>BAND & GRADE : <textarea id='band' name='band'></textarea></label>
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

	<div class="section"><span>4</span>PURPOSE OF TRAVEL :</div>
    <div class="inner-wrap">
      <label><textarea rows='5' cols='40' id='purpose' name='purpose'></textarea></label>
    </div>
	<div class="section"><span>5</span>OTHER BOOKINGS :</div>
		<div class='other' style='width:750px;height:70px'>

		<div>
			<input type="checkbox" name="radio3" id="radio3" class="radio" />
			<label for="radio3">Would you like to book hotel</label>

		</div>


	</div>
	</br>
	<div id='other_booking' class="inner-wrap" style='display:none'>
		<label>PLACE OF STAY<select id="stayplace" name="stayplace">
		<option value=''>--Select--</option>
		<?php foreach($hotel as $location2){?>
			<option value='<?php echo $location2['name'];?>'><?php echo $location2['name'];?></option>
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
			<label for="radio4">Would you like to book guest house</label>

		</div>


	</div>
	</br>
	<div id='other_booking1' class="inner-wrap" style='display:none'>
		<label>PLACE OF STAY<select id="stayplace1" name="stayplace1">
		<option value=''>--Select--</option>
		<?php foreach($guesthouse as $location1){?>
			<option value='<?php echo $location1['name'];?>'><?php echo $location1['name'];?></option>
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
     <input type="submit" name="book" id='book' value='Submit'>

    </div>
</form>
</div>
<?php }?>
<script type='text/javascript' src='<?php echo base_url()?>public/jquery/book.js'></script>
