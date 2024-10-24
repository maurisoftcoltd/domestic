@include('partials.top')

<div class="col-md-12">
    <h4 class="card-title">Create Data Point</h4>
    <p class="card-description">
        Create a new data point
    </p>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('data-points.store') }}" method="POST" class="forms-sample">
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Latitude</label>
                    <input name="latitude" value="{{ old('latitude') }}" type="text" class="form-control" placeholder="Latitude">
                </div>
                <div class="form-group">
                    <label>Longitude</label>
                    <input name="longitude" value="{{ old('longitude') }}" type="text" class="form-control" placeholder="Longitude">
                </div>
                <div class="form-group">
                    <label>Reported Cases</label>
                    <input name="reportedCases" value="{{ old('reportedCases') }}" type="number" min="1" class="form-control" placeholder="Reported Cases">
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="activeStatus" value="1">
                            Active
                            <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="activeStatus" value="0">
                            In-active
                            <i class="input-helper"></i></label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Village Name</label>
                    <input name="villageName" value="{{ old('villageName') }}" type="text" class="form-control" placeholder="Village Name">
                </div>
                <div class="form-group">
                    <label>Population</label>
                    <input name="population" value="{{ old('population') }}" type="number" min="1" class="form-control" placeholder="Population">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>

@include('partials.bottom')
