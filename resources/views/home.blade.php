@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    <h1>We are Great-Tours</h1>
  </div>
  <div class="row">
    <ul>
      @foreach ($returnedtrips as $trip)
      <li><a href="/trips/{{ $trip->region }}/{{ $trip->name }}">{{ $trip->name }}</li>
      @endforeach
    </ul>
</div>
</div>


@push('javascript')

@endpush

@endsection
