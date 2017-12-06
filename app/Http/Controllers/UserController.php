<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('email', '!=', 'su@superuser.com')->paginate(1);

        return view('users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleIns = Role::where('name', '!=', 'sudo')->get();

        foreach ($roleIns as $role)
        {
            $roles[$role->name] = $role->name;
        }

        return view('users/form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->save($request->all());

        // TODO : add event

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roleIns = Role::where('name', '!=', 'sudo')->get();

        foreach ($roleIns as $role)
        {
            $roles[$role->name] = $role->name;
        }

        return view('users.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validator($request->all(), $user->id)->validate();

        $this->save($request->all(), $user);

        // TODO : add event

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
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
            $user = User::create([
                'name'      => $data['name'],
                'email'     => $data['email'],
                'password'  => $data['password'],
                'profile'   => ''
            ]);
        } else {
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user->profile = '';
        }

        $user->save();
        $user->syncRoles($data['role']);

        return $user;
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
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'role'      => 'required|string',
            'password'  => 'required|string|min:6|confirmed',
        ];

        if (! is_null($id)) {
            $rules['email'] = $rules['email'] . ',email,' . $id;
        }

        return Validator::make($data, $rules);
    }
}
