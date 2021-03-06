<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Validation\Rules\Exists;
use App\SocialIdentity;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','avatar'
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

    public function roles() {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * @param string|array $roles
     */

    public function authorizeRoles($roles) {
        if(is_array($roles)) {
            return $this->hasAnyRole($roles) ||
            abort(401, 'This action is unauthorized. Array');
        }
        return $this->hasRole($roles) ||
        abort(401, 'This action is unauthorized. String');
        // return redirect(‘/welcome’)->with('status', 'Unauthorized!');
        // or
        // return false; then perform the redirect from the Controller..
        // or
        // redirect to registration
    }

    /**
    * Check multiple roles
    * @param array $roles
    */

    public function hasAnyRole($roles) {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }


    /* one user can login by many socilas */
    public function identities()
    {
        return $this->hasMany('App\SocialIdentity');
    }


    public function getComments()
    {
        return $this->hasMany('App\Comment');
    }

    public function questions() {
        return $this->hasMany('App\Question');
    }

}
