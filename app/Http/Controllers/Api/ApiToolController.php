<?php

namespace App\Http\Controllers\Api;

use App\Tool;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ToolCreate;
use App\Http\Requests\ToolUpdate;

class ApiToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = Tool::all();
        foreach ($tools as $tool) {
            $category       = $tool->category;
            $category_name  = $category->name;
            $tool->category = $category_name;

        }
        return compat('tools');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ToolCreate $toolRequest)
    {
       $tool = new Tool;
       $tool->barcode       = $toolRequest->barcode;
       $tool->state         = $toolRequest->state;
       $tool->type          = $toolRequest->type;
       $tool->category_id   = $toolRequest->category_id;
       $tool->save();

       return compat('tools');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tool = Tool::findOrfail($id);
        return compat('tool');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function update(ToolUpdate $toolRequest, $id)
    {
        //
        $tool = Tool::findOrfail($id);

        $tool->barcode       = $toolRequest->barcode;
        $tool->state         = $toolRequest->state;
        $tool->type          = $toolRequest->type;
        $tool->category_id   = $toolRequest->category_id;
        $tool->save();
        return compact('tool');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $tool = Tool::findOrfail($id);
        $tool->delete();
        return $this->index();
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = Tool::findOrfail($id);
        $tool->forceDelete();
        return $this->index();
    }
}
