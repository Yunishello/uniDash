<?php

namespace App\Http\Controllers;

use App\Models\Users;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UsersController extends Controller
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

        // $rules = [
        //     'fullname' => ['required', 'max:255'],
        //     'email' => ['required','unique:users','max:255'],
        //     'phone' => ['required', 'max:255'],
        //     'username' => ['required','unique:users','max:255'],
        //     'password' => ['required', 'min:10'],
        //     'cpassword' => [
        //         'required',
        //         'same:password'
        //         ]
        //     ];

        // $this->validate($request, $rules);

        $user = new Users();
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->fullname = $request->fullname;
        $user->wallet = 0;
        $user->isAdmin = 0;
        $user->save();


        // return $request;
        return response()->json([
             $request->all()
        ], 201);
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

   public function Login(Request $request)
    {
        $this->validate($request,[
            'email' => [
                'required',
                'email',
                'max:255'
            ],
            'password' => [
                'required', 
                'min:8',
                ]
        ]);

        $password = Hash::make($request->password);

        $login = Users::all()->where('email', $request->email);
        
        return response()->json([
            "details" => $login
        ], 200);
    }

    // public function Logout($id)
    // {
    //     return response()->json([
    //         "details" => "Logout"
    //     ], 200);
    // }
}
