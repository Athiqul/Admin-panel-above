<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use Exception;

use function PHPUnit\Framework\fileExists;
class Package extends BaseController
{
    public function index()
    {
        
        $url=getenv('API_LINK')."/package/category-all-list";
        
        $response=$this->apiCalling($url,'GET');
         //dd($response);
    
        return view('packages/category',['response'=>$response]);

    }

    //package Category create
    public function create()
    {
        //create Customer Review
        if($this->request->getPost())
        {
           
            $data=$this->request->getVar();   
            //($data);
            $url=getenv('API_LINK')."/package/add-category";
            $response=$this->apiCalling($url,"POST",$data);
            //dd($response);
            if($response->errors==true)
            {
                return redirect()->back()->with('warning',$response->msg)->withInput();
            }
            return redirect()->back()->with('success',$response->msg);
            
        }
       

    }
//Blog category info Update
    public function update($id)
    {
        
        if($this->request->getPost())
        {
           //dd(session()->get('token'));
            $data=$this->request->getVar();
            //$data+=["key"=>getenv('API_SECRET')];
             //dd($data);
            $url=getenv('API_LINK')."/package/update-category/".$id;
            $response=$this->apiCalling($url,"POST",$data);
    
            if($response->errors==true)
            {
                return redirect()->back()->with('warning','Nothing to Update');
            }
           return redirect()->back()->with('success',$response->msg);
        }
        $url=  getenv('API_LINK')."/package/category-edit/".$id;
           
        $response=$this->apiCalling($url,'GET');
        //dd($response);
         if($response->errors==true)
         {
            return redirect()->back()->with('warning','Invalid id provided');
         }
        return view('packages/category-update',['response'=>$response]);    
    }
    //blog category show 
    public function show($id)
    {
        //show customer 
        $url=  getenv('API_LINK')."/package/category-edit/".$id;
           
           $response=$this->apiCalling($url,'GET');
           //dd($response);
           if($response->errors==true)
         {
            return redirect()->back()->with('warning','Invalid id provided');
         }
           return view('packages/category-details',['response'=>$response]); 
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

    //Create Blog 
    public function createPackage()
    {

        //for post request
        if($this->request->getPost())
        {

            $data=$this->request->getVar();
            //dd($data);
            $url=getenv('API_LINK')."/package/add-package";
            $response=$this->apiCalling($url,"POST",$data);
            //dd($response);
            if($response->errors==true)
            {
                return redirect()->back()->with('warning',$response->msg)->withInput();
            }
            return redirect()->back()->with('success',$response->msg);
        }

        $url=getenv('API_LINK')."/package/category-list";
        
        $response=$this->apiCalling($url,'GET');
        if($response->errors)
        {
            return redirect()->back()->with('warning',$response->msg);
        }
        //dd($response);
        return view('packages/new-package',['response'=>$response]);
    }
  
    //Blog List

    public function packageList()
    {
        $getPage=$this->request->getVar('page');
        if($getPage==null)
        {
            $getPage=1;
        }
        $url=getenv('API_LINK')."/package/show-all-packages";
        $data=[
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
    
        return view('packages/packages.php',['response'=>$response,'page'=>$page,'current'=>$current]);
    }


    //Blog Details

    public function packageDetails($id)
    {
        $url=getenv('API_LINK')."/package/show-package/".$id;
        $response=$this->apiCalling($url,'GET');
        //dd($response);
        
        
        return view('packages/package-details',['response'=>$response]); 
    }
    //Image Update

    //Blog Update
    public function packageUpdate($id)
    {

        if($this->request->getPost())
        {
            $data=$this->request->getVar();
           
             //dd($data);
            $url=getenv('API_LINK')."/package/update-package/".$id;
            $response=$this->apiCalling($url,"POST",$data);
    
            if($response->errors==true)
            {
                return redirect()->back()->with('warning','Nothing to Update');
            }
           return redirect()->back()->with('success',$response->msg);
        }

        $url=getenv('API_LINK')."/package/show-package/".$id;
        $response=$this->apiCalling($url,'GET');
        //dd($response->msg->package);
        $caturl=getenv('API_LINK')."/package/category-list";
        
        $cat=$this->apiCalling($caturl,'GET');
        return view('packages/package-update',['response'=>$response->msg->package[0],'cat'=>$cat]);
    }

    //Add Blog category
    public function addService($id)
    {
        $url=getenv('API_LINK')."/package/add-package-service/".$id;
         $data=$this->request->getVar();
         
         $response=$this->apiCalling($url,'POST',$data);
         return redirect()->back()->with('warning',$response->msg);
    }


    public function packageServiceStatus($id)
    {
        $url=getenv('API_LINK')."/package/package-service-status-update/".$id;
        $data=$this->request->getVar();
        
        $response=$this->apiCalling($url,'POST',$data);
        //dd($response);
        return redirect()->back()->with('warning',$response->msg);
    }
    // Remove Category From Blog
    public function removeServiceFromPackage($id){
         $url=getenv('API_LINK')."/package/delete-package-service/".$id;
         $data=$this->request->getVar();
         $response=$this->apiCalling($url,'DELETE',$data);
         return redirect()->back()->with('warning',$response->msg);
    }

    
}
