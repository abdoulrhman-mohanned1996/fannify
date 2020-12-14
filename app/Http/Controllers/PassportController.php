<?php

namespace App\Http\Controllers;
 
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
     
    
    
    
          public function getherfa(){
$data = DB::table('users')
            ->where('usertype',"worker")
            ->leftJoin('services', 'users.service_id', '=', 'services.id')
            ->select('users.*', 'services.title')
            ->get();

      
 



        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }
    
    
    
    
    
    
      
      public function whereusers($id,$ids){

$dataa=[];
        $data = User::where('service_id',$id)->where('isactive','1')->select('id','name','img','rate','subservices_id','service_id','isactive')->get();
        $idx = 0;
        foreach ($data as $user){ 
             
            
             $myArray = explode(',', $user->subservices_id);
             $mysecarry = explode(',',$ids);
       // $result = !empty(array_intersect($myArray,$mysecarry));
        $result = 0 == count(array_diff($mysecarry, $myArray));
            if ($result){
                 array_push($dataa,$user);
            }
            $idx++;
          
}



        return response()->json([
            'success' => true,
            'data' => $dataa
        ]);
        
        
    }
     
     
     
     
     
     
     
     
      public function saveworker(Request $request){

        $data = new User();
        $data->name	 = $request->name;
        $data->img = $request->img;
        $data->service_id = $request->service_id;
        $data->subservices_id = $request->subservices_id;
      $data->phone = $request->phone;
      $data->email = $request->email;
      $data->password = bcrypt($request->password);
$data->cardid = $request->cardid;
$data->usertype = $request->usertype;
        if ($data->save())
        return response()->json([
            'success' => true,
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'could not added'
        ], 500);

    }
     
     
     
     
         public function update(Request $request,$id){

        $data =  User::find($id);
      $data->name	 = $request->name;
    
        $data->service_id = $request->service_id;
        $data->subservices_id = $request->subservices_id;
      $data->phone = $request->phone;
      $data->email = $request->email;
  
$data->cardid = $request->cardid;

        if ($data->save())
        return response()->json([
            'success' => true,
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'could not added'
        ], 500);

    }
     
              public function updateisactive(Request $request,$id){

        $data =  User::find($id);
      $data->isactive	 = $request->isactive;


        if ($data->save())
        return response()->json([
             'data' => $data,
            'success' => true,
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'could not added'
        ], 500);

    }
     
     
     
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'player_id' => $request->player_id,
       
            
            
            'password' => bcrypt($request->password)
        ]);
     
        $token = $user->createToken('FindToken')->accessToken;
        $data = $user;
        return response()->json([
            'token' => $token,
            'password'=> $request->password,
            'data'=>$data
            ], 200);
    }
	
	
	
	
	public function uploadavatar(Request $request){
	    
			
			$user = User::find(auth()->user()->id);
			
			$imagecount = $request->imageslength;
			
			$imageName = time().'-'.auth()->user()->id.'.'.$request['file']->getClientOriginalExtension();
			
			$request['file']->move(public_path('avatars'), $imageName);
			
			
			$imageurl='http://neziza.your-gs.com/public/avatars/' . $imageName;
			
			$user->img = $imageurl;
			
			$user->save();
			
			return response()->json(['imageurl' => $imageurl], 200);
			
			
	}
	

	
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	 

	      public function delete($id)
        {
           $data = User::find($id);
     
            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => '$data with id ' . $id . ' not found'
                ], 400);
            }
     
            if ($data->delete()) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => '$data could not be deleted'
                ], 500);
            }
        }
    
	 
	 
     public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($credentials)) {
                   $data = User::find(auth()->user()->id);
                   
        $userTokens = auth()->user()->tokens;
        $data->player_id = $request->player_id;
        
        
        
        $data->save();
        foreach($userTokens as $token) {
            $token->delete();   
        }
        
            $token = auth()->user()->createToken('FindToken')->accessToken;
            return response()->json(['token' => $token,'info'=>auth()->user()], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
 
		
	
 
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
