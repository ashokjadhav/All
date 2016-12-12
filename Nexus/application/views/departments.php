<style type="text/css">
.accordian_list ul > li a {
    color: #FFF;
}
</style>
<div class="inner_section">
                    <div>
                        <!--<h2 class="mb12 black_color">departments</h2>-->
                        <div class="accordian_list red_acc_bg mb12">
                            <ul>
							<?php foreach($group_companies as $company){?>
                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
									<span class="plus_icon" id='icon'><?php echo $company->name;?></span>
                                        <div class="policy_info mt12">
                                            <span>location : <?php echo $company->address;?></span>
                                            <p>CONTACT NO - <?php echo $company->contact;?></p>
                                        </div>

                                    </a>
                                </li>
								<?php }?>

                            </ul>
                        </div>
                        <div class="clearfix text_center">
                            <ul class="general_pagination_list">
                                <li><?php echo $links; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

				<script type="text/javascript">

         //var $ = jQuery;
        $(".policy_toggle").click(function() {
		$(this).find('span#icon').toggleClass("minus_icon");
        $(this).find('.policy_info').slideToggle();



        });

    </script>