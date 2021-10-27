<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;



class User extends Authenticatable
{
    use Notifiable, LogsActivity;


    //protected static $ignoreChangedAttributes = ['name','updated_at'];

    protected static $logAttributes = ['name', 'email', 'password'];

    protected static $recordEvents = ['created', 'updated'];

    //protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "you have  {$eventName} user";
    }

    protected static $logName = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','agence_id','image',
    ];

    protected $dates = [
        'last_seen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function roles(){

        return $this->belongsToMany('App\Role');
    }

// donner des privileges au nom admin dans la base de donne
    public function getIsAdminAttribute(){

        return $this->roles()->where('name', 'admin')->first();
    }

    // creation d'une fonction pour des droit de parcours de page

    public function hasAnyRole(array $roles)
    {

        return $this->roles()->whereIn('name', $roles)->first();
    }


    public function agence(){

        return $this->belongsTo(Agence::class);
    }


}
