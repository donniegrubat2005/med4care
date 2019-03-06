<?php

namespace App\Models\Auth;
use App\Models\Auth\Transactions;
use App\Models\Auth\UserAccounts;
use Illuminate\Database\Eloquent\Model;


/**
 * Class SocialAccount.
 */
class UserAccountType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $table = 'user_account_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'type', 'description'];

    // public $timestamps = false;

    public function userAccounts()
    {
        return $this->hasMany(UserAccounts::class);
    }
   
}
