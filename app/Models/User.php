<?php

namespace SON\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SON\Notifications\UserCreated;

class User extends Authenticatable
{
    use Notifiable;
    const ROLE_ADMIN = 1;
    const ROLE_TEACHER = 2;
    const ROLE_STUDENT = 3;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'enrolment'
    ];

    public function profile(){
        return $this->hasOne(UserProfile::class);
    }

    public function userable(){
        return $this->morphTo();
    }

    public static function createFully($data){
        $data['password'] = bcrypt('123456');
        $user = parent::create($data+['enrolment' => str_random(6)]);
        self::assignEnrolment($user, self::ROLE_ADMIN);
        self::assingRole($user, $data['type']);
        $user->save();
        if(isset($data['send_mail'])){
            $token = \Password::broker()->createToken($user);
            $user->notify(new UserCreated($token));
        }

        return $user;
    }

    public static function assignEnrolment($user, $type){
        $types = [
            self::ROLE_ADMIN => 100000,
            self::ROLE_TEACHER => 400000,
            self::ROLE_STUDENT => 700000,
        ];

        $user->enrolment = $types[$type] + $user->id;
        return $user->enrolment;
    }

    public static function assingRole(User $user, $type){
        $types = [
            self::ROLE_ADMIN => Admin::class,
            self::ROLE_TEACHER => Teacher::class,
            self::ROLE_STUDENT => Student::class,
        ];

        $model = $types[$type];
        $model = $model::create([]);
        $user->userable()->associate($model);
    }

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
}
