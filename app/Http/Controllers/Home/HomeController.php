<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Midtrans\Transaction as MidtransTransaction;

class HomeController extends Controller
{
    public function index() {
        $devices = Device::all();
        return view('home.index', compact('devices'));
    }

    public function detail($id) {
        $transaction = Transaction::with('device', 'user')->find($id);
        return view('home.detail', compact('transaction'));
    }

    public function success($orderId) {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        \Midtrans\Config::$clientKey = config('midtrans.client_key');

        $transaction = Transaction::where('order_id', $orderId)->first();

        try {
            $status = MidtransTransaction::status($orderId);
            if($status->transaction_status == 'settlement') {
                $transaction->status = 'completed';
                $transaction->save();

                return view('home.success', compact('transaction'));
            }else {
                return redirect()->route('detail', $transaction->id);
            }
        } catch (\Throwable $th) {
            return redirect()->route('detail', $transaction->id);
        }

    }
}
