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
    public function index($id=null)
    {
        if($id){
            $tools = Tool::where('category_id', $id)->get();
        }
        if($id==null){
            $tools = Tool::all();
        }
        
        $index=1;
        foreach ($tools as $tool) {
            $tool->index = $index; 
            $tool->category = $tool->category;           
            $index++;

        }
        return compact('tools');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ToolCreate $toolRequest)
    {
       $tool = new Tool;
       if (!$toolRequest->barcode || $toolRequest->barcode=="") {
        $toolRequest->barcode = time();
       }
       $tool->barcode       = $toolRequest->barcode;
       $tool->name          = $toolRequest->name;
       $tool->state         = $toolRequest->state;
       $tool->type          = $toolRequest->type;
       $tool->category_id   = $toolRequest->category;
       $tool->save();

       $category = $tool->category;
       $id = $category->id;       
       return $this->index($id);

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
        return compact('tool');
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

        $category = $tool->category;
        $id = $category->id;

        $tool->barcode       = $toolRequest->barcode;
        $tool->state         = $toolRequest->state;
        $tool->name          = $toolRequest->name;
        $tool->type          = $toolRequest->type;
        $tool->category_id   = $toolRequest->category;
        $tool->save();
              
        return $this->index($id);
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
        $category = $tool->category;
        $id = $category->id;
        $tool->delete();               
        return $this->index($id);
        
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
        $category = $tool->category;
        $id = $category->id;
        $tool->forceDelete();
        return $this->index($id);
    }
}
