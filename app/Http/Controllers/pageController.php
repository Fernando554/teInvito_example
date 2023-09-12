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

    public function test()
    {
        $id = 123;
        $invitation = invitation::where('id', $id)->with(['invitationComponent'=>function($ivcom) use ($id){
            $ivcom->with(['component'=>function($com) use ($id){
                $com->with(['componentData'=>function($data) use ($id){
                    $data->where('invitation_id', $id);
                }]);
            }]);
        }])->first();

        // echo json_encode($invitation);

        return view('test', compact('invitation'));
    }
}
