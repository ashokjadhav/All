 
<script type="text/javascript" src="<?php echo base_url();?>/public/jquery/jquery.leanModal.min.js"></script>
<!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" /> -->
 <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>/public/css/modal.css"/> 
 <div class="sidebar">
                <div class="logo_wrapper text_center">
                    <h1>
                       <a href="<?php echo site_url('dashboard');?>">
                            <img alt="nexus" width="140px" src="<?php echo base_url();?>public/images/nexus-logo.png">
                        </a>
                    </h1>
                </div>
                <div class="profile_pic text_center">
                    <?php if($this->session->userdata('site_pic')!=''){?>
                     <a id="modal_trigger" href="#modal" title="Update Profile">
                        <img alt="profile picture" src="<?php echo base_url();?>files/<?php echo $this->session->userdata('site_pic');?>" width='102px' height='102px'>
                    </a>
                <?php }else{?>
                <a id="modal_trigger" href="#modal" title="Update Profile">
                    <img alt="profile picture" src="<?php echo base_url();?>public/images/no-images.jpg" width='102px' height='102px'>
                </a>
                <?php } ?>
                </div>
                <div class="user_name text_center">
                    <h2><?php echo $this->session->userdata('site_name');?></h2>
                </div>

                <div class="menu_list">
                    <ul>
                        <li>
                            <a class="departments" href="<?php echo site_url('departments');?>">Group Companies</a>
                        </li>
                        <li>
                            <a class="travel_desk" href="<?php echo base_url('travel_desk/book'); ?>">travel desk</a>
                        </li>
						<li>
                            <a class="departments" href="http://carnivalcinemas.in:5007/rsms/new_hod/hod_login.aspx" target="blank">RSMS Login</a>
                        </li>
                        <li>
                            <a class="e_learning" href="<?php echo site_url('elearning');?>">e-learning</a>
                        </li>
                        <li>
                            <a class="induction" href="<?php echo site_url('hr_help_desk');?>">HR Help Desk</a>
                        </li>
                        <li>
                            <a class="library" href="<?php echo site_url('library');?>">library</a>
                        </li>
                        <li>
                            <a class="job_openings" href="<?php echo site_url('job_openings');?>">job openings</a>
                        </li>
                        <li>
                            <a class="help_desk" href="<?php echo site_url('it_helpdesk');?>">IT help desk</a>
                        </li>
                        <li>
                            <a class="appointments" href="<?php echo site_url('my_appointments');?>">my appointments</a>
                        </li>
                        <li>
                            <a class="locations" href="<?php echo site_url('locations');?>">locations</a>
                        </li>
                        <li>
                            <a class="utilities_icon" href="<?php echo site_url('utilities');?>">Utilities</a>
                        </li>
                        <!-- <li>
                            <a class="settings" id="modal_trigger" href="#modal">Settings</a>
                        </li> -->
                        
						<li>
                            <a class="logout_icon" href="<?php echo site_url('site_login/logout');?>">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="modal" class="popupContainer" style="display:none;">
        <header class="popupHeader">
            <span class="header_title">Settings</span>
            <span class="modal_close"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/101.png'/></i></span>
        </header>
        
        <section class="popupBody">
            <!-- Social Login -->
            <div class="social_login">
                <div class="">
                    <a href="#" class="social_box google">
                        <span class="icon"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/007.png'/></i></span>
                        <span class="icon_title" id="login_form">Update Profile Photo</span>
                        
                    </a>

                    <a href="#" class="social_box google">
                        <span class="icon"><img src='<?php echo base_url(); ?>/design/Template/img/icons/packs/diagona/16x16/065.png'/></i></span>
                        <span class="icon_title" id="register_form">Update Password</span>
                    </a>
                </div>

                <!-- <div class="action_btns">
                    <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                    <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
                </div> -->
            </div>

            <!-- Username & Password Login form -->
            <div class="user_login">
                <div class="profile_pic text_center">
                    <?php if($this->session->userdata('site_pic')!=''){?>
                    <img alt="profile picture" src="<?php echo base_url();?>files/<?php echo $this->session->userdata('site_pic');?>" width='102px' height='102px'>
                <?php }else{
                    ?>
                    <img alt="profile picture" src="<?php echo base_url();?>public/images/no-images.jpg" width='102px' height='102px'>
                <?php } ?>
                </div>
                <br />
                <form method="post" name="frm_upload" action="<?php echo site_url('settings/update_profile_photo');?>" enctype="multipart/form-data" onsubmit="return myFunction_upload()">
                <input type="hidden" id="id" name="id" value="<?php echo $this->session->userdata('site_userid');?>"/>
                    <label>Upload Photo</label>
                    <input type="file" id="logo" name="logo" />
                    <br />
                    <br />
                    <br />

                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                        <div class="one_half last">
                            <!-- <a href="#" class="btn btn_red">Upload</a> -->
                            <input type="submit" id="upload" name="upload" value="Upload">
                        </div>
                    </div>
                </form>

            </div>

            <!-- Register Form -->
            <div class="user_register">
                <form method="post" name="myForm" action="<?php echo site_url('settings/psw_change');?>" onsubmit="return myFunction()">
                    <input type="hidden" id="id" name="id" value="<?php echo $this->session->userdata('site_userid');?>"/>

                    <label>New Password</label>
                    <input type="password" id="psw" name="psw"/>
                    <br />
                    <p id="psw_err" style="color:red;"></p>
                    <br />
                    <label>Confirm Password</label>
                    <input type="password" id="cn_psw" name="cn_psw"/>
                    <br />
                    <p id="cn_psw_err" style="color:red;"></p>
                    <p id="psw_match_err" style="color:red;"></p>
                    <br />
                    <div class="action_btns">
                        <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                    <div class="one_half last">
                        <!-- <a href="#" class="btn btn_red">Update</a> -->
                        <input type="submit" id="upd_pwd" name="upd_pwd" class="btn btn_red" value="Update">
                    </div> 
                    </div>
                </form>
            </div>
        </section>
    </div>
            <script type="text/javascript">
    $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

    $(function(){
        // Calling Login Form
        $("#login_form").click(function(){
            $(".social_login").hide();
            $(".user_login").show();
            $(".header_title").text('Update Profile Photo');
            return false;
        });

        // Calling Register Form
        $("#register_form").click(function(){
            $(".social_login").hide();
            $(".user_register").show();
            $(".header_title").text('Update Password');
            return false;
        });

        // Going back to Social Forms
        $(".back_btn").click(function(){
            $(".user_login").hide();
            $(".user_register").hide();
            $(".social_login").show();
            $(".header_title").text('Settings');
            return false;
        });

    })
</script>
<script>
function myFunction() {
    var x = document.forms["myForm"]["psw"].value;
    var y = document.forms["myForm"]["cn_psw"].value;
    if (x == null || x == "") {
        $('#cn_psw_err').html("");
        $('#psw_match_err').html("");
        $('#psw_err').html("<b>Password Must be Filled Out</b>");
        
        return false;
    }
    if (y == null || y == "") {
        $('#psw_err').html("");
        $('#psw_match_err').html("");
        $('#cn_psw_err').html("<b>Please Confirm the Password</b>");
        return false;
    }
    if (x === y) {
        return true;
    }
    else{
        $('#psw_err').html("");
        $('#cn_psw_err').html("");
        $('#psw_match_err').html("<b>New password and Confirmed password does not match,Please try again !!!</b>");
        return false;
    }
}

function myFunction_upload() {
    var x = document.forms["frm_upload"]["logo"].value;
    
    if (x == null || x == "") {
        alert("Please Select Image");
        return false;
    }
    
}
</script>