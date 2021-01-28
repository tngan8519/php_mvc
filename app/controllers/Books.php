<?php
class Books extends Controller {
    public function __construct() {
        $this->bookModel = $this->model('Book');
        $this->userModel = $this->model('User');
    }

    public function returnArrBookTypes(){
        $return = ['booktypes'=>$this->bookModel->showAllType(),];
        return $return;
    }

    public function adminManageBook(){
        checkAdmin();

        $page = isset($_GET['page']) ? $_GET['page'] : '1';
        $page1 = $page == "1" ? 0 : ($page*10)-10;

        $data = [
            'page' => $page,
            'page1' => $page1,
            'results'=>[],
            'resultsUsr'=>[],
        ];
         $data=array_merge($data,$this->returnArrBookTypes());

        if (!isset($_GET['search_book']) || isset($_GET['search_book']) && $_GET['search_book'] == ''){
            $returns = $this->bookModel->showTenBooks($data['page1']);
        }else{
            $like = "%" . $_GET['search_book'] . "%";
             $returns = $this->bookModel->showTenBooks($data['page1'],$like);
        }
        if($returns){
                $data['resultsBook']=$returns['resultsBook'];
                $data['resultsUsr']=$returns['resultsUsr'];
                $data['resultsType']=$returns['resultsType'];
                $data['resultsAllBook']=$returns['resultsAllBook'];

            }
        $this->view('admin/manage_book',$data);
    }

    public function addBook(){
        $data = [
            'account_id'=>'',
            'types'=>[],
            'bookName'=>'',
            'bookPrice'=>'',
            'authorName'=>'',
            'type'=>'',
            'description'=>'',
            'bookNameError'=>'',
            'priceError'=>'',
            'authorNameError'=>'',
            'typeError'=>'',
            'img1UploadStatus'=>'',
            'img2UploadStatus'=>'',
            'img3UploadStatus'=>'',
            'descriptionError'=>'',
            'addBookReturn'=>'',
        ];
         $data=array_merge($data,$this->returnArrBookTypes());
        $data['account_id'] = isset($_GET['id']) ? $_GET['id'] : "1";
        $returns = $this->bookModel->showAllType();
        if($returns){
            $data['types']=$returns;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data['bookName']=trim($_POST['bookName']);
            $data['bookPrice']=trim($_POST['bookPrice']);
            $data['authorName']=trim($_POST['authorName']);
            $data['type']=trim($_POST['type']);
            $data['description']=nl2br($_POST['description']); //nl2br is function to Insert line breaks where newlines (\n) occur in the string

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $priceValidation = "/^[0-9]+(\.[0-9]{2})?$/";

            if (empty($data['bookName'])) {
                $data['bookNameError'] = 'Please enter book name.';
            } elseif (!preg_match($nameValidation, $data['bookName'])) {
                $data['bookNameError'] = 'Book name can only contain letters and numbers.';
            }

            if (empty($data['bookPrice'])) {
                $data['priceError'] = 'Please enter book price.';
            } elseif (!preg_match($nameValidation, $data['bookName'])) {
                $data['priceError'] = 'Book price can only contain numbers.';
            }

            if (empty($data['authorName'])) {
                $data['authorNameError'] = 'Please enter author name.';
            } elseif (!preg_match($nameValidation, $data['bookName'])) {
                $data['authorNameError'] = 'Author name can only contain letters and numbers.';
            }

            if (empty($data['type'])) {
                $data['typeError'] = 'Please choose book type.';
            }

            if(empty($data['description'])){
              $data['descriptionError'] = 'Please enter description.';
            } elseif(strlen($data['description']) < 10){
              $data['descriptionError'] = 'Description must be at least 50 characters.';
            }

            // Upload File or Image
            $defaultImageName = strval(time()); 

            $tmpImg1Name = $_FILES['img1']['tmp_name'];
            $img1Name = $_FILES['img1']['name'];
            $img1Url = '../public/image/'.$defaultImageName.$img1Name;
            $img1db = 'image/'.$defaultImageName.$img1Name;
            if(move_uploaded_file($tmpImg1Name, $img1Url)){
                $data['img1UploadStatus'] = 'Upload image success.';
            }else{
                $data['img1UploadStatus'] = 'Not upload yet.';
            }
            
            $tmpImg2Name = $_FILES['img2']['tmp_name'];
            $img2Name = $_FILES['img2']['name'];
            $img2Url = '../public/image/'.$defaultImageName.$img2Name;
            $img2db = 'image/'.$defaultImageName.$img2Name;
            if(move_uploaded_file($tmpImg2Name, $img2Url)){
                $data['img2UploadStatus'] = 'Upload image success.';
            }else{
                $data['img2UploadStatus'] = 'Not upload yet.';
            }

            $tmpImg3Name = $_FILES['img3']['tmp_name'];
            $img3Name = $_FILES['img3']['name'];
            $img3Url = '../public/image/'.$defaultImageName.$img3Name;
            $img3db = 'image/'.$defaultImageName.$img3Name;
            if(move_uploaded_file($tmpImg3Name, $img3Url)){
                $data['img3UploadStatus'] = 'Upload image success.';
            }else{
                $data['img3UploadStatus'] = 'Not upload yet.';
            }

            if (empty($data['bookNameError']) && empty($data['priceError']) && empty($data['authorNameError']) && empty($data['typeError']) && $data['img1UploadStatus']==='Upload image success.' && $data['img2UploadStatus']==='Upload image success.' && $data['img3UploadStatus']==='Upload image success.' && empty($data['descriptionError'])){
                $typeIdReturn = $this->bookModel->findTypeIdByTypeName($data['type']);
                $addBookReturn= $this->bookModel->addBook($typeIdReturn,$data['account_id'],$data['authorName'],$data['bookName'],$data['bookPrice'], $img1db,$img2db,$img3db,$data['description']);
                if($addBookReturn){
                    $data['addBookReturn'] = 'Add book successful.';
                }else{
                    $data['addBookReturn'] = 'Not added book yet.';
                }
                header('location:' . URLROOT . '/books/adminManageBook');
                 
                }else{
                     $this->view('admin/add_book',$data);
                }
        }
        $this->view('admin/add_book',$data);
    }

