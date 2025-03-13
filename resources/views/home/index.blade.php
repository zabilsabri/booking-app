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
                    <option value="1">PS 4</option>
                    <option value="2">PS 5</option>
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
        <div class="d-flex mt-3">
            <div class="flex-shrink-0">
                <img src="{{asset('image/ps4.png')}}" width="350" height="350" alt="ps4_pic">
            </div>
            <div class="flex-grow-1 ms-3">
                <h4>Playstation 4</h4>
                <table>
                    <tr>
                        <td>Stick</td>
                        <td>:</td>
                        <td style="padding-left: 14px">2</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td style="padding-left: 14px">Original</td>
                    </tr>
                    <tr>
                        <td class="align-top">Game</td>
                        <td class="align-top">:</td>
                        <td>
                            <ul>
                                <li>PES eFootball 2020 (Option File Pemain 2025) - 4P</li>
                                <li>EA SPORTS FC 2024 - 4P</li>
                                <li>Grand Thief Auto 5 - 1P</li>
                                <li>Monster Hunter Rise -1P</li>
                                <li>WWE 2K Battleground - 4P</li>
                                <li>Overcooked 2 - 4P</li>
                                <li>It Takes Two - 2P</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-top">Harga</td>
                        <td class="align-top">:</td>
                        <td>
                            <ol class="fw-bold">
                                <li>Rp. 30.000 / Sesi</li>
                                <li>Rp. 30.000 + Rp. 50.000 / Sesi (Sabtu & Minggu)</li>
                            </ol>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-flex mt-5">
            <div class="flex-shrink-0">
                <img src="{{asset('image/ps5.png')}}" width="350" height="350" alt="ps4_pic">
            </div>
            <div class="flex-grow-1 ms-3">
                <h4>Playstation 5</h4>
                <table>
                    <tr>
                        <td>Stick</td>
                        <td>:</td>
                        <td style="padding-left: 14px">2</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td style="padding-left: 14px">Original</td>
                    </tr>
                    <tr>
                        <td class="align-top">Game</td>
                        <td class="align-top">:</td>
                        <td>
                            <ul>
                                <li>PES eFootball 2020 (Option File Pemain 2025) - 4P</li>
                                <li>EA SPORTS FC 2024 - 4P</li>
                                <li>Grand Thief Auto 5 - 1P</li>
                                <li>Monster Hunter Rise -1P</li>
                                <li>WWE 2K Battleground - 4P</li>
                                <li>Overcooked 2 - 4P</li>
                                <li>It Takes Two - 2P</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-top">Harga</td>
                        <td class="align-top">:</td>
                        <td>
                            <ol class="fw-bold">
                                <li>Rp. 40.000 / Sesi</li>
                                <li>Rp. 40.000 + Rp. 50.000 / Sesi (Sabtu & Minggu)</li>
                            </ol>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection