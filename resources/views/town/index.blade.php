@include('partials.top')

<h4 class="card-title">Data Points</h4>
<a class="btn btn-success mb-4" href="{{ route('towns.create') }}">New</a>

@if($towns->isNotEmpty())
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Population</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($towns as $town)
        <tr>
            <td>{{ $town->name ?? '' }}</td>
            <td>{{ $town->latitude ?? '' }}</td>
            <td>{{ $town->longitude ?? '' }}</td>
            <td>{{ $town->population }}</td>
            <td class="text-right">
                <a href="{{ route('towns.edit',['town'=>$town->id]) }}" class="btn btn-warning">
                    Edit
                </a>
                <form action="{{ route('towns.destroy',$town->id) }}" method="POST" class="delete_form" style="display: inline;">
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
<p class="alert alert-info">There are no towns in the system</p>
@endif

@include('partials.bottom')
