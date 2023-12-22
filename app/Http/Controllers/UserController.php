<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

/**
 * @group User management
 * APIs for managing users
 */
class UserController extends Controller
{
    //

     /**
     * Listing of users.
     * @header Authorization
     */
    public function index(){

        $userData = User::select('id','name','email')->get();
        return ['data'=>$userData];
    }
     /**
     * Store a user.
        * @unauthenticated
        * @bodyParam name string required The id of the user. Example: Saumil
        * @bodyParam email  string required The email of the user. Example: test@example.com
        * @bodyParam password  string required Example: Saumil#Jain@123
        * @bodyParam image file  The image.
        
     */
    public function store(Request $request){

        $validated = Validator::make(request()->all(),[
            
            
            'name' => 'string|required|max:50',
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
        if ($validated->fails()) {
            return response()->json(['error' => $validated->errors()->first()]);
        }
        User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);
        return ['message' => "User added successfully"];
    }

     /**
     * Edit a user.
     * @header Authorization
     * @urlParam id integer required The ID of the user.
     */
    public function edit($id){
        $userData = User::find($id);
        return ['data' => $userData];
    }

    /**
     * Update a user.
     * @header Authorization
     * @bodyParam name string required The id of the user. Example: Saumil
     * @bodyParam email  string required The email of the user. Example: test@example.com
     * @bodyParam image file  The image.
     */
    public function update(Request $request){

        $validated = Validator::make(request()->all(),[

            'name' => 'string|required|max:50',
            'email' => 'required|email',
        ]);
        if ($validated->fails()) {
            return response()->json(['error' => $validated->errors()->first()]);
        }
        $user =  auth('sanctum')->user();
        
        $update_user = User::where('id',$user->id)->update(['name' => $request->name, 'email' => $request->email]);
        
        $user_data = User::find($user->id);
        return ['message' => "User updated successfully", 'data' => $user_data];
    }


     /**
     * Delete user.
     * @header Authorization
     * @urlParam id integer required The ID of the user.
     */
    public function destroy($id){

        $delete_user = User::where('id',$id)->delete();
        return ['message' => "User deleted successfully"];
    }

}
