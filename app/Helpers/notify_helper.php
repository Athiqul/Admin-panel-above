<?php 
if(!function_exists('pendingCallback'))
{
   function pendingCallback()
   {
    $url=getenv('API_LINK').'/call/pending-request';
    $token=session()->get('token');
        $url=$url;
        $client=\config\Services::curlrequest();
        $headers=[

            "Authorization"=>"Bearer ".$token,
            "Accept"=>"application/json"
        ];
        $options = ['headers' => $headers];
        $res=$client->request('POST',$url,$options);
        $result=$res->getBody();
        $response=json_decode($result);
        return $response;
   }
}

?>