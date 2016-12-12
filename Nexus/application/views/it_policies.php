<div class="inner_section">

                    <div>
					
                        <div class="optional_head">
                                <a href="#">
                                    <h3>IT Policies</h3>
                                </a>
                            </div>
							
						<iframe src="<?php echo base_url();?>files/Carnival_Group_IT_Policy_V1.0.pdf" width="100%" height="600" style="background-color:white" ></iframe>
						
                     <div class="accordian_list red_acc_bg mb12">
                            <ul><?php if($policiesDetails){
							foreach($policiesDetails as $policy){?>
                                <li>
								
								<a class="policy_toggle" href="javascript:void(0)">
                                        <span id=
										"icon" class="plus_icon"><?php echo $policy->title;?></span>
                                        <div class="policy_info mt12" id='policy'>
                                        <?php echo $policy->desc;?>
                                        </div>
                                    </a>
                                </li>
							<?php }}?>
                               <!-- <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span class="plus_icon">Virus Protection: </span>
                                        <div class="policy_info mt12">
                                            <p>Antivirus software should be installed in all Desktops / Laptops and should be scanned for malicious code protection. Live Update of the software database be done automatically for protection against (any) malicious code (viruses/Trojans/worms).</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span class="plus_icon">Software Installation:</span>
                                        <div class="policy_info mt12">
                                            <p>Installations of Freeware Software should be forbidden on all computers in the organization. Any installation of legal software should be done by the consent of IT department only.</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span class="plus_icon">Removable Media ( Pen Drive ) :</span>
                                        <div class="policy_info mt12">
                                            <p> USB media should not be use on companies network , if at all it is to use then it should be with the consent of the IT department after scanning the USB media.</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span class="plus_icon">Data Backup: </span>
                                        <div class="policy_info mt12">
                                            <p>Company should maintain the copy of backup of Critical data separately along with firefighting copy.</p>
                                        </div>
                                    </a>
                                </li>


                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span class="plus_icon">Internet Threats: </span>
                                        <div class="policy_info mt12">
                                            <p> In order to protect company network from what constitutes restricted, forbidden and potentially malicious web sites firewall should be implemented at Gateway level.</p>
                                        </div>
                                    </a>
                                </li>


                                <li>
                                    <a class="policy_toggle" href="javascript:void(0)">
                                        <span class="plus_icon">Email Use: </span>
                                        <div class="policy_info mt12">
                                            <p>user should maintain email etiquettes while sending internal / external mails. User should not send unsolicited attachment via mail. Each mail before sending should be scanned for virus.</p>
                                            <p>All above policies should be revised timely in order to maintain company IT equipments and Intellectual property safe.</p>
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