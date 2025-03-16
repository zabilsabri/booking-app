@extends('layouts.app')
@section('title', 'Payment Success')

@section('content')
    <div class="container-fluid" style="display: flex; flex-direction: column; text-align: center; justify-content: center; width: 100%; background-color: white;">
        <div class="row justify-content-center" style=" padding: 20px;">
            <div class="col-xl-5 col-lg-6 col-md-7 col-sm-9 shadow" style="background-color: whitesmoke; margin: 0px auto; padding:40px 20px; min-height: 200px; border-radius: 10px;">
                <span style="font-size: 23px; font-weight: bold; color: limegreen; letter-spacing: 1px; display: inline-block; margin-bottom: 15px;">
                    Pembayaran Berhasil!
                    <br>
                    Rp. {{ $transaction -> total_price }}
                    <br>
                    <span style="font-size: 15px; font-weight: 600; color: black; letter-spacing: .3px; display: inline-block; margin-bottom: 15px;">
                        a.n. {{ $transaction -> user -> name }}
                    </span>
                </span><br>
                <span style="font-size: 15px; font-weight: 600; color: dodgerblue; letter-spacing: .3px; display: inline-block; margin-bottom: 15px;">
                    <img src="{{ asset($transaction -> device -> image) }}" width="200" height="200" class="mb-4" alt="ps_img">
                    <h5>Penyewaan {{ $transaction -> device -> name }} Anda telah berhasil!</h5>
                    <p>Terima kasih telah menyewa di tempat kami!</p>
                    <span style="font-size: 15px; font-weight: 600; color: black; letter-spacing: .3px; display: inline-block; margin-bottom: 15px;">{{ $transaction -> updated_at }}</span>
                </span>
            </div>
        </div>
    </div>
@endsection