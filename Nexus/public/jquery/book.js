$(document).ready(function(){
	$.validator.addMethod("valueNotEquals", function(value){
	return value != '';
	}, "Value must not equal arg.");

	//validation for empty fields
	$("#book_form").validate({
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
				 stayplace1: "required",
				 chkindate1: "required",
				chkoutdate1: "required"

				//chkoutdate: "required"
		},

		// Specify the validation error messages
		messages: {
				       mode: "Please Select mode of Travel",
				travel_date: "Please Select Travel Date",
				return_date: "Please Select Return Date",
				travel_time: "Please Select Preffered [FROM] Time",
			   travelt_time: "Please Select Preffered [TO] Time",
			  R_travel_time: "Please Select Return Preffered [FROM] Time",
			 R_travelt_time: "Please Select Return Preffered [TO] Time",
				       from: { valueNotEquals: "Please select From City!" },
				         to: { valueNotEquals: "Please select TO City!" },
				  authority: { valueNotEquals: "Select the Name of Approving Authority" },
				       type: { valueNotEquals: "Please select Flight Type!" },
				  stayplace: "Please Select your Place OF Stay",
				  chkindate: "Please Select your Check In Date",
				 chkoutdate: "Please Select your Check Out Date",
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
			$('#onlyflight').hide();
		}
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

	$("#from").change(function() {
		if($(this).data('options') == undefined){
		/*Taking an array of all options-2 and kind of embedding it on the select1*/
		$(this).data('options',$('#to option').clone());
		}
		var id = $(this).val();
		var options = $(this).data('options').filter('[value!=' + id + ']');
		$('#to').html(options);
		});

	//add datepicker to travel date
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

	//add timepicker to travel date
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

		//add timepicker to travel date
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
		onSelectDate: function(){
			var x= $('#chkindate').val();
			$('#chkoutdate').datetimepicker({
				format:'Y-m-d',
				timepicker:false,
				minDate: x,
				formatDate:'Y-m-d',
				onSelectDate: function(){
					var y = $('#chkoutdate').val();
					$('#chkindate1').datetimepicker({
						format:'Y-m-d',
						timepicker:false,
						minDate: y,
						formatDate:'Y-m-d',
						closeOnDateSelect: true

					})
				},
				closeOnDateSelect: true

			})
		},
		closeOnDateSelect: true,

	});
	var y = $('#chkoutdate').val();
	if(y==''){
		$('#chkindate1').datetimepicker({
			timepicker:false,
			format:'Y-m-d',
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

	}
