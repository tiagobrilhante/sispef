<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TokenAcesso extends Model
{

    use SoftDeletes;

    protected $table = 'tokens_acesso';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'token',
        'om_id',
        'user_id',
        'type',
        'reference',
        'status',
        'quem_gerou',
        'created_at'

    ];

    public function om()
    {
        return $this->belongsTo(Om::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function geradorTokens()
    {
        return $this->belongsTo(User::class, 'quem_gerou');
    }


}
