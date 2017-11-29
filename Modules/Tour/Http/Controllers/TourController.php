<?php

namespace Modules\Tour\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Tour\Entities\Tour;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class TourController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('tour::index', ['tours' => Tour::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('tour::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        (new Tour)->createTour($request);

        // TODO : add event

        return redirect()->route('users.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('tour::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('tour::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

     /**
     * Get a validator for an incoming user create request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $id = null)
    {
        $rules = [
            'title'         => 'required|string|max:255',
            'client_name'   => 'required|string|max:255',
            'inquiry_date'  => 'date',
            'date_from'     => 'date|after:inquiry_date',
            'date_to'       => 'date|after:date_from',
            'adult'         => 'required|integer|min:1',
            'child'         => 'required|integer|min:0',
            'infant'        => 'required|integer|min:0',
            'status'        => 'required|string|max:200',
            'destination'   => 'required|string|max:255',
            'remark'        => 'string'
        ];

        return Validator::make($data, $rules);
    }
}
