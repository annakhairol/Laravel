<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    
    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        // $password= User::where(['password'=>$req->password])->first(); sbb xpakai

        // dd($user->password); 

        //return 'User:'. $user .'<br>Password:' . $password;

        if(!$user) 
        {
            return "Username or password is not matched";
        }
        else
        {
            // dd($req->password);  
            // cer try balik
            if ($req->password != $user->password) {
                 return redirect('/')->with('error','Wrong password.');
            }
            else{
                $req->session()->put('user', $user); 
                return redirect('/');
            }
       
        }
    }

    function register(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if ($user === null) {

            DB::insert('insert into user(name, email, password, created_at) values(?,?,?,?)',
            [$req->fullname,$req->email,$req->password, now()]);
            
            //return $req->input();

            return redirect ('/')->with('success', 'Successfully Registered');
        }
        else
        {
            return redirect('/')->with('error','Registration Failed. Email existed.');
        }

    }

    function listuser()
    {
        return view('viewuser', ['users'=> DB::table('user')->paginate(4)]);
        // paginate limit bape byk data display kalau x next page
    }

    
    function deleteuser(Request $req)
    {
        //return $req->input();
        
        DB::table('user')->where('id', $req->rid)->delete();
        return redirect ('userlist')->with('success', 'Successfully Deleted');
    
    }

    function getuser(Request $req)
    {
        $data= DB::table('user') //user = table name
        //  ->join('table2','table2.id', '=', 'user.id')
        ->where('id',$req->rid)
        ->first();

        return view('edituser',['users'=>$data]); //users = variable
    }

    function edituser(Request $req)
    {
        DB::table('user')->where('id', $req->rid)
        ->update(array(
            'name' => $req->fullname,
            'email' => $req->email,
            'password' => $req->password
        ));

        return redirect ('userlist')->with('success', 'Successfully Updated');
    }

    function search(Request $req)
    {

        return view('search', ['users'=> DB::table('user')
            ->where('name', 'LIKE', '%'.$req->search.'%')
            ->orwhere('email', 'LIKE', '%'.$req->search.'%')
            ->paginate(4)]);

        // // Get the search value from the request
        // $search = $req->input('search');

        // // Search in the title and body columns from the posts table
        // $users = User::query()
        //     ->where('name', 'LIKE', "%{$search}%")
        //     ->orWhere('email', 'LIKE', "%{$search}%")
        //     ->get();

        // // Return the search view with the resluts compacted
        // return view('search', compact('users'));
        // );
    }
}