    public function editBook(){
        $data = [
            'id'=>'',
            'error'=>'',
            'row'=>[],
            'bookNameError'=>'',
            'priceError'=>'',
            'authorNameError'=>'',
            'typeError'=>'',
            'img1UploadStatus'=>'',
            'img2UploadStatus'=>'',
            'img3UploadStatus'=>'',
            'descriptionError'=>'',
            'updateBookReturn'=>'',
            'typeNameFound'=>'',
            'types'=>'',
            'usr'=>'',
        ];
        $data['usr'] = isset($_GET['user']) ? $_GET['user'] : '';
         $data=array_merge($data,$this->returnArrBookTypes());
        if(isset($_GET['id'])){
            $data['id']=$_GET['id'];

            $returns = $this->bookModel->findBookById($data['id']);
            if($returns){
                $data['row']=$returns;
                $data['typeNameFound']=$this->bookModel->findTypeNameByTypeId($returns['type_id']);
                $data['types'] = $this->bookModel->showAllType();
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $data['newBookName']=trim($_POST['bookName']);
                    $data['newBookPrice']=trim($_POST['bookPrice']);
                    $data['newAuthorName']=trim($_POST['authorName']);
                    $data['newType']=trim($_POST['type']);
                    $typeId = $this->bookModel->findTypeIdByTypeName($data['newType']);
                    $data['newDescription']=nl2br($_POST['description']); 

                    // add more code to validate all of input 
                    $defaultImageName = strval(time()); 
                    if($_FILES['img1']['name'] != "") {
                        // file was selected for upload
                        $tmpImg1Name = $_FILES['img1']['tmp_name'];
                        $img1Name = $_FILES['img1']['name'];
                        $img1Url = '../public/image/'.$defaultImageName.$img1Name;
                        $img1db = 'image/'.$defaultImageName.$img1Name;
                        move_uploaded_file($tmpImg1Name, $img1Url);
                    }else{
                        $img1db = $data['row']['image'];
                    }
                    if($_FILES['img2']['name'] != "") {
                        $tmpImg2Name = $_FILES['img2']['tmp_name'];
                        $img2Name = $_FILES['img2']['name'];
                        $img2Url = '../public/image/'.$defaultImageName.$img2Name;
                        $img2db = 'image/'.$defaultImageName.$img2Name;
                        move_uploaded_file($tmpImg2Name, $img2Url);
                    }else{
                        $img2db = $data['row']['image_detail1'];
                    }
                    if($_FILES['img3']['name'] != "") {
                        $tmpImg3Name = $_FILES['img3']['tmp_name'];
                        $img3Name = $_FILES['img3']['name'];
                        $img3Url = '../public/image/'.$defaultImageName.$img3Name;
                        $img3db = 'image/'.$defaultImageName.$img3Name;
                        move_uploaded_file($tmpImg3Name, $img3Url);
                    }else{
                        $img3db = $data['row']['image_detail2'];
                    }
                    $returnUpdate = $this->bookModel->updateBookById($data['row']['id'],$typeId,$data['newAuthorName'],$data['newBookName'],$data['newBookPrice'],$img1db,$img2db,$img3db,$data['newDescription']);
                    if($returnUpdate){
                        if($data['usr']){
                            header('location:' . URLROOT . '/users/personal');
                        }else{
                            header('location:' . URLROOT . '/books/adminManageBook');
                        }
                    }else{
                        $data['updateBookReturn']='Book is not updated yet.';
                        $this->view('admin/edit_book',$data);
                    }
                    
                }

            }else{
                $data['error']='There is no book with this id.';
            }
        }else{
            $data['error']='There is no book with this id.';
        }
        $this->view('admin/edit_book',$data);
    }

    public function adminConfirmBook(){
        $id = $_GET['id'];
        $page =  $_GET['page'];
        $return = $this->bookModel->confirmBook($id);
        header('location:' . URLROOT . '/books/adminManageBook?page='.$page);
    }

    public function deleteBook(){
        $page =  $_GET['page'];
        $idGroup = $_GET['idGroup'];
        $idArray = explode("_",$idGroup);
        $idUsr = $_GET['user'];
        foreach ($idArray as $value){
            $this->bookModel->deleteBook($value);
        }
        if($idUsr){
            header('location:' . URLROOT . '/users/personal');
        }else{
            header('location:' . URLROOT . '/books/adminManageBook?page='.$page);
        }
    }

    public function filterTypeBook(){
        $data=[
            'books'=>[],
            'booktype'=>'',
        ];
        $data=array_merge($data,$this->returnArrBookTypes());
        $typeId=$_GET['typeid'];
        $data['booktype']=$this->bookModel->findTypeNameByTypeId($typeId);
        $return = $this->bookModel->filterBooksByTypeId($typeId);
        if($return){
            $data['books']=$return;
        }    
        $this->view('books/bookbytype',$data);
    }
    
    public function showBookDetail(){
        $data=[
            'book'=>[],
        ];
        $id=$_GET['id'];
        $return = $this->bookModel->findBookById($id);
        if($return){
            $data['book']=$return;
            $data['type']=$this->bookModel->findTypeNameByTypeId($data['book']['type_id']);
            $data['user']=$this->userModel->findUserNameById( $data['book']['user_id']);
            $data['similar']=$this->bookModel->find4BooksSameType($id);
        }
        $data=array_merge($data,$this->returnArrBookTypes());
        $this->view('books/bookdetail',$data);
    }
        
}
