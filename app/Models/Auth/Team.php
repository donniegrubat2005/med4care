<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialAccount.
 */
class Team extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $table = 'user_team';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'documents', 'files'];

    public $timestamps = false;

}
