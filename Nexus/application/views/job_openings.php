<div class="inner_section">

                    
                    <div>
                        <!--<h2 class="mb12 black_color">job openings</h2>-->
                        <div class="accordian_list yellow_acc_bg mb12">
                            <ul>
							<?php foreach($jobopenings as $job){?>
                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span id="icon" class="plus_icon"><?php echo $job['title'];?></span>
                                        <div class="policy_info mt12" style="display: none;">
                                            <!--<span><?php echo $job['title'];?></span>-->
                                            <p><?php echo $job['description'];?></p>
                                        </div>
                                    </a>
                                </li>
								<?php }?>
                               <!-- <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span class="plus_icon">job title 2</span>
                                        <div class="policy_info mt12">
                                            <span>job name</span>
                                            <p>this is just a dummy text for job description</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span class="plus_icon">job title 3</span>
                                        <div class="policy_info mt12">
                                            <span>job name</span>
                                            <p>this is just a dummy text for job description</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                       <span class="plus_icon">job title 4</span>
                                        <div class="policy_info mt12">
                                            <span>job name</span>
                                            <p>this is just a dummy text for job description</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                         <span class="plus_icon">job title 5</span>
                                        <div class="policy_info mt12">
                                            <span>job name</span>
                                            <p>this is just a dummy text for job description</p>
                                        </div>
                                    </a>
                                </li>-->
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