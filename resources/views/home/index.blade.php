@extends('layouts.app')
@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
    <h1>Daftarkan Permainanmu Sekarang!</h1>
    <h5>Tentukan jadwalmu dan langsung bermain...</h5>
    <div class="container-dropdown-schedule align-content-center">
        <div class="dropdown-schedule d-flex align-content-center w-100 border">
            <div class="p-2 flex-fill">
                <select class="form-select" aria-label="perangkat_input">
                    <option selected>Pilih Perangkat</option>
                    @foreach($devices as $device)
                    <option value="{{ $device->id }}">{{ $device -> name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="p-2 flex-fill">
                <input type="date" class="form-control" min="{{ date('Y-m-d') }}">
            </div>
            <div class="p-2 flex-fill">
                <input class="form-control" type="text" placeholder="Masukkan Jumlah Sesi" aria-label="sesi_input">
            </div>
            <div class="p-2 flex-shrink-1">
                <button type="button" class="btn btn-primary">Daftar!</button>
            </div>
        </div>
    </div>
    <div>
        <h2>Harga Sewa</h2>
        @foreach($devices as $device)
        <div class="d-flex mt-3">
            <div class="flex-shrink-0">
                <img src="{{asset($device -> image)}}" width="350" height="350" alt="{{ $device->image }}_pic">
            </div>
            <div class="flex-grow-1 ms-3">
                <h4>{{ $device -> name }}</h4>
                <p>{{ $device -> description }}</p>
                <table>
                    <tr>
                        <td>Stick</td>
                        <td>:</td>
                        <td style="padding-left: 14px">{{ $device -> joysticks_amount }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td style="padding-left: 14px">{{ $device -> status }}</td>
                    </tr>
                    <tr>
                        <td class="align-top">Harga</td>
                        <td class="align-top">:</td>
                        <td>
                            <ol class="fw-bold">
                                <li>Rp{{ $device -> price }} / Sesi</li>
                                @if(!isset($devide -> additional_price))
                                <li>Rp{{ $device -> price }} + Rp{{ $device -> additional_price }} / Sesi ({{ $device -> additional_price_description }})</li>
                                @endif
                            </ol>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @endforeach
    </div>
@endsection