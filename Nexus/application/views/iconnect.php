<head>
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
  background: #eac14d;
  padding: 0 20px 20px;
  top:120px;
  overflow: auto;
  z-index: 1001;
  position: absolute;
  width: 500px;
  min-height: 300px;
}

.closeBtn {
    background: url("../public/images/closeBtn.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: medium none;
    display: block;
    height: 22px;
    right: 10px;
    position: absolute;
    top: 12px;
    width: 22px;
}
.login{
	width:335px;
	//height:300px;
	float:left;
	margin-top: 20px;
	//margin-left: 50px;
	margin-right: 20px;
	background:url("../images/where.png")no-repeat 0 4px #9359bc;padding:0 12px 5px;
	text-align: right;
	}

.login h1,h6{
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

.elegant-aero label>span {
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
}
.elegant-aero input[type="text"], .elegant-aero input[type="email"],.elegant-aero textarea,
.elegant-aero select {
    color: #888;
    width: 70%;
	//margin-left: 27px;
    padding: 0px 0px 0px 5px;
    border: 1px solid #C5E2FF;
    background: #FBFBFB;
    outline: 0;
   // -webkit-box-shadow:inset 0px 1px 6px #ECF3F5;
    box-shadow: inset 0px 1px 6px #ECF3F5;
    font: 200 12px/25px Arial, Helvetica, sans-serif;
    height: 30px;
    line-height:15px;
    margin: 2px 6px 16px 0px;
	//float:left;
	//text-align:center;
}
.elegant-aero input[type="password"]{
color: #888;
    width: 70%;
	//margin-left: 27px;
    padding: 0px 0px 0px 5px;
    border: 1px solid #C5E2FF;
    background: #FBFBFB;
    outline: 0;
   // -webkit-box-shadow:inset 0px 1px 6px #ECF3F5;
    box-shadow: inset 0px 1px 6px #ECF3F5;
    font: 200 12px/25px Arial, Helvetica, sans-serif;
    height: 30px;
    line-height:15px;
    margin: 2px 6px 16px 0px;
}

.elegant-aero select {
    background: #fbfbfb url('down-arrow.png') no-repeat right;
    background: #fbfbfb url('down-arrow.png') no-repeat right;
   appearance:none;
   // -webkit-appearance:none;
   //-moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width: 70%;
	//margin-left: 27px;
	//text-align:center;
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
table.dataTable thead th, table.dataTable thead td, #policy.policy_info table, td, th {
  border: 1px solid #ffffff !important;
}
table.dataTable tbody tr.odd{background-color: #ffd8ff !important;}
table.dataTable tbody tr.even{ background-color: #ffffff  !important;}
.odd a {
  color: #333333 !important;
}
.even a {
  color: #909090 !important;
}

</style>


		<!-- The HTML5-Boilerplate CSS styling -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>/design/Template/css/sprite.tables.css">

</head>
<?php
 //$page = $_SERVER['PHP_SELF'];

//$sec = "30";

//header("Refresh: $sec; url=$page");

?>

<script type="text/javascript">
      jQuery(document).ready(function(){

		 //jQuery('#example').dataTable();

		 jQuery('#example').dataTable( {
      		"bSort": false,
      		"bLengthChange": false,
			"bAutoWidth": true,
			"bInfo": false,
      		"iDisplayLength": 20,
          	"sPaginationType": "simple_numbers",
				"aoColumnDefs": [
				 { 'bSortable': false, 'aTargets': [1] }
			]
				});
});
</script>
<div>
   <div class="question_head mb12">
      <h3>I Connect

	</h3>

     </div>

	<?php

	$_SESSION['username']=$this->session->userdata('site_user1');
?>




<h2>Online Users</h2>

     <table  id="example" width="730px" class="home_product_list">
                                 <thead>
                                  <tr style="background-color:#E6567A; font-size:13px; font-weight:bold; color:#fff; padding: 13px 18px;">
								  <th>Employee Name</th>
                                  <th>Online</th>


                                </tr>
                               </th>
							   </thead>



                              <tbody>
								<?php if(isset($listOfUsers))
							    {

							    foreach($listOfUsers->result() as $res)
								 {

							    ?>

                                    <tr style="background-color:#efefef;">
                                            <td>
                                            <?php if($_SESSION['username']==$res->username){ ?>
                                            		<a href="#" style="text-decoration:none">
                                                  <?php } else { ?>
                                                		<a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo str_replace('.','_',$res->username) ?>');">
                                                  <?php } ?>
                                                            <?php echo $res->name;  ?>
                                                </a>
                                            </td>
                                            <td><?php if($res->online==1)

									 {?><p id='circle_ol' style='align:center;'></p><?php }else{ ?>
									 <p id='circle_off' style='align:center;'>
									 <?php }?>
									 </td>



                                    </tr>

										 <?php

									  }
								  }
							  ?>
 </tbody>

			   </table>







