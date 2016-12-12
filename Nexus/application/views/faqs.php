<div class="inner_section">
    <div>
        <div class="accordian_list yellow_acc_bg mb12">
            <ul>
                <?php $x=1;?>
                <?php foreach($faqs as $faq){?>
                <li>


                   <a class="policy_toggle" href="javascript:void(0)">
                        <span id="icon" class="plus_icon"><?php echo $x++;?> . <?php echo $faq->question;?></span>
                        <div class="policy_info mt12" id='faq'>
                        <p><?php echo $faq->answer;?></p>
                        </div>
                    </a>
                </li>
    			<?php }?>

            </ul>
        </div>
        <div class="clearfix text_center">
            <ul class="general_pagination_list">

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