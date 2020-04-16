<?php

namespace App\Http\Controllers\Api\v1;

use App\Person;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
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
        $request->validate(
        [
            'firstname' =>'required',
            'lastname'  =>'required',
            'email'     =>'required',
            'phone'     =>'required',
            'city'      =>'required',
        ]);

        $person = Person::create($request->all());

        return new PersonResource($person);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person):PersonResource
    {
        // $person = Person::find($id);
        return new PersonResource($person);
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
    public function update(Request $request, Person $person):PersonResource
    {
        // dd($request->all());
        $person->update($request->all()); 

        return new PersonResource($person);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json();
    }
}