<?php
	define ('DBPATH','localhost');
	define ('DBUSER','nexusphp_nexus');
	define ('DBPASS','nexus');
	define ('DBNAME','nexusphp_ci_admin');
	session_start();
	global $dbh;
	$dbh = mysql_connect(DBPATH,DBUSER,DBPASS);
	mysql_selectdb(DBNAME,$dbh);

	$category = $_POST['category'];
	$subcategory = $_POST['subcategory'];
	$userid = $_POST['userid'];
	$redirect = $_POST['redirect'];
	$count = $_POST['count'];
	$right_answer=0;
	$wrong_answer=0;
	$unanswered=0;
	for($i=1;$i<=$count;){
		if($_POST['ans_'.$i]==$_POST["$i"]){
			$right_answer++;
		}else if($_POST["$i"]==5){
				   $unanswered++;
			   }
			   else{
				   $wrong_answer++;
			   }
			   $i++;
	}
	$details=array("categoryid"=>$category,"sub_category"=>$subcategory,"score"=>$right_answer,"wrong"=>$wrong_answer,"unanswered"=>$unanswered);
	//var_dump($details);exit;
	$result1=mysql_query("select * from quiz_scores where categoryid='".$category."' AND subcategory='".$subcategory."' AND user_id='".$userid."'");
	while($data=mysql_fetch_array($result1)){
		$id = $data['id'];
			}
	$num_rows = mysql_num_rows($result1);
	//var_dump($num_rows);exit;
	if($num_rows>0){
		mysql_query("Update quiz_scores SET score ='".$right_answer."',created_date =NOW() WHERE user_id='".$userid."' AND categoryid	='".$category."' AND subcategory='".$subcategory."' AND id='".$id."'");
	}
	else{

		mysql_query("insert into quiz_scores(categoryid,subcategory,user_id,score,created_date) VALUES('".$details['categoryid']."','".$details['sub_category']."','".$userid."','".$right_answer."',NOW())");
       //exit;//echo $a;exit;//print_r($a);exit;


}
 $categoryname=mysql_query("select name from elearning_category where id='".$category."'");
	    $cat= mysql_fetch_array($categoryname);

		echo "<span style='float:right;' class='highlight'><a style='color:blue;font-size:14px;font-weight:bold;' href='$redirect'>Back</a></span>";

		echo "<div id='answer'>";
		echo " Category : <span class='highlight'>".$cat[0] ."</span><br>";
		echo "Subcategory  : <span class='highlight'>". $details['sub_category']."</span><br>";
		echo " Right Answer  : <span class='highlight'>". $right_answer."</span><br>";
		echo " Wrong Answer  : <span class='highlight'>". $wrong_answer."</span><br>";
		echo " Unanswered Question  : <span class='highlight'>". $unanswered."</span><br>";
		echo " Total Score : <span class='highlight'>". $right_answer."</span><br>";
		echo "</div>";

?>