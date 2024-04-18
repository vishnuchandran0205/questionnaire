@extends('front-end.master')

@section('content')
<div class="row">
    <div class="col">
        <h2>Admission Form</h2>
    </div>
    <div class="col" align="left">
        <a href="/admission_status"><button type="button" class="btn btn-primary">Admission Status</button></a>
    </div>
</div>

    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    @if ($errors->any())
           <div class="alert alert-danger">
                  <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
           @endif
    <form method="post" action="{{ route('submit_admission') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="age">Register Number:</label>
            <input type="text" class="form-control"  placeholder="Enter reqister number" id="reg_number" name="reg_number" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control"  placeholder="Enter email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control"  placeholder="Enter age" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control"  placeholder="Enter address" id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
            <label for="tc">TC Upload:</label>
            <input type="file" class="form-control-file" id="tc" name="tc" required>
        </div>
        <div class="form-group">
            <label for="mark_sheet">Mark Sheet Upload:</label>
            <input type="file" class="form-control-file" id="mark_sheet" name="mark_sheet" required>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-primary" id="get-location" required>Get Current Location</button>
            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const getLocationButton = document.getElementById('get-location');
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');

            getLocationButton.addEventListener('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        latitudeInput.value = position.coords.latitude;
                        longitudeInput.value = position.coords.longitude;
                        alert('Location captured successfully.');
                    }, function(error) {
                        alert('Error getting location: ' + error.message);
                    });
                } else {
                    alert('Geolocation is not supported by this browser.');
                }
            });
        });
    </script>
@endsection