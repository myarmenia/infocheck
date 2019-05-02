<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use Auth;
use App\User;
use App\SocialIdentity; // pivot-table users<->social_identities
use App\Role;

// for blocking users || status=0
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/'; // default is '/home'


    public function redirectTo() {
        return app()->getLocale() . '/'; /* override $redirectTo by method */
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // որ լոգին եղածին էռռոռ չըա լոգին էջ մտնելուց։
    }


    /* overwrite method of AuthenticatesUsers */
    protected function authenticated(Request $request, $user)
    {
        if ($user->status !== 1) {
            Auth::logout();

            // return redirect(route('login'))->withErrors(['blocked' => trans('validation.blocked')]);
            return $this->sendBlockedLoginResponse($request);
        }

        if ($request->user()->hasRole('i_admin')) {
            // return redirect(url('/', app()->getLocale()));
            return redirect()->route('admin.index', app()->getLocale());
        }

    }

    /* For show message about blocking user - custom */
    private function sendBlockedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.blocked')],
        ]);
    }





/**
 * Login with Socials 2 methods, redirect and callback handlers
 *
 */
    public function redirectToProvider($provider)
   {
       return Socialite::driver($provider)->redirect();
   }

   public function handleProviderCallback($provider)
   {
       try {
           $user = Socialite::driver($provider)->user();
       } catch (Exception $e) {
           return redirect('/login');
       }

       $authUser = $this->findOrCreateUser($user, $provider);
       Auth::login($authUser, true);
       return redirect($this->redirectTo());
   }


   public function findOrCreateUser($providerUser, $provider)
   {
       $account = SocialIdentity::whereProviderName($provider)
                  ->whereProviderId($providerUser->getId())
                  ->first();

       if ($account) {
           return $account->user;
       } else {
           $user = User::whereEmail($providerUser->getEmail())->first();

           if (! $user) {
               $user = User::create([
                   'email' => $providerUser->getEmail(),
                   'name'  => $providerUser->getName(),
               ]);
               $role_iuser = Role::where('name','i_user')->first();
               $user->roles()->attach($role_iuser);
           }

           $user->identities()->create([
               'provider_id'   => $providerUser->getId(),
               'provider_name' => $provider,
           ]);

           return $user;
       }
   }



}
