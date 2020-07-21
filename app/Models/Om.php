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
        'nome',
        'sigla',
        'cor',
        'om_id',

    ];

    public function om()
    {
        return $this->belongsTo(Om::class);
    }


}
