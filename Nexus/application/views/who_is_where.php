<head>
	<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-darkness/jquery-ui.min.css" rel="stylesheet">
	<style>
	/* Elegant Aero */
		.my_status{
			width:42%;
			float: right;
			margin-top: 50px;
			margin-left: 15px;
			margin-right: 20px;
			background: 0 4px #3db474;padding:0 12px 5px;
			text-align: left;
			}

		.my_status h1,h6{
			text-align:left;
			margin:15px 30px 30px 30px;
			}
		.login{
			width:335px;
			float:left;
			margin-top: 50px;
			margin-left: 15px;
			margin-right: 20px;
			background: 0 4px #3db474;padding:0 12px 5px;
			text-align: right;
			}

		.login h1,h6{
			text-align:left;
			margin:15px 30px 30px 30px;
			}
		.other_status{
			width:42%;
			margin-top: 50px;
			margin-left: 15px;
			margin-right: 20px;
			float:left;
			background: 0 4px #dd934d;padding:0 12px 5px;
			text-align: left;
			}
		.other_status h1,h6{
			text-align:left;
			margin:15px 20px 30px;
			}
		.elegant-aero {
			margin-left:auto;
			margin-right:auto;
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

		.elegant-aero label > span {
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
			font-family: "helvetica-neue-light",arial;
			font-size: 16px;
		}
		.elegant-aero input[type="text"], .elegant-aero input[type="email"],.elegant-aero textarea,
		.elegant-aero select {
			color: #888;
			width: 70%;
			padding: 0px 0px 0px 5px;
			border: 1px solid #C5E2FF;
			background: #FBFBFB;
			outline: 0;
			box-shadow: inset 0px 1px 6px #ECF3F5;
			font: 200 12px/25px Arial, Helvetica, sans-serif;
			height: 30px;
			line-height:15px;
			margin: 2px 6px 16px 0px;
			display: block;
		}
		.elegant-aero select, .my > input#from, .my > input#to {
			display: block;
		}
		.elegant-aero input[type="password"]{
		color: #888;
			width: 70%;
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

		.elegant-aero select {
			background: #fbfbfb  right;
			background: #fbfbfb  right;
			appearance:none;
			text-indent: 0.01px;
			text-overflow: '';
			width: 70%;
		}
		.elegant-aero .button{
			padding: 10px 30px 10px 30px;
			background: #4b98dc ;
			border: none;
			color: #FFF;
			box-shadow: 1px 1px 1px #4C6E91;
			text-shadow: 1px 1px 1px #5079A3;
			margin: 0 auto;
			display: block;
			font-size: 15px;
			font-family: "helvetica-neue-medium",arial;

		}
		.elegant-aero .button:hover{
			background: #3EB1DD;
			cursor:pointer;
		}
		h3{
			margin-left:30px;
		}
		.status-details{display: block; width: 100%;}
		.ui-autocomplete {
					max-height: 200px;
					overflow-y: auto;
					/* prevent horizontal scrollbar */
					overflow-x: hidden;
					/* add padding to account for vertical scrollbar */

			}
	</style>
</head>
<script type='text/javascript'>
	$(document).ready(function(){
		$("#my_status").change(function() {
			var a = $(this).val();
			if(a == 'Travel'){
				$('.my').css('display','block');
			}
			else if(a == 'In Office' || a==''){
					$('.my').css('display','none');
				}
		});
	});
</script>

<div class="inner_section">

	<div class="emp_listing_3 mb12">

		<h3>Who Is Where</h3>

	</div>
		<div class="status-details">

			<div class="other_status">

				<h6>SEARCH STATUS</h6>

				<form id="search" method="post" class="elegant-aero">

					<h1 class='error' style='display:none;color: rgb(255,0,0);'>
						<span>No Status Found</span>
					</h1>

					<p>

						<label>
							<span> Name :</span>
							<div class='searchresult'>
								<input id="name" type="text" name="name" placeholder="Employee Name" required>
								<input type="hidden" name="empid" id="empid">
							</div>
						</label>

						<label class='other' style='display:none'>
							<span> Department :</span>
							<input id="department" type="text" name="department" readonly>
						</label>

						<label class='other' style='display:none'>
							<span> Designation :</span>
							<input id="designation" type="text" name="designation" readonly>
						</label>

						<label  class='other' style='display:none'>
							<span>Status :</span>
							<input id="status" type="text" name="status" readonly>
						</label>

						<label  class='othertravel' style='display:none' >
							<span>From :</span>
							<input id="from1" type="text" name="from1" readonly>
						</label>

						<label class='othertravel'  style='display:none'>
							<span>To:</span>
							<input id="to1" type="text" name="to1" readonly>
						</label>

						<label>
							<span>&nbsp;</span>
							<button type='button' id='btnsearch' class="button">Search</button>
						</label>

					</p>

				</form>

			</div>
			<div class="my_status">

				<h6>MY STATUS</h6>

					<form action="<?php echo site_url('who_is_where/add');?>" method="post" class="elegant-aero">

						<p>

							<label>
								<span>Your Name :</span>
								<input id="name" type="text" name="name" placeholder="" readonly value='<?php echo $Details[0]['name'];?>'>
								<input type="hidden" name="empid" id="empid" value="<?php echo $Details[0]['id'];?>">
							</label>

							<label>
								<span>Department :</span>
								<input id="department" type="text" name="department" placeholder="" readonly value='<?php echo $Details[0]['department']?>'>
							</label>

							<label>
								<span>Designation :</span>
								<input id="designation" type="text" name="designation" placeholder="" readonly value='<?php echo $Details[0]['designation']?>'>
							</label>

							<label>
								<span>Status :</span>
								<select name="my_status" id='my_status'>
									<option value="">--Select--</option>
									<option value="In Office" <?php if($Details[0]['mystatus']=='In Office'){echo 'selected';}?>>In Office</option>
									<option value="Out Of Station" <?php if($Details[0]['mystatus']=='Out Of Station'){echo 'selected';}?>>Out Of Station</option>
									<option value="On Leave" <?php if($Details[0]['mystatus']=='On Leave'){echo 'selected';}?>>On Leave</option>
									<option value="In Training-DND" <?php if($Details[0]['mystatus']=='In Training-DND'){echo 'selected';}?>>In Training-DND</option>
									<option value="Out Of Office Locally" <?php if($Details[0]['mystatus']=='Out Of Office'){echo 'selected';}?>>Out Of Office Locally</option>
									<option value="In Imp. Meeting-DND" <?php if($Details[0]['mystatus']=='In Imp. Meeting-DND'){echo 'selected';}?>>In Imp. Meeting-DND</option>
								</select>
							</label>

							<label  class='my' style='display:none'>
								<span>From :</span>
								<input id="from" type="text" name="from" placeholder="">
							</label>

							<label class='my' style='display:none'>
								<span>To:</span>
								<input id="to" type="text" name="to" placeholder="">
							</label>

							<label>
								<span>&nbsp;</span>
								<input type="submit" class="button" id='submit' name='submit' value="Submit">
							</label>

						</p>

					</form>

				</div>
			</div>
		</div>
<script>
  $(function() {
	  var baseURL = "<?php echo base_url();?>";
	  $.ajax({
                type: "GET",
                dataType: "json",
                url: baseURL+"who_is_where/list_employee_name/",
                success: function(data) {

                   if(data!=''){
				      a= data.map(function(elem){
					  return elem.name;
				      }).join(',');

				var array = a.split(',');
				//console.log(array);

				   }



    $("#name").autocomplete({
      source: array,
	  select: function(event, ui) {
          var name = ui.item.value;
         $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: baseURL+"who_is_where/get_emp_id/"+name,
                    success: function(response) {
                    $.each(response, function(i, v) {
                       $("#empid").val(v.id);
                     });
					 $('.other').css('display','none');
                     $('.othertravel').css('display','none');
                    }
                });
    },
    });
	   }
	   });
  });
  </script>
