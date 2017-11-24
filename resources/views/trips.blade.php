@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row">
    @if(isset($trip))
      <h1> {{ $trip }}</h1>
      <ul>
        <li><a href="/">Home<a/></li>
        <li><a href="/trips/{{ $region }}">{{ $region }}<a/></li>
        <li><a href="/trips/{{ $region }}/{{ $trip }}">{{ $trip }}<a/></li>
      </ul>
    @else
    <h1> Trips to {{ $region }}</h1>
      <ul>
        <li><a href="/">Home<a/></li>
        <li><a href="/trips/{{ $region }}">{{ $region }}<a/></li>
      </ul>
    @endif
  </div>
</div>

@push('javascript')

@endpush

@endsection
