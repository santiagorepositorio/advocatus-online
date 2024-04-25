<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    const NUEVO = 1;
    const REGULAR = 2;
    const INACTIVO = 3;
    const EMPLEADO = 4;
    const EX_EMPLEADO = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'fb_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function adminlte_profile_url()
    {
        return 'PAGINA';
    }
    //Relacion uno a uno

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }
    public function companies()
    {
        return $this->hasOne('App\Models\Company');
    }

    //Relacion uno a muchos

    public function courses_dictated()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function folders(){
        return $this->hasMany('App\Models\Folder');
    }

    public function outlets(){
        return $this->hasMany('App\Models\Outlet');
    }
    //MESSAGES
    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'phone', 'user_phone');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function reactions()
    {
        return $this->hasMany('App\Models\Reaction');
    }
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    //Relacion muchos a muchos

    public function courses_enrolled()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Models\Lesson');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user', 'user_id', 'course_id');
    }





    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
