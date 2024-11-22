@include('partials.top')

<div class="col-md-12">
    <h4 class="card-title">Edit Data Point</h4>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('data-points.update', ['data_point'=>$dataPoint->id]) }}" method="POST" class="forms-sample">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label>Date</label>
                    <input name="date" value="{{ old('date') ?? $dataPoint->date->toDateString() }}" type="date" class="form-control" placeholder="Date" required>
                </div>
                <div class="form-group">
                    <label>Town</label>
                    <select name="town_id" id="townId" class="form-control" required>
                        <option value="">Please select town</option>
                        @foreach($towns as $town)
                        <option value="{{ $town->id }}" {{ $dataPoint->town_id == $town->id ? 'selected' : '' }}>{{ $town->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Reported Cases</label>
                    <input name="reportedCases" value="{{ old('reportedCases') ?? $dataPoint->reportedCases }}" type="number" min="1" class="form-control" placeholder="Reported Cases">
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="activeStatus" value="1" {{ $dataPoint->activeStatus == 1 ? 'checked' : '' }}>
                            Active
                            <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="activeStatus" value="0" {{ $dataPoint->activeStatus == 0 ? 'checked' : '' }}>
                            In-active
                            <i class="input-helper"></i></label>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>

@include('partials.bottom')
