<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::where('name', '!=', 'sudo')->get();

        return view('roles/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles/form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), ['name' => 'required|string|max:255|unique:roles'])->validate();

        $role = Role::create(['name' => $request->name ]);

        // TODO : add event

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.form', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Validator::make(
            $request->all(), 
            ['name' => 'required|string|max:255|unique:roles,name,' . $role->id])
        ->validate();

        $role->name = $request->name;
        $role->save();

        // TODO : add event

        return redirect()->route('roles.index');
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


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function save(array $data, User $user = null)
    {
        if (is_null($user)) {
            return User::create([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'password'  => bcrypt($data['password']),
                'profile'   => ''
            ]);
        }
        
        // Updating data
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->profile = '';

        return $user->save();
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
            'name' => 'required|string|max:255',
        ];

        return Validator::make($data, $rules);
    }
}
