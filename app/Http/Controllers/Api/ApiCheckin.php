<?php

namespace App\Http\Controllers\Api;

use App\Checkin;
use App\Tool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Request\ChekinRequest;

class ApiCheckin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkins = Checkin::all();
        return compact('checkins');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ChekinRequest $chekinRequest)
    {
        $checkin = new Checkin();

        $checkin->date      = $chekinRequest->date;
        $checkin->total     = $chekinRequest->total;
        $checkin->url_image = $chekinRequest->url_image;
        $checkin->save();

        return $this->index();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checkin = Checkin::findOrfail($id);
        return compact('checkin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function update(ChekinRequest $chekinRequest, $id)
    {
        $checkin            = Checkin::findOrfail($id);
        $checkin->date      = $chekinRequest->date;
        $checkin->total     = $chekinRequest->total;
        $checkin->url_image = $chekinRequest->url_image;
        $checkin->save();

        return $this->index();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tool  $request
     * @param  \App\Checkin  $id
     * @return \Illuminate\Http\Response
     */
    public function addTool(Request $request, $id){
        
        $checkin = Checkin::findOrfail($id);

        $checkin->tools->attach($request->id , ['total' => $request->total]);
        $tool = Tool::findOrfail($request->id);
        $catidad_actual = $tool->catidad;
        $tool->catidad = $catidad_actual+$request->catidad;
        $tool->save(); 

        $toolsCheckin = $checkin->tools();
        return compact('toolsCheckin');

    }
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tool  $request
     * @param  \App\Checkin  $id
     * @return \Illuminate\Http\Response
     */
    public function leastTool(Request $request, $id){
        
        $checkin = Checkin::findOrfail($id);
        $tool = Tool::findOrfail($request->id);
        $catidad_actual = $tool->catidad;
        $tool->catidad = $catidad_actual-$request->catidad;
        if($tool->catidad>=0)
        {   $checkin->tools->attach($request->id , ['total' => $request->total]);
            $tool->save();
            $toolsCheckin = $checkin->tools();
            return compact('toolsCheckin');
        }
        
        return response()->json('Ocurrio un error, intentalo mas tarde', 400);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Checkin  $checkin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkin = Checkin::findOrfail($id);
        $checkin->delete();

        return $this->index();
    }
}