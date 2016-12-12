<head>
<style>
.align{
margin-top: 50px;

margin-left: 50px;
}
.butt {
    background: none repeat scroll 0 0 #e6567a ;
    border: 2px solid #e6567a ;
    height: 40px;
/*    margin: 80px 0 0 50px;
*/    width: 170px;
	cursor:pointer;
	color: #ffffff;  font-weight: 700;
}
p{

margin: 25px 0 0 20px;
//margin-top:50px;
font-size:20;
font-weight: bold;
}
.inner_section > form {
  padding: 0 20px 0 0;
}
#answer{
font-size:20;
text-align: left;
width: 400px;
font-weight: bold;
color:#e6567a;
}
#quiz_form label {
  font-size: 16px;
  line-height: 29px;
}
</style>
</head>
<div class="inner_section" style="width:99%;">

<form method='post' id='quiz_form'>
<?php  if($questions){
$i=1;
foreach($questions as $question){

	if($i == 1){?>
<div id="question_<?php echo $i;?>" class='questions'>
<p style='color:red;float:right'><?php echo $i." / ".count($questions);?></p>

<p style='color:red' id="question_<?php echo $i;?>"><?php echo $i.".".$question['question'];?></p>
<div class='align'>
<input type="radio" value="1" id='radio1_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans1_<?php echo $i;?>' for='1'><?php echo $question['answer1'];?></label>
<br/>
<input type="radio" value="2" id='radio2_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans2_<?php echo $i;?>' for='2'><?php echo $question['answer2'];?></label>
<br/>
<input type="radio" value="3" id='radio3_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans3_<?php echo $i;?>' for='3'><?php echo $question['answer3'];?></label>
<br/>
<input type="radio" value="4" id='radio4_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans4_<?php echo $i;?>' for='4'><?php echo $question['answer4'];?></label>

<input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $i;?>' name='<?php echo $i;?>'>
<input type='hidden' id='ans_<?php echo $i;?>' name="ans_<?php echo $i;?>" value='<?php echo $question['answer'];?>'>

</div>
<br/>
<input type="button" id='next<?php echo $i;?>' value='Next!' name='question' class='butt'/>
</div>
<?php }else if($i<1 || $i<count($questions)){?>
<div id="question_<?php echo $i;?>" class='questions'>
<p style='color:red;float:right'><?php echo $i." / ".count($questions);?></p>

<p style='color:red' id="question_<?php echo $i;?>"><?php echo $i.".".$question['question'];?></p>
<div class='align'>
<input type="radio" value="1" id='radio1_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans1_<?php echo $i;?>' for='1'><?php echo $question['answer1'];?></label>
<br/>
<input type="radio" value="2" id='radio2_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans2_<?php echo $i;?>' for='1'><?php echo $question['answer2'];?></label>
<br/>
<input type="radio" value="3" id='radio3_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans3_<?php echo $i;?>' for='1'><?php echo $question['answer3'];?></label>
<br/>
<input type="radio" value="4" id='radio4_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans4_<?php echo $i;?>' for='1'><?php echo $question['answer4'];?></label>
<input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $i;?>' name='<?php echo $i;?>'>
<input type='hidden' id='ans_<?php echo $i;?>' name="ans_<?php echo $i;?>" value='<?php echo $question['answer'];?>'>

</div>
<br/>
<input type="button" id='prev<?php echo $i;?>' value='Prev!' name='question' class='butt'/>
<input type="button" id='next<?php echo $i;?>' value='Next!' name='question' class='butt'/>
</div>


<?php }else if($i == count($questions)){?>
<div id="question_<?php echo $i;?>" class='questions'>
<p style='color:red;float:right'><?php echo $i." / ".count($questions);?></p>

<p style='color:red' id="question_<?php echo $i;?>"><?php echo $i.".".$question['question'];?></p>
<div class='align'>
<input type="radio" value="1" id='radio1_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans1_<?php echo $i;?>' for='1'><?php echo $question['answer1'];?></label>
<br/>
<input type="radio" value="2" id='radio2_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans2_<?php echo $i;?>' for='1'><?php echo $question['answer2'];?></label>
<br/>
<input type="radio" value="3" id='radio3_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans3_<?php echo $i;?>' for='1'><?php echo $question['answer3'];?></label>
<br/>
<input type="radio" value="4" id='radio4_<?php echo $i;?>' name='<?php echo $i;?>'>
<label id='ans4_<?php echo $i;?>' for='1'><?php echo $question['answer4'];?></label>
<input type="radio" checked='checked' value="5" style='display:none' id='radio4_<?php echo $i;?>' name='<?php echo $i;?>'>
<input type='hidden' id='ans_<?php echo $i;?>' name="ans_<?php echo $i;?>" value='<?php echo $question['answer'];?>'>

</div>
<br/>
<input type="button" id='prev<?php echo $i;?>' value='Prev!' name='question' class='butt'/>
<input type="button" id='next<?php echo $i;?>' value='Finish!' name='question' class='butt'/>

</div>




<?php }?>
<?php $i++;}?>
<input type="hidden" value="<?php echo $category;?>"  id='category' name='category'>
<input type="hidden" value="<?php echo $subcategory;?>"  id='subcategory' name='subcategory'>
<input type="hidden" value="<?php echo $this->session->userdata('site_userid');?>"  id='userid' name='userid'>
<input type="hidden" value="<?php echo count($questions)?>"  id='count' name='count'>
<input type="hidden" value="<?php echo base_url('elearning');?>"  id='redirect' name='redirect'>
<?php }else{?>
<p style='color:red'>NO QUESTIONS AVAILABLE</p>
<?php }?>
</form>
<div id='result'>

<br/>
</div>
<script>
$(document).ready(function(){
	//$('#demo1').stopwatch().stopwatch('start');
	var steps = $('form').find(".questions");
	var count = steps.size();
	steps.each(function(i){

		hider=i+2;
		if (i == 0) {
    		$("#question_" + hider).hide();
    		createNextButton(i);
        }
		else if(count==i+1){
			var step=i + 1;
			//$("#next"+step).attr('type','submit');
            $("#next"+step).click(function(){

			   submit();

            });
	    }
		else{
			//alert(hider);
			$("#question_" + hider).hide();
			createNextButton(i);
		}

	});
    function submit(){


	     $.ajax({
						type: "POST",
						url: "ajax.php",
						data: $('form').serialize(),
						success: function(msg) {
						  $("#quiz_form,#demo1").addClass("hide");
						  $('#result').show();
						  $('#result').append(msg);
						}
	     });

	}
	function createNextButton(i){
		var step = i + 1;
		var step1 = i + 2;
		var step2 = i + 3;
		//alert(i);
        $("#next"+step).click(function(){
		 //var id=e.target.id;

			$("#question_" + step).hide();
        	$("#question_" + step1).show();
        });
		$("#prev"+step1).click(function(){
		 //var id=e.target.id;

			$("#question_" + step1).hide();
        	$("#question_" + step).show();
        });
	}
	/*setTimeout(function() {
	      submit();
	}, 50000);*/
});
</script>
