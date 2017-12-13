@extends('layouts.booking.master')

@push('breadcrumb')
<a class="nav-link booking-nav-done disabled" href="">Details</a>
<a class="nav-link booking-nav-done disabled" href="">Payment</a>
<a class="nav-link booking-nav-done" href="">Confirmed</a>
@endpush

@section('content')
<div class="container">
  <div class="row pageheader">
    <h1>You are confirmed on the trip!</h1>
  </div>
</div>
@endsection
