<style type="text/css">
.evt_img{
    max-width: 100px;
    max-height: 150px;
    margin-right: 15px;
}
</style>
<div class="inner_section">
        <div class="question_block mb12">
                <div class="question_head">
                    <a href="#">
                        <h3>what is on today</h3>
                    </a>
                </div>
				<div class="what_is_on black_color">
		
		      <table>
                <thead>
                  <tr>
                    <th> sr.no</th>
                    <th> Event Picture</th>
                    <th>From date</th>
                    <th>To date</th>
                    <th>  Description</th>
                  </tr>
                </thead>
                <tbody> 
				<?php if($allevents){
						$x=1;
					foreach($allevents as $event){?>
				<tr>
                    <td width='100px'> <?php echo $x++;?></td>
                    <td width='100px'> <img class="evt_img" src="<?php echo base_url();?>public/images/Events/<?php echo $event['Resize'];?>"/></td>
                    <td width='200px'><?php echo date('d M Y',strtotime($event['from_date']));?></td>
                    <td width='200px'><?php echo date('d M Y',strtotime($event['to_date']));?></td>
                    <td width='600px'>
					<?php echo $event['description'];?></td>
                  </tr>   
				  <?php }}else{?>
						<?php }?>
                </tbody>
            </table>      
			</div>
                
            </div>
    </div>