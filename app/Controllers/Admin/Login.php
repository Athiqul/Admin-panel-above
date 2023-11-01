<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Exception;

class Login extends BaseController
{
    public function index()
    {
        return view('login/index.php');
    }

    public function verify()
    {
       $validation=[
        "email"=>[
            "rules"=>"required|valid_email",
            "errors"=>[
                "email"=>[
                    "required"=>"Email is Missing",
                    "valid_email"=>"Provide Valid Email"
                ],
            ],
        ],

        "password" => [
            "rules" => "required|min_length[8]",
            "errors" => [
                "required" => "Password Empty",
                "min_length[8]" => "Provide Password Correctly",
            ],
        ],
       ];

       if(!$this->validate($validation))
       {
        return redirect()->back()->with('errors',$this->validator->getErrors())->withInput();
       }

      $client = \Config\Services::curlrequest();
      $apiUrl=getenv('API_LINK')."/user-auth-request";
     // dd($apiUrl);
      $postData = [
        "key"=>getenv('API_SECRET'),
        "email"=>$this->request->getVar('email'),
        "password"=>$this->request->getVar('password'),
    ];
      try{
        $response = $client->post($apiUrl,['debug' => true,'json' => $postData]);
        $bodyMsg=json_decode($response->getBody());
       // dd($bodyMsg);
        if($bodyMsg->errors==true)
        {
           // dd($bodyMsg->msg);
            return redirect()->back()->with('warning',$bodyMsg->msg)->withInput();
        }
        else{
           // dd($bodyMsg);
            session()->set('user_id',$bodyMsg->user_id);
            session()->set('username',$bodyMsg->user_name);
            session()->set('role',$bodyMsg->role);
            return redirect()->to('/login/otp-verify')->with('warning',$bodyMsg->msg);
           // dd($bodyMsg->msg);
        }
      }catch(Exception $ex){
        //dd($ex->getMessage());
        return redirect()->back()->with('errors',$ex->getMessage())->withInput();
      }
     

  }

  public function otpCheck()
  {

     return view('login/otp');
  }




    
    

    public function otpVerify()
    {
           if($this->request->getPost())
           {
              $otp=$this->request->getVar('otp_code');

              $data=[
                "key"=>getenv('API_SECRET'),
                "otp_code"=>$otp,
                "user_id"=>session()->get('user_id'),
            
            ];
              $client = \Config\Services::curlrequest();
              $apiUrl=getenv('API_LINK')."/user-auth-otp";

              try{
                $response = $client->post($apiUrl,['debug' => true,'json' => $data]);
                $bodyMsg=json_decode($response->getBody());
               // dd($bodyMsg);
                if($bodyMsg->errors==true)
                {
                    return redirect()->back()->with('warning',$bodyMsg->msg)->withInput();
                }
                else{
                    
                    session()->set('token',$bodyMsg->msg);
                    return redirect()->to('/admin')->with('success','Welcome to the system');
                }
              }catch(Exception $ex){
                dd($ex->getMessage());
               // return redirect()->back()->with('errors',$ex->getMessage())->withInput();
              }
           }
    }


    public function logout()
    {
       session()->destroy();
       return redirect()->to('/login');
    }
}
