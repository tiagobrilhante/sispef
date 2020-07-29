<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'nome_guerra',
        'posto_grad',
        'tel_contato',
        'tu_formacao',
        'email',
        'password',
        'status',
        'om_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userTipo()
    {
        return $this->hasOne(UserTipo::class);
    }

    public function om()
    {
        return $this->belongsTo(Om::class);
    }

    public function token()
    {
        return $this->hasOne(TokenAcesso::class);
    }

    public function tokensGerados()
    {
        return $this->hasMany(TokenAcesso::class);
    }

}
