
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 listing_item">
    <div class="Funding_box Funding_box_small {{ $listing->category->color_code }}_box">
        <h5>

            <a href="#">{{ $listing->title }}</a>
            @if($listing->innovator->id === Auth::user()->id)
            <small><a href="{{ route('edit_listing_page', ['id' => $listing->id]) }}">edit</a></small>
            @endif
        </h5>
        {{--<h6>exercitationem ullam</h6>--}}
        <div class="button_groups">
            <a class="btn btn-default Badge_tag">{{ $listing->category->symbol }}</a>
            <a class="btn btn-default fund_Price">Funding needs: ${{ $listing->funding }}</a>

        </div>
        <div class="funding_description">
            <h2>Problem it solves:</h2>
            <p>
                {{ $listing->description }}
            </p>
        </div>
        <div class="Funding_box_footer clearfix">
            <span class="ready_img">
                <img src="{{ asset('panel_assets/images/ready_img.png') }}"
                class="img-responsive"/>
            </span>
            <span class="Fund_contact">
                <a href="#" class="btn btn-default">Contact</a>
            </span>
        </div>
    </div>
</div>