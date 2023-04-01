<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Contest extends BaseController
{
    //Show all applicant
    public function index()
    {
        $getPage=$this->request->getVar('page');
        if($getPage==null)
        {
            $getPage=1;
        }
        
         $url=getenv('API_LINK').'/contest/show-all?page='.$getPage;
        $res=$this->apiCalling($url,'GET');
        //dd($res);
        if($res->errors==true)
        {
            return redirect()->back()->with('warning',$res->msg);
        }
       if($res->errors==false)
       {
          $page=$res->totalPage;
       $current=$res->currentPage;
       }else{
          $page=0;
       $current=0;
       }
        return view('contest/show-all',['res'=>$res,'page'=>$page,'current'=>$current,'todayApplied'=>$res->todayApplied,'totalApplied'=>$res->totalApplied,'type'=>'show']);
    }

    //Show Candidate details
    public function showDetails($id)
    {
        $url=getenv('API_LINK').'/contest/candidate/'.$id;
        $res=$this->apiCalling($url,'GET');
        //dd($res);
        return view('contest/contestant-details',['res'=>$res]);
    }
    //Show email who is not receive
   
    public function emailMissing()
    {
        $getPage=$this->request->getVar('page');
        if($getPage==null)
        {
            $getPage=1;
        }
        
         $url=getenv('API_LINK').'/contest/email-failed?page='.$getPage;
        $res=$this->apiCalling($url,'GET');
        //dd($res);
        if($res->errors==true)
        {
            return redirect()->back()->with('warning',$res->msg);
        }
       if($res->errors==false)
       {
          $page=$res->totalPage;
       $current=$res->currentPage;
       }else{
          $page=0;
       $current=0;
       }
        return view('contest/show-all',['res'=>$res,'page'=>$page,'current'=>$current,'todayApplied'=>$res->todayApplied,'totalApplied'=>$res->totalApplied,'type'=>'failed']);
    }

    public function emailSent($id)
    {
    
                
                $url=getenv('API_LINK')."/contest/email-resent/".$id;
                $response=$this->apiCalling($url,"GET");
        
                if($response->errors==true)
                {
                    return redirect()->back()->with('warning',$response->msg);
                }
               return redirect()->back()->with('success',$response->msg);
            
             
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