<script type='text/javascript'>
$(document).ready(function(){
	$("button").click(function() {
	var userid = $('#empid').val();
	var baseURL = "<?php echo base_url();?>";

	$.ajax({
		url: baseURL+'who_is_where/search/'+userid,
		type: 'POST',
		data:null,
		dataType: 'json',
		success: function(data) {
			if(data !=''){
		$('.error').css('display','none');
		$.each(data, function(i, item) {
			$('#designation').val(item.designation);
			$('#department').val(item.department);
			 $('#status').val(item.status);
			 var a = item.status;
			//alert(a);
			$('.other').css('display','block');
			if(a == 'Travel'){

			$('#from1').val(item.from);
			$('#to1').val(item.to);
			$('.othertravel').css('display','block');
			}else{
			$('.othertravel').css('display','none');

			}

		});

			}else{
			$('.error').css('display','block');
			$('.other').css('display','none');
			$('.othertravel').css('display','none');


			}
		}
	});
	});
	$('#from').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
	//minDate: 0,
	closeOnDateSelect: true,
	onSelectDate: function() {
		 var b = $('#from').val();

	$('#to').datetimepicker({
		 timepicker:false,
		 format:'Y-m-d',
		  minDate: b,
		formatDate:'Y-m-d',
		 closeOnDateSelect: true,


	});

	},

	});
});
</script>