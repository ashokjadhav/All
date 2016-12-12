<head>
<style>
/* Elegant Aero */


.other_status{
	width:750px;
	//margin-top: 50px;
	//margin-left: 15px;
	margin-bottom: 20px;
	float:left;
	background:url("../images/where.png")no-repeat 0 4px #dd934d;padding:0 12px 5px;
	text-align: left;
	}
.other_status h1,h6{
	text-align:left;
	margin:15px 30px 30px 30px;
	}
.elegant-aero {
    margin-left:auto;
    margin-right:auto;
	//margin-top:50px;

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
h3{
 margin-left:30px;}
p{color:#fff;width: 95%;font-size:0.875em;font-family:'helvetica-neue-light',arial;margin-bottom: 10px;margin-top: 10px;float: left;}			
</style>
<link type="text/css" rel="stylesheet" media="all" href="<?php echo base_url();?>public/css/button.css" />
</head>
<div class="inner_section">
    
    
                    <div class="emp_listing_4 mb12">
                        <h3>
                            HR Forms
                        </h3>
                    </div>
					<div class="other_status">
					<?php if($hr_help_details){
					foreach($hr_help_details as $forms){?>
					
					<p class='action-button'><?php echo $forms->name ;?>
							<a style='float:right;font-weight: 100;' class="action-button animate red" title='Download' href='<?php echo site_url('hr_forms/download/'.$forms->id); ?>'> Download</a>
							
					 </p>
				  
			
			<?php }}else{?>
			
			<p class='action-button'>No Forms To Display</p>
			
			<?php }?>
			  </div>
                </div>