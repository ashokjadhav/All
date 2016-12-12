<link href='<?php echo base_url()?>public/css/book_form.css' rel='stylesheet' type='text/css'>
<link href='<?php echo base_url()?>public/jquery/book.js' type='text/javascript'>
<style type="text/css">
.emp_listing {
    background: none repeat scroll 0 0 #34495e;
    padding: 0 5px;
}
</style>
<script>
$(document).ready(function(){
	$('#flight').click(function(){
		$('#onlytaxi').hide();
		$('#onlyflightAvail').show();
		$('#travellogo').hide();
		$('.Ticket').hide();
	});
	$('#taxi').click(function(){
		$('#onlyflightAvail').hide();
		$('#onlytaxi').show();
		$('#travellogo').hide();
		$('.Ticket').hide();
	});
	//Fetch domestic flights on ckecked
	$( "#chkAvailradio1" ).change(function() {
		var id = $('#chkAvailradio1').val();
		if(id == 'on'){
			var data = 'domestic';
			$.ajax({
				type: "GET",
				dataType: "json",
				url: baseUrl+"travel_desk/get_airlines/"+data,
				success: function(response) {
					console.log(response);
					$('#type1').empty();
					$('#type1').append('<option value="">--Select--</option>');
					$.each(response, function(k, v) {
						$('#type1').append('<option value="'+v.url+'">'+v.name+'</option>');
					});
				}
			});
		}
	});
	//Fetch international flights on ckecked
	$( "#chkAvailradio2" ).change(function() {
		var id = $('#chkAvailradio2').val();
		if(id == 'on'){
			var data = 'INTERNATIONAL';
			$.ajax({
				type: "GET",
				dataType: "json",
				url: baseUrl+"travel_desk/get_airlines/"+data,
				success: function(response) {
					$('#type1').empty();
					$('#type1').append('<option value="">--Select--</option>');
				$.each(response, function(k, v) {

					$('#type1').append('<option value="'+v.url+'">'+v.name+'</option>');
				});


				}


			});
		}

	});
	$('#type1').change(function(){
		url = $(this).val();
		//alert(url);

	window.open(url,'_blank');
	});
});
</script>
<div class="inner_section">
     <div class="emp_listing mb12"><h3 style="color: #fff;">Travel Desk</h3></div>
<ul class="menu cf">

<li>
        <a href="javascript:void(0);">Check Availability</a>
		<ul class='submenu'>
		<li>
				<a id='flight' href="javascript:void(0);">Flight</a>
		</li>
		<li>
				<a target='_blank' href="https://www.irctc.co.in">Train</a>
		</li>
		<li>
				<a target='_blank' href="http://www.etravelsmart.com/bus/">Bus</a>
		</li>
		<li>
				<a id='taxi' >Taxi</a>
		</li>

		</ul>

</li>
<li>
        <a href="javascript:void(0);">Booking</a>
		<ul class='submenu'>
		<li>
				<a href="<?php echo site_url('travel_desk/book');?>">Book Ticket</a>
		</li>
		<li>
				<a href="<?php echo site_url('travel_desk/modify');?>">Modify Ticket</a>
		</li>
		<li>
				<a href="<?php echo site_url('travel_desk/cancel');?>">Cancel Ticket</a>
		</li>


		</ul>


</li>




</ul>
<!--<video width="320" height="240" controls>
  <source src="files/videos/test_final.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>-->
<div id='onlyflightAvail' style='display:none;'>
<div class="form-style-10" style='background-image:url(../public/images/flightpic.jpg);background-repeat: no-repeat;
  width:91%;height:620px;'>

<h3>Check Flight Availability</h3>
		<label>FLIGHT TYPE :</label>
		<div>
			<input type="radio" name="radio" id="chkAvailradio1" class="radio" />
			<label for="chkAvailradio1">DOMESTIC</label>
		</div>
		<div>
			<input type="radio" name="radio" id="chkAvailradio2" class="radio"/>
			<label for="chkAvailradio2">INTERNATIONAL</label>
		</div>

		<select id="type1" name="type1">
		<option value=''>--Select--</option>
		</select>
		<input type="hidden" name="airid" id="airid">
	</div>
	</div>

	<div id='onlytaxi' style='display:none'>
<div class="form-style-10" style='background-image:url(../public/images/taxi.jpg);background-repeat: no-repeat;
  width:91%;height:620px;'>
<h3>Check Taxi Availability</h3>
		<label style='margin-top:-15px;color:red'>Kindly contact the Admin Department to check availabilities of Taxis</label>

	</div>
	</div>
<!-- <div id="travellogo" style="background-image: url(../public/images/transport.jpg); width:99%;margin-top:100px;">
  </div> -->
</div>

