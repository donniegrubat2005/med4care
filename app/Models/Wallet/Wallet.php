<?php

namespace App\Models\Wallet;

use App\Models\Wallet\Transactions;
use App\Models\Wallet\WalletType;
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

    public function transactions()
    {
        return $this->hasMany(Transactions::class)->orderBy('created_at', 'Desc');
    }

    public function walletType()
    {
        return $this->belongsTo(WalletType::class, 'user_wallet_type_id');
    }
}
