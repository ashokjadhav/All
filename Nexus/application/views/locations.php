<style type="text/css">
#loading {
    width: 100%;
    height: 100%;
    top: 50%;
    left: 55%;
    position: fixed;
    opacity: .5;
    z-index: 99;
    align:center;
    }
</style>

<div class="inner_section">
    <div class="emp_listing mb12">
        <h3>
            locations
            <form id="searchloc" method="post" action="" style="float:right;width:30%;">
                <div class="text_input left">
                    <input type="text" style="width: 237px;" id="search" name="search" placeholder="Search Location" required="" >
                </div>
            </form>
        </h3>
        <div class="emp_det_list">
            <div id="loading" style="display:none;">
                <img src="<?php echo base_url();?>public/images/gif-load.gif">
            </div>
            <ul class="loc">
			<?php foreach($locations as $location){?>
                <li>
                    <a class="loc_toggle" href="javascript:void(0)">
                        <div class="clearfix">
                            <div class="clearfix bir_desc_up">
                                <div class="birt_info">
                                    <span class="birt_name"><?php echo $location->city;?></span>
                                </div>
                            </div>
                            <div class="clearfix bir_desc_down">
                                <span class="birt_location">
                                   <?php echo $location->address; ?>
                                </span>    
                                <span class="dropdown-icon"></span>  
                            </div>
                        </div>
                        <div class="text_paragraph clearfix loc_info">
                            <div>
                                <span><?php echo $location->name; ?> - Cinema Manager</span>
                            </div>
                            <div class="mb12">
                                <span>Contact no : <?php echo $location->contact; ?></span>
                            </div>
                            <div class="about_img right mb12 ml20">
                                
                            </div>
                            
                        </div>
                    </a>    
                </li>
                <?php }?>
            </ul>
        </div>
        <div class="nav_pagination clearfix">
            <div class="right">
                <div class="clearfix">
                    <div class="left">
                        <div class="clearfix">
                            <ul class="nav_list">
                               	<li><?php echo $links; ?></li>
                            </ul>
                        </div>    
                    </div>
                    <div class="left">
                        <div class="clearfix">
                            <ul class="pagination_list">
                              
                            </ul>
                        </div>    
                    </div>
                </div>        
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#search").keyup(function(){
        var key = $(this).val();
        if(key.length >= 0){
            $('#loading').show();
            setTimeout(function(){
                $.ajax({
                    type: "POST",
                dataType: "json",
                     url: baseUrl+"locations/search/"+key,  
                    success: function(response) {
                        //console.log(response);
                        $('#loading').hide();
                        
                        if(response.status == 0){
                            $('ul.loc').html(""); 
                            var HTML ='<li>'+
                                '<a class="loc_toggle" href="javascript:void(0)">'+
                                    '<div class="clearfix">'+
                                        '<div class="clearfix bir_desc_up">'+
                                            '<div class="birt_info">'+
                                                '<span class="birt_name">No Location Found</span>'+
                                            '</div>'+
                                        '</div>'+
                                        
                                    '</div>'+
                                '</a>    '+
                            '</li>'; 
                            $('ul.loc').append(HTML); 
                        }
                        else{
                            $('ul.loc').html("");
                            $.each(response.searchLocation, function(k, v) {
                                var HTML ='<li>'+
                                    '<a class="loc_toggle" href="javascript:void(0)">'+
                                        '<div class="clearfix">'+
                                            '<div class="clearfix bir_desc_up">'+
                                                '<div class="birt_info">'+
                                                    '<span class="birt_name">'+v.city+'</span>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class="clearfix bir_desc_down">'+
                                                '<span class="birt_location">'+
                                                ''+v.address+'</span>    '+
                                                '<span class="dropdown-icon"></span>  '+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="text_paragraph clearfix loc_info">'+
                                            '<div>'+
                                            '<span>'+v.name+'</span>'+
                                            '</div>'+
                                            '<div class="mb12">'+
                                                '<span>Contact no : '+v.contact+'</span>'+
                                            '</div>'+
                                            '<div class="about_img right mb12 ml20">'+
                                            '</div>'+
                                        '</div>'+
                                    '</a>    '+
                                '</li>';
                                $('ul.loc').append(HTML);
                            });
                        }
                        
                    }
                });
            },1000); 
        }
        
    });
</script>
<script type="text/javascript">
$("body").on( "click",".loc_toggle", function() {
 //$(".loc_toggle").click(function() {
    $(this).find('.loc_info').slideToggle();
});
</script>