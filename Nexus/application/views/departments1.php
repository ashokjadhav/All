<style type="text/css">
.my_quick_links_List ul li{margin-left: 25px;}
.CSSTableGenerator {
    margin:0px;padding:0px;
    width:100%;
    /*box-shadow: 10px 10px 5px #888888;*/
    border:1px solid #000000;
    
    -moz-border-radius-bottomleft:0px;
    -webkit-border-bottom-left-radius:0px;
    border-bottom-left-radius:0px;
    
    -moz-border-radius-bottomright:0px;
    -webkit-border-bottom-right-radius:0px;
    border-bottom-right-radius:0px;
    
    -moz-border-radius-topright:0px;
    -webkit-border-top-right-radius:0px;
    border-top-right-radius:0px;
    
    -moz-border-radius-topleft:0px;
    -webkit-border-top-left-radius:0px;
    border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
    border-spacing: 0;
    width:100%;
    height:100%;
    margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
    -moz-border-radius-bottomright:0px;
    -webkit-border-bottom-right-radius:0px;
    border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
    -moz-border-radius-topleft:0px;
    -webkit-border-top-left-radius:0px;
    border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
    -moz-border-radius-topright:0px;
    -webkit-border-top-right-radius:0px;
    border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
    -moz-border-radius-bottomleft:0px;
    -webkit-border-bottom-left-radius:0px;
    border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
    
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#ffaa56; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#ffffff; }.CSSTableGenerator td{
    vertical-align:middle;
    border:1px solid #000000;
    border-width:0px 1px 1px 0px;
    text-align:left;
    padding:7px;
    font-size:12px;
    font-family:'helvetica-neue-light',arial;
    font-weight:bold;
    color:#000000;
}.CSSTableGenerator tr:last-child td{
    border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
    border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
    border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
    background:-o-linear-gradient(bottom, #ff7f00 5%, #bf5f00 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff7f00), color-stop(1, #bf5f00) );
    background:-moz-linear-gradient( center top, #ff7f00 5%, #bf5f00 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff7f00", endColorstr="#bf5f00");  background: -o-linear-gradient(top,#ff7f00,bf5f00);

    background-color:#ff7f00;
    border:0px solid #000000;
    text-align:center;
    border-width:0px 0px 1px 1px;
    font-size:14px;
    font-family:'helvetica-neue-light',arial;
    font-weight:bold;
    color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
    background:-o-linear-gradient(bottom, #ff7f00 5%, #bf5f00 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ff7f00), color-stop(1, #bf5f00) );
    background:-moz-linear-gradient( center top, #ff7f00 5%, #bf5f00 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#ff7f00", endColorstr="#bf5f00");  background: -o-linear-gradient(top,#ff7f00,bf5f00);

    background-color:#ff7f00;
}
.CSSTableGenerator tr:first-child td:first-child{
    border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
    border-width:0px 0px 1px 1px;
}
</style>
<?php if($page == 'index'){?>
    <header>
        <h1 style="color: #f82f53;">Group Companies</h1>
    </header>
    <div class="">
        <div class="my_quick_links_List">
            <ul>
            <?php foreach($group_companies as $company){?>
                <li>
                    <a href="<?php echo site_url('departments/details/'.$company->id)?>/" class="">
                        <div class="logo_image_wrap">
                            <img src="<?php echo base_url();?>public/images/company/Resize/<?php echo $company->resize;?>" alt="Item Preview">
                        </div>
                    </a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>      
<?php } ?>

<?php if($page == 'details'){?>

    <div class="inner_section">
        <div class="">
            <div class="vision_mission">
                <div class="">  
          		    <h2 style="color: #f82f53;"><?php echo $company[0]['name']?></h2><br>
                    <div class="mb12_vision clearfix text_paragraph">
                      <?php if($employees){?>
                        <div class="CSSTableGenerator" >
                      
                            <table >
                                <tr>
                                    <td>
                                        Key Persons
                                    </td>
                                    <td >
                                        Designation
                                    </td>
                                    <td>
                                        Office
                                    </td>
                                    <td colspan="2">
                                       Email & Extn 
                                    </td>
                                </tr>
                            <?php 
                                foreach ($employees as $key => $value) {?>
                                    
                                
                                <tr>
                                    <td >
                                        <?php echo $value['name'];?>
                                    </td>
                                    <td>
                                        <?php echo $value['department'].'  ('.$value['designation'].') ';?>
                                    </td>
                                    <td>
                                        <?php echo $value['location'];?>
                                    </td>
                                    <td>
                                        <?php echo $value['email'];?>
                                    </td>
                                    <td>
                                        <?php echo $value['extn'];?>
                                    </td>
                                </tr>
                               <?php  }
                                ?>
                            </table>
                           
                        </div> <?php }?>
            
                    </div>
                </div>
                <!-- <div class="rt_vision"></div> -->
                <div class="data_all">       
                    <hr class="divider">
                    <h2>Key Business Objectives</h2><br>
                    <?php if($company[0]['desc'])echo $company[0]['desc'];else echo "No Business Objectives Found."?>
                    <hr class="divider">
                    <h2 >Location</h2><br>
                    <p><?php echo $company[0]['address']?></p>
                    <hr class="divider">
                    <h2>Contact</h2><br>
                    <p><?php echo $company[0]['contact']?></p>
                    <hr class="divider">
                </div>
    	   </div>
        </div>
    </div>
<?php }?>