@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order Summary</h1>
    <div class="card">
        <div class="card-header">
            Billing Information
        </div>
        <div class="card-body">
            <p><strong>User Name:</strong> {{ auth()->user()->name }}</p>
            <p><strong>User ID:</strong> {{ auth()->user()->id }}</p>
            <p><strong>Device Name:</strong> {{ $device->name }}</p>
            <p><strong>Number of Days:</strong> {{ $days }}</p>
            <p><strong>Total Price:</strong> ${{ $totalPrice }}</p>

            <img src="{{ asset('storage/devices/' . $device->image) }}" 
                 alt="{{ $device->name }}" 
                 class="img-fluid mt-3" 
                 style="max-width: 300px;">
        </div>
    </div>
</div>
@endsection
