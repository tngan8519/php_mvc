<?php
class Book extends DB{
    public function showTenBooks($page1,$like='') {
        if($like==''){
            $qr = "SELECT * FROM books LIMIT $page1,10";
        }else{
            $qr = "SELECT * FROM books WHERE book_name LIKE '$like' OR author LIKE '$like' LIMIT $page1,10";
        }
        $result = mysqli_query($this->con,$qr);

        $qrUsr = "SELECT * FROM users";
        $resultUsr = mysqli_query($this->con,$qrUsr);
        $qrType = "SELECT * FROM types";
        $resultType = mysqli_query($this->con,$qrType);
        $qrAllBook = "SELECT * FROM books";
        $resultAllBook = mysqli_query($this->con,$qrAllBook);
        if (mysqli_num_rows($result) == 0 && mysqli_num_rows($resultUsr) == 0 && mysqli_num_rows($resultType) == 0 && mysqli_num_rows($resultAllBook) == 0){
              return false;
        }else{
            while($row = mysqli_fetch_array($result)){
                $results[] = $row;
            }
            while($rowUsr = mysqli_fetch_array($resultUsr)){
                $resultsUsr[] = $rowUsr;
            }
            while($rowType = mysqli_fetch_array($resultType)){
                $resultsType[] = $rowType;
            }
            while($rowAllBook = mysqli_fetch_array($resultAllBook)){
                $resultsAllBook[] = $rowAllBook;
            }
            $data = [ 
                'resultsBook' => $results,
                'resultsUsr' => $resultsUsr,
                'resultsType' => $resultsType,
                'resultsAllBook' => $resultsAllBook,

            ];
            return $data;
        }
    }

    public function showAllType() {
        $qrType = "SELECT * FROM types";
        $resultType = mysqli_query($this->con,$qrType);
        if (mysqli_num_rows($resultType) == 0 ){
              return false;
        }else{
            while($rowType = mysqli_fetch_array($resultType)){
                $resultsType[] = $rowType;
            }
            return $resultsType;
        }
    }
   
    public function findTypeIdByTypeName($type){
        $qrFindType = "SELECT * FROM types WHERE type_name='$type'";
        $resultFindType = mysqli_query($this->con,$qrFindType);
        if (mysqli_num_rows($resultFindType) == 0){
            return false;
        }else{
            while($rowFindType = mysqli_fetch_array($resultFindType)){
                $typeIdFound = $rowFindType['type_id'];
            }
            return $typeIdFound;
        }
    }

    public function addBook($type_id,$user_id,$author,$bookname,$bookprice,$img1,$img2,$img3,$description){
        $qr = "INSERT INTO books (type_id,user_id,author,book_name,book_price,image,image_detail1,image_detail2,descriptions,trade_conditions,checked_book) VALUES ('$type_id','$user_id','$author','$bookname', '$bookprice','$img1','$img2','$img3','$description',0,0)";
        return mysqli_query($this->con,$qr);
    }

    public function findBookById($id){
        $qr = "SELECT * FROM books WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($this->con,$qr);
        if ( mysqli_num_rows($result) == 0){
              return false;
        }else{
            $row = mysqli_fetch_array($result);
            return $row;
        }
    }

    public function findTypeNameByTypeId($id){
        $qrFindTypeName = "SELECT * FROM types WHERE type_id='$id'";
        $resultFindTypeName = mysqli_query($this->con,$qrFindTypeName);
        if (mysqli_num_rows($resultFindTypeName) == 0){
            return false;
        }else{
            $rowFindTypeName = mysqli_fetch_array($resultFindTypeName);
            return $rowFindTypeName['type_name'];
        }
    }

    

    public function updateBookById($id,$type_id,$author,$book_name,$book_price,$image,$image_detail1,$image_detail2,$descriptions){
        $qr = "UPDATE books SET type_id='$type_id', author='$author', book_name='$book_name', book_price='$book_price', image='$image', image_detail1='$image_detail1', image_detail2='$image_detail2', descriptions='$descriptions' WHERE id='$id'";
        return mysqli_query($this->con,$qr);
    }

    public function confirmBook($id){
        $qr = "UPDATE books SET checked_book='1' WHERE id='$id'";
        return mysqli_query($this->con,$qr);
    }

    public function deleteBook($id){
        $qr = "DELETE FROM books WHERE id='$id'";
        return mysqli_query($this->con,$qr);
    }

    public function filterBooksByTypeId($id){
        $qr = "SELECT * FROM books WHERE type_id='$id'";
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

    public function find4BooksSameType($bookId){
        $qr = "SELECT * FROM books WHERE id!='$bookId' ORDER BY RAND() LIMIT 4";
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

    public function showHotBooks(){
        $qr = "SELECT * FROM books WHERE checked_book=1 ORDER BY id LIMIT 4";
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

    public function showCheapBooks(){
        $qr = "SELECT * FROM books WHERE checked_book=1 ORDER BY book_price LIMIT 4";
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

    public function searchBookByName($nameSearch){
        $qr = "SELECT * FROM books WHERE checked_book=1 AND book_name LIKE '%$nameSearch%'";
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

    public function findBookPostedByUsrId($id){
        $qr = "SELECT * FROM books WHERE checked_book=1 AND user_id='$id'";
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
