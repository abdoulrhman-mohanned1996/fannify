<?php
 
namespace App\Http\Controllers;
 
use App\Orderr;
use App\User;
use Illuminate\Http\Request;
 
class OrderrController extends Controller
{


    public function index(Request $request){


        $data = Orderr::get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }
    
        public function sendnotfy($message,$userid,$userimage)
{
		
		
	$title = "تنبيه جديد";	
		
	$url = "http://funnyfi.your-gs.com/sendtoworker.php?txt=".urlencode($message)."&TTL=".urlencode($title)."&user_id="."$userid" . "&userimage=" . $userimage;
	
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $url);
     curl_setopt($ch, CURLOPT_POST, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     $response = curl_exec ($ch);
     $err = curl_error($ch);  //if you need
     curl_close ($ch);
     return $response;
}
  
    public function storeorder(Request $request){
        
        
       $data = new Orderr();

        $data->worker_id = $request->worker_id;
        $data->subservice_id = $request->subservice_id;
        
         $data->service_id = $request->service_id;
         $data->location	 = $request->location;
        $data->spacetime = $request->spacetime;
        $data->numberofservices = $request->numberofservices;
        
         $data->totalprice	 = $request->totalprice;
      

        $data->user_id = $request->user_id;
    
$message = "طلب حجز جديد";         
        if ($data->save())
            return response()->json([
                'success' => true,
                'data' => $data->toArray(),
                'n'=>        $this->sendnotfy($message,$request->worker_id,""),
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Product could not be added'
            ], 500);
    
        
    }
    
    public function updateorder(Request $request,$id){
        
        $data =  Orderr::find($id);
              $data->user_id	 = $request->user_id;
        $data->worker_id = $request->worker_id;
        $data->subservice_id = $request->subservice_id;
        
        
         $data->location	 = $request->location;
        $data->spacetime = $request->spacetime;
        $data->numberofservices = $request->numberofservices;
        
         $data->totalprice	 = $request->totalprice;
   
      
        


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
    
    public function whereuser($id){
           $data = Orderr::
               leftJoin("users",'users.id','orderr.user_id')
               ->select("orderr.*",'users.name')
               ->where("orderr.worker_id",$id)->where("orderr.status","0")->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    public function acceptedorders($id){
           $data = Orderr::
               leftJoin("users",'users.id','orderr.user_id')
               ->select("orderr.*",'users.name')
               ->where("orderr.worker_id",$id)->where("orderr.status","2")->
               
               orWhere("orderr.status","3")
               ->
               orWhere("orderr.status","4")
               ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    
    
     public function doneorders($id){
           $data = Orderr::
               leftJoin("users",'users.id','orderr.user_id')
               ->select("orderr.*",'users.name')
               ->where("orderr.worker_id",$id)->where("orderr.status","5")
               
      
               ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    
    
    
      public function mwhereds($id){
           $data = storeproducts::
                leftJoin("drugstores",'drugstores.id','drugstore_products.drug_id')
                ->leftJoin("brands",'brands.id','drugstore_products.brand_id')
                ->select("drugstore_products.*",'drugstores.name','drugstores.city','drugstores.address','brands.name as bname','brands.origin','brands.expdate','brands.bn')
                ->where("drugstore_products.product_id",$id)->simplePaginate(15);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    
    
     public function mwheredsfilter($id,$brands){
           $data = storeproducts::
                leftJoin("drugstores",'drugstores.id','drugstore_products.drug_id')
                ->leftJoin("brands",'brands.id','drugstore_products.brand_id')
                ->select("drugstore_products.*",'drugstores.name','drugstores.city','drugstores.address','brands.name as bname','brands.origin','brands.expdate','brands.bn')
                ->where("drugstore_products.product_id",$id)
                ->whereIn("drugstore_products.brand_id",explode(',', $brands))        
                ->simplePaginate(15);
                
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
    
    


 
    public function store(Request $request){

        $data = new Drugstore();
        $data->name	 = $request->name;
        $data->city = $request->city;
        $data->address = $request->address;


        if ($data->save())
        return response()->json([
            'success' => true,
            	 
        ]);
    else
        return response()->json([
            'success' => false,
            'message' => 'could not added',
            
        ], 500);

    }
 
  
    public function update(Request $request,$id){

        $data =  Orderr::find($id);
        $data->status	 = $request->status;
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
    
    
        public function updatetotalprice(Request $request,$id){

        $data =  Orderr::find($id);
        $data->totalprice	 = $request->totalprice;
        $data->status	 = $request->status;
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
    
    
    
    
    
    
          public function delete($id)
        {
           $data = Drugstore::find($id);
     
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
    
    
    
    
    

}