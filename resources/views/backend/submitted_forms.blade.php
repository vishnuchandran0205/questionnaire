@extends('backend.master')
@section('content')
<h2>List of Submitted Forms</h2>
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
    <form method="post" action="{{ route('admit_students') }}">
        @csrf
        <table class="table" width="100%" border="2">
            <thead>
                <tr>
                    <th scope="col">Admit</th>
                    <th scope="col">slNo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i=1;
            @endphp
                @foreach($submittedForms as $form)
              
                    <tr>
                        @if($form->admission_status == 0)
                        <td><input type="checkbox" name="admitted_students[]" value="{{ $form->id }}"></td>
                        @else
                        <td>Admitted</td>
                        @endif
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $form->name }}</td>
                        <td>{{ $form->email }}</td>
                        <td>{{ $form->gender }}</td>
                        <td>{{ $form->age }}</td>
                        <td>{{ $form->address }}</td>
                        <td><a href="{{ url('/free_bus_fare_charge', ['id' => $form->id]) }}"><button type="button" class="btn btn-primary">free bus charge</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Admit Selected Students</button>
    </form>

   

@endsection