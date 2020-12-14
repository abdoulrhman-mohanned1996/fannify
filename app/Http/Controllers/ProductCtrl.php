<?php
 
namespace App\Http\Controllers;
 
use App\Product;
use App\Brand;
use App\storeproducts;
use DB;
use Illuminate\Http\Request;
 
class ProductCtrl extends Controller
{


    public function index(Request $request){


        $data = Product::get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }


     public function mproduct(Request $request,$query=""){

        if($query==""){
                $data = Product::simplePaginate(15);
        }else{
            $data = Product::where("active_ing",'like','%'.$query.'%')->simplePaginate(15);
        }
        
        
        $brands = Brand::select('product_id', DB::raw('count(*) as total'))
        ->groupBy('product_id')
        ->get();
        
        
         $ds = storeproducts::select('product_id', DB::raw('count(*) as total'))
        ->groupBy('product_id')
        ->get();
        
        
         for($i=0;$i<count($data);$i++){
            
            $data[$i]['ds'] = 0;
            
            for($x=0;$x<count($ds);$x++){
                
                if($data[$i]['id'] == $ds[$x]['product_id']){
                    $data[$i]['ds'] = $ds[$x]['total'];
                }
                
            }
            
        } 
        
        
        for($i=0;$i<count($data);$i++){
            
            $data[$i]['brands'] = 0;
            
            for($x=0;$x<count($brands);$x++){
                
                if($data[$i]['id'] == $brands[$x]['product_id']){
                    $data[$i]['brands'] = $brands[$x]['total'];
                }
                
            }
            
        } 
        
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }


 
    public function store(Request $request){

        $data = new Product();
        $data->active_ing	 = $request->active_ing;
        $data->strength = $request->strength;
        $data->forms = $request->forms;
        $data->type = $request->type;
        $data->category = $request->category;


            


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

        $data =  Product::find($id);
        $data->active_ing	 = $request->active_ing;
        $data->strength = $request->strength;
        $data->forms = $request->forms;
        $data->type = $request->type;
        $data->category = $request->category;
      
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
           $data = Product::find($id);
     
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