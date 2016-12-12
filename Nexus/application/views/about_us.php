<style type="text/css">
.milestonedate {
    width:20% !important;
}
.milestonedesc{
    width:80% !important;
}
h3{
    background-color: #D8684E !important;
    text-align: center;
}
</style>
<header>
    <h1 style="color: #f82f53;text-align:center;">Company Milestones</h1>
</header>
<?php if($hist_milestone){
    $year = date('Y',strtotime($hist_milestone[0]['date']));?>
    <div class="optional_head">
        <h3 style="">
<?php echo date('Y',strtotime($hist_milestone[0]['date']))?></h3>
    </div>
<?php 
    for($i=0;$i< count($hist_milestone);$i++) {
        if($i>0 && date('Y',strtotime($hist_milestone[$i]['date'])) != $year){
            $year = date('Y',strtotime($hist_milestone[$i]['date']));
            ?>
        <div class="optional_head">
        <h3 style="">
<?php echo date('Y',strtotime($hist_milestone[$i]['date']))?></h3>
        </div>
<?php }?>
        <div class="holiday_list">
            <ul>
                <li>
                    <div class="clearfix utilities_1st_row">
                        <span class='milestonedate'>
                            <b><?php echo date('d M',strtotime($hist_milestone[$i]['date']))?></b>
                        </span>
                        <span class='milestonedesc'>
                            <b><?php echo $hist_milestone[$i]['description']?></b>
                        </span>                                            
                    </div>
                </li>
                
               </ul>
        </div>   
<?php }}else{?>
    <div class="optional_head">
        <h6 style="color: #D8684E">No milestones details found</h6>
    </div>
    <?php }?> 