@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order: {{ $device->name }}</h1>
    <div class="row">
        <div class="col-md-6">
            {{-- Device Image --}}
            <img src="{{ asset('storage/devices/' . $device->image) }}" 
                 alt="{{ $device->name }}" 
                 class="img-fluid mb-3">
        </div>
        <div class="col-md-6">
            <p>Price per day: ${{ $device->price_per_day }}</p>
            
            {{-- Form to specify the number of days --}}
            <form action="{{ route('orders.process', $device->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="number_of_days">Number of Days</label>
                    <input type="number" name="number_of_days" id="number_of_days" 
                           class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">
                    Calculate & Continue
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
