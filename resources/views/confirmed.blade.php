@extends('layouts.booking.master')

@push('breadcrumb')
<li class="nav-item"><a class="nav-link booking-nav-done disabled" href="">Details</a></li>
<li class="nav-item"><a class="nav-link booking-nav-done disabled" href="">Payment</a></li>
<li class="nav-item"><a class="nav-link booking-nav-done" href="">Confirmed</a></li>
@endpush

@section('content')
<div class="container">
  <div class="row pageheader">
    <h1>You are confirmed on the trip!</h1>
  </div>
</div>
@endsection
