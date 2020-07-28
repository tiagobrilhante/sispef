<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Om extends Model
{
    use SoftDeletes;

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
        return $this->hasMany(Om::class)->with('om');
    }

    public function token()
    {
        return $this->hasMany(TokenAcesso::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }



}
