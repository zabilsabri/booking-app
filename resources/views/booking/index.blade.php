@extends('layouts.app')
@section('title', 'Booking')

@section('content')
<table class="table table-bordered text-center">
  <thead>
    <tr>
      <th style="width: 50px" class="text-center" scope="col">#</th>
      <th scope="col">Order ID</th>
      <th scope="col">Device</th>
      <th scope="col">Session</th>
      <th scope="col">Total Price</th>
      <th scope="col">Status</th>
      <th scope="col">Detail</th>
    </tr>
  </thead>
  <tbody>
    @forelse($transactions as $index => $booking)
    <tr>
        <th class="text-center" scope="row">{{ $loop->iteration + ($transactions->firstItem() - 1) }}</th>
        <td>{{ $booking -> order_id }}</td>
        <td>{{ $booking -> device -> name }}</td>
        <td>{{ $booking -> sessions }}</td>
        <td>Rp{{ $booking -> total_price }}</td>
        <td><span class="badge text-bg-{{ $booking -> status != 'completed' ? 'warning' : 'success' }}">{{ $booking -> status }}</span></td>
        <td><a href="{{ route('detail', $booking -> id) }}" class="btn btn-primary">Detail</a></td>
    </tr>
    @empty
    <tr>
      <td colspan="7">No data available</td>
    </tr>
    @endforelse
  </tbody>
</table>
<div class="mt-4 d-flex justify-content-end">
  {{ $transactions->links() }}
</div>
@endsection