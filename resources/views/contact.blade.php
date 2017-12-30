@extends('layouts.app')

@section('content')
    @include('partials/no-slider')


    <div class="container-fluid main_contact_area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="contact_form">
                        <h1>we’d love to hear from you</h1>
                        <form>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="type" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="type" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Submit my request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!---./End Contact Form--->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="contact_content">
                        <h2>Don’t hesitate to reach out!</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque pro
                            laudantium, totam rem aperiam, eaque ipsa quae abitos.</p>
                    </div>
                    <div class="contact_content">
                        <h2>anyother awesome quote</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque pro
                            laudantium, totam rem aperiam, eaque ipsa quae abitos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection