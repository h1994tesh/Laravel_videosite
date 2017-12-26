<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Videos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
//use Auth;

class UploadVideoController extends Controller {

    public function getView() {
        return view('front.upload_video');
    }

    public function postVideos(Request $request) {
        $u_id = Auth::user()->r_id;
        $v_thumb = $request->file('v_thumb');
        $fnm = time() . "_" . $v_thumb->getClientOriginalName();
        $img_type = $v_thumb->getClientOriginalExtension();
        $destinationPath = public_path()."/images/";
        $v_thumb->move($destinationPath, $fnm);

        $v_video = $request->file('v_video');
        $vfnm = time() . "_" . $v_video->getClientOriginalName();
        $vid_type = $v_video->getClientOriginalExtension();
        $destinationPath = public_path()."/videos/";
        $v_video->move($destinationPath, $vfnm);

        $videos = new Videos();
        $videos->v_cat_id = $request["v_cat"];
        $videos->v_u_id = $u_id;
        $videos->v_title = $request["v_title"];
        $videos->v_desc = $request["v_desc"];
        $videos->v_upload_date = date('Y-m-d H:i:s');
        $videos->v_thumb = $fnm;
        $videos->v_file = $vfnm;
        $videos->save();

        return redirect('home');
    }

}
