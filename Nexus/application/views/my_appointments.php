<head>
<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/ui-darkness/jquery-ui.min.css" rel="stylesheet">
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
			  background: #FFCC99;
			  padding: 0 20px 20px;
			  top:120px;
			  overflow: auto;
			  z-index: 1001;
			  position: absolute;
			  width: 500px;
			  min-height: 300px;
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


			.ui-autocomplete {
								max-height: 200px;
								z-index:11111;
								overflow-y: auto;
								/* prevent horizontal scrollbar */
								overflow-x: hidden;
								/* add padding to account for vertical scrollbar */

			}


	</style>

</head>


<div>
   <div class="question_head mb12">
      <h3>my appointments</h3>
   </div>
	<span style="float:right;margin-right:20px;"><a id='add' class="modalLink" href="#">ADD NEW</a></span>
	<div class="appointment_table black_color">
		<?php if($appoinements){?>
		   <table>
				<thead>
				  <tr>
				  <th>appointment with</th>
				  <th>appointment date</th>
				   <th>day</th>
					<th>description</th>
					<th>timing</th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody><?php foreach($appoinements as $apointment){?>
					<tr>
					<td><?php if($this->session->userdata('site_userid')==$apointment['from_name'])
					{echo $apointment['tname'];}
					elseif($this->session->userdata('site_userid')==$apointment['to_name'])
					{echo $apointment['fname'];}?></td>
					<td><?php  $newDate = date("d M Y", strtotime($apointment['appointment_date']));
					echo $newDate;?></td>
					<td><?php $weekday = date('l', strtotime($apointment['appointment_date']));
					echo $weekday;?></td>
					<td><?php echo $apointment['reason'];?></td>
					<td>
					<?php $fromtime=date("g:i A", strtotime($apointment['from_time']));
					$totime=date("g:i A", strtotime($apointment['to_time']));
					echo $fromtime.' TO '.$totime;?></td>
					<td><a class="modalLink" id="<?php echo $apointment['id'];?>">EDIT</a></td>

				  </tr> <?php }?>
				</tbody>
			</table>
		<?php }?>
      </div>
	</div>


<div class="overlay"></div>
      <div class="modal">
		<a href="#" class="closeBtn"></a>
	<div class='app_0' style='display:none'>
		<form action="<?php echo site_url('my_appointments/add');?>" method="post" enctype="multipart/form-data" class="wufoo" name="" id="addappt">
		<p style="color:#222;">Appointment Booking and Scheduling Form<p>
		<ul>
		<li class="notranslate" id="fo435li1">
			<label for="Field1" id="title1" class="desc">Name
				<span class="req" id="req_1">*</span>
			</label>
			<span>
				<input type="text"  class="field text fn name1" name="firstname" id="firstname1" required>

			</span>

		</li>
		<li class="phone notranslate" id="fo435li9"><br><br>
			<label for="Field9" id="title9" class="desc">
				Phone Number
				<span class="req" id="req_9">*</span>
			</label>
			<span>
				<input type="text" value="" class="field text" name="contact" id="Field9" required  pattern ="[0-9]{1,10}">
			</span>
		</li>
		<li class="notranslate" id="fo435li17">
			<label for="Field17" id="title17" class="desc">
				Reason for appointment
					</label>
			<div>
				<textarea cols="50" rows="10" spellcheck="true" class="field textarea small" name="reason" id="Field17"></textarea>
		</div>
			</li>
			<li class="date notranslate" id="fo435li10">
				<label for="Field10" id="title10" class="desc">
					Appointment Date
					<span class="req" id="req_10">*</span>
				</label>
				<span>
					<input type="date"  value="" class="field text ashok" name="appointment_date" id="Field10-1" required>
				</span>
		   </li>
			<li class="time notranslate" id="fo435li11">
				<label for="Field11" id="title11" class="desc">
					Appointment Time
					<span class="req" id="req_11">*</span>
				</label>
				<span class="hours">
					<input type="text"   size="8"  class="field text" name="from_time" id="Field11" required>
					<label for="Field11">FROM</label>
				</span>
				<span>
					<input type="text"  size="8" class="field text ln" name="to_time" id="Field22" required>
					<label for="Field22">TO</label>
				</span>
			</li>
			<li class="buttons "><br>
				<div>

					 <input type="submit"  value="Submit" class="btTxt submit" name="submit" id="saveForm">
				</div>
			</li>
		</ul>
	  </form>
	  </div>
