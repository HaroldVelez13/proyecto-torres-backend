<?php

namespace App\Http\Controllers\Api;

use App\Pension;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PensionCreate;
use App\Http\Requests\PensionUpdate;

class ApiPensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pensions = Pension::all();
        $index = 1;

        foreach ($pensions as $pension) {
            $pension->index = $index;
            $pension->users_count = $pension->users->count();
            $index++;
        }

        return response()->json(['pensions' => $pensions], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PensionCreate $pensionRequest)
    {
        //
        $pension = new Pension();
        $pension->name = $pensionRequest->name;
        $pension->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function show(Pension $pension)
    {
        //
        $pension = Pension::findOrfail($pension);
        return Response()->json(['pension'=>$pension], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function update(PensionUpdate $pensionRequest, $id)
    {
        //
        $pension = Pension::findOrfail($id);
        $pension->name = $pensionRequest->name;
        $pension->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pension  $pension
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pension = Pension::findOrfail($id);
        $pension->delete();
        return $this->index();
    }
}
