            <div class="dashboard_box">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-body">
                        <h4 class="float-left text-left">About me</h4>
                        <h4 class="float-right text-right"><a href="#">Edit Profile</a></h4>
                    </div>
                    <!-- Table -->
                    <table class="table">
                      
                        <tr>
                            <td>
                                <label>Full Name <span>*</span></label>
                                <p>{{ Auth::user()->name }}</p>
                            </td>
                            <td>
                                <label>Phone <span>*</span></label>
                                <p>{{ Auth::user()->profile->phone }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email Address <span>*</span></label>
                                <p>{{ Auth::user()->email }}</p>
                            </td>
                            <td>
                                <label>DOB <span>*</span></label>
                                <p>{{ Auth::user()->profile->birth_date }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password <span>*</span></label>
                                <p>******</p>
                            </td>
                            <td>
                                <label>I am a <span>*</span></label>
                                <p>{{ Auth::user()->role->role_name }}</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>