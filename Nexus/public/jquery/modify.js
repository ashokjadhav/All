$(document).ready(function(){
	$.validator.addMethod("valueNotEquals", function(value){
		return value != '';
	}, "Value must not equal arg.");

	//validations for empty fields
	$("#modify_form").validate({
	// Specify the validation rules
		rules: {
			       mode: "required",
			travel_date: "required",
			return_date: "required",
			travel_time: "required",
	       travelt_time: "required",
	      R_travel_time: "required",
	     R_travelt_time: "required",
			       from: { valueNotEquals: "" },
			         to: { valueNotEquals: "" },
			  authority: { valueNotEquals: "" },
			       type: {valueNotEquals: "" },
			  stayplace: "required",
			  chkindate: "required",
			 chkoutdate: "required",
			    reason1: "required",
			  stayplace: "required",
			  chkindate: "required",
			 chkoutdate: "required"
		},

	// Specify the validation error messages
		messages: {
			
			travel_date: "Please Select Travel Date",
			travel_time: "Please Select Preffered [FROM] Time",
			   travelt_time: "Please Select Preffered [TO] Time",
			   R_travel_time:"Please Select Return Preffered [FROM] Time",
			 R_travelt_time: "Please Select Return Preffered [TO] Time",
			return_date: "Please Select Return Date",
			       from: { valueNotEquals: "Please select From City!" },
					 to: { valueNotEquals: "Please select TO City!" },
			  authority: { valueNotEquals: "Select the Name of Approving Authority" },
				   type: { valueNotEquals: "Please select Flight Type!" },
			  stayplace: "Please Select your Place OF Stay",
			  chkindate: "Please Select your Check In Date",
		     chkoutdate: "Please Select your Check Out Date",
			       mode: "Please Select mode of Travel",
			    reason1: "Please specify reason for change",
			 stayplace1: "Please Select your Place OF Stay",
			 chkindate1: "Please Select your Check In Date",
			chkoutdate1: "Please Select your Check Out Date"

		},

		submitHandler: function(form) {
			form.submit();
		}
	});
	//display flight types for AIR mode
	$('#mode').change(function(){
		var a = $(this).val();
		if(a == 'AIR'){
			$('#onlyflight').show();
		}else{
			$('#airid').val('');
			$('#type').val('');
			$('#onlyflight').hide();
		}
	});
	$("#from").change(function() {
		if($(this).data('options') == undefined){
		/*Taking an array of all options-2 and kind of embedding it on the select1*/
		$(this).data('options',$('#to option').clone());
		}
		var id = $(this).val();
		var options = $(this).data('options').filter('[value!=' + id + ']');
		$('#to').html(options);
		});

	//display fields for hotel booking
	$( "#radio3" ).change(function() {
		 if($(this).is(":checked")){ 
		$('#extra_book').val('hotel');
		$('#other_booking').show();
		}else {
		$('#extra_book').val('');
		$('#other_booking').hide();
		}
	});

	//display fields for guesthouse booking
	$( "#radio4" ).change(function() {
		 if($(this).is(":checked")){ 
		$('#extra_book1').val('guesthouse');
		$('#other_booking1').show();
		}else {
		$('#extra_book1').val('');
		$('#other_booking1').hide();
		}
	});

	$( "#radio5" ).change(function() {
		 if($(this).is(":checked")){
		 $('#return_date').val('');
		
		$('#return').hide();
		}});

	$( "#radio6" ).change(function() {
		 if($(this).is(":checked")){
		
		$('#return').show();
		}


	});

	//Fetch domestic flights on ckecked
	$( "#radio1" ).change(function() {
		var id = $('#radio1').val();
		if(id == 'on'){
			var data = 'domestic';
			$.ajax({
				type: "GET",
				dataType: "json",
				url: baseUrl+"travel_desk/get_airlines/"+data,
				success: function(response) {
					$('#type').empty();
					$('#type').append('<option value="">--Select--</option>');
					$.each(response, function(k, v) {
						$('#type').append('<option value="'+v.id+'">'+v.name+'</option>');
					});
				}
			});
		}
	});
	//Fetch international flights on ckecked
	$( "#radio2" ).change(function() {
		var id = $('#radio2').val();
		if(id == 'on'){
			var data = 'INTERNATIONAL';
			$.ajax({
				type: "GET",
				dataType: "json",
				url: baseUrl+"travel_desk/get_airlines/"+data,
				success: function(response) {
					$('#type').empty();
					$('#type').append('<option value="">--Select--</option>');
				$.each(response, function(k, v) {
					
					$('#type').append('<option value="'+v.id+'">'+v.name+'</option>');
				});

				   
				}
		

			});
		}
	});

	//set airlines id on select of flight type
	$('#type').change(function(){
	var d = $(this).val();
	
	$('#airid').val(d);

	});

});

