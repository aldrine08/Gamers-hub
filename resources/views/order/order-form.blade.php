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
    <button type="submit" class="btn btn-success mt-3">Calculate Price & Order</button>
  </form>
</div>
@endsection
