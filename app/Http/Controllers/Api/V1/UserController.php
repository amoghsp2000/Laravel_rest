<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return User::where('user_id','>',0)->get('user_id');

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
        $user = new User();
        $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'cpassword' => 'required'
        ]);

        if ($request->get('password') == $request->get('cpassword')) {
            $user->fname = "";
            $user->lname = "";
            $user->email = $request->get('email');
            $user->phone = $request->get('phone');
            $user->password = $request->get('password');
            $user->role = "0";
            $user->save();

            return response( [
                "status" => "1",
                "data" => $user,
                "msg" => 'User Created Succesfuly'
            ]);
        } else {
            return response([
                "status" => "0",
                "msg" => "Passwords Dont Match"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo "Hello" . $id;
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
        //echo "Worked";
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

    public function login_check(Request $request)
    {
        $email = $request->get('email');
        $pass = $request->get('password');

        if (User::where("email", "=", $email)->count() > 0) {
            if (User::where("password", "=", $pass)->count() > 0) {
                $request->session()->put('user', 'LoggedIn');
                $id = User::where("email", "=", $email)->get();
                $request->session()->put('uid', $id[0]->id);

                if ($request->session()->has('user')) {
                    return redirect('profile');
                } else {
                    return redirect('login');
                }
                
            }

            
        }
    }

    public function updateData(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'role' => 'required',
        ]);

        $fname = $request->get('fname');
        $lname = $request->get('lname');
        $role = $request->get('role');

        $userid = $request->session()->get('uid');
        $user = User::find($userid);
        $user->fname = $fname;
        $user->lname = $lname;
        $user->role = $role;
        $user->save();

        return redirect('profile');

        
    }
}