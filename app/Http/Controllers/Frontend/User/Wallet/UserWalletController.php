<?php

namespace App\Http\Controllers\Frontend\User\Wallet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Wallet\UserAccountRequest;
use App\Repositories\Frontend\Wallet\UserAccountRepository;
use App\Repositories\Frontend\Auth\WalletRepository;

class UserWalletController extends Controller
{
    private $userAcctRepo;
    private $walletRepository;

    public function __construct(UserAccountRepository $userAcctRepo, WalletRepository $walletRepository)
    {
        $this->userAcctRepo = $userAcctRepo;
        $this->walletRepository = $walletRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('frontend.pages.wallet.wallet');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acctTypes = $this->userAcctRepo->getAccountTypes();

        return view('frontend.pages.wallet.accounts.wallet-new-account', compact('acctTypes'));
    }
    public function _accounts()
    {
        $userAccounts = $this->userAcctRepo->getAccounts();

        return view('frontend.pages.wallet.accounts.wallet-account', compact('userAccounts'));
    }

    public function _wallets($accountNo, Request $request)
    {
        $walletId = $request->wallet;
        $totalTransaction =  $this->walletRepository->getTransactionTypeWithBalance($walletId);

        return view('frontend.pages.wallet.wallet-view')
            ->with(['key'=> !is_null($request->wallet) ? true : false, 'totalTransaction' => $totalTransaction])
            ->withWallet($this->walletRepository->findWallet($walletId))
            ->withUserAcctId($this->userAcctRepo->getUserAccountId($accountNo))
            ->withWallets($this->userAcctRepo->getUserWallet($accountNo))
            ->withWalletTypes($this->walletRepository->getWalletType());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserAccountRequest $request)
    {

        $this->userAcctRepo->create($request->only('name', 'accountType', 'amount', 'remarks'));


        return redirect()->route('frontend.user.wallet.accounts')->withFlashSuccess('New account has been created.');
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
}
