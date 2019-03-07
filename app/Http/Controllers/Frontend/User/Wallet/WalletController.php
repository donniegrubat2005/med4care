<?php

namespace App\Http\Controllers\frontend\user\wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\WalletRepository;
use App\Repositories\Frontend\Auth\TransactionsRepository;
use App\Http\Requests\Frontend\Wallet\WalletRequest;

class WalletController extends Controller
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
    { }

    public function _overview()
    {
        $nvActive  = 'overview';
        $wallets = $this->walletRepository->getWallet();
        $balance = $this->walletRepository->getBalance();
        $walletTypes = $this->walletRepository->getWalletType();
        $transactions = $this->walletRepository->getWalletTransactions();
        $myAccounts = $this->walletRepository->myAccounts();
      
        return view('frontend.pages.wallet.overview', compact('nvActive', 'balance', 'wallets', 'walletTypes', 'myAccounts', 'transactions'));
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
    public function store(WalletRequest $request)
    {
        // dd($request->all());
        $walletId = $this->walletRepository->_create($request->only('account', 'name', 'walletType', 'amount', 'description'));

        if ($walletId) {
            $this->transactionsRepository->_deposit([
                'amount' => $request->amount,
                'wallet_id' => $walletId,
                'remarks' => 'deposit for new wallet'
            ]);
        }

        return redirect()->route('frontend.user.wallet.overview')->withFlashSuccess('New wallet has been created.');
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
