<?php

namespace App\Http\Controllers\frontend\user\wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\WalletRepository;
use App\Repositories\Frontend\Auth\TransactionsRepository;
use App\Models\Wallet\Transfers;
use Illuminate\Support\Facades\DB;
class TransferController extends Controller
{
    private $walletRepository;

    private $transactionsRepository;

    public function __construct(WalletRepository $walletRepository, TransactionsRepository $transactionsRepository)
    {
        $this->walletRepository = $walletRepository;
        $this->transactionsRepository = $transactionsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nvActive  = 'transfer';
        $balance = $this->walletRepository->getBalance();
        $wallets = $this->walletRepository->getWallet();
        $walletTypes = $this->walletRepository->getWalletType();
        $myAccounts = $this->walletRepository->myAccounts();

        return view('frontend.pages.wallet.transfers.transfer', compact('nvActive', 'balance', 'wallets', 'walletTypes', 'myAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Transfers::count();
        $count = ($count == 0) ? $count+1 : $count;

        $transCode = 'TRC-'.time().'-'.str_pad($count, 5, '0', STR_PAD_LEFT); 
        $reason = $request->reason;

        $accntNo = $request->account_no;
        $userWalletId = $request->walletId;
        $amount = $request->amount;
        $comment = $request->comment;

        $transfer =  Transfers::create([
            'transfer_code' => $transCode,
            'from_wallet_id' => $request->from_wallet_id,
            'from_user_account_id' => $this->walletRepository->findWallet($request->from_wallet_id)->user_account_id,
            'remarks' => $reason,
        ]);

        for ($i=1; $i < count($accntNo) ; $i++) { 
            $this->transferToUA( $accntNo[$i], $userWalletId[$i],  $amount[$i], $comment[$i], $transfer->id);

            $this->transactionsRepository->_transactions([
                'tranType'=> 'deposit',
                'amount'=> $amount[$i],
                'wallet_id'=> $userWalletId[$i],
                'remarks'=>  $comment[$i],
            ]);
        }
      
       $total =  $this->updateWalletBalance($request->from_wallet_id, $amount);

        $this->transactionsRepository->_transactions([
            'tranType'=> 'transfer',
            'amount'=> $total,
            'wallet_id'=> $request->from_wallet_id,
            'remarks'=>  $reason,
        ]);

        return redirect()->back()->withFlashSuccess('Transfer has been add.');

    }

    public function transferToUA($acctNo,  $walletId, $amnt, $remarks, $transId )
    {
        DB::table('transfer_to_ua')->insert([
            'transfer_id' =>  $transId,
            'to_wallet_id' =>  $walletId,
            'to_user_account_id' => $this->walletRepository->findUserAcctById($acctNo),
            'amount' => $amnt,
            'remarks' => $remarks
        ]);
    }

    public function updateWalletBalance($id, $amount)
    {
        $total = 0;
        for ($i=1; $i < count($amount) ; $i++) { 
            $total += $amount[$i];
        }

        $wallet = $this->walletRepository->findWallet($id);
        $wallet->balance = ($wallet->balance - $total);
        $wallet->save();
        return $total;
    } 
 
}
