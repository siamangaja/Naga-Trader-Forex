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

    public function depositUser() {
        $uid = auth()->id();
        $title = 'Deposit';
        $data = Deposit::orderBy('id', 'desc')->where('user_id', $uid)->paginate(20);
        return view('user.deposit-index', [
            'data'  => $data,
            'title' => $title,
        ]);
    }


    public function depositAdd() {
        $title = 'Setor Deposit';
        $data = BankAdmin::where('status', 1)->get();
        return view('user.deposit-add', [
            'title' => $title,
            'data' => $data,
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
        $NewDeposit->fee            = rand(1,7);
        $NewDeposit->total          = $NewDeposit->amount+$NewDeposit->fee;
        $NewDeposit->notes          = $request->notes;
        $NewDeposit->ref            = (string) Str::uuid();
        $NewDeposit->save();
        return redirect ('user/deposit/'.$NewDeposit->ref);
    }

    public function depositDetail ($ref) {
        $title = 'Setor Deposit';
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
        $NewWithdraw->ref           = (string) Str::uuid();
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
        $title = 'Wallet';
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
        $title = 'Transactions';
        $databalance = Transactions::orderBy('id', 'desc')->where('user_id', $uid)->take(1)->get();
        $data = Transactions::orderBy('id', 'desc')->where('user_id', $uid)->paginate(20);

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


    // public function IndexUsers() {
    //     $title = 'Data User';
    //     $data = User::orderBy('id', 'desc')->paginate(20);
    //     return view('admin.users-index', [
    //         'data'  => $data,
    //         'title' => $title,
    //     ]);
    // }

    // public function DeleteUsers (Request $request) {
    //     $Users = User::where('id', $request->id)->get();
    //     if (!$Users) {
    //         return redirect ('admin/users')->with("error","Terjadi kesalahan...");
    //     }
    //     else{
    //         $Delete = User::where('id', $request->id)->delete();
    //         return redirect ('admin/users')->with("success","Data berhasil dihapus...");
    //     }
    // }

    // public function EditUsers (Request $request) {
    //     $title = 'Edit User';
    //     $d = User::where('id', $request->id)->first();
    //     return view('admin.users-edit', [
    //         'd'     => $d,
    //         'title' => $title,
    //     ]);
    // }

    // public function SaveUsers (Request $request) {
    //     $update = User::where('id', $request->id)
    //     ->update([
    //         'name'      => $request->name,
    //         'email'     => $request->email,
    //         'phone'     => $request->phone,
    //         'address'   => $request->address,
    //     ]);
    //     return redirect ('admin/users')->with("success","Data berhasil diperbarui...");
    // }

    // public function IndexDeposit() {
    //     $title = 'Data Deposit';
    //     $data = Deposit::orderBy('id', 'desc')->with('User')->paginate(20);
    //     return view('admin.deposit-index', [
    //         'data'  => $data,
    //         'title' => $title,
    //     ]);
    // }

    // public function DeleteDeposit (Request $request) {
    //     $Deposit = Deposit::where('ref', $request->ref)->get();
    //     if (!$Deposit) {
    //         return redirect ('admin/deposit')->with("error","Terjadi kesalahan...");
    //     }
    //     else{
    //         $Delete = Deposit::where('ref', $request->ref)->delete();
    //         return redirect ('admin/deposit')->with("success","Data berhasil dihapus...");
    //     }
    // }

    // public function ValidateDeposit (Request $request) {
    //     $Deposit = Deposit::where('ref', $request->ref)->first();
    //     if (!$Deposit) {
    //         return redirect ('admin/deposit')->with("error","Terjadi kesalahan...");
    //     }
    //     else {
    //         $update = Deposit::where('ref', $Deposit->ref)
    //         ->update([
    //             'status' => 1
    //         ]);

    //         $databalance = Wallet::orderBy('id', 'desc')->where('user_id', $Deposit->user_id)->take(1)->get();

    //         if ($databalance) {
    //             $balance = 0;
    //         }

    //         foreach($databalance as $b) {
    //             $balance = $b->balance;
    //         }

    //         //Tambahkan balance ke User
    //         $NewWallet = new Wallet;
    //         $NewWallet->user_id = $Deposit->user_id;
    //         $NewWallet->type    = 'credit';
    //         $NewWallet->amount  = $Deposit->total;
    //         $NewWallet->balance = $balance+$Deposit->total;
    //         $NewWallet->notes   = 'Deposit: '.$Deposit->ref;
    //         $NewWallet->save();
    //         return redirect ('admin/deposit')->with("success","Data berhasil divalidasi...");
    //     }
    // }

    // public function IndexLogs() {
    //     $title = 'Logs Balance';
    //     $data = Wallet::orderBy('id', 'desc')->with('User')->paginate(20);
    //     return view('admin.logs-index', [
    //         'data'  => $data,
    //         'title' => $title,
    //     ]);
    // }

    // public function IndexWithdraw() {
    //     $title = 'Data Withdraw';
    //     $data = Withdraw::orderBy('id', 'desc')->with('User')->paginate(20);
    //     return view('admin.withdraw-index', [
    //         'data'  => $data,
    //         'title' => $title,
    //     ]);
    // }

    // public function ValidateWithdraw (Request $request) {
    //     $Withdraw = Withdraw::where('ref', $request->ref)->first();
    //     if (!$Withdraw) {
    //         return redirect ('admin/withdraw')->with("error","Terjadi kesalahan...");
    //     }
    //     else {
    //         $update = Withdraw::where('ref', $Withdraw->ref)
    //         ->update([
    //             'status' => 1
    //         ]);
    //         return redirect ('admin/withdraw')->with("success","Data berhasil divalidasi...");
    //     }
    // }

    // public function IndexAdminBank() {
    //     $title = 'Pengaturan Rekening Bank';
    //     $data = BankAdmin::get();
    //     return view('admin.bank-index', [
    //         'data'  => $data,
    //         'title' => $title,
    //     ]);
    // }

    // public function EditAdminBank (Request $request) {
    //     $title = 'Edit Rekening Bank';
    //     $d = BankAdmin::where('id', $request->id)->first();
    //     return view('admin.bank-edit', [
    //         'd'     => $d,
    //         'title' => $title,
    //     ]);
    // }

    // public function SaveAdminBank (Request $request) {
    //     $update = BankAdmin::where('id', $request->id)
    //     ->update([
    //         'bank'          => $request->bank,
    //         'number'        => $request->number,
    //         'account_name'  => $request->account_name,
    //         'status'        => $request->status,
    //     ]);
    //     return redirect ('admin/bank')->with("success","Data berhasil diperbarui...");
    // }

}