<?php if($appoinements){

foreach($appoinements as $apointment){?>
	  <div class='demo app_<?php echo $apointment['id'];?>'  style='display:none'>
			<form action="<?php echo site_url('my_appointments/edit/'.$apointment['id']);?>" method="post" enctype="multipart/form-data" class="wufoo" name="" id="">
			<p style="color:#222;">Appointment Booking and Scheduling Form<p>
		<ul>
		<li class="notranslate" id="fo435li1">
			<label for="Field1" id="title1" class="desc">Name
				<span class="req" id="req_1">*</span>
			</label>
			<span>

				<input type="text" value="<?php if($this->session->userdata('site_userid')==$apointment['from_name'])
					{echo $apointment['tname'];}
					elseif($this->session->userdata('site_userid')==$apointment['to_name'])
					{echo $apointment['fname'];}?>" class="field text fn name1" name="firstname" id="ui_<?php echo $apointment['id'];?>" required>

			</span>

		</li>

			<li class="phone notranslate" id="fo435li9"><br><br>
			<label for="Field9" id="title9" class="desc">
				Phone Number
				<span class="req" id="req_9">*</span>
			</label>
			<span>
				<input type="text"  value="<?php echo $apointment['contact'];?>" class="field text" name="contact" id="Field9" required  pattern ="[0-9]{1,10}">
			</span>
		</li>
		<li class="notranslate" id="fo435li17">
			<label for="Field17" id="title17" class="desc">
				Reason for appointment
					</label>
			<div>
				<textarea cols="50" rows="10" spellcheck="true" class="field textarea small" name="reason" id="Field17"><?php echo $apointment['reason'];?></textarea>
		</div>
			</li>
			<li class="date notranslate" id="fo435li10">
				<label for="Field10" id="title10" class="desc">
					Appointment Date
					<span class="req" id="req_10">*</span>
				</label>
				<span>
					<input type="date"  value="<?php echo $apointment['appointment_date'];?>" class="field text ashok" name="appdate" id="appdate" required>
				</span>
		   </li>
			<li class="time notranslate" id="fo435li11">
				<label for="Field11" id="title11" class="desc">
					Appointment Time
					<span class="req" id="req_11">*</span>
				</label>
				<span class="hours">
					<input type="text"   size="8"  class="field text" name="appf_time" id="appf_time" value='<?php echo date('H:i',strtotime($apointment['from_time']));?>' required>
					<label for="Field11">FROM</label>
				</span>
				<span>
					<input type="text"  size="8" class="field text ln" name="appt_time" id="appt_time" value='<?php echo date('H:i',strtotime($apointment['to_time']));?>' required>
					<label for="Field22">TO</label>
				</span>
			</li>
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
	  $('a').removeClass('modalLink');
	  $('a#add').addClass('modalLink');
   $('a#add').click(function() {
	  $('.app_0').show();
		$('.demo').hide();
       });



	$('a').not(".modalLink,#add").click(function(e){
		$('.demo').hide();
		var id=e.target.id;
		var a = $(this).attr('id');
		//alert(a);

		$('.app_0').hide();
		$('.app_'+a).show();


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
				console.log(array);

				   }



    $(".name").autocomplete({
      source: array
    });

	   }
	   });


		});
	$('.name1').focusout(function(){
		//alert($(this).val());
		var first= $(this).val();
		 //alert(first);
		 var a = new Array();
		$.ajax({
		url: 'my_appointments/get_user/'+first,
		type: 'GET',
		data:null,
		dataType: 'json',
		success: function(data) {
			if(data!=''){
	a= data.map(function(elem){
    return elem.appointment_date;
    }).join(',');
     var array = a.split(',');
			}



$('#Field10-1').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
		 minDate: 0,
	disabledDates:array,
		  formatDate:'Y-m-d',
		 onSelectDate: function() {
		 var a = $('#Field10-1').val();
		 //console.log(date)

	var today = new Date();
		 var dd = today.getDate();
		 var mm = ("0" + (today.getMonth() + 1)).slice(-2); //January is 0!
		 var yyyy = today.getFullYear();
		today = yyyy+'-'+mm+'-'+dd;

			if(a !== today ){


				var min = '00:00';

			}
$('#Field11').datetimepicker({

  datepicker:false,
   format:'H:i',
   minTime:min,
   interval:15,

onSelectTime: function() {

 var x = (Number(($('#Field11').val().substr(0, 2))) + 1).toString() + $('#Field11').val().substr(2, 5);

$('#Field22').datetimepicker({
  datepicker:false,


minTime:x,
	format:'H:i',
		interval:30,
 closeOnTimeSelect: true

})


  },
 closeOnTimeSelect: true

});

	 },


closeOnDateSelect: true
	});


$('#appdate').datetimepicker({
	 timepicker:false,
      format:'Y-m-d',
		 minDate: 0,
		 disabledDates:array,
		  formatDate:'Y-m-d',
		 onSelectDate: function() {
		 var a = $('#appdate').val();
		 //console.log(date)

	var today = new Date();
		 var dd = today.getDate();
		 var mm = ("0" + (today.getMonth() + 1)).slice(-2); //January is 0!
		 var yyyy = today.getFullYear();
		today = yyyy+'-'+mm+'-'+dd;

			if(a !== today ){


				var min = '00:00';

			}
$('#appf_time').datetimepicker({

  datepicker:false,
   format:'H:i',
   minTime:min,
   interval:15,

onSelectTime: function() {
//var b = $('#appf_time').val();
var b = (Number(($('#appf_time').val().substr(0, 2))) + 1).toString() + $('#appf_time').val().substr(2, 5);
$('#appt_time').datetimepicker({
  datepicker:false,

minTime:b,

	format:'H:i',
		interval:30,
 closeOnTimeSelect: true

})


  },
 closeOnTimeSelect: true

});

	 },


closeOnDateSelect: true
	});
}
		});

	});


});
	</script>
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
				console.log(array);

				   }



    $(".name1").autocomplete({
      source: array
    });

	   }
	   });
  });
  </script>

