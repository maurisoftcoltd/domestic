@include('partials.top')

<div class="col-lg-6 stretch-card grid-margin grid-margin-lg-0">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Domestic Violence Data By Borough</h4>
            <div class="container">
                <form action="{{ route('home',['from'=>$from, 'to'=>$to]) }}" method="GET" class="forms-sample">
                    @csrf
                    <input type="date" name="from" id="from" value="{{ $from }}">
                    <input type="date" name="to" id="to" value="{{ $to }}">
                    <button class="btn btn-primary">GO</button>
                </form>
                <div class="mapcontainer mapael-example-1" data-url="{{ route('get_all_data_points', ['from'=>$from, 'to'=>$to]) }}">
                    <div class="map"><span>Alternative content for the map</span></div>
                    <div class="myLegend"><span>Alternative content for the legend</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.bottom')
