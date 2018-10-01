<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Checkin;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class CheckinController.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:51:19pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - checkin';
        $checkins = Checkin::paginate(6);
        return view('checkin.index',compact('checkins','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - checkin';
        
        return view('checkin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkin = new Checkin();

        
        $checkin->date = $request->date;

        
        $checkin->url_image = $request->url_image;

        
        $checkin->total = $request->total;

        
        
        $checkin->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new checkin has been created !!']);

        return redirect('checkin');
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
        $title = 'Show - checkin';

        if($request->ajax())
        {
            return URL::to('checkin/'.$id);
        }

        $checkin = Checkin::findOrfail($id);
        return view('checkin.show',compact('title','checkin'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - checkin';
        if($request->ajax())
        {
            return URL::to('checkin/'. $id . '/edit');
        }

        
        $checkin = Checkin::findOrfail($id);
        return view('checkin.edit',compact('title','checkin'  ));
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
        $checkin = Checkin::findOrfail($id);
    	
        $checkin->date = $request->date;
        
        $checkin->url_image = $request->url_image;
        
        $checkin->total = $request->total;
        
        
        $checkin->save();

        return redirect('checkin');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/checkin/'. $id . '/delete');

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
     	$checkin = Checkin::findOrfail($id);
     	$checkin->delete();
        return URL::to('checkin');
    }
}
