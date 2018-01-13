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
                            <img src="{{ asset('panel_assets/images/ready_img.png') }}" class="img-responsive"/>
                        </span>
            <span class="Fund_contact">
                            <a href="{{ route('funder_request_listing') }}" class="btn btn-default">Contact</a>
                        </span>
        </div>
    </div>
</div>