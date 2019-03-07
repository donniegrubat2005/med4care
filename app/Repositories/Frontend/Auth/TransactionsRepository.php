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

    public function _deposit(array $data)
    {
        return DB::transaction(function () use ($data) {
            $trans = parent::create([
                'type' => 'deposit',
                'amount' => $data['amount'],
                'confirm' => 1,
                'wallet_id' =>  $data['walletId'],
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
   
}
