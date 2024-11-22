@include('partials.top')

<div class="col-lg-6 stretch-card grid-margin grid-margin-lg-0">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Domestic Violence Data By Borough</h4>
            <div class="container">
                <form action=""></form>
                <div class="mapcontainer mapael-example-1" data-url="{{ route('get_all_data_points') }}">
                    <div class="map"><span>Alternative content for the map</span></div>
                    <div class="myLegend"><span>Alternative content for the legend</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.bottom')
