
@extends('front-end.master')

@section('content')
    <h2>Admitted Status Check</h2>
    <form method="post" action="{{ route('check.status') }}">
        @csrf
        <div class="form-group">
            <label for="admission_number">Reqister Number:</label>
            <input type="text" class="form-control" placeholder="Enter register number" id="admission_number" name="admission_number" required>
        </div>
        <button type="submit" class="btn btn-primary">Check Status</button>
    </form>

    @if(session('status'))
        <div class="alert alert-info mt-3">
            {{ session('status') }}
        </div>
    @endif
@endsection
