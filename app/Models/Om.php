<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Om extends Model
{

    protected $table = 'oms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $fillable = [
        'name',
        'sigla',
        'cor',
        'podeVerTudo',
        'ePef',
        'novoNo',
        'parent',
        'eixo_x',
        'eixo_y',
        'om_id',

    ];

    public function om()
    {
        return $this->hasMany(Om::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }



}
