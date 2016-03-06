<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Flyer;
use App\Photo;
use App\Http\Requests;
use App\Http\Requests\FlyerRequest;
use App\Http\Requests\AddPhotoRequest;
use App\Http\Controllers\Controller;
use App\Http\Utilities\Country as Country;

class FlyersController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => ['show']]);

        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flyers = Flyer::all();

        return view('flyers.index')->with(compact('flyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Country $country)
    {
        $countries = $country::all();

        return view('flyers.create')->with(compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {
        // Persist the flyer
        $yourMom = new Flyer($request->all());

        // dd($this->user);
        // dd($yourMom);

        $flyer = $this->user->publish( 
            new Flyer($request->all()) 
        );

        // Flash a success message
        flash()->success('Flyer Saved.', 'Your flyer has been created.');

        // Redirect to landing page
        return redirect($flyer->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {

        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addPhoto($zip, $street, AddPhotoRequest $request) {

        $photo = Photo::fromFile($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);

        // $photo = $this->makePhoto($request->file('photo'));


    }

    protected function unauthorized(Request $request) {

        if($request->ajax()) {
            
            return response([
                'message' => 'You are unauthorized to make the requested changes.'
            ], 403);

        } else {
            flash('You are unauthorized to make the requested changes.');

            return redirect('/');
        }

    }

}
