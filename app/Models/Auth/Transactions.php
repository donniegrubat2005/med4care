<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Uuid;

/**
 * Class SocialAccount.
 */
class transactions extends Model
{
    use Uuid;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $table = 'transactions';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'wallet_id', 'type', 'confirm', 'amount', 'remarks'];
}
