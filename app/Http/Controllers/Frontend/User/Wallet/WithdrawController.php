<?php

namespace App\Http\Controllers\Frontend\User\Wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Wallet\WithdrawRequest;
use App\Repositories\Frontend\Auth\WalletRepository;
use App\Repositories\Frontend\Auth\TransactionsRepository;

class WithdrawController extends Controller
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

        $nvActive  = 'withdraw';
        $wallets = $this->walletRepository->getWallet();
        $balance = $this->walletRepository->getBalance();
        $walletTypes = $this->walletRepository->getWalletType();
        $myAccounts = $this->walletRepository->myAccounts();
        return view('frontend.pages.wallet.withdraw', compact('nvActive', 'balance', 'wallets', 'walletTypes', 'myAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WithdrawRequest $request)
    {
        $transaction = $this->transactionsRepository->_transactions([
            'tranType' => 'withdraw',
            'wallet_id' => $request->walletId,
            'amount' => $request->amount,
            'remarks' => $request->remarks
        ]);

        if ($transaction) {
            $wallet =  $this->walletRepository->findWallet($request->walletId);
            $wallet->balance = ($wallet->balance - $request->amount);
            $wallet->save();

            return redirect()->back()->withFlashSuccess('Withdraw has done.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
