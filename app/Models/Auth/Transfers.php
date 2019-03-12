<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialAccount.
 */
class Transfers extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $table = 'transfers';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['transfer_code', 'remarks','from_wallet_id', 'from_user_account_id'];

}
