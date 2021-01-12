<?php





namespace App\Http\Controllers\Auth;





use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CountryStateCity as Country;



class ProfileController extends Controller


{


    public function showProfileForm()
    {


        return view('frontend.pages.auth.profile-' . auth()->user()->roles->first()->name, [
            'countries' => Country::get()
        ]);
    }

    public function validation(array $data)
    {

        if (auth()->user()->isTalent())
            return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'dob' => ['required', 'string', 'max:255'],
                'gender' => ['required', 'string', 'max:255'],
                'celebrity_type' => ['required', 'string', 'max:255'],
                'hiring_ammount' => ['required', 'string', 'max:255'],
                'biography' => ['required', 'string'],
                'city_id' => ['required', 'string', 'max:255'],
                'state_id' => ['required', 'string', 'max:255'],
                'country_id' => ['required', 'string', 'max:255'],
                'phone_no' => ['required', 'string', 'max:255'],
                'website' => ['required', 'url'],
                'address' => ['required', 'string', 'max:255'],
                'agent_name' => ['required', 'string', 'max:255'],
                'agent_phone_no' => ['required', 'string', 'max:255'],
                'agent_bio' => ['required', 'string', 'max:255'],
            ])->validate();

        if (auth()->user()->isBrand())
            return Validator::make($data, [
                'website' => ['required', 'url'],
                'brand_name' => ['required'],
            ])->validate();
    }

    public function profileUpdate($request)
    {


        return  auth()->user()->update($request->except(['email']));
    }

    public function showProfileUpdate(Request $request)
    {

        $this->validation($request->all());


        $this->profileUpdate($request);

        return back()->with('notification.class', 'success')->with('notification.message', 'Profile update successfully');
    }


    public function uploadProfileAvatar(Request $request)
    {

        $request->user()->getMedia('avatar')->map(function ($image) {
            $image->delete();
        });


        $newsItem =  $request->user()->addMedia($request->image)->usingFileName('avatar.jpeg')
            ->toMediaCollection('avatar');

        $newsItem =  $request->user()->addMediaFromBase64($request->orignal_image)->usingFileName('orignal-avatar.jpeg')
            ->toMediaCollection('avatar-orignal-' . $newsItem->id);

        return response()->json([
            'profile' =>  $newsItem->getFullUrl()
        ]);
    }
}
