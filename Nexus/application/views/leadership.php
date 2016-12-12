
<div class="inner_section">
  <div class="members_block mb12">
    <div class="hr_list clearfix mb12 chairman-wrap">
			<div class="hr_info leadership_adj01">
        <div class="hr_image">
            <img alt="hr picture" src="<?php echo base_url();?>public/images/SKB_intranet_9feb15.jpg" height="105" width="105">
        </div>
        <span class="hr_name">Shrikant Bhasi</span>
        <span class="hr_contact">Chairman Carnival  Group</span>
      </div>
    </div>
  <?php
	  $count=1;
	  $fix=3;
	  $var=1;
	  $records=count($leaderdetails)/3;
    $remain=count($leaderdetails)%3;
    if($remain!=0){
	    $records=$records+1;
	  }
    for($var=1;$var<=$records;){?>
		<div class="hr_list clearfix mb12"> 
		  <ul>
							  
  <?php
    for($i=($var-1)*3;$i<($var*$fix);){
		  if(($i+1)>count($leaderdetails)){
		    break;
      }
  ?>
			<li>
          <div class="hr_info">
              <div class="hr_image">
            <img alt="hr picture" src="<?php echo base_url();?>files/<?php echo $leaderdetails[$i]['img'];?>" width='105' height='105'>
              </div>
              <span class="hr_name"><?php echo $leaderdetails[$i]['name'];?></span>
              <span class="hr_contact"><?php echo $leaderdetails[$i]['post'];?></span>
          </div>
      </li>
	<?php 
      $i++; 
    }
  ?>
      </ul>
    </div>
	<?php $var++;}?>
  </div>
</div>