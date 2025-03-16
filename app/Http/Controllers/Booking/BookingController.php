<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class BookingController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('device', 'user')->where('user_id', Auth::user()->id)->paginate(10);
        return view('booking.index', compact('transactions'));
    }

    public function bookProcess(Request $request) {
        $request->validate([
            'device_id' => 'required',
            'book_date' => 'required',
            'sessions' => 'required',
        ]);

        $device = Device::find($request->device_id);

        $book_date = Carbon::parse($request->book_date);
        $total_price = $device->getRawOriginal('price') * $request->sessions;

        if($book_date->isSaturday() || $book_date->isSunday()) {
            $total_price = $total_price + $device->getRawOriginal('additional_price');
        }

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $order_id = rand();

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $total_price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $uuid = (string) Str::uuid();
        $transaction = DB::table('transactions')->insert([
            'id' => $uuid,
            'order_id' => $order_id,
            'device_id' => $request->device_id,
            'user_id' => Auth::user()->id,
            'book_date' => $request->book_date,
            'sessions' => $request->sessions,
            'total_price' => $total_price,
            'snap_token' => $snapToken,
            'status' => 'pending',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        return redirect()->route('detail', $uuid);
    }
}
