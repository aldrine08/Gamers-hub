@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Order: {{ $device->name }}</h1>
  <img src="{{ asset('storage/' . $device->image) }}" alt="{{ $device->name }}" class="img-fluid mb-3">
  <form action="{{ route('orders.process', $device->id) }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="number_of_days">Number of Days:</label>
      <input type="number" name="number_of_days" id="number_of_days" class="form-control" min="1" required>
    </div>
    <button type="submit" class="btn btn-success btn-lg rounded-pill w-100 mt-3 shadow-sm d-flex align-items-center justify-content-center"
      style="background:linear-gradient(90deg,#28a745,#20c997);border:none;color:#fff;padding:.75rem 1.25rem;font-weight:600;"
      aria-label="Calculate price and place order" title="Calculate price and place order">
      <span style="margin-right:.5rem;font-size:1.1rem;">🛒</span>
      Calculate Price &amp; Order
    </button>
  </form>
</div>
@endsection
