<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;
use Session;
use Hash;
use Auth;
use App\Models\User;
use App\Models\Wallet;
use App\Models\VirtualBalance;
use App\Models\Transactions;

class CronController extends Controller
{

    public function CheckPrice (Request $request) {
        $count = Transactions::where([
            ['status', 0],
            ['rate_end', NULL],
            ['market', $request->market],
        ])->count();

        $trxs = Transactions::where([
            ['status', 0],
            ['rate_end', NULL],
            ['market', $request->market],
        ])->get();

        $url = "https://www.bitstamp.net/api/v2/ticker/".$request->market;
        $API_data = json_decode(file_get_contents($url), true);
        $lastprice = $API_data['last'];

        if ($count == 0) {
            //return 'No transactions found...';
        }

        foreach ($trxs as $trx) {
                $current = Carbon::now()->toDateTimeString();
                $newdate = $trx->date_end;

                if ($current > $newdate) {

                $update = Transactions::where('id', $trx->id)
                    ->update(['rate_end' => $lastprice]);

                // Jika order BUY
                if (strpos($trx->type, 'buy') !== false) {

                    if ($lastprice > $trx->rate_stake) {
                        $update = Transactions::where('id', $trx->id)
                            ->update([
                            'status'    => 1,
                            'win_lose'  => $trx->amount*1.8,
                        ]);

                        //Tambahkan balance user
                        $databalance = VirtualBalance::orderBy('id', 'desc')->where('user_id', $trx->user_id)->take(1)->get();

                        if ($databalance) {
                            $balance = 0;
                        }

                        foreach($databalance as $b) {
                            $balance = $b->balance;
                        }

                        $vBalance = new VirtualBalance;
                        $vBalance->user_id  = $trx->user_id;
                        $vBalance->type     = 'credit';
                        $vBalance->amount   = $trx->amount*1.8;
                        $vBalance->balance  = $balance+$trx->amount*1.8;
                        $vBalance->notes    = 'Win 180% #'.$trx->trx_id;
                        $vBalance->save();

                    } else {
                        $update = Transactions::where('id', $trx->id)
                            ->update([
                            'status'    => 2,
                            'win_lose'  => $trx->amount,
                        ]);
                    }

                // Jika order SELL
                } elseif (strpos($trx->type, 'sell') !== false) {
                    if ($lastprice < $trx->rate_stake) {
                        $update = Transactions::where('id', $trx->id)
                            ->update([
                            'status'    => 1,
                            'win_lose'  => $trx->amount*1.8,
                        ]);

                        //Tambahkan balance user
                        $databalance = VirtualBalance::orderBy('id', 'desc')->where('user_id', $trx->user_id)->take(1)->get();

                        if ($databalance) {
                            $balance = 0;
                        }

                        foreach($databalance as $b) {
                            $balance = $b->balance;
                        }

                        $vBalance = new VirtualBalance;
                        $vBalance->user_id  = $trx->user_id;
                        $vBalance->type     = 'credit';
                        $vBalance->amount   = $trx->amount*1.8;
                        $vBalance->balance  = $balance+$trx->amount*1.8;
                        $vBalance->notes    = 'Win 180% #'.$trx->trx_id;
                        $vBalance->save();

                    } else {
                        $update = Transactions::where('id', $trx->id)
                            ->update([
                            'status'    => 2,
                            'win_lose'  => $trx->amount,
                        ]);
                    }
                }

                return 'Transactions updated...';
            }
        }

    }

}