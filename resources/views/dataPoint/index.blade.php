@include('partials.top')

<h4 class="card-title">Data Points</h4>
<a class="btn btn-success mb-4" href="{{ route('data-points.create') }}">New</a>

@if($dataPoints->isNotEmpty())
<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Town</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Reported Cases</th>
            <th>Active Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataPoints as $dataPoint)
        <tr>
            <td>{{ $dataPoint->date->toDateString() }}</td>
            <td>{{ $dataPoint->town->name }}</td>
            <td>{{ $dataPoint->town->latitude }}</td>
            <td>{{ $dataPoint->town->longitude }}</td>
            <td>{{ $dataPoint->reportedCases }}</td>
            <td>{{ $dataPoint->activeStatus }}</td>
            <td class="text-right">
                <a href="{{ route('data-points.edit', ['data_point'=>$dataPoint->id]) }}" class="btn btn-warning">
                    Edit
                </a>
                <form action="{{ route('data-points.destroy',$dataPoint->id) }}" method="POST" class="delete_form" style="display: inline;">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="alert alert-info">There are no data points in the system</p>
@endif

@include('partials.bottom')
