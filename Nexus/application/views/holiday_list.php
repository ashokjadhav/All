<div class="inner_section">
                    <div class="question_block mb12">

<div id="tabsholder">

        <ul id="demo" class="tabs">
            <li id="tab1" class="current">holiday list - mumbai</li>
            <li id="tab2">HOLIDAY LIST - cochin</li>
          
        </ul>
        <div class="contents marginbot">

            <div class="tabscontent" id="content1" style="display: block;">

                  <div class="holiday_custom_Wraper">
                                <ul>
								<li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                sr.no
                                            </span>
                                            <span class="holiday_custom_table02">
                                                date
                                            </span>
                                            <span class="holiday_custom_table03">
                                                day
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Description
                                            </span>
                                        </div>
                                    </li>
								<?php if($mumbai_holiday){
								$count=1;
								foreach($mumbai_holiday as $mumbai){
								$orderdate = explode('-',$mumbai->holiday_date);
									
									$monthNum  = $orderdate[1];
									$dateObj   = DateTime::createFromFormat('!m', $monthNum);
									$monthName = $dateObj->format('F'); // March 
								?>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                               <?php echo $count++;?>
                                            </span>
                                            <span class="holiday_custom_table02">
                                          <?php    echo $orderdate[2].' '.$monthName.' '.$orderdate[0];?>
                                            </span>
                                            <span class="holiday_custom_table03">
                                               <?php echo date('l',strtotime($mumbai->holiday_date))?>
                                            </span>
                                            <span class="holiday_custom_table04">
                                              <?php echo $mumbai->desc; ?>
                                            </span>
                                        </div>
                                    </li>
									<?php }}else{?>
									<div class="clearfix holiday_custom_Table">
                                       <span> No Holiday Found</span>
                                        </div>

									<?php }?>

                                    <!--  <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                1
                                            </span>
                                            <span class="holiday_custom_table02">
                                                26 JANUARY 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Monday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Republic Day
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                2
                                            </span>
                                            <span class="holiday_custom_table02">
                                                6 MARCH 2015 
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Holi
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                3
                                            </span>
                                            <span class="holiday_custom_table02">
                                                21 MARCH 2015 
                                            </span>
                                            <span class="holiday_custom_table03">
                                                 Saturday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Gudi Padwa
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                4
                                            </span>
                                            <span class="holiday_custom_table02">
                                                3 APRIL 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Good Friday
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                5
                                            </span>
                                            <span class="holiday_custom_table02">
                                                5 JANUARY 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                 Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Maharashtra Day
                                            </span>
                                        </div>
                                    </li>


                                  


                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                6
                                            </span>
                                            <span class="holiday_custom_table02">
                                                15 AUGUST 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Saturday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Independence Day
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                7
                                            </span>
                                            <span class="holiday_custom_table02">
                                                 5 AUGUST 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                            Thursday
                                            </span>
                                            <span class="holiday_custom_table04">
                                            Janmashtami
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                8
                                            </span>
                                            <span class="holiday_custom_table02">
                                                17 SEPTEMBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Thursday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Ganesh Chaturthi
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                9
                                            </span>
                                            <span class="holiday_custom_table02">
                                                2 OCTOBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                             Gandhijayanti
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                10
                                            </span>
                                            <span class="holiday_custom_table02">
                                                22 OCTOBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Thursday
                                            </span>
                                            <span class="holiday_custom_table04">
                                              Dussehra
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                11
                                            </span>
                                            <span class="holiday_custom_table02">
                                                11 NOVEMBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Wednesday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                   Diwali (Lakshmi Puja)
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                12
                                            </span>
                                            <span class="holiday_custom_table02">
                                                12 NOVEMBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Thursday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                 Diwali (Balipratipada)
                                            </span>
                                        </div>
                                    </li>


                                        <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                13
                                            </span>
                                            <span class="holiday_custom_table02">
                                                25 DECEMBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                    Christmas
                                            </span>
                                        </div>
                                    </li>-->
                                    </ul>
                                    </div>

            
            </div>
            <div class="tabscontent" id="content2" style="display: none;">

            <div class="holiday_custom_Wraper">
                                <ul>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                sr.no
                                            </span>
                                            <span class="holiday_custom_table02">
                                                date
                                            </span>
                                            <span class="holiday_custom_table03">
                                                day
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Description
                                            </span>
                                        </div>
                                    </li>
									<?php 
								$count=1;
								foreach($cochin_holiday as $cochin){
								$orderdate = explode('-',$cochin->holiday_date);
									
									$monthNum  = $orderdate[1];
									$dateObj   = DateTime::createFromFormat('!m', $monthNum);
									$monthName = $dateObj->format('F'); // March 
								?>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                               <?php echo $count++;?>
                                            </span>
                                            <span class="holiday_custom_table02">
                                         <?php    echo $orderdate[2].' '.$monthName.' '.$orderdate[0];?>
                                            </span>
                                            <span class="holiday_custom_table03">
                                               <?php echo date('l',strtotime($cochin->holiday_date))?>
                                            </span>
                                            <span class="holiday_custom_table04">
                                              <?php echo $cochin->desc; ?>
                                            </span>
                                        </div>
                                    </li>
									<?php }?>

                                   <!--  <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                1
                                            </span>
                                            <span class="holiday_custom_table02">
                                                26 JANUARY 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Monday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Republic Day
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                2
                                            </span>
                                            <span class="holiday_custom_table02">
                                                3 APRIL 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Good Friday
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                3
                                            </span>
                                            <span class="holiday_custom_table02">
                                                15 APRIL 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Wednesday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Vishu
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                4
                                            </span>
                                            <span class="holiday_custom_table02">
                                                1 MAY 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                May Day
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                5
                                            </span>
                                            <span class="holiday_custom_table02">
                                                18 JULY 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Saturday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Id-Ul-Fitar
                                            </span>
                                        </div>
                                    </li>


                                  


                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                6
                                            </span>
                                            <span class="holiday_custom_table02">
                                                15 AUGUST 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Saturday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Independence Day
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                7
                                            </span>
                                            <span class="holiday_custom_table02">
                                                27 AUGUST 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                            Thursday
                                            </span>
                                            <span class="holiday_custom_table04">
                                            First ONAM
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                8
                                            </span>
                                            <span class="holiday_custom_table02">
                                                28 AUGUST 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Firday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                Thiruvonam
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                9
                                            </span>
                                            <span class="holiday_custom_table02">
                                                2 OCTOBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Firday
                                            </span>
                                            <span class="holiday_custom_table04">
                                             Gandhijayanti
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                10
                                            </span>
                                            <span class="holiday_custom_table02">
                                                22 OCTOBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Thursday
                                            </span>
                                            <span class="holiday_custom_table04">
                                             Mahanavami
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                11
                                            </span>
                                            <span class="holiday_custom_table02">
                                                23 OCTOBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                       Vijayadasami
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                12
                                            </span>
                                            <span class="holiday_custom_table02">
                                                10 NOVEMBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Thursday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                           Diwali
                                            </span>
                                        </div>
                                    </li>


                                        <li>
                                        <div class="clearfix holiday_custom_Table">
                                            <span class="holiday_custom_table01">
                                                13
                                            </span>
                                            <span class="holiday_custom_table02">
                                                25 DECEMBER 2015
                                            </span>
                                            <span class="holiday_custom_table03">
                                                Friday
                                            </span>
                                            <span class="holiday_custom_table04">
                                                          Christmas
                                            </span>
                                        </div>
                                    </li>-->
                                    </ul>
                </div>
            <!--<div class="holiday_list">
                                <ul>
                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                sr.no
                                            </span>
                                            <span>
                                                date
                                            </span>
                                            <span>
                                                day
                                            </span>
                                            <span>
                                                Description
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                1
                                            </span>
                                            <span>
                                                26-1-2015
                                            </span>
                                            <span>
                                                Monday
                                            </span>
                                            <span>
                                                Republic Day
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                2
                                            </span>
                                            <span>
                                                6-3-2015
                                            </span>
                                            <span>
                                                Friday
                                            </span>
                                            <span>
                                                Holi
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                3
                                            </span>
                                            <span>
                                                21-3-2015
                                            </span>
                                            <span>
                                                Saturday
                                            </span>
                                            <span>
                                                Gudi Padwa
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                4
                                            </span>
                                            <span>
                                                3-4-2015
                                            </span>
                                            <span>
                                                Friday
                                            </span>
                                            <span>
                                                Good Friday
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                5
                                            </span>
                                            <span>
                                                5-1-2015
                                            </span>
                                            <span>
                                                Friday
                                            </span>
                                            <span>
                                                            Maharashtra Day
                                            </span>
                                        </div>
                                    </li>


                                  


                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                6
                                            </span>
                                            <span>
                                                15-8-2015
                                            </span>
                                            <span>
                                                Saturday
                                            </span>
                                            <span>
                                                Independence Day
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                7
                                            </span>
                                            <span>
                                                5-8-2015
                                            </span>
                                            <span>
                                            Thursday
                                            </span>
                                            <span>
                                            Janmashtami
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                8
                                            </span>
                                            <span>
                                                17-9-2015
                                            </span>
                                            <span>
                                                Thursday
                                            </span>
                                            <span>
                                                Ganesh Chaturthi
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                9
                                            </span>
                                            <span>
                                                02-10-2015
                                            </span>
                                            <span>
                                                Firday
                                            </span>
                                            <span>
                                             Gandhijayanti
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                10
                                            </span>
                                            <span>
                                                22-10-2015
                                            </span>
                                            <span>
                                                Thursday
                                            </span>
                                            <span>
                                             Dussehra
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                11
                                            </span>
                                            <span>
                                                11-11-2015
                                            </span>
                                            <span>
                                                Wednesday
                                            </span>
                                            <span>
                                               Diwali (Lakshmi Puja)
                                            </span>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                12
                                            </span>
                                            <span>
                                                12-11-2015
                                            </span>
                                            <span>
                                                Thursday
                                            </span>
                                            <span>
                                                           Diwali (Balipratipada)
                                            </span>
                                        </div>
                                    </li>


                                        <li>
                                        <div class="clearfix holiday_row">
                                            <span>
                                                13
                                            </span>
                                            <span>
                                                25-12-2015
                                            </span>
                                            <span>
                                                Friday
                                            </span>
                                            <span>
                                                          Christmas
                                            </span>
                                        </div>
                                    </li>





                                </ul>
                            </div>-->
            </div>
          
        </div>
    </div>

                        </div>
</div>
<script type="text/javascript">
        $(document).ready(function () {
            $("#tabsholder").tytabs({
                
            });
			$('#tab1').click(function(){
			$('#tab2').removeClass('current');
		$('#tab1').addClass("current");
			}); 
			$('#tab2').click(function(){
			$('#tab1').removeClass('current');
			$('#tab2').addClass("current");
			}); 
           
           
        });
</script>