<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Request extends BaseController
{
    //show all call request
    public function index()
    {
        $getPage=$this->request->getVar('page');
        if($getPage==null)
        {
            $getPage=1;
        }
        if($this->request->getVar('filter')=='solved')
        {
            $url=getenv('API_LINK').'/call/request-solved?page='.$getPage;
            $res=$this->apiCalling($url,'GET');
        } else{
            $url=getenv('API_LINK').'/call/pending-request?page='.$getPage;
            $res=$this->apiCalling($url,'POST');
        }
       
        
       // dd($res);
       if($res->errors==false)
       {
          $page=$res->totalPage;
       $current=$res->currentPage;
       }else{
          $page=0;
       $current=0;
       }
        return view('call-back/call-back',['response'=>$res,'page'=>$page,'current'=>$current]);
    }


    public function update($id)
    {
        
   
            if($this->request->getPost())
            {
               
                $data=$this->request->getVar();
                $data+=["key"=>getenv('API_SECRET')];
                // dd($data);
                $url=getenv('API_LINK')."/call/update-request/".$id;
                $response=$this->apiCalling($url,"POST",$data);
        
                if($response->errors==true)
                {
                    return redirect()->back()->with('warning','Nothing to Update');
                }
               return redirect()->back()->with('success',$response->msg);
            }
             
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
}
