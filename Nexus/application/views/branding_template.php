<div class="black_color">
    <div style="background:white" class="branding">
        <ul>
        <?php
            if($brandings){ 
                foreach($brandings as $branding){?>
                <li>
                    <a href='<?php echo site_url('branding_template/download/'.$branding['id']);?>' title='Download Now'><img src="<?php echo base_url();?>files/<?php echo $branding['img'];?>" width='100px' height='100px'></a>
                </li>
        <?php 
                }
            }else{
                echo "<p style='color:red;font-size:16px;font-weight:bold;'>No Branding Templates Found</p>";
            }?>
        </ul>
	</div>
</div>