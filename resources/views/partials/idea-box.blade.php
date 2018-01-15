<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 listing_item">
    <div class="Funding_box Funding_box_small {{ $listing->category->color_code }}_box">
        <h5><a href="#">{{ $listing->title }}</a></h5>
        <!--<h6>exercitationem ullam</h6> -->
        <div class="button_groups">
            <a class="btn btn-default Badge_tag">{{ $listing->category->symbol }}</a>
            <a class="btn btn-default fund_Price">Funding needs: ${{ $listing->funding }}</a>
        </div>
        <div class="funding_description">
            <h2>Problem it solves:</h2>
            <p>
                {{ str_limit($listing->description, $limit = 150, $end = '...') }}
            </p>
        </div>
        <div class="Funding_box_footer clearfix">
                       <span class="ready_img">           

                                            <label>
                                                <img src="{{ asset('panel_assets/images/r_img.png') }}" class="img-responsive sheld_img2 {{{ $listing->service_id > 1 ? '' : 'grayscale' }}}"/>
                                            </label> 
                                             <label>
                                                <img src="{{ asset('panel_assets/images/image-e.png') }}" class="img-responsive sheld_img2 {{{ $listing->service_id > 2 ? '' : 'grayscale' }}}"/>
                                            </label>
                                            <label>
                                                <img src="{{ asset('panel_assets/images/image-a.png') }}" class="img-responsive sheld_img2 {{{ $listing->service_id > 3 ? '' : 'grayscale' }}}"/>
                                            </label> 
                                           
                                            <label>
                                                <img src="{{ asset('panel_assets/images/image-d.png') }}" class="img-responsive sheld_img2 {{{ $listing->service_id > 4 ? '' : 'grayscale' }}}"/>
                                            </label> 
                                            <label>
                                                <img src="{{ asset('panel_assets/images/image-y.png') }}" class="img-responsive sheld_img2 {{{ $listing->service_id > 5 ? '' : 'grayscale' }}}"/>
                                            </label>  

                                        </span>
            <span class="Fund_contact">
                            <a href="{{ route('funder_request_listing') }}" class="btn btn-default">Contact</a>
                        </span>
        </div>
    </div>
</div>