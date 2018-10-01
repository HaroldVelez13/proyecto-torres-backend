<?php

namespace App\Http\Controllers\Api;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Helpers\ImageHelper;


class ApiSlideController extends Controller
{
    private $path;
    private $image_url;

    public function __construct()
    {
        $this->path =  'slides';
        $this->image_url=null;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        return response()->json(['slides' => $slides], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function home()
    {
        $slides = Slide::paginate(10)->where('state', 'active'); 
        return compact('slides');       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SlideRequest $slideRequest)
    {
        $slide = new Slide();

        $this->image_url = $slideRequest->url_slide;
        $image = new ImageHelper($this->path, $this->image_url);

        $slide->name = $slideRequest->name;
        $slide->description = $slideRequest->description;
        $slide->state = $slideRequest->state;
        $slide->url_slide = $image->saveImage();

        $slide->save();

        return response()->json(['slide'=>$slide],200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $slide = Slide::findOrfail($id);

        return response()->json(['slide'=>$slide], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $slideRequest, $id)
    {
        //
        $slide = Slide::findOrfail($id);

        if ( $slide->url_slide != $slideRequest->url_slide ) {

            $image_url_new = $slideRequest->url_slide;
            $image_url_old = $slide->url_slide;        
            $image = new ImageHelper($this->path, $this->image_url, $image_url_new, $image_url_old);
            $slideRequest->url_slide = $image->updateImage();

        }
        
        $slide->name = $slideRequest->name;
        $slide->description = $slideRequest->description;
        $slide->state = $slideRequest->state;
        $slide->url_slide = $slideRequest->url_slide;

        $slide->save();

        return response()->json(['slide'=>$slide],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $slide = Slide::findOrfail($id);

        $this->image_url = $slide->url_slide;
        $image = new ImageHelper($this->path, $this->image_url);
        $image->DeleteImage();

        $slide->delete();

        return response()->json(['slide'=>$slide],200);

    }
}
