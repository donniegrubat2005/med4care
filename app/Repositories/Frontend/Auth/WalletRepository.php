<?php

namespace App\Repositories\Frontend\Auth;

use App\Models\Auth\User;
use App\Models\Auth\Wallet;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Auth\WalletType;
use App\Models\Auth\UserAccounts;
use App\Models\Auth\Transactions;

/**
 * Class WalletRepository.
 */
class WalletRepository extends BaseRepository
{
    public function model()
    {
        return Wallet::class;
    }
    public function _create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $wallet = parent::create([
                'name' => $data['name'],
                'balance' => $data['amount'],
                'description' => $data['description'],
                'user_wallet_type_id' => $data['walletType'],
                'user_account_id' =>  $data['account'],
            ]);
            return $wallet->id;
        });
    }
    public function findWallet($id)
    {
        return $this->model->find($id);
    }
    public function updateWalletBalance($id, $amount, $type, $optr)
    {
        $total = 0;
        $wallet = $this->getById($id);

        if ($optr === 'add') {
            $total = ($wallet->balance + $amount);
        } else {
            $total = ($wallet->balance - $amount);
        }

        $wallet->balance = $total;

        $wallet->save();
    }
    public function getBalance()
    {
        $balance = DB::table('user_accounts')
            ->select(DB::raw('IFNULL(Sum(user_wallets.balance),0) as balance'))
            ->join('user_wallets', 'user_wallets.user_account_id', '=', 'user_accounts.id')
            ->where('user_id', auth()->id())
            ->first();
        if ($balance) {
            return $balance->balance;
        }
        return 0;
    }
    public function getWallet()
    {
        $wallet = $this->model->getWalllets();
        if ($wallet->count() > 0) {
            return $wallet->get();
        }
        return false;
    }
    public function getWalletType()
    {
        return WalletType::orderBy('type')->get();
    }
    public function myAccounts()
    {
        return UserAccounts::where('user_id', auth()->id())->orderBy('name')->get();
    }
    public function getTransactionTypeWithBalance($id)
    {
        $items = [];
        $transactions = $this->findWallet($id);
        if (!is_null($transactions)) {
            $transactions = $transactions->transactions()
                ->selectRaw('transactions.type, IFNULL(SUM(transactions.amount),0) as amount')
                ->groupBy('transactions.type')
                ->orderBy('transactions.type', 'asc')
                ->get();


            foreach ($transactions as $trans) {
                  
                switch ($trans->type) {
                    case 'deposit':
                        $items[0] =  [
                            'type' => $trans->type,
                            'amount' => $trans->amount,
                        ];
                        break;
                    case 'transfer':
                          $items[1] =  [
                            'type' => $trans->type,
                            'amount' => $trans->amount,
                        ];
                        break;
                    case 'withdraw':
                          $items[2] =  [
                            'type' => $trans->type,
                            'amount' => $trans->amount,
                        ];
                        break;
                }
            }
        } else {
            $items = [
                0 => [
                    'type'  => 'deposit',
                    'amount' => '0.00'
                ],
                1 => [
                    'type'  => 'transfer',
                    'amount' => '0.00'
                ],
                2 => [
                    'type'  => 'withdraw',
                    'amount' => '0.00'
                ],
            ];
        }
        return $items;
    }
    public function findUserAcctById($userAccntId)
    {
        $userAcct = UserAccounts::where('account_no', $userAccntId)->first();
        return $userAcct->id;
    }
}
