<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper forasd slides -->
    <div class="carousel-inner" role="listbox">

        @for ($a = 1; $a <= 3; $a++)
            <div class="item {{{ $a == 1 ? 'active' : ''}}}">
                <img src="{{ asset('app/images/about_slider_bg.png') }}" alt="BDC IMAGE"
                     class="img-responsive center-block" width="100%"/>
                <div class="carousel-caption bdc_slider_caption">
                    <h1>NEQUE QUISQUAM EST DOLOR IPSUM</h1>
                    <h4>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, Consectetur, Adipisci
                        velit...</h4>
                    <a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">Have
                        an
                        Innovation</a>
                    <a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm">Fund
                        an
                        Innovation</a>
                </div>
            </div>
        @endfor


    </div>
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>