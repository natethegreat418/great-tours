@extends('layouts.master')

@section('content')
<div class="container">
    @if(isset($tripname))
    <div class="row">
      <h1> {{ $tripname }}</h1>
      <ul>
        <li><a href="/">Home<a/></li>
        <li><a href="/trips/{{ $region }}">{{ $region }}<a/></li>
        <li><a href="/trips/{{ $region }}/{{ $tripname }}">{{ $tripname }}<a/></li>
      </ul>
    </div>
    @else
    <div class="row">
    <h1> Trips to {{ $region }}</h1>
      <ul>
        <li><a href="/">Home<a/></li>
        <li><a href="/trips/{{ $region }}">{{ $region }}<a/></li>
      </ul>
    </row>
  </div>
      <div class="row">
        <ul>
          @foreach ($returnedtrips as $trip)
          <li><a href="/trips/{{ $region }}/{{ $trip->name }}">{{ $trip->name }}<a/></li>
          @endforeach
        </ul>
    </div>
    @endif
</div>

@push('javascript')

@endpush

@endsection
