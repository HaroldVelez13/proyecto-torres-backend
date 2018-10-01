<?php

namespace App\Http\Controllers\Api;

use App\Ep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EpsCreate;
use App\Http\Requests\EpsUpdate;

class ApiEpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $epses = Ep::all();
        $index=1;
        foreach ($epses as $eps) {
            $eps->index = $index;
            $eps->users_count = $eps->users->count();
            $index++;
        }

        return response()->json(['epses' => $epses], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(EpsCreate $epsRequest)
    {
        //
        $eps = new Ep();

        $eps->name = $epsRequest->name;
        $eps->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ep  $ep
     * @return \Illuminate\Http\Response
     */
    public function show(Ep $ep)
    {
        //
        $eps = Ep::findOrfail($ep);

        return response()->json(['eps'=>$eps], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ep  $ep
     * @return \Illuminate\Http\Response
     */
    public function update(EpsUpdate $epsRequest,  $id)
    {
        //
        $eps = Ep::findOrFail($id);
        $eps->name = $epsRequest->name;
        $eps->save();
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ep  $ep
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $eps = Ep::findOrfail($id);
        $eps->delete();

        return $this->index();
    }

}
