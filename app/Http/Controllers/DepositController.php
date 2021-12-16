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
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\Wallet;
use App\Models\BankAdmin;
use App\Models\BankUsers;
use App\Models\VirtualBalance;
use App\Models\Transactions;

class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboardUser() {
        $title = 'Dashboard';
        $d = User::where('id', auth()->id())->first();
        $wallet = Wallet::where('user_id', auth()->id())->orderBy('id', 'desc')->take(1)->first();
        if($wallet == null){
            $balance = 0;
        } else {
            $balance = $wallet->balance;
        }
        return view('user.dashboard', [
            'title' => $title,
            'd' => $d,
            'Deposit' => Deposit::where('user_id', auth()->id())->count(),
            'Withdraw' => Withdraw::where('user_id', auth()->id())->count(),
            'balance' => $balance,
            'history' => Wallet::orderBy('id', 'desc')->where('user_id', auth()->id())->take(5)->get(),
            'bank' => BankUsers::where('user_id', auth()->id())->first(),
        ]);
    }

    public function profileUser () {
        $d = User::where('id', auth()->id())->first();
        $title = 'Edit Profile';
        return view('user.profile', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function saveprofileUser (Request $request) {
        $update = User::where('id', $id = auth()->id())
            ->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'address'   => $request->address,
                'country'   => $request->country,
                'bitcoin'   => $request->bitcoin,
            ]);
            return redirect()->back()->with("success","Profil Anda sukses diperbarui...");
    }

    public function ChangePassword () {
        $id = auth()->id();
        $d = User::where('id', auth()->id())->first();
        $title = 'Change Password';
        return view('user.change-password', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function SavePassword (Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        return redirect()->back()->with("error","Password yang Anda masukkan tidak sesuai dengan password saat ini. Silahkan diulang...");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        return redirect()->back()->with("error","Password baru harus tidak boleh sama dengan saat ini. Silahkan diulang...");
        }
        if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
            return redirect()->back()->with("error","Kombinasi password baru tidak sama. Silahkan diulang...");
        }
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password Anda sukses diganti...");
    }

    public function avatarUser () {
        $data = User::where('id', auth()->id())->first();
        $title = 'Profile Image';
        return view('user.avatar-edit', [
            'data' => $data,
            'title' => $title,
        ]);
    }

    public function avatarUserSave (Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);
        $file = $request->file('image');
        $imageName1 = time().'-'.$file->getClientOriginalName();
        $imageName2 = Str::lower($imageName1);
        $imageName3 = preg_replace('/\s+/', '', $imageName2);
        $img = $request->image->move(public_path('storage/images'), $imageName3);
  
        $update = User::where('id', auth()->id())
            ->update([
                'avatar' => $imageName3,
            ]);
        return redirect ('user/profile/image')->with("success","Data updated successfully...");
    }

    public function depositUser() {
        $uid = auth()->id();
        $title = 'Add Balance';
        $data = Deposit::orderBy('id', 'desc')->where('user_id', $uid)->paginate(20);
        return view('user.deposit-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function depositAdd() {
        $title = 'Add Balance';
        $data = BankAdmin::where('status', 1)->get();
        return view('user.deposit-add', [
            'title' => $title,
            'data'  => $data,
        ]);
    }

    public function depositStore (Request $request) {
        $bank = BankAdmin::where('bank', $request->bank)->first();
        $NewDeposit = new Deposit;
        $NewDeposit->user_id        = auth()->id();
        $NewDeposit->bank_name      = $bank->bank;
        $NewDeposit->bank_number    = $bank->number;
        $NewDeposit->bank_account   = $bank->account_name;
        $NewDeposit->amount         = $request->amount;
        $NewDeposit->fee            = 0; //rand(12, 57) / 100;
        $NewDeposit->total          = $NewDeposit->amount+$NewDeposit->fee;
        $NewDeposit->ref            = strtoupper(substr(md5(microtime()), 0, 12));
        $NewDeposit->save();
        return redirect ('user/deposit/'.$NewDeposit->ref);
    }

    public function depositDetail ($ref) {
        $title = 'Add Balance';
        $d = Deposit::where('ref', $ref)->first();

        if ($d == null) {
            return 'Data tidak tersedia...';
        }

        return view('user.deposit-detail', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function withdrawUser() {
        $uid = auth()->id();
        $title = 'Withdraw';
        $data = Withdraw::orderBy('id', 'desc')->where('user_id', $uid)->paginate(20);
        return view('user.withdraw-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }

    public function WithdrawAdd() {
        $uid = auth()->id();
        $title = 'Withdraw';
        $databalance = Wallet::orderBy('id', 'desc')->where('user_id', $uid)->take(1)->get();
        $bank = BankUsers::where('user_id', auth()->id())->first();

        if ($bank == null) {
            return redirect()->back()->withError('Anda belum menambahkan data rekening bank...');
        }

        if ($databalance) {
            $balance = 0;
        }

        foreach($databalance as $b) {
            $balance = $b->balance;
        }

        return view('user.withdraw-add', [
            'title' => $title,
            'balance' => $balance,
        ]);
    }

    public function WithdrawStore (Request $request) {
        $databalance = Wallet::orderBy('id', 'desc')->where('user_id', auth()->id())->take(1)->get();

        if ($databalance) {
            $balance = 0;
        }

        foreach($databalance as $bl) {
            $balance = $bl->balance;
        }

        $bank = BankUsers::where('user_id', auth()->id())->first();

        if ($balance < $request->amount) {
            return redirect()->back()->withError('Balance Anda tidak mencukupi untuk tarik tunai ini...');
        }

        if ($bank == null) {
            return redirect()->back()->withError('Anda belum menambahkan data rekening bank...');
        }

        $NewWithdraw = new Withdraw;
        $NewWithdraw->user_id       = auth()->id();
        $NewWithdraw->bank_name     = $bank->bank;
        $NewWithdraw->bank_number   = $bank->number;
        $NewWithdraw->bank_account  = $bank->account_name;
        $NewWithdraw->amount        = $request->amount;
        $NewWithdraw->fee           = 0;
        $NewWithdraw->total         = $NewWithdraw->amount+$NewWithdraw->fee;
        $NewWithdraw->ref           = strtoupper(substr(md5(microtime()), 0, 12));
        $NewWithdraw->save();

        //Simpan balance
        $NewWallet = new Wallet;
        $NewWallet->user_id = auth()->id();
        $NewWallet->type    = 'debet';
        $NewWallet->amount  = $NewWithdraw->total;
        $NewWallet->balance = $balance-$NewWithdraw->total;
        $NewWallet->notes   = 'Withdraw: '.$NewWithdraw->ref;
        $NewWallet->save();

        return redirect('user/withdraw')->withSuccess('Permintaan tarik tunai Anda sedang kami verifikasi...');
    }

    public function ChangeBank () {
        $uid = auth()->id();
        $title = 'Update Bank Account';
        $d = BankUsers::where('user_id', $uid)->first();
        return view('user.bank', [
            'd' => $d,
            'title' => $title,
        ]);
    }

    public function SaveBank (Request $request) {
        $update = BankUsers::where('user_id', $id = auth()->id())
        ->update([
            'user_id'       => auth()->id(),
            'bank'          => $request->bank,
            'number'        => $request->number,
            'account_name'  => $request->account_name,
        ]);
        return redirect()->back()->with("success","Data rekening bank Anda sukses diperbarui...");
    }

    public function StoreBank (Request $request) {
        $NewBank = new BankUsers;
        $NewBank->user_id       = auth()->id();
        $NewBank->bank          = $request->bank;
        $NewBank->number        = $request->number;
        $NewBank->account_name  = $request->account_name;
        $NewBank->save();
        return redirect()->back()->with("success","Data rekening bank Anda sukses diperbarui...");
    }

    public function WalletUser() {
        $uid = auth()->id();
        $title = 'Cash Balance';
        $databalance = Wallet::orderBy('id', 'desc')->where('user_id', $uid)->take(1)->get();
        $data = Wallet::orderBy('id', 'desc')->where('user_id', $uid)->paginate(20);

        if ($databalance) {
            $balance = 0;
        }

        foreach($databalance as $b) {
            $balance = $b->balance;
        }

        return view('user.wallet-index', [
            'data' => $data,
            'balance' => $balance,
            'title' => $title,
        ]);
    }

    public function VirtualBalanceUser() {
        $uid = auth()->id();
        $title = 'Virtual Balance';
        $databalance = VirtualBalance::orderBy('id', 'desc')->where('user_id', $uid)->take(1)->get();
        $data = VirtualBalance::orderBy('id', 'desc')->where('user_id', $uid)->paginate(20);

        if ($databalance) {
            $balance = 0;
        }

        foreach($databalance as $b) {
            $balance = $b->balance;
        }

        return view('user.vbalance-index', [
            'data' => $data,
            'balance' => $balance,
            'title' => $title,
        ]);
    }

    public function TransactionsIndex() {
        $uid = auth()->id();
        $title = 'Dashboard';
        $data = Transactions::orderBy('id', 'desc')->where('user_id', $uid)->paginate(20);
        return view('user.transactions-index', [
            'data' => $data,
            'title' => $title,
        ]);
    }

    // public function Order ($amount) {
    //     $url = "https://cex.io/api/last_price/BTC/USD";
    //     $API_data = json_decode(file_get_contents($url), true);
    //     $price = $API_data['lprice'];
    //     $NewOrder = new Transactions;
    //     $NewOrder->trx_id   = strtoupper(substr(md5(microtime()), 0, 12));
    //     $NewOrder->user_id  = auth()->id();
    //     $NewOrder->type     = 'buy';
    //     $NewOrder->symbol   = 'btcusd';
    //     $NewOrder->price    = $price;
    //     $NewOrder->amount   = $amount;
    //     $NewOrder->fee      = 0;
    //     $NewOrder->total    = $NewOrder->price*$NewOrder->amount;
    //     $NewOrder->notes    = '';
    //     $NewOrder->status   = 1;

    //     $VirtualBalance = VirtualBalance::orderBy('id', 'desc')->where('user_id', auth()->id())->take(1)->get();

    //     if ($VirtualBalance) {
    //         $vbalance = 0;
    //     }

    //     foreach($VirtualBalance as $b) {
    //         $vbalance = $b->balance;
    //     }

        
    //     if ($vbalance < $NewOrder->total) {
    //         return redirect ('user/transactions')->with("error","Insufficient balance...");
    //     }

    //     $NewOrder->save();

    //     // Simpan Data ke Virtual Balance
    //     $NewVirtualBalance = new VirtualBalance;
    //     $NewVirtualBalance->user_id = auth()->id();
    //     $NewVirtualBalance->type    = 'debet';
    //     $NewVirtualBalance->amount  = $NewOrder->total;
    //     $NewVirtualBalance->balance = $vbalance-$NewOrder->total;
    //     $NewVirtualBalance->notes   = 'Order: '.$NewOrder->trx_id;
    //     $NewVirtualBalance->save();

    //     return redirect ('user/transactions');
    // }

    public function Buy (Request $request) {
        $market = $request->market;
        $time = $request->time;
        $amount = $request->amount;
        //dd($market.'/'.$time.'/'.$amount);
        //$url = "https://cex.io/api/last_price/BTC/USD";
        //$price = $API_data['lprice'];
        $url = "https://www.bitstamp.net/api/v2/ticker/".$market;
        $API_data = json_decode(file_get_contents($url), true);
        $price = $API_data['last'];
        $NewOrder = new Transactions;
        $NewOrder->user_id      = auth()->id();
        $NewOrder->trx_id       = strtoupper(substr(md5(microtime()), 0, 12));
        $NewOrder->market       = $market;
        $NewOrder->amount       = $amount;
        $NewOrder->type         = 'buy '.$time.' seconds';
        $NewOrder->date_start   = Carbon::now();
        $NewOrder->date_end     = Carbon::now()->addSeconds($time);
        $NewOrder->rate_stake   = $price;
        $NewOrder->rate_end     = NULL;
        $NewOrder->status       = 0;
        $NewOrder->win_lose     = 0;
        $NewOrder->save();
        return redirect ('user/transactions');
    }

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
            return 'No transactions found...';
        }

        foreach ($trxs as $trx) {
                $current = Carbon::now()->toDateTimeString();
                $newdate = $trx->date_end;
        }

        if ($current > $newdate) {

            $update = Transactions::where('id', $trx->id)
                ->update(['rate_end' => $lastprice]);

                //dd($lastprice.' | '.$trx->rate_stake);

            if ($lastprice > $trx->rate_stake) {
                $update = Transactions::where('id', $trx->id)
                    ->update([
                    'status'    => 1,
                    'win_lose'  => $trx->amount*18000,
                ]);
            } else {
                $update = Transactions::where('id', $trx->id)
                    ->update([
                    'status'    => 2,
                    'win_lose'  => $trx->amount,
                ]);
            }
            return 'Transactions updated...';
        }

    }

    public function Coba (Request $request) {
        switch($request->buttonSubmit) {
            case 'buy': 
                $market = $request->market;
                $time = $request->time;
                $amount = $request->amount;
                $url = "https://www.bitstamp.net/api/v2/ticker/".$market;
                $API_data = json_decode(file_get_contents($url), true);
                $price = $API_data['last'];
                $NewOrder = new Transactions;
                $NewOrder->user_id      = auth()->id();
                $NewOrder->trx_id       = strtoupper(substr(md5(microtime()), 0, 12));
                $NewOrder->market       = $market;
                $NewOrder->amount       = $amount;
                $NewOrder->type         = 'buy '.$time.' seconds';
                $NewOrder->date_start   = Carbon::now();
                $NewOrder->date_end     = Carbon::now()->addSeconds($time);
                $NewOrder->rate_stake   = $price;
                $NewOrder->rate_end     = NULL;
                $NewOrder->status       = 0;
                $NewOrder->win_lose     = 0;
                $NewOrder->save();
                return redirect ('user');
            break;

            case 'sell': 
                return 'sell';
            break;
        }
    }

}