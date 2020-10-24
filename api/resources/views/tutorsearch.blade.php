@extends('layouts.app')

@section('content')
<!-- Scripts -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script
    src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_KEY')}}&callback=initMap&libraries=places&v=weekly"
    defer
></script>
<script src="{{ asset('js/tutorsearch.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search page</div>
               
                <div class="card-body">
                    <select id="address" onchange="initMap()">
                        <option value=""></option>
                        @foreach ($users as $user)
                            <option 
                                value="{{ $user->address }}" 
                            >
                                {{ $user->address }}
                            </option>
                        @endforeach
                    </select>
                    <div class="col-md-12" id="tutorList">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection