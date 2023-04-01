<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Blogger extends BaseController
{
    public function index()
    {
        //
    }

    
    public function signup()
    {
        if($this->request->getPost())
        {
            $data=$this->request->getVar();
            $data+=['key'=>getenv('API_SECRET')];
            //dd($data);
            $url=getenv('API_LINK')."/user-signup-request";
            $response=$this->apiCalling($url,'POST',$data);

           if($response->errors==true)
           {
              return redirect()->back()->with('warning',$response->msg);
           }

           return   redirect()->back()->with('success',$response->msg->success);

        }
         return view('content-writer/new-writer');
    }

    public function contentWriter()
    {
        
        $getPage=$this->request->getVar('page');
      
        //dd(session()->get('token'));
        $url=getenv('API_LINK')."/content-writer-list";
        $response=$this->apiCalling($url,'GET');
        

        return view('content-writer/list',['response'=>$response]);


    }
    public function profile($id)
    {
      $url=getenv('API_LINK')."/content-writer-profile/".$id;
      $response=$this->apiCalling($url,'GET');

      if($response->errors)
      {
        return redirect()->back()->with('warning',$response->errors);
      }
      //dd($response);
      return view('content-writer/profile',['response'=>$response]);
    }

    public function updateInfo($id)
    {
      
        if($this->request->getPost())
        {
            $data=$this->request->getVar();
            $url=getenv('API_LINK')."/user-profile-update/".$id;
            $response=$this->apiCalling($url,'POST',$data);
            if($response->errors==true)
            {
              return redirect()->back()->withInput()->with('warning',$response->msg);
            }

            return redirect()->back()->with('success',$response->msg);
        }
        $url=getenv('API_LINK')."/content-writer-profile/".$id;
        $response=$this->apiCalling($url,'GET');
          return view('content-writer/profile-update',['response'=>$response]);
    }


    public function updatePassword($id)
    {

      if(session()->get('user_id')!=$id && session()->get('role')=='1')
        {
          return redirect()->back();
        }
        if($this->request->getPost())
        {
            $data=$this->request->getVar();
            $url=getenv('API_LINK')."/user-profile-update/".$id;
            $response=$this->apiCalling($url,'POST',$data);
            if($response->errors==true)
            {
              return redirect()->back()->withInput()->with('warning',$response->msg);
            }

            return redirect()->back()->with('success',$response->msg);
        }
        $url=getenv('API_LINK')."/content-writer-profile/".$id;
        $response=$this->apiCalling($url,'GET');
        if($response->errors)
        {
          return redirect()->back()->with('warning',$response->msg);
        }
        
        //dd($response);
          return view('content-writer/password-change',['response'=>$response]);
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
