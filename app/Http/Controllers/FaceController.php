<?php

namespace App\Http\Controllers;

use App\Models\Face;
use App\Models\ShoutOut;
use Illuminate\Http\Request;
use App\Http\Resources\FaceResource;

class FaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faces = Face::all();

        foreach ($faces as $face) {
          $face->url = $face->img->getDisplayUrl();
        }

        return view('faces',compact('faces'));
    }

    public function apiIndex()
    {
      $faces = Face::all();

      if(env('FACE_FULL_OUTPUT') == FALSE){
        return response()->json([
              'faces' => FaceResource::collection(Face::where('id', 1)->get()) ],
                200
          );
      }

      return response()->json([
            'faces' => FaceResource::collection($faces) ],
              200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $face = Face::create([
          'name' => $request->name,
          'nick_name' => $request->nick_name
        ]);

        $pic = $face->uploadSingle($request->img, $face->id);
        $face->img_id = $pic->id;

        $face->save();

        $this->defaultShout($face);

        return $face;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Face  $face
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $face = Face::find($request->id);
        $face->fill($request->all());
        $face->save();

        $face->url = $face->img->getDisplayUrl();

        return $face;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Face  $face
     * @return \Illuminate\Http\Response
     */
    public function destroy(Face $face)
    {
        //
    }

    public function defaultShout($face)
    {
      return ShoutOut::create([
        'face_id' => $face->id,
        'shout' => 'Hello '.$face->name.', nice to see you'
      ]);

    }
}
