<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ep;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class EpController.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:28:31pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class EpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - ep';
        $eps = Ep::paginate(6);
        return view('ep.index',compact('eps','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - ep';
        
        return view('ep.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ep = new Ep();

        
        $ep->name = $request->name;

        
        
        $ep->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new ep has been created !!']);

        return redirect('ep');
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
        $title = 'Show - ep';

        if($request->ajax())
        {
            return URL::to('ep/'.$id);
        }

        $ep = Ep::findOrfail($id);
        return view('ep.show',compact('title','ep'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - ep';
        if($request->ajax())
        {
            return URL::to('ep/'. $id . '/edit');
        }

        
        $ep = Ep::findOrfail($id);
        return view('ep.edit',compact('title','ep'  ));
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
        $ep = Ep::findOrfail($id);
    	
        $ep->name = $request->name;
        
        
        $ep->save();

        return redirect('ep');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/ep/'. $id . '/delete');

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
     	$ep = Ep::findOrfail($id);
     	$ep->delete();
        return URL::to('ep');
    }
}
