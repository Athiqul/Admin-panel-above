<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Exception;

use function PHPUnit\Framework\fileExists;

class Blog extends BaseController
{
    //Blog Category List
    public function index()
    {
        
        $url=getenv('API_LINK')."/blog/category-list";
        
        $response=$this->apiCalling($url,'GET');
         //dd($response);
    
        return view('blog/category.php',['response'=>$response]);

    }

    //Blog Category create
    public function create()
    {
        //create Customer Review
        if($this->request->getPost())
        {
            $user_id=session()->get('user_id');
            $data=$this->request->getVar();
            $data+=["user_id"=>$user_id,"key"=>getenv('API_SECRET')];
            
    
            //($data);
            $url=getenv('API_LINK')."/blog/add-category";
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
        $getUser=session()->get('user_id');
    $getRole=session()->get('role');
        $url=  getenv('API_LINK')."/blog/category-edit/".$id;
        $response=$this->apiCalling($url,'GET');
        //dd($response);
        if($response->msg->user_id!=$getUser && $getRole=='1')
         {
            return redirect()->back()->with('warning','You are not authorized user');
           
             
         }

        
        if($this->request->getPost())
        {
           
            $data=$this->request->getVar();
            $data+=["key"=>getenv('API_SECRET')];
            // dd($data);
            $url=getenv('API_LINK')."/blog/category-update/".$id;
            $response=$this->apiCalling($url,"POST",$data);
    
            if($response->errors==true)
            {
                return redirect()->back()->with('warning','Nothing to Update');
            }
           return redirect()->back()->with('success',$response->msg);
        }
        
           
        if($response->errors==true)
        {
           return redirect()->back()->with('warning','Invalid id provided');
        }
        return view('blog/category-update',['response'=>$response]);    
    }
    //blog category show 
    public function show($id)
    {

        //show customer 
        $url=  getenv('API_LINK')."/blog/category-edit/".$id;
           
           $response=$this->apiCalling($url,'GET');
           //dd($response);
           if($response->errors==true)
         {
            return redirect()->back()->with('warning','Invalid id provided');
         }
          //Blog list under Category
          $blogListUrl= getenv('API_LINK')."/blog/category-blog/".$id;
          $blogList=$this->apiCalling($blogListUrl,'GET');
          //dd($blogList);
           return view('blog/category-details',['response'=>$response,'blogList'=>$blogList]); 
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
    public function createBlog()
    {

        //for post request
        if($this->request->getPost())
        {
            //dd($this->request->getVar());
            //image work
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
    
            $path=$file->store('blog');
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
                "publish_at"=>$this->request->getVar("date"),
                "cat_id"=>$this->request->getVar("cat_id[]"),
                
            ];
    
            $url=getenv('API_LINK')."/blog/add-new";
            $response=$this->apiCalling($url,"POST",$data);
            //dd($response);
            if($response->errors==true)
            {
                return redirect()->back()->with('warning',$response->msg)->withInput();
            }
            return redirect()->back()->with('success',$response->msg);
        }

        $url=getenv('API_LINK')."/blog/category-active-list";
        
        $response=$this->apiCalling($url,'GET');
        if($response->errors)
        {
            return redirect()->back()->with('warning',$response->msg);
        }
        //dd($response);
        return view('blog/new-blog',['response'=>$response]);
    }
  
    //Blog List

    public function blogList()
    {
        $getPage=$this->request->getVar('page');
        if($getPage==null)
        {
            $getPage=1;
        }
        $url=getenv('API_LINK')."/blog/all-blogs";
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
    
        return view('blog/blogs.php',['response'=>$response,'page'=>$page,'current'=>$current]);
    }


    //Blog Details

   

    public function blogDetails($id)
    {
        $url=getenv('API_LINK')."/blog/view/".$id;
        $response=$this->apiCalling($url,'GET');
        //dd($response);
        
        
        return view('blog/blog-details',['response'=>$response]); 
    }
    //Image Update

    //Blog Update
    public function blogUpdate($id)
    {
        //checking
        $getUser=session()->get('user_id');
        $getRole=session()->get('role');
        $url=getenv('API_LINK')."/blog/view/".$id;
    
        $response=$this->apiCalling($url,'GET');
         

        if($response->msg->blog->user_id!=$getUser && $getRole=='1')
             {
                return redirect()->back()->with('warning','You are not authorized user for this operation!');
               
                 
             }

        if($this->request->getPost())
        {
            
            $data=$this->request->getVar();
            $data+=["key"=>getenv('API_SECRET')];
             //dd($data);
            $url=getenv('API_LINK')."/blog/update/".$id;
            $response=$this->apiCalling($url,"POST",$data);
            
             
    
            if($response->errors==true)
            {
                return redirect()->back()->with('warning','Nothing to Update');
            }
           return redirect()->back()->with('success',$response->msg);
        }
        
        
       
        return view('blog/blog-update',['response'=>$response]);
    }

    //Add Blog category
    public function AddBlogCat($id)
    {
        
        if($this->checkBlogauth($id)==true)
         {
            return redirect()->back()->with('warning','You are not authorized user for this operation!');
         }
        $url=getenv('API_LINK')."/blog/category-blog-update/".$id;
         $data=$this->request->getVar();
         $data+=['key'=>getenv('API_SECRET')];
         $response=$this->apiCalling($url,'POST',$data);
         return redirect()->back()->with('success',$response->msg);
    }
    // Remove Category From Blog
    public function RemoveCatFromBlog($id){
         if($this->checkBlogauth($id)==true)
         {
            return redirect()->back()->with('warning','You are not authorized user for this operation!');
         }
         $url=getenv('API_LINK')."/blog/category-blog-remove/".$id;
         $data=$this->request->getVar();
         $data+=['key'=>getenv('API_SECRET')];
         $response=$this->apiCalling($url,'POST',$data);
         return redirect()->back()->with('warning',$response->msg);
    }

     public function imageUpdate($id)
    {
        if($this->checkBlogauth($id)==true)
         {
            return redirect()->back()->with('warning','You are not authorized user for this operation!');
         }
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
                      $path=WRITEPATH.'uploads/blog/'.$this->request->getVar('image');
                      if(fileExists($path)==true)
                      {
                       try{unlink($path);}catch(Exception $ex){}
                      }
                    } 
                    $path=$file->store('blog');
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
                   
                   $url=getenv('API_LINK')."/blog/update/".$id;
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
        $path= WRITEPATH.'uploads/blog/'.$image_link;
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


private function checkBlogCat($cat_id)
{
    $getUser=session()->get('user_id');
    $getRole=session()->get('role');
    $url=getenv('API_LINK')."/blog/category-edit/".$cat_id;;

    $response=$this->apiCalling($url,'GET');
     

    if($response->msg->user_id!=$getUser && $getRole=='1')
         {
            return true;
           
             
         }

         return false;
}

private function checkBlogauth($blog_id)
{
    $getUser=session()->get('user_id');
    $getRole=session()->get('role');
    $url=getenv('API_LINK')."/blog/view/".$blog_id;

    $response=$this->apiCalling($url,'GET');
     

    if($response->msg->blog->user_id!=$getUser && $getRole=='1')
         {
            return true;
           
             
         }

         return false;
}
}
