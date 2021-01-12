<?php



namespace App;



use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMedia;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Cviebrock\EloquentSluggable\Sluggable;


use App\CountryStateCity as Country;

use App\CountryStateCity as States;

use App\CountryStateCity as Cities;



use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable implements MustVerifyEmail, HasMedia

{

    use Notifiable;

    use HasMediaTrait;

    use HasRoles;

    use Sluggable;

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'first_name',  'last_name',  'user_name', 'email', 'password',

        'dob',  'gender',  'celebrity_type', 'hiring_ammount', 'biography',

        'city_id',  'state_id',  'country_id', 'phone_no', 'website',

        'address',  'agent_name',  'agent_phone_no', 'agent_bio',

        'brand_name'

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





    protected $dates = ['dob'];


    protected $appends = ['full_name', 'avatar', 'full_avatar', 'role'];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'user_name'
            ]
        ];
    }




    public function setDobAttribute($value)

    {

        $this->attributes['dob'] = Carbon::parse($value)->format('Y-m-d');
    }



    public function socialAccountFacebook()
    {

        return $this->hasOne('App\SocialLoginAccount');
    }



    public function getFullNameAttribute()

    {

        if (isset($this->roles->first()->name) && $this->roles->first()->name == 'talent')

            return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];



        if ($this->isBrand())

            return $this->attributes['brand_name'];
    }



    public function getRoleAttribute()

    {

        return $this->roles->first();
    }



    public function getAvatarAttribute()

    {

        if ($this->getFirstMediaUrl('avatar') && file_exists($this->getFirstMedia('avatar')->getPath()))
            return url($this->getFirstMediaUrl('avatar'));



        return url('/assets/theme/images/default-user.jpg');
    }





    public function getFullAvatarAttribute()

    {

        if ($this->getFirstMedia('avatar'))
            return url($this->getFirstMediaUrl('avatar-orignal-' . $this->getFirstMedia('avatar')->id));



        return url('/assets/theme/images/default-user.jpg');
    }



    public function country()
    {

        return $this->belongsTo(Country::class);
    }



    public function states()
    {

        return $this->belongsTo(States::class);
    }



    public function cities()
    {

        return $this->belongsTo(Cities::class);
    }



    public function isTalent()
    {

        return (isset($this->roles->first()->name)) ? $this->roles->first()->name == 'talent' : '';
    }



    public function isBrand()
    {

        return (isset($this->roles->first()->name)) ? $this->roles->first()->name == 'brand' : '';
    }


    public function friends()
    {

        return $this->hasMany('App\Chat', 'sender_id');
    }
}
