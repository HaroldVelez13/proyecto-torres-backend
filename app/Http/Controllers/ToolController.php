<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tool;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Tool_category;


/**
 * Class ToolController.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:40:00am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - tool';
        $tools = Tool::paginate(6);
        return view('tool.index',compact('tools','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - tool';
        
        $tool_categories = Tool_category::all()->pluck('name','id');
        
        return view('tool.create',compact('title','tool_categories'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tool = new Tool();

        
        $tool->barcode = $request->barcode;

        
        $tool->state = $request->state;

        
        
        $tool->tool_category_id = $request->tool_category_id;

        
        $tool->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new tool has been created !!']);

        return redirect('tool');
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
        $title = 'Show - tool';

        if($request->ajax())
        {
            return URL::to('tool/'.$id);
        }

        $tool = Tool::findOrfail($id);
        return view('tool.show',compact('title','tool'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - tool';
        if($request->ajax())
        {
            return URL::to('tool/'. $id . '/edit');
        }

        
        $tool_categories = Tool_category::all()->pluck('name','id');

        
        $tool = Tool::findOrfail($id);
        return view('tool.edit',compact('title','tool' ,'tool_categories' ) );
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
        $tool = Tool::findOrfail($id);
    	
        $tool->barcode = $request->barcode;
        
        $tool->state = $request->state;
        
        
        $tool->tool_category_id = $request->tool_category_id;

        
        $tool->save();

        return redirect('tool');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/tool/'. $id . '/delete');

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
     	$tool = Tool::findOrfail($id);
     	$tool->delete();
        return URL::to('tool');
    }
}
