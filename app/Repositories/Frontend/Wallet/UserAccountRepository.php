<?php

namespace App\Repositories\Frontend\Wallet;

use App\Models\Auth\User;
use App\Models\Auth\UserAccounts;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;
use App\Exceptions\GeneralException;
use App\Models\Auth\UserAccountType;

/**
 * Class WalletRepository.
 */
class UserAccountRepository extends BaseRepository
{
    public function model()
    {
        return UserAccounts::class;
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $userAccount = parent::create([
                'name' => $data['name'],
                'amount' => $data['amount'],
                'account_no' =>  $this->generateAccountNo(),
                'description' => $data['remarks'],
                'user_account_type_id' => $data['accountType'],
                'user_id' => auth()->id(),
            ]);
            return $userAccount->id;
        });
    }
    public function generateAccountNo()
    {
        $randNo = date('Hs') . '-' . rand(1, 1000000);

        $acctNo = UserAccounts::where('account_no', $randNo);

        if (!$acctNo->exists())
            return  $randNo;
        else
            $this->generateAccountNo();
    }

    public function getAccounts()
    {
        $items = [];
        $userAccounts = UserAccounts::where('user_id', auth()->id())->orderBy('name');
        if ($userAccounts->count() > 0) {
            foreach ($userAccounts->get() as  $userAccount) {
                $items[] = (object)[
                    'account_no' =>   $userAccount->account_no,
                    'name' =>   $userAccount->name,
                    'created_at' => \Carbon\Carbon::parse($userAccount->created_at)->format('M. d, Y'),
                    'account_type' =>   UserAccountType::find($userAccount->user_account_type_id)->type,
                    'amount' =>   $userAccount->amount,
                ];
            }
        }
        return $items;
    }
    public function getAccountTypes()
    {
        return UserAccountType::orderBy('type', 'asc')->get();
    }
}
