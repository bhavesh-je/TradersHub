<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use App\Models\User;
use File;

class AjaxController extends Controller
{
    //

    public function uploadQuestionImg(Request $request)
    {
        $response = array();
        $ID = $request->id;
        $img = $request->img;
        $destinationPath = public_path('uploads/que-img');
        File::delete($destinationPath.'/'.$img);
        $removeQueImg = Question::where('id', $ID)->update(['que_img' => NULL]);

        $respons['status'] = "success";
        return response()->json($respons);
    }

    public function uploadOptionImg(Request $request)
    {
        $response = array();
        $ID = $request->id;
        $img = $request->img;
        $destinationPath = public_path('uploads/opt-img');
        File::delete($destinationPath.'/'.$img);
        $removeQueImg = Option::where('id', $ID)->update(['opt_img' => NULL]);

        $respons['status'] = "success";
        return response()->json($respons);
    }

    public function uploadProfileImg(Request $request)
    {
        $respons = array();
        $id = $request->id;
        $image = $request->img;
        $delteProfileImg = public_path('uploads/users-profile');
        File::delete($delteProfileImg.'/'.$image);
        $removeProfileImg = User::where('id',$id)->update(['profile_img'=>null]);
    }
}
