<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href='<?php echo base_url()?>public/css/book_form.css' rel='stylesheet' type='text/css'>
<style>
	#cancel_form label.error {
	  color:#FB3A3A;
	  font-weight:bold;
	}
	#book1 img{
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
        <label id='msg' style='color:red'>
			<?php echo $this->session->flashdata('success'); ?>
		</label>
	</div>
    <?php }else{ ?>

	<div class="form-style-10 Ticket">
		<h1>Cancel Ticket!</h1>
		<form method='post' id='cancel_form' name='cancel_form' action='<?php echo site_url('travel_desk/cancel');?>' novalidate="novalidate">
			
			<label id='msg' style='color:red'>
				To cancel your Ticket  please enter the Ticket PNR number
			</label>

					<div class="section 1">
						<span>1</span>
						TICKET PNR/NUMBER :
					</div>
					<div class="inner-wrap">
						<label>	
							<input type="text" name="pnr" id="pnr" />
						</label>
						<label id='error' style='display:none;color:red'>
							NO DATA FOUND
						</label>
						<label id='validate' style='display:none;color:red'>
							Please Enter Ticket/PNR Number
						</label>
					</div>
			<div id='book1' style='display:none;'>
				<img src='http://nexus.php-dev.in/public/images/gif-load.gif'/></div>
				<div id='book' style='display:none;'>
					<div class="section 2">
						<span>2</span>
						Booking Information
					</div>
					<div class="inner-wrap">
					<input type="hidden" name="user" id="user" value='<?php echo $this->session->userdata('site_userid');?>'/>
					<input type="hidden" name="authority" id="authority"/>
						<label>
							SELECT MODE :
						</label>
						<select id="mode" name="mode" disabled>
							<option value=''>--Select--</option>
							<option value='AIR'>AIR</option>
							<option value='RAIL'>RAIL</option>
							<option value='ROAD'>ROAD</option>
							<option value='OTHERS'>OTHERS</option>
						</select>

						<label>
							FROM :
								<select id='from' name='from' disabled>
									<option value=''>--Select--</option>
									<?php foreach($locations as $location){?>
									<option value='<?php echo $location['name'];?>'><?php echo $location['name'];?></option>
									<?php } ?>
								</select>
						</label>

						<label>
							TO :
							<select id='to' name='to' disabled>
								<option value=''>--Select--</option>
								<?php foreach($locations as $location){?>
								<option value='<?php echo $location['name'];?>'><?php echo $location['name'];?></option>
								<?php } ?>
							</select>

						<label>

							DATE OF TRAVEL :
								<input type="text" name="travel_date" id="travel_date" disabled/>
						</label>

						<label>

							PREFFERED TIME :
								<div style="width:250px;float:right;">
								TO:
									<input type="text" name="travelt_time" id="travelt_time" style="width:40%;" disabled/>
								</div>

								<div style="width:250px;float:right;">
								FROM:
									<input type="text" name="travel_time" id="travel_time" style="width:40%;" disabled/>
								</div>
						
						</label>
						<br><br>
						<div id='return' style='display:none'>
							<label>RETURN DATE :<input type="text" name="return_date" id="return_date" disabled/></label>
							<label>RETURN PREFFERED TIME :<div style="width:250px;float:right;">TO:<input type="text" name="R_travelt_time" id="R_travelt_time" style="width:40%;" disabled/></div><div style="width:250px;float:right;">FROM:<input type="text" name="R_travel_time" id="R_travel_time" style="width:40%;" disabled/></div></label>
						</div>

					</div>

					<div class="section 3">
						<span>3</span>
							REASON FOR CANCELLATION :
					</div>
					<div class="inner-wrap">
						<label>
							<textarea rows='5' cols='40' id='reason' name='reason'></textarea>
						</label>
					</div>

					<div class="button-section">
						<input type="submit" name="cancel" id='cancel' onclick="{return confirm('Are you sure you want to revoke this booking?');}">

					</div>
				</div>
				<div class="button-section butt">
					<button type="button" id='can'>Submit</button>
				</div>
			</form>
		</div>
		<?php } ?>
		<script type="text/javascript">
			//add datepicker to select date
			$('#travel_date').datetimepicker({
				timepicker:false,
				format:'Y-m-d',
				minDate: 0,
				closeOnDateSelect: true,

			});

			//add timepicker for select time
			$('#travel_time').datetimepicker({
			    datepicker:false,
				format:'H:i',
				onSelectTime: function() {
					var b = $('#travel_time').val();
					$('#travelt_time').datetimepicker({
						datepicker:false,
						minTime:b,
						format:'H:i',
						closeOnTimeSelect: true

					})


				},
				closeOnTimeSelect: true

			});

			//load all travel information 
			$( "#can" ).click(function() {
				var id = $('#pnr').val();
				if(id!=''){
					$('#validate').hide();
					$('#book1').show();
					setTimeout(function(){
						$.ajax({
							type: "GET",
							dataType: "json",
							url: baseUrl+"travel_desk/get_details/"+id,
							success: function(response) {
								if(response!=''){
									$('#error').hide();
									$('#msg').hide();
									$('#book1').hide();
									$('#pnr').attr('disabled','disabled');
									$.each(response, function(i, item) {
										$('#book').show();
										$('#mode').val(item.mode);
										$('#authority').val(item.authority);
										$('#from').val(item.from);
										$('#to').val(item.to);
										$('#travel_date').val(item.travel_date);
										$('#travel_time').val(item.travel_time);
										$('#travelt_time').val(item.travelt_time);
										if(item.return_date!=''){
											$('#return').show();
											$('#radio6').attr('checked','checked');
											$('#return_date').val(item.return_date);
											$('#R_travel_time').val(item.Rtrn_travel_time);
											$('#R_travelt_time').val(item.Rtrn_travelt_time);
										}
									});
									$('.butt').hide();
								}
								else{
									$('#book1').hide();
									$('#error').show();
									$('.butt').show();
								}
							}
						});
					}, 1000);
				}
				else{
					$('#validate').show();	
				}
			});

			//
			$("#from").change(function() {
				if($(this).data('options') == undefined){
					/*Taking an array of all options-2 and kind of embedding it on the select1*/
					$(this).data('options',$('#to option').clone());
				}
				var id = $(this).val();
				var options = $(this).data('options').filter('[value!=' + id + ']');
				$('#to').html(options);
			});

			//Validation for cancellation form
			$("#cancel_form").validate({
				// Specify the validation rules
				rules: {
					reason: "required"
				},

				// Specify the validation error messages
				messages: {
					reason: "Please specify reason for ticket cancellation"
				},
				submitHandler: function(form) {
					form.submit();
				}
			});
		</script>