<?php


namespace App\Repositories\Frontend\Auth;

use App\Models\Auth\User;
use App\Models\Auth\Transactions;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Models\Traits\Uuid;

/**
 * Class TransactionsRepository.
 */
class TransactionsRepository extends BaseRepository
{

    public function model()
    {
        return Transactions::class;
    }

    public function _transactions(array $data)
    {
        return DB::transaction(function () use ($data) {
            $trans = parent::create([
                'type' => $data['tranType'],
                'amount' => $data['amount'],
                'confirm' => 1,
                'wallet_id' =>  $data['wallet_id'],
                'remarks' =>  $data['remarks'],
            ]);
            return  $trans;
        });
    }
    public function _withdraw(array $data)
    {
        return DB::transaction(function () use ($data) {
            $trans = parent::create([
                'type' => 'withdraw',
                'amount' => $data['amount'],
                'confirm' => 1,
                'remarks' => $data['remarks'],
                'wallet_id' =>  $data['wallet_id'],
            ]);
            if ($trans) {
                return $trans;
            }
            return false;
        });
    }
    public function getTransactions()
    {
        $transactions =  DB::table('user_accounts')
            ->join('user_wallets', 'user_wallets.user_account_id', '=', 'user_accounts.id')
            ->join('transactions', 'transactions.wallet_id', '=', 'user_wallets.id')
            ->select(
                DB::raw(
                    'user_wallets.`name` AS wallet_name,
                    transactions.type as transaction_type,
                    transactions.amount as transaction_amount,
                    transactions.created_at as transaction_create,
                    transactions.remarks as transaction_remarks,
                    user_accounts.account_no,
                    transactions.id AS transaction_id,
                    user_wallets.id AS wallet_id'
                )
            )
            ->where('user_accounts.user_id', auth()->id())
            ->orderBy('transactions.created_at', 'desc');
            
        if($transactions->count() > 0){
            return $transactions->get();
        }
        return false;
    }
}
