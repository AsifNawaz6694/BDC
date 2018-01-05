                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                    <div class="Funding_box Funding_box_small {{ $listings->category->color_code }}_box">
                                        <h5><a href="#">{{ $listings->title }}</a></h5>
                                        {{--<h6>exercitationem ullam</h6>--}}
                                        <div class="button_groups">
                                            <a class="btn btn-default Badge_tag">{{ $listings->category->symbol }}</a>
                                            <a class="btn btn-default fund_Price">Funding needs: ${{ $listings->funding }}</a>
                                        </div>
                                        <div class="funding_description">
                                            <h2>Problem it solves:</h2>
                                            <p>
                                                {{ $listings->description }}
                                            </p>
                                        </div>
                                        <div class="Funding_box_footer clearfix">
                                                <span class="ready_img">
                                                    <img src="{{ asset('panel_assets/images/ready_img.png') }}" class="img-responsive"/>
                                                </span>
                                            <span class="Fund_contact">
                                                    <a href="#" class="btn btn-default">Contact</a>
                                                 </span>
                                        </div>
                                    </div>
                                </div>