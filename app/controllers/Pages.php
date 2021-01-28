<?php
class Pages extends Controller {
    public function __construct() {
         $this->bookModel = $this->model('Book');
         $this->blogModel = $this->model('Blog');
         $this->userModel = $this->model('User');
    }

    public function returnArrBookTypes(){
        $return = ['booktypes'=>$this->bookModel->showAllType(),];
        return $return;
    }

    public function index() {
        $data = [
            
        ];
         $data=array_merge($data,$this->returnArrBookTypes());
         $data['hotbooks']=$this->bookModel->showHotBooks();
        $data['cheapbooks']=$this->bookModel->showCheapBooks();
         $data['newblogs']=$this->blogModel->showNewBlogs();
        $this->view('index', $data);
    }

     public function search(){
         $data = [
            'booksearch'=>[],
            'notfound'=>'',
            'keywordSearch'=>'',
        ];
         $data=array_merge($data,$this->returnArrBookTypes());

        
              $data['keywordSearch']=isset($_GET['search']) ? addslashes($_GET['search']) :'';
              if($data['keywordSearch']!=''){
                $return = $this->bookModel->searchBookByName($data['keywordSearch']);
              if($return){
                $data['booksearch']=$return;
              }else{
                  $data['notfound']='NO BOOKS FOUND WITH NAME LIKE '.$data['keywordSearch'];
              }
              }
              $this->view('pages/search', $data);
          }
    
    public function blog(){
         $data = [
            
        ];
         $data=array_merge($data,$this->returnArrBookTypes());
         $return = $this->blogModel->showAllBlogs();
         if($return){
            $data['blogsFound']=$return;
         }
        $this->view('pages/blog', $data);
    }

    public function blogDetail(){
        $data = [
            
        ];
        $id=$_GET['blogid'];
        $data=array_merge($data,$this->returnArrBookTypes());
        $return = $this->blogModel->findBlogByBlogId($id);
        if($return){
            $data['blog']=$return;
            $data['user']=$this->userModel->findUserNameById( $data['blog']['user_id']);
            $data['similar']=$this->blogModel->findBlogsSimilar($id);
        }
         $this->view('pages/blog_detail', $data);
    }

    public function support() {
         $data = [  
        ];
         $data=array_merge($data,$this->returnArrBookTypes());
        $this->view('pages/support', $data);
    }
}
