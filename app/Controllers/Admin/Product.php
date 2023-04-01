<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use function PHPUnit\Framework\fileExists;
use Exception;

class Product extends BaseController
{
    public function index()
    {
        //Show all customer Review
        $getPage=$this->request->getVar('page');
        if($getPage==null)
        {
            $getPage=1;
        }
        $url=getenv('API_LINK')."/products/all-products?page=".$getPage;
        $data=[
            "user_id"=>session()->get('user_id'),
            "key"=>getenv('API_SECRET'),
        ];
        $response=$this->apiCalling($url,'POST',$data);
         //dd($response);

         if($response->errors==false)
         {
            $page=$response->totalPage;
         $current=$response->currentPage;
         }else{
            $page=0;
         $current=0;
         }
        

        return view('products/products',['response'=>$response,'page'=>$page,'current'=>$current]);

    }

    public function create()
    {
        //create Customer Review
        if($this->request->getPost())
        {
            $file=$this->request->getFile('image');
            if($file->isValid()==false)
            {
               $error=$file->getError();
               if($error==UPLOAD_ERR_NO_FILE)
               {
                 return redirect()->back()->with('warning','No file uploaded')->withInput();
               } 
               throw new \RuntimeException($file->getErrorString());
            } 
            $getSize=$file->getSizeByUnit('mb');
            if($getSize>=1)
            {
                return redirect()->back()
                ->with('warning','File is too large Its bigger than 1 mega byte')->withInput();
            }
            $getMime=$file->getMimeType();
            $allowedTypes=['image/png','image/jpeg'];
            if(!in_array($getMime,$allowedTypes))
            {
                  return redirect()->back()
                  ->with('warning','File Format Invalid only PNG and JPEG will Accept')->withInput();
            }
    
            $path=$file->store('products');
            $path=WRITEPATH.'uploads/'.$path;
            service('image')->withFile($path)
            ->fit(250,250,'center')
            ->save($path);
            $image_link=$file->getName();
            $user_id=session()->get('user_id');
            $data=[
                "key"=>getenv('API_SECRET'),
                "title"=>$this->request->getVar("title"),
                "user_id"=>$user_id,
                "image"=>$image_link,
                "desc"=>$this->request->getVar("desc"),
                "meta_desc"=>$this->request->getVar("meta_desc"),
                "meta_tag"=>$this->request->getVar("meta_tag"),
                "brand"=>$this->request->getVar("brand"),
                
            ];
    
            $url=getenv('API_LINK')."/products/add-product";
            $response=$this->apiCalling($url,"POST",$data);
            //dd($response);
            if($response->errors==true)
            {
                return redirect()->back()->with('warning',$response->msg)->withInput();
            }
            return redirect()->to('/admin/all-products')->with('success',$response->msg);
            
        }
        return view('products/new-product');

    }

    public function update($id)
    {
        
        if($this->request->getPost())
        {
           
            $data=$this->request->getVar();
            $data+=["key"=>getenv('API_SECRET')];
            // dd($data);
            $url=getenv('API_LINK')."/products/update-product/".$id;
            $response=$this->apiCalling($url,"POST",$data);
    
            if($response->errors==true)
            {
                return redirect()->back()->with('warning','Nothing to Update');
            }
           return redirect()->back()->with('success',$response->msg);
        }
        $url=  getenv('API_LINK')."/products/show-product/".$id;
           
        $response=$this->apiCalling($url,'GET');
        //dd($response);
         if($response->errors==true)
         {
            return redirect()->back()->with('warning','Invalid id provided');
         }
        return view('products/update-product',['response'=>$response]);    
    }
    public function show($id)
    {
        //show customer 
        $url=  getenv('API_LINK')."/products/show-product/".$id;
           
           $response=$this->apiCalling($url,'GET');
           //dd($response);
           if($response->errors==true)
         {
            return redirect()->back()->with('warning','Invalid id provided');
         }
           return view('products/product-details',['response'=>$response]); 
    }


    private function apiCalling($url,$method,$data=null)
    {
        $token=session()->get('token');
        $url=$url;
        $client=\config\Services::curlrequest();
        $headers=[

            "Authorization"=>"Bearer ".$token,
            "Accept"=>"application/json"
        ];
        $options = ['headers' => $headers, 'timeout' => 30,"form_params"=>$data];
        $res=$client->request($method,$url,$options);
        $result=$res->getBody();
        $response=json_decode($result);
        return $response;
    }

  
    //Image Update

     public function imageUpdate($id)
    {
            if($this->request->getPost())
            {
                $file=$this->request->getFile('img');
                if($file->isValid()==true)
                {
                    //Image validation
                    $getSize=$file->getSizeByUnit('mb');
                    if($getSize>=1)
                    {
                        return redirect()->back()
                        ->with('warning','File is too large Its bigger than 1 mega byte');
                    }
                    $getMime=$file->getMimeType();
                    $allowedTypes=['image/png','image/jpeg'];
                    if(!in_array($getMime,$allowedTypes))
                    {
                          return redirect()->back()
                          ->with('warning','File Format Invalid only PNG and JPEG will Accept');
                    }
                    if($this->request->getVar('image')!==null)
                    {
                      $path=WRITEPATH.'uploads/products/'.$this->request->getVar('image');
                      if(fileExists($path)==true)
                      {
                       try{unlink($path);}catch(Exception $ex){}
                      }
                    } 
                    $path=$file->store('products');
                    $path=WRITEPATH.'uploads/'.$path;
                    service('image')->withFile($path)
                    ->fit(250,250,'center')
                    ->save($path);
                    $image_link=$file->getName();
                    //remove prevous one
                   // First remove previous image and add new one 
                   $data=[
                    "key"=>getenv('API_SECRET'),
                    "image"=>$image_link,
                   ];
                   
                   $url=getenv('API_LINK')."/products/update-product/".$id;
                   $response=$this->apiCalling($url,"POST",$data);

                   if($response->errors==true)
                   {
                    return redirect()->back()->with('warning',$response->msg);
                   }

                   return redirect()->back()->with('success','Image Changed');

                } 
            }
    }

    public function image($image_link)
    {
        
        
        if($image_link!=="")
    {
        $path= WRITEPATH.'uploads/products/'.$image_link;
        $finfo=new \finfo(FILEINFO_MIME);
        $type=$finfo->file($path);
        header("Content-Type:$type");
        header('Content-Length:'.filesize($path));

        readfile($path);
        exit;
    }
    if($image_link=="")
    {
        $path= WRITEPATH.'uploads/services/default.jpg';
        $finfo=new \finfo(FILEINFO_MIME);
        $type=$finfo->file($path);
        header("Content-Type:$type");
        header('Content-Length:'.filesize($path));

        readfile($path);
        exit;
    }
}
}
