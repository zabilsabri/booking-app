@extends('layouts.app')
@section('title', 'Detail Payment')

@section('content')
    <h1>Detail Pesanan</h1>
    <div class="d-flex border p-3">
        <div class="flex-shrink-0">
            <img src="{{ asset($transaction -> device -> image) }}" width="300" height="300" alt="p4_pic">
        </div>
        <div class="flex-grow-1 ms-3" style="height: 300px;">
            <h3>Pesanan:</h3>
            <table>
                <tr>
                    <td>Id Pemesanan</td>
                    <td style="width: 35px; text-align: center" >:</td>
                    <td>{{ $transaction -> id }}</td>
                </tr>
                <tr>
                    <td>Nama Pemesan</td>
                    <td style="width: 35px; text-align: center" >:</td>
                    <td>{{ $transaction -> user -> name }}</td>
                </tr>
            </table>
            <hr>
            <table>
                <tr>
                    <td>Perangkat</td>
                    <td style="width: 35px; text-align: center" >:</td>
                    <td>{{ $transaction -> device -> name }}</td>
                </tr>
                <tr>
                    <td>Tarif</td>
                    <td style="width: 35px; text-align: center" >:</td>
                    <td>Rp{{ $transaction -> device -> price }} <span>x {{ $transaction -> sessions }} sesi</span></td>
                </tr>
                @if($transaction -> book_date -> isSaturday() || $transaction -> book_date -> isSunday())
                    <tr>
                        <td>Tambahan</td>
                        <td style="width: 35px; text-align: center" >:</td>
                        <td>Rp{{ $transaction -> device -> additional_price }}</td>
                    </tr>
                @endif
            </table>
            <div class="d-flex justify-content-between" style="height: 85px">
                <h5 class="align-self-end" >Total: Rp{{ $transaction -> total_price }}</h5>
                @if($transaction -> status == 'completed')
                    <h5 class="align-self-end text-success" >Terbayar</h5>
                @else
                    <button type="button" class="btn btn-primary align-self-end" id="pay-button">Bayar Sekarang</button>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $transaction -> snap_token }}', {
            onSuccess: function(result){
                window.location.href = '{{ route('success', $transaction->order_id) }}';},
            onPending: function(result){
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            onError: function(result){
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
      };
    </script>
@endsection