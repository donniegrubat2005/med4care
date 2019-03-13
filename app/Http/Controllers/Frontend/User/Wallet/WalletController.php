<?php

namespace App\Http\Controllers\frontend\user\wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\WalletRepository;
use App\Repositories\Frontend\Auth\TransactionsRepository;
use App\Http\Requests\Frontend\Wallet\WalletRequest;
use App\Models\Auth\Wallet;
use App\Exceptions\GeneralException;

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
    {
        $nvActive  = 'overview';
        $balance = $this->walletRepository->getBalance();
        $wallets = $this->walletRepository->getWallet();
        $walletTypes = $this->walletRepository->getWalletType();
        $myAccounts = $this->walletRepository->myAccounts();
        $transactions = $this->transactionsRepository->getTransactions();

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
   
        if($this->walletRepository->isWalletNameExist($request->account, $request->name)){
            throw new GeneralException('Wallet '. $request->name .' is already exist');
        }
     
        $walletId = $this->walletRepository->_create($request->only('account', 'name', 'walletType', 'amount', 'description'));
     
     
        if ($walletId) {
            $this->transactionsRepository->_transactions([
                'amount' => $request->amount,
                'wallet_id' => $walletId,
                'tranType' => 'deposit',
                'remarks' => 'deposit for new wallet '. ucwords($request->name)
            ]);
        }

        return Redirect()->back()->withFlashSuccess('New wallet has been created.');
    }

    public function walletBalance($id)
    {
        $items = [];
        $wallet = Wallet::find($id);

        if ($wallet) {
            return $items = [
                'toDisplay' => number_format($wallet->balance, 2),
                'balance' => $wallet->balance
            ];
        }
        return number_format(0, 2);
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
