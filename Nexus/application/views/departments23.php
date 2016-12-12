<html lang="en" class="no-js">
    <head>
        <link rel="stylesheet" href="<?php echo base_url();?>public/css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="<?php echo base_url();?>public/css/lightbox.css"> <!-- Resource style -->
        <script src="js/modernizr.js"></script> <!-- Modernizr -->
        <style type="text/css">
            .popup_hr_info{ width:87px;}
            .hr_contact{font-weight: bold;font-size: 8px;}
        </style>
    </head>
    <body>
        <header>
            <h1 style="color: #f82f53;">Group Companies</h1>
        </header>
      
        <ul class="cd-items cd-container">
        <?php foreach($group_companies as $company){?>
          <li class="cd-item">
              <div class="logo_image_wrap">
                  <img src="<?php echo base_url();?>public/images/company/Resize/<?php echo $company->resize;?>" alt="Item Preview">
               </div>
                <a href="#0" id="<?php echo $company->id;?>" class="cd-trigger"><?php echo $company->name;?></a>
          </li>
           
        <?php }?>

      </ul> 
        <div class="cd-quick-view"> </div>
        <script src="js/velocity.min.js"></script>
        <script src="js/main.js"></script> <!-- Resource jQuery -->
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('.cd-trigger').click(function(){
        var id = this.id;
        $.ajax({
            type: "POST",
            url: "departments/ajaxData/"+id,
            dataType:'json',
            cache: false,
            success: function(response){
                $.each( response, function( i, val ) {
                    $(".cd-quick-view").html("");
                    var HTML =  '<div class="cd-slider-wrapper org">'+
                                '<ul class="cd-slider">'+
                '<li class="selected"><img src="img/item-1.jpg" alt="Product 1"></li>'+
                '<li><img src="img/item-2.jpg" alt="Product 2"></li>'+
                '<li><img src="img/item-3.jpg" alt="Product 3"></li>'+
            '</ul>'+
            '<ul class="cd-slider-navigation">'+
                '<li><a class="cd-next" href="#0>Prev</a></li>'+
                '<li><a class="cd-prev" href="#0">Next</a></li>'+
            '</ul></div></br>'+
                                '<div class="cd-item-info">'+
                                '<h2 style="color: #f82f53;">'+val[0].name+'</h2>'+
                                '<p>'+val[0].desc+'</p>'+
                                '<h3 style="color: #f82f53;">Location</h3>'+
                                '<p style="font-weight:bold;">'+val[0].address+'</p>'+
                                '<h3 style="color: #f82f53;">Contact No</h3>'+
                                '<p style="font-weight:bold;">'+val[0].contact+'</p>'+
                                '</div>'+
                                '<a  id="'+val[0].id+'" href="#0" class="cd-close">Close</a>';
                    $(".cd-quick-view").append(HTML);
                });
                
            }
        });
    });
});

</script>

