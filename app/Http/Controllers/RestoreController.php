<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restore;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Reservation;


/**
 * Class RestoreController.
 *
 * @author  The scaffold-interface created at 2018-08-03 08:59:29pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - restore';
        $restores = Restore::paginate(6);
        return view('restore.index',compact('restores','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - restore';
        
        $reservations = Reservation::all()->pluck('date','id');
        
        return view('restore.create',compact('title','reservations'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restore = new Restore();

        
        $restore->date = $request->date;

        
        
        $restore->reservation_id = $request->reservation_id;

        
        $restore->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new restore has been created !!']);

        return redirect('restore');
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
        $title = 'Show - restore';

        if($request->ajax())
        {
            return URL::to('restore/'.$id);
        }

        $restore = Restore::findOrfail($id);
        return view('restore.show',compact('title','restore'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - restore';
        if($request->ajax())
        {
            return URL::to('restore/'. $id . '/edit');
        }

        
        $reservations = Reservation::all()->pluck('date','id');

        
        $restore = Restore::findOrfail($id);
        return view('restore.edit',compact('title','restore' ,'reservations' ) );
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
        $restore = Restore::findOrfail($id);
    	
        $restore->date = $request->date;
        
        
        $restore->reservation_id = $request->reservation_id;

        
        $restore->save();

        return redirect('restore');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/restore/'. $id . '/delete');

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
     	$restore = Restore::findOrfail($id);
     	$restore->delete();
        return URL::to('restore');
    }
}
