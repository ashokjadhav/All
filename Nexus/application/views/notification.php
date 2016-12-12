<div class="inner_section">
	<div class="notice_board mb12">
		<a href="#"><h3 class="light_head">notice board</h3></a>
			<?php foreach($notices as $notice){?>
               <div class="notification_wrap">
					<h6 class='title'><?php echo $notice['title'];?></h6>
						<ul>
                            <li class='no' id="<?php echo $notice['id']?>">
	                            <?php
	                            $array = preg_split('/(<img .*?\/>)/i', $notice['description'], -1, PREG_SPLIT_DELIM_CAPTURE);
	                            if(isset($array[1])){
									echo $array[1]." </n> ";
									unset($array[1]);
								}	
	                            	$limited_word = character_limiter(implode(',',$array),70);
									echo $limited_word;
								?>
								<a id="<?php echo $notice['id'];?>" data-role="<?php echo $notice['id'];?>" class="readmore">Read More</a>
							</li>
						</ul>
				</div>
				</br>
			<?php }?>
    </div>

</div>
<script type="text/javascript">
	$("em").replaceWith(function() { return $(this).contents(); });
	$("strong").replaceWith(function() { return $(this).contents(); });	
	$('.readmore').on("click",function(){
		var ID = $(this).data('role');
		$.ajax({
			type: "POST",
			url: "notification/readmore/"+ID,
			dataType:'json',
			cache: false,
			success: function(response){
				$('li[id='+ID+']').empty();
				$('li[id='+ID+']').html(response);
				$('a[id='+ID+']').remove();
				$('.notification_wrap li[id='+ID+'] ul li').css('list-style','disc');
				$('.notification_wrap li[id='+ID+']').css('padding-left','1.8em');
				$('.notification_wrap ul li').css('color','white');
				$('.notification_wrap li[id='+ID+'] ol li').css('list-style','decimal');
				$('.notification_wrap ol li').css('color','white');
				$( "li" ).has( "ul" ).css( "list-style", "none" );
				$( "li.no" ).css( "list-style", "none" );
				
			}
		});
	});

</script>