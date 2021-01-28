<?php
class Blog extends DB{
    public function showAllBlogs(){
        $qr = "SELECT * FROM blogs WHERE checked_blog=1";
        $result = mysqli_query($this->con,$qr);
        if (mysqli_num_rows($result) == 0){
            return false;
        }else{
            while($row= mysqli_fetch_array($result)){
                $results[] = $row;
            }
            return  $results;
        }
    }

    public function findBlogByBlogId($id){
        $qr = "SELECT * FROM blogs WHERE blog_id = '$id' LIMIT 1";
        $result = mysqli_query($this->con,$qr);
        if ( mysqli_num_rows($result) == 0){
              return false;
        }else{
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }

    public function findBlogsSimilar($blogId){
        $qr = "SELECT * FROM blogs WHERE checked_blog=1 AND blog_id!='$blogId' ORDER BY views DESC LIMIT 3";
         $result = mysqli_query($this->con,$qr);
        if (mysqli_num_rows($result) == 0){
            return false;
        }else{
            while($row= mysqli_fetch_array($result)){
                $results[] = $row;
            }
            return  $results;
        }
    }

    public function showNewBlogs(){
        $qr = "SELECT * FROM blogs WHERE checked_blog=1 ORDER BY blog_id LIMIT 3";
        $result = mysqli_query($this->con,$qr);
        if (mysqli_num_rows($result) == 0){
            return false;
        }else{
            while($row= mysqli_fetch_array($result)){
                $results[] = $row;
            }
            return  $results;
        }
    }

    public function findBlogPostedByUsrId($id){
        $qr = "SELECT * FROM blogs WHERE checked_blog=1 AND user_id='$id'";
        $result = mysqli_query($this->con,$qr);
        if (mysqli_num_rows($result) == 0){
            return false;
        }else{
            while($row= mysqli_fetch_array($result)){
                $results[] = $row;
            }
            return  $results;
        }
    }
}
