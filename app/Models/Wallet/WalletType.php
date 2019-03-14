<?php
namespace App\Models\Wallet;

use App\Models\Wallet\Wallet;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialAccount.
 */
class WalletType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $table = 'user_wallet_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'type', 'description'];

    // public $timestamps = false;

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }
   
}
