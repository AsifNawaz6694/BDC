<?php include('header.php'); ?>
<?php include('left_side.php'); ?>
<?php include('dashboard_nav.php'); ?>
<div class="wrapper">
    <div class="heading_one">
        <h1>My pRofile</h1>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="dashboard_box">
            <div class="panel panel-default clearfix">
                <!-- Default panel contents -->
                <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">About me</h4>
                </div>
                <!-- Form -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 r-m-p">
                    <div class="Form_main">
                        <form>
                            <div class="form-group">
                                <label>Full Name <span>*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email address <span>*</span></label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone <span>*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>DOB <span>*</span></label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>I am a <span>*</span></label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>Female</option>
                                    <option>Male</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default center-block btn-block">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="Form_main">
                        <form>
                            <h4>Edit my password</h4>
                            <div class="form-group">
                                <label>Old Password <span>*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>New Password <span>*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password <span>*</span></label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default center-block btn-block" id="edit_pass">Save
                                    changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
