<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    /*



    |--------------------------------------------------------------------------



    | Register Controller



    |--------------------------------------------------------------------------



    |



    | This controller handles the registration of new users as well as their


    | validation and creation. By default this controller uses a trait to

    | provide this functionality without requiring any additional code.

    |



    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('frontend.pages.auth.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['account_type'] == 'talent')
        {
            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'user_name' => ['required', 'string', 'max:255', 'unique:users'],
                'talent_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'talent_password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
        elseif ($data['account_type'] == 'brand')
        {
            return Validator::make($data, ['brand_name' => ['required', 'string', 'max:255'], 'brand_email' => ['required', 'string', 'max:255', 'unique:users,email'], 'brand_password' => ['required', 'string', 'min:8', 'confirmed'], ]);
        }
        else
        {
            return Validator::make($data, ['account_type' => ['required']]);
        }
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'brand_name' => $data['brand_name'],
                'user_name' => $data['user_name'],
                'email' => ($data['talent_email'] ? $data['talent_email'] : $data['brand_email']) ,
                'password' => Hash::make(($data['talent_password'] ? $data['talent_password'] : (isset($data['brand_password']) ? $data['brand_password'] : null))) ,
                'type' => $data['account_type']
            ]);

        $user->assignRole($data['account_type']);

        return $user;
    }
}

