<?php

namespace App\Models\Auth;
use App\Models\Auth\Wallet;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialAccount.
 */
class UserAccounts extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $table = 'user_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'account_no', 'user_id', 'name', 'amount', 'user_account_type_id'];


    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
   
}
