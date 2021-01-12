<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class CountryStateCity extends Model
{
    protected $table ="countries";


    public function getCityByStateId($state_id){
        return DB::table('cities')->where('state_id',$state_id)->get();
    }

    public function getStatesByCountryId($country_id){
        return DB::table('states')->where('country_id',$country_id)->get();
    }
    

}

class Country extends Model
{
    protected $table ="countries";
}

class States extends Model
{
    protected $table ="states";
}


class Cities extends Model
{
    protected $table ="cities";
}
