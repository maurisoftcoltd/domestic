@include('partials.top')

<div class="col-md-12">
    <h4 class="card-title">Edit Town</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('towns.update', ['town'=>$town->id]) }}" method="POST" class="forms-sample">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="{{ old('name') ?? $town->name }}" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input name="latitude" value="{{ old('latitude') ?? $town->latitude }}" type="text" class="form-control" placeholder="Latitude">
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input name="longitude" value="{{ old('longitude') ?? $town->longitude }}" type="text" class="form-control" placeholder="Longitude">
                </div>
                <div class="form-group">
                    <label>Population</label>
                    <input name="population" value="{{ old('population') ?? $town->population }}" type="number" min="1" class="form-control" placeholder="Population">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>

@include('partials.bottom')
