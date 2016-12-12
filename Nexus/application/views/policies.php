
<div class="inner_section">

                    <div>
					
                        <div class="optional_head">
                                <a href="#">
                                    <h3>Policies</h3>
                                </a>
                            </div>
							
				
						
                     <div class="accordian_list blue_acc_bg mb12">
                            <ul><?php foreach($policiesDetails as $policy){?>
                                <li>
								
								<a class="policy_toggle" href="javascript:void(0)">
                                        <span id=
										"icon" class="plus_icon"><?php echo $policy->title;?></span>
                                        <div class="policy_info mt12" id='policy'>
                                        <?php echo $policy->desc;?>
                                        </div>
                                    </a>
                                </li>
								<?php }?>

                            </ul>
                        </div>
                        <div class="clearfix text_center">
                            <ul class="general_pagination_list">
                               <!-- <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>-->
                            </ul>
                        </div>  
                    </div>    
					</div>
		<script type="text/javascript">
				
			
        $(".policy_toggle").click(function() {
		$(this).find('span#icon').toggleClass("minus_icon");
        $(this).find('.policy_info').slideToggle();
		
		

        });

    </script>