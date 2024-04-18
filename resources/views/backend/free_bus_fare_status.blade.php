

@extends('backend.master')

@section('content')
    <h2>Free Bus Fare Charge Status</h2>
    @if($isWithin2km)
        <div class="alert alert-success">
            This student is eligible for free bus fare charge as they are within 2km radius from the school.
        </div>
    @else
        <div class="alert alert-danger">
            This student is not eligible for free bus fare charge as they are more than 2km away from the school.
        </div>
    @endif
    <a href="{{ route('submitted.forms') }}" class="btn btn-primary">Back to List</a>
@endsection
