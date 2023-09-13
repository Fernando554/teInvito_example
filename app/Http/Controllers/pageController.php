<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invitation;

class pageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function create()
    {
        return view('create');
    }

    public function test()
    {
        $id = 22;

        $invitation = invitation::where('id', $id)->with(['invitationComponent'=>function($ivcom) use ($id){
            $ivcom->with(['component'=>function($com) use ($id){
                $com->with(['componentData'=>function($data) use ($id){
                    $data->where('invitation_id', $id);
                }]);
            }])->orderBy('order', 'asc');//  orderBy invitation order
        }])->first();
        return view('test', ['invitation'=>$invitation]);
    }
}
