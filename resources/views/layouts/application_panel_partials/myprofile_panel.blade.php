        <div class="dashboard_box">
            <div class="panel panel-default clearfix">
                <!-- Default panel contents -->
                <div class="panel-body border_line_bottom">
                    <h4 class="float-left text-left">About me</h4>
                </div>
                <!-- Form -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 r-m-p">
                    <div class="Form_main">
                        <form action="{{ route('ajaxProfileUpdate') }}" method="post" id="ajaxFormUpdate">
                            <div class="form-group">
                                <label>Full Name </label>
                                <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group">
                                <label>Email address </label>
                                <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="form-group">
                                <label>Phone </label>
                                <input type="text" class="form-control" name="phone" value="{{Auth::user()->profile->phone}}">
                            </div>
                            <div class="form-group">
                                <label>DOB </label>
                                <input type="date" class="form-control" name="birth_date" value="{{Auth::user()->profile->birth_date}}">
                            </div>
                            <div class="form-group">
                                <label>I am a </label>
                                <select class="form-control" name="gender">
                                    <option>Select</option>
                                    @if(Auth::user()->profile->gender == 'male')
                                        <option value="male" selected>Male</option>
                                        <option value="female">Female</option>
                                    @elseif(Auth::user()->profile->gender == 'female')
                                        <option value="male">Male</option>
                                        <option value="female" selected>Female</option>
                                    @else
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-default center-block btn-block">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="Form_main">
                        <form action="{{ route('ajaxPasswordUpdate') }}" method="POST" id="ajaxPasswordUpdate">
                            <h4>Edit my password</h4>
                            <div class="form-group">
                                <label>Old Password <span>*</span></label>
                                <input type="password" class="form-control" name="old_password">
                            </div>
                            <div class="form-group">
                                <label>New Password <span>*</span></label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm New Password <span>*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            </div>
                            <div class="form-group">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-default center-block btn-block" id="edit_pass">Save
                                    changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>