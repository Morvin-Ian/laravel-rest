<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data()
    {
        return Data::all();
    }

    public function show($id)
    {
        $data = Data::find($id);  
        if($data){
            return $data;
        }
        else{
            return ["error"=>"Data with id of {$id} does not exist"];
        }  
    }
    public function friends($id)
    {
        $user = User::find($id);

        if($user){
            $x = 0;
            $friends = $user->friends;
            $count = count($friends);
            $friends_array = [];

            for($x=0; $x<$count; $x++){

                $friends_array[] = [
                                "name"=> $friends[$x]->name,
                                "age"=> $friends[$x]->age

                            ];
            }

            return $friends_array;

        }

        else{
            return ["error"=>"User with id of {$id} does not exist"];
        }  

    } 



}
