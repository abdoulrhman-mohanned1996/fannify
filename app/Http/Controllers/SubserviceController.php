<?php
 
namespace App\Http\Controllers;
 
use App\Subservice;

use Illuminate\Http\Request;
 
class SubserviceController extends Controller
{


    public function index($id){


        $data = Subservice::where("service_id",$id)->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }
    
    
    
    
    
        public function getsubservices(){


        $data = Subservice::get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }
    
    
    
    
    
    
    
    
      public function whereproduct($id){


        $data = Subservice::where('product_id',$id)->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }
    
        public function uploadim(Request $request) {
           if ($request->has('file')){
            
            
              foreach($request->file('file') as $image)
            {
                $imgname = "file" . '-' . $image->getClientOriginalName();
                $image->move('upload_data',$imgname);
                $data[] = url('/upload_data/').'/'.$imgname;
            }
            
            return response()->json([
                'success' => true,
                'data' => json_encode($data)
            ]);
            
                   
            }

    }
    public function mwhereproduct($id){


        $data = Subservice::where('product_id',$id)->simplePaginate(15);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
        
        
    }



 
    public function store(Request $request){

        $data = new Subservice();
        $data->title	 = $request->title;
        $data->image = $request->image;
        $data->service_id = $request->service_id;
        $data->price = $request->price;
      

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

        $data =  Subservice::find($id);
   $data->title	 = $request->title;
        $data->image = $request->image;
        $data->service_id = $request->service_id;
        $data->price = $request->price;
        
      
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
           $data = Subservice::find($id);
     
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