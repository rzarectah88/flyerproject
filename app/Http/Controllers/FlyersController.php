<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests\FlyerRequest;
use App\Flyer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class FlyersController extends Controller
{
    //
    public function index(){

    }
    public function create(){
        //flash('Success', 'Your flyer has been created');
        //flash()->message('Success', 'Your flyer has been created');
        //flash()->info('Welcome', 'thanks');
        return view('flyers.create');

    }
    public function store(FlyerRequest $request){


        //$this->validate();
        Flyer::create($request->all());
        //session()->flash('flash_message', 'Flyer Successfully created');

        return redirect()->back();

    }
    public function show($zip, $street){
        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }
    public function addPhoto ($zip, $street, Request $request)
    {
        $this->validate($request, [
           'photo'  => 'required|mimes:jpg,jpeg,png'
        ]);


        $photo = Photo::fromForm($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

        //$flyer->photos()->create(['path' => "/flyers/photos/{$name}"]);

        return "done up son";
    }
}
