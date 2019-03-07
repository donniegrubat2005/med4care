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
        $walletId = null;

        $wallet =  $this->walletRepository->findOrFail($request->only('depositName'));

        if (!$wallet) {

            $walletId = $this->walletRepository->_create($request->only('depositName', 'depositType', 'amount', 'description'));
        } else {
            $walletId = $wallet->id;

            $this->walletRepository->updateWalletBalance($walletId, $request->amount, $request->depositType, 'add');
        }
        $this->transactionsRepository->_deposit([
            'amount' => $request->amount,
            'wallet_id' => $walletId,
            'remarks' => $request->description,
        ]);

        return redirect()->route('frontend.user.wallet.deposit.index')->withFlashSuccess('Deposit successfully save.');
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
