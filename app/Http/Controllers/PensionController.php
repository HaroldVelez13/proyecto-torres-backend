<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pension;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PensionController.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:29:22pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class PensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - pension';
        $pensions = Pension::paginate(6);
        return view('pension.index',compact('pensions','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - pension';
        
        return view('pension.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pension = new Pension();

        
        $pension->name = $request->name;

        
        
        $pension->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new pension has been created !!']);

        return redirect('pension');
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
        $title = 'Show - pension';

        if($request->ajax())
        {
            return URL::to('pension/'.$id);
        }

        $pension = Pension::findOrfail($id);
        return view('pension.show',compact('title','pension'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - pension';
        if($request->ajax())
        {
            return URL::to('pension/'. $id . '/edit');
        }

        
        $pension = Pension::findOrfail($id);
        return view('pension.edit',compact('title','pension'  ));
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
        $pension = Pension::findOrfail($id);
    	
        $pension->name = $request->name;
        
        
        $pension->save();

        return redirect('pension');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/pension/'. $id . '/delete');

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
     	$pension = Pension::findOrfail($id);
     	$pension->delete();
        return URL::to('pension');
    }
}
