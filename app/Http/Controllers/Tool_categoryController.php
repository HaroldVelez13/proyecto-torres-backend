<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tool_category;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class Tool_categoryController.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:38:51am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Tool_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - tool_category';
        $tool_categories = Tool_category::paginate(6);
        return view('tool_category.index',compact('tool_categories','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - tool_category';
        
        return view('tool_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tool_category = new Tool_category();

        
        $tool_category->name = $request->name;

        
        $tool_category->material = $request->material;

        
        $tool_category->description = $request->description;

        
        $tool_category->min_stock = $request->min_stock;

        
        
        $tool_category->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new tool_category has been created !!']);

        return redirect('tool_category');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - tool_category';

        if($request->ajax())
        {
            return URL::to('tool_category/'.$id);
        }

        $tool_category = Tool_category::findOrfail($id);
        return view('tool_category.show',compact('title','tool_category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - tool_category';
        if($request->ajax())
        {
            return URL::to('tool_category/'. $id . '/edit');
        }

        
        $tool_category = Tool_category::findOrfail($id);
        return view('tool_category.edit',compact('title','tool_category'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $tool_category = Tool_category::findOrfail($id);
    	
        $tool_category->name = $request->name;
        
        $tool_category->material = $request->material;
        
        $tool_category->description = $request->description;
        
        $tool_category->min_stock = $request->min_stock;
        
        
        $tool_category->save();

        return redirect('tool_category');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/tool_category/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$tool_category = Tool_category::findOrfail($id);
     	$tool_category->delete();
        return URL::to('tool_category');
    }
}
