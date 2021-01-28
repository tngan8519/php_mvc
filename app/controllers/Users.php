<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->bookModel = $this->model('Book');
        $this->blogModel = $this->model('Blog');
    }

    public function returnArrBookTypes(){
        $return = ['booktypes'=>$this->bookModel->showAllType(),];
        return $return;
    }

    public function register() {
        $data = [
            'first' => '',
            'last' => '',
            'email' => '',
            'phone' => '',
            'password' => '',
            'cfpassword' => '',
            'firstnameError' => '',
            'lastnameError' => '',
            'emailError' => '',
            'phoneError' => '',
            'passwordError' => '',
            'cfPasswordError' => ''
        ];
        $data=array_merge($data,$this->returnArrBookTypes());

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              
                $data['first'] = trim($_POST['first']);
                $data['last'] = trim($_POST['last']);
                $data['email'] = trim($_POST['email']);
                $data['phone'] = trim($_POST['phone']);
                $data['password'] = trim($_POST['password']);
                $data['cfpassword'] = trim($_POST['cfpassword']);
                

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $phoneValidation = "/^[0-9]{10}+$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate name on letters/numbers
            if (empty($data['first'])) {
                $data['firstnameError'] = 'Please enter first name.';
            } elseif (!preg_match($nameValidation, $data['first'])) {
                $data['firstnameError'] = 'First name can only contain letters and numbers.';
            }

            if (empty($data['last'])) {
                $data['lastnameError'] = 'Please enter last name.';
            } elseif (!preg_match($nameValidation, $data['last'])) {
                $data['lastnameError'] = 'Last name can only contain letters and numbers.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

            // Validate phone number
            if (empty($data['phone'])){
                $data['phoneError'] = 'Please enter phone number.';
            } elseif (preg_match($phoneValidation, $data['phone'])){
                 $data['phoneError'] = 'Please enter only number.';
            }
        
            // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 8){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            //Validate confirm password
             if (empty($data['cfpassword'])) {
                $data['cfPasswordError'] = 'Please enter confirm password.';
            } else {
                if ($data['password'] != $data['cfpassword']) {
                $data['cfPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['firstnameError']) && empty($data['lastnameError']) && empty($data['emailError']) && empty($data['phoneError']) && empty($data['passwordError']) && empty($data['cfPasswordError'])) {

                $data['original_password'] = $data['password'];
                 // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    // header('location: ' . URLROOT . '/users/login');
                    
                    // login with the $data
                    $loggedInUser = $this->userModel->login($data['email'],$data['original_password']);
                    $this->createUserSession($loggedInUser);
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
        
    }

    public function login() {
        $data = [
            'title' => 'Login page',
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => '',
            
        ];
        $data=array_merge($data,$this->returnArrBookTypes());

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          
                $data['email'] = trim($_POST['email']);
                $data['password'] = trim($_POST['password']);
             
            //Validate username
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['emailError']) && empty($data['passwordError'])) {
               $loggedInUser = $this->userModel->login($data['email'],$data['password']);
                
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or email is incorrect. Please try again.';

                    $this->view('users/login', $data);
                }
            }

        } else {
                 $data['email'] = '';
                 $data['password'] = '';
                 $data['emailError'] = '';
                 $data['passwordError'] = '';  
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['email'] = $user['email'];
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['firstname']);
        unset($_SESSION['email']);
        header('location:' . URLROOT . '/users/login');
    }

    public function admin(){
        $data = $this->returnArrBookTypes();
        checkAdmin();
        $this->view('admin/adminpage',$data);
    }


    public function personal(){
        $data = $this->returnArrBookTypes();
        isLoggedIn();
        $data['loggedInUser'] = $this->userModel->findUserByEmail($_SESSION['email']);
        $data['booksPosted'] = $this->bookModel->findBookPostedByUsrId($data['loggedInUser']['id']);
        $data['blogsPosted'] = $this->blogModel->findBlogPostedByUsrId($data['loggedInUser']['id']);
        $this->view('personal/personalpage',$data);
    }

    public function forgetPassword(){
        $data = [
            'emailqmk' => '',
            'error' => '',
            'notification'=>'',
        ];
        $data=array_merge($data,$this->returnArrBookTypes());
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             $data['emailqmk'] = trim($_POST['emailqmk']);

            if (empty($data['emailqmk'])) {
                $data['error'] = 'Please enter email address.';
            } elseif (!filter_var($data['emailqmk'], FILTER_VALIDATE_EMAIL)) {
                $data['error'] = 'Please enter the correct format.';
            } else {
                //Check if not email exists.
                if (!$this->userModel->findUserByEmail($data['emailqmk'])) {
                $data['error'] = 'Email is not regestered yet. Please check again.';
                }
            }

            if(empty($data['error'])){
                $new_password = rand(72891,92729);
                // Hash password
                $data['newpassword'] = password_hash($new_password, PASSWORD_DEFAULT);
                // Update database
                $this->userModel->resetPassword( $data['emailqmk'],$data['newpassword']);
                // Send email
                $to = $data['emailqmk'];
                $subject = 'Resset password';
                $message = 'This is email is from reset password from OURBOOK. Your new password is'.$new_password;
                $success = mail($to ,$subject,$message);
                if(!$success){
                    $data['notification']='Fail to send email.';
                }else{
                    $data['notification']='Email has been sent successfully.';
                }
            }
        }
        $this->view('users/forgetpage',$data);
    }

    


}
