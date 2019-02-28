<?php

namespace App\Models\Auth;
use App\Models\Auth\Transactions;
use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['id', 'name', 'description', 'balance', 'holder_type', 'user_id'];

    // public $timestamps = false;

    public function transactions()
    {
        return $this->hasMany(Transactions::class);
    }
   
}
