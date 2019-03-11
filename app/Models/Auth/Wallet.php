<?php

namespace App\Models\Auth;

use App\Models\Auth\Transactions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class SocialAccount.
 */
class Wallet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $table = 'user_wallets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'description', 'balance', 'holder_type', 'user_wallet_type_id', 'user_account_id', 'user_id'];

    // public $timestamps = false;

    public function transactions()
    {
        return $this->hasMany(Transactions::class);
    }

    public function getWalllets()
    {
        return DB::table('user_accounts')
            ->join('user_wallets', 'user_wallets.user_account_id', '=', 'user_accounts.id')
            ->where('user_accounts.user_id', auth()->id());
    }
}
