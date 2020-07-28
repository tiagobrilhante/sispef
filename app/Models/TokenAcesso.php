<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenAcesso extends Model
{

    protected $table = 'tokens_acesso';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'om_id',
        'user_id',
        'type',
        'reference',
        'status',

    ];

    public function om()
    {
        return $this->belongsTo(Om::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
