<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use Validator;

/**
 * Class SlideController.
 *
 * @author  The scaffold-interface created at 2018-08-03 09:03:40pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        
        $title = 'Index - slide';
        $slides = Slide::paginate(6);


        return view('slide.index',compact('slides','title'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - slide';
        
        return view('slide.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'url_slide' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        if ($validator->fails()) {
            return redirect('slide/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $image = $request->file('url_slide');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/imagesEslides');

        $image->move($destinationPath, $input['imagename']);

        $slide = new Slide();

        
        $slide->name = $request->name;

        
        $slide->description = $request->description;

        
        $slide->url_slide = $input['imagename'];

        
        $slide->state = $request->state;

        
        
        $slide->save();

        return redirect('slide');
    }


        /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function apiStore(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'url_slide' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);

        if ($validator->fails()) {
            return Response()
                        ->withErrors($validator)
                        ->withInput();
        }

        $image = $request->file('url_slide');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/imagesEslides');

        $image->move($destinationPath, $input['imagename']);

        $slide = new Slide();
        
        $slide->name = $request->name;
        
        $slide->description = $request->description;
        
        $slide->url_slide = $input['imagename'];
        
        $slide->state = $request->state;        
        
        $slide->save();

        return compact('slide');
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
        $title = 'Show - slide';

        if($request->ajax())
        {
            return URL::to('slide/'.$id);
        }

        $slide = Slide::findOrfail($id);
        return view('slide.show',compact('title','slide'));
    }

        /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function apiShow($id,Request $request)
    {

        $slide = Slide::findOrfail($id);
        return compact('slide');
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - slide';
        if($request->ajax())
        {
            return URL::to('slide/'. $id . '/edit');
        }

        
        $slide = Slide::findOrfail($id);
        return view('slide.edit',compact('title','slide'  ));
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
        $slide = Slide::findOrfail($id);
    	
        $slide->name = $request->name;
        
        $slide->description = $request->description;
        
        $slide->url_slide = $request->url_slide;
        
        $slide->state = $request->state;
        
        
        $slide->save();

        return redirect('slide');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function apiUpdate($id,Request $request)
    {
        $slide = Slide::findOrfail($id);
        
        $slide->name = $request->name;
        
        $slide->description = $request->description;
        
        $slide->url_slide = $request->url_slide;
        
        $slide->state = $request->state;
        
        
        $slide->save();

        return compact('slide');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/slide/'. $id . '/delete');

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
    public function destroy($id, Request $request)
    {
     	$slide = Slide::findOrfail($id);
     	$slide->delete();

        if($request->ajax())
        {
            return compact('slide');
        }
        return URL::to('slide');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function apiDestroy($id, Request $request)
    {
        $slide = Slide::findOrfail($id);
        $slide->delete();

        return compact('slide');
    }


}
