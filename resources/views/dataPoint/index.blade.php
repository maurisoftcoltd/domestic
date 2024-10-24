@include('partials.top')

<h4 class="card-title">Data Points</h4>
<a class="btn btn-success mb-4" href="{{ route('data-points.create') }}">New</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Reported Cases</th>
            <th>Active Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataPoints as $dataPoint)
        <tr>
            <td>{{ $dataPoint->name }}</td>
            <td>{{ $dataPoint->latitude }}</td>
            <td>{{ $dataPoint->longitude }}</td>
            <td>{{ $dataPoint->reportedCases }}</td>
            <td>{{ $dataPoint->activeStatus }}</td>
        </tr>
        @empty
        <p class="alert alert-info">There are no data points in the system</p>
        @endforelse
    </tbody>
</table>

@include('partials.bottom')



@include('partials.top')

<h4 class="card-title">Data Points</h4>
<a class="btn btn-success mb-4" href="{{ route('data-points.create') }}">New</a>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Reported Cases</th>
            <th>Active Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataPoints as $dataPoint)
        <tr>
            <td>{{ $dataPoint->name }}</td>
            <td>{{ $dataPoint->latitude }}</td>
            <td>{{ $dataPoint->longitude }}</td>
            <td>{{ $dataPoint->reportedCases }}</td>
            <td>{{ $dataPoint->activeStatus }}</td>
        </tr>
        @empty
        <p class="alert alert-info">There are no data points in the system</p>
        @endforelse
    </tbody>
</table>

@include('partials.bottom')
