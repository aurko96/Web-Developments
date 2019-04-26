<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function store_front(Request $request)
    {
        $new_film = new Film;
        $new_film->team_name = $request->team_name;
        $new_film->member_1_name = $request->member_1_name;
        $new_film->member_2_name = $request->member_2_name;
        $new_film->member_3_name = $request->member_3_name;
        $new_film->member_4_name = $request->member_4_name;
        $new_film->contact = $request->contact;
        $new_film->email = $request->email;
        $new_film->address = $request->address;
        $new_film->film_name = $request->film_name;
        $new_film->nationality = $request->nationality;
        $new_film->occupation = $request->occupation;

        $new_film->total = 1200;
        $new_film->paid = 0;
        $new_film->selected = 'False';
        $new_film->submission = 'False';

        $new_film->pdf = $request->file('pdf')->store($request->team_name.'_'.$request->film_name.'_'.$request->occupation);

        if($request->file('pdf')==null){
           $new_film->pdf="";
            // alert()->success('Your registration was unsucessful. Please contact us for further query.')->autoclose(120000);
            return redirect()->route('front');
        }
        else if ($request->has('pdf')) {
           $new_film->submission = 'True';
        }

        $new_film->save();

        // alert()->success('Dear '.$request->team_name.', Your registration information has successfully been uploaded. Please check your e-mail and our website for further information.')->autoclose(120000);


        return redirect()->route('front');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
}
