<?php

namespace App\Http\Controllers;

use App\Models\ShoutOut;
use App\Models\Faces;
use Illuminate\Http\Request;
use App\Http\Resources\ShoutOutResource;

class ShoutOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($faceID)
    {
        $shoutOuts =  ShoutOut::where('face_id', $faceID)->get();

        foreach ($shoutOuts as $x) {
          $x->edit = false;
        }

        return $shoutOuts;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shout = ShoutOut::create($request->all());
        return $shout;
    }


    public function random(int $id)
    {
      $shout =  ShoutOut::where('face_id', $id)->inRandomOrder()->first();

      return response()->json([
            'shout' => new ShoutOutResource($shout) ],
              200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoutOut  $shoutOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $shout = ShoutOut::find($request->id);
        $shout->fill($request->all());
        $shout->save();
        return $shout;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoutOut  $shoutOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $shout = ShoutOut::where('id', $id)->delete();
        return $shout;
    }
}