$('#travel_date').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
	minDate: 0,
	onSelectDate: function(){
			var y = $('#travel_date').val();
            $('#return_date').datetimepicker({
				 format:'Y-m-d',
	 timepicker:false,
	 minDate: y,
	 formatDate:'Y-m-d',

	closeOnDateSelect: true

})
			 },
 closeOnDateSelect: true,

});

$('#travel_time').datetimepicker({

  datepicker:false,
   format:'H:i',
   onSelectTime: function() {
      
 var x = (Number(($('#travel_time').val().substr(0, 2))) + 1).toString() + $('#travel_time').val().substr(2, 5);
     //alert(x);
$('#travelt_time').datetimepicker({
  datepicker:false,


minTime:x,
	format:'H:i',
		interval:30,
 closeOnTimeSelect: true

})


  },
 closeOnTimeSelect: true

});

$('#R_travel_time').datetimepicker({

  datepicker:false,
   format:'H:i',
   onSelectTime: function() {
      
 var x = (Number(($('#R_travel_time').val().substr(0, 2))) + 1).toString() + $('#R_travel_time').val().substr(2, 5);
     //alert(x);
$('#R_travelt_time').datetimepicker({
  datepicker:false,


minTime:x,
	format:'H:i',
		interval:30,
 closeOnTimeSelect: true

})


  },
 closeOnTimeSelect: true

});

 $('#chkindate').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
	//minDate: 0,
	onSelectDate: function(){
		 var x= $('#chkindate').val();
		 $('#chkoutdate').datetimepicker({
			 format:'Y-m-d',
	 timepicker:false,
	 minDate: x,
	 formatDate:'Y-m-d',
	 closeOnDateSelect: true

})

	 },
closeOnDateSelect: true,

});

$('#chkindate1').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
	//minDate: 0,
	onSelectDate: function(){
		 var x= $('#chkindate1').val();
		 $('#chkoutdate1').datetimepicker({
			 format:'Y-m-d',
	 timepicker:false,
	 minDate: x,
	 formatDate:'Y-m-d',
	 closeOnDateSelect: true

})

	 },
closeOnDateSelect: true,

});

$( "#mod" ).click(function() {
		var id = $('#pnr').val();
		 if(id!=''){
			$('#validate').hide();
			$('#book_modify1').show();
			setTimeout(function(){
				$.ajax({
						type: "GET",
					dataType: "json",
						 url: baseUrl+"travel_desk/get_details/"+id,
					 success: function(response) {
						
						if(response!=''){
						$('#error').hide();
						$('#msg').hide();
						$('#book_modify1').hide();
						$.each(response, function(i, item) {
							$('#book_modify').show();
							$('#from').val(item.from);
							$('#to').val(item.to);
							$('#travel_date').val(item.travel_date);
							$('#travel_time').val(item.travel_time);
							$('#travelt_time').val(item.travelt_time);
							$('#authority').val(item.authority);
							$('#mode').val(item.mode);
							if(item.return_date!=''){
								$('#return').show();
								$('#radio6').attr('checked','checked');
								$('#return_date').val(item.return_date);
								$('#R_travel_time').val(item.Rtrn_travel_time);
								$('#R_travelt_time').val(item.Rtrn_travelt_time);
							}
							if(item.mode == 'AIR'){
								$('#onlyflight').show();
								$('#airid').val(item.airlines_id);
								var id = item.flight_type;
								if(id == 'domestic'){
									$('#radio1').attr('checked','checked');
								}else{
									$('#radio2').attr('checked','checked');
								}
									$.ajax({
										type: "GET",
										dataType: "json",
										url: baseUrl+"travel_desk/get_airlines/"+id,
										success: function(response) {
											$.each(response, function(k, v) {
												if(item.flight_name == v.name){
												var z ='selected';}
												else{
												z='';}
												$('#type').append('<option value="'+v.name+'" '+z+'>'+v.name+'</option>');
											
											});
										}
									});
								}
								if(item.hotel !=0 ){
									
									$('#other_booking').show();
									$('#extra_book').val(item.hotel);
									$('#radio3').attr('checked','checked');
									$('#stayplace').val(item.stayplace);
									$('#chkindate').val(item.checkin_date);
									$('#chkoutdate').val(item.checkout_date);
									$('#instructions').val(item.instructions);

									}
								if(item.guesthouse !=0 ){
									$('#other_booking1').show();
									$('#extra_book1').val(item.guesthouse);
									$('#radio4').attr('checked','checked');
									$('#stayplace1').val(item.guest_place);
									$('#chkindate1').val(item.guest_checkin);
									$('#chkoutdate1').val(item.guest_checkout);
									$('#instructions1').val(item.guest_instructions);

									}
							});
							$('.butt').hide();
							}else{
							$('#book_modify1').hide();
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
