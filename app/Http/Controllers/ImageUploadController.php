<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImageUploadController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        $imagesrc = DB::select('select id,template_photo,template_text from loan_template where id = (select max(id) from loan_template)');
        return view('individual/loan_template', ['imagesrc' => $imagesrc])->with('user_type', 'individual');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $maxid = DB::select('select id from loan_template where id = (select max(id) from loan_template)');
        $Maxid = $maxid[0]->id;
        $res1 = DB::table('loan_template')->where('id', $Maxid)
            ->update([
                'template_text' => $request['template_text'],
                'update_by' => session()->get('email'), 'update_datetime' => date('Y-m-d H:i:s', time()), 'status' => 1
            ]);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $Ymd = date("Ymd");
        $path = public_path('images/' . $Ymd);
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $request->image->move(public_path('images/' . $Ymd), $imageName);

        /* Store $imageName name in DATABASE from HERE */


        $input = $request['template_text'];
        $imageName1 = '/images/' .  $Ymd . '/' . $imageName;
        $res = DB::table('loan_template')
            ->insert([
                'template_photo' => $imageName1, 'template_text' => $input,
                'update_by' => session()->get('email'), 'create_datetime' => date('Y-m-d H:i:s', time()), 'status' => 1
            ]);

        sp_savetolog('loan_template', $imageName1, 'template_photo');

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
}
