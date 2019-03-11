<?php

namespace App\Http\Controllers\frontend\user\wallet;

use App\Models\Auth\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Wallet\DepositRequest;
use App\Repositories\Frontend\Auth\WalletRepository;
use App\Repositories\Frontend\Auth\TransactionsRepository;


class DepositController extends Controller
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
        $nvActive  = 'cash-in';
        $wallets = $this->walletRepository->getWallet();
        $balance = $this->walletRepository->getBalance();
        $walletTypes = $this->walletRepository->getWalletType();
        $myAccounts = $this->walletRepository->myAccounts();
        return view('frontend.pages.wallet.cash-in', compact('nvActive', 'balance', 'wallets', 'walletTypes', 'myAccounts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $balance = $this->walletRepository->getBalance();

        $nvActive  = 'create';

        return view('frontend.pages.wallet.deposits.deposit-new', compact('nvActive', 'balance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepositRequest $request)
    {
        $deposit =  $this->transactionsRepository->_transactions([
            'wallet_id' => $request->walletId,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
            'tranType' => 'deposit'
        ]);

        if ($deposit) {
            $wallet =  $this->walletRepository->findWallet($request->walletId);
            $wallet->balance = ($wallet->balance + $request->amount);
            $wallet->save();

            return redirect()->back()->withFlashSuccess('Deposit has been save.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

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

    public function _ge_wallets()
    {
        $items = [];

        $wallets = $this->walletRepository->getWallet();

        foreach ($wallets as $wallet) {
            $items[] =  [
                'label' => $wallet->name,
                'value' => $wallet->id,
                'description' => $wallet->description
            ];
        }

        return response()->json($items);
    }
}
