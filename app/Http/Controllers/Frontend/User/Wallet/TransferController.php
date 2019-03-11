<?php

namespace App\Http\Controllers\frontend\user\wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\WalletRepository;
use App\Repositories\Frontend\Auth\TransactionsRepository;

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
        //
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
