<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supply;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class SupplyController.
 *
 * @author  The scaffold-interface created at 2018-08-01 02:32:02am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - supply';
        $supplies = Supply::paginate(6);
        return view('supply.index',compact('supplies','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - supply';
        
        return view('supply.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supply = new Supply();

        
        $supply->name = $request->name;

        
        $supply->min_stock = $request->min_stock;

        
        
        $supply->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new supply has been created !!']);

        return redirect('supply');
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
        $title = 'Show - supply';

        if($request->ajax())
        {
            return URL::to('supply/'.$id);
        }

        $supply = Supply::findOrfail($id);
        return view('supply.show',compact('title','supply'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - supply';
        if($request->ajax())
        {
            return URL::to('supply/'. $id . '/edit');
        }

        
        $supply = Supply::findOrfail($id);
        return view('supply.edit',compact('title','supply'  ));
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
        $supply = Supply::findOrfail($id);
    	
        $supply->name = $request->name;
        
        $supply->min_stock = $request->min_stock;
        
        
        $supply->save();

        return redirect('supply');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/supply/'. $id . '/delete');

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
     	$supply = Supply::findOrfail($id);
     	$supply->delete();
        return URL::to('supply');
    }
}
