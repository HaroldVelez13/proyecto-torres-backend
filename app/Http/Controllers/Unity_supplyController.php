<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unity_supply;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Supply;


/**
 * Class Unity_supplyController.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:35:12am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Unity_supplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - unity_supply';
        $unity_supplies = Unity_supply::paginate(6);
        return view('unity_supply.index',compact('unity_supplies','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - unity_supply';
        
        $supplies = Supply::all()->pluck('name','id');
        
        return view('unity_supply.create',compact('title','supplies'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unity_supply = new Unity_supply();

        
        $unity_supply->name = $request->name;

        
        $unity_supply->barcode = $request->barcode;

        
        $unity_supply->current_amount = $request->current_amount;

        
        $unity_supply->state = $request->state;

        
        
        $unity_supply->supply_id = $request->supply_id;

        
        $unity_supply->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new unity_supply has been created !!']);

        return redirect('unity_supply');
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
        $title = 'Show - unity_supply';

        if($request->ajax())
        {
            return URL::to('unity_supply/'.$id);
        }

        $unity_supply = Unity_supply::findOrfail($id);
        return view('unity_supply.show',compact('title','unity_supply'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - unity_supply';
        if($request->ajax())
        {
            return URL::to('unity_supply/'. $id . '/edit');
        }

        
        $supplies = Supply::all()->pluck('name','id');

        
        $unity_supply = Unity_supply::findOrfail($id);
        return view('unity_supply.edit',compact('title','unity_supply' ,'supplies' ) );
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
        $unity_supply = Unity_supply::findOrfail($id);
    	
        $unity_supply->name = $request->name;
        
        $unity_supply->barcode = $request->barcode;
        
        $unity_supply->current_amount = $request->current_amount;
        
        $unity_supply->state = $request->state;
        
        
        $unity_supply->supply_id = $request->supply_id;

        
        $unity_supply->save();

        return redirect('unity_supply');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/unity_supply/'. $id . '/delete');

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
     	$unity_supply = Unity_supply::findOrfail($id);
     	$unity_supply->delete();
        return URL::to('unity_supply');
    }
}
