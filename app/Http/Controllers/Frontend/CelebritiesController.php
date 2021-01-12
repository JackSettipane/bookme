<?php



namespace App\Http\Controllers\Frontend;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Exception;

class CelebritiesController extends Controller

{

    public function index(Request $request){





        $celebrities =  User::role('talent');



        if($request->gender)

        $celebrities = $celebrities->where('gender',$request->gender);





        if($request->celebrity_type)

        $celebrities = $celebrities->where('celebrity_type',$request->celebrity_type);





        return view('frontend.pages.celebrity',[

            'celebrities'=>$celebrities->paginate(1)

        ]);

    }



    public function celebrity($username){



        $celebrity =  User::where('slug',$username)->first();

        $facebook =  $this->getUserPageFansCount($celebrity ->id);



        return view('frontend.pages.single-celebrity',[
            'celebrity' =>  $celebrity,
            'facebook'  =>  $facebook
        ]);

    }


    public function getUserPageFansCount($id)
    {
        try{

        $auth = User::find($id)->socialAccountFacebook;
        if($auth ){
            $facebook_access_token = $auth->auth2_token;
            $facebook_user_id = $auth->provider_user_id;
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://graph.facebook.com/' . $facebook_user_id . '/accounts', ['query' => ['access_token' => $facebook_access_token, ]]);
            $statusCode = $response->getStatusCode();
            $content = $response->getBody();
            ($content = json_decode($response->getBody() , true));
            if (isset($content['data'][0]['id']))
            {
                $page_id = $content['data'][0]['id'];
                $page_access_token = $content['data'][0]['access_token'];
                $response = $client->request('GET', 'https://graph.facebook.com/' . $page_id, ['query' => ['access_token' => $page_access_token, 'fields' => 'name,fan_count']]);
                $statusCode = $response->getStatusCode();
                $content = $response->getBody();
                ($content = json_decode($response->getBody() , true));
                return $content['fan_count'];
                return response()->json(['status' => true, 'message' => 'facebook user page total count', 'page_likes' => $content['fan_count']]);
            }
        }


        }catch(Exception $e){
            return $e->getMessage();
        }

    }

}
