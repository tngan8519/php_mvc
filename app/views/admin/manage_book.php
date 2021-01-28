<?php require APPROOT . '/views/includes/header.php'; ?>

<?php require APPROOT . '/views/includes/navigation.php'; ?>
<section>
    <div class="container">

          <?php require APPROOT . '/views/includes/admin_nav.php'; ?>

        <div> 
        <br> <br> <br>

            <h4 class="tieudetab"> MANAGE BOOKS PAGE </h4>

            <div class="col-xl-5 col-lg-5 col-md-11 col-sm-11 col-11" id="cottimkiem" style="float:right; margin-top:3.5%">
                <form class="form-inline w-100" method="GET" action="<?php echo URLROOT; ?>/books/adminManageBook">
                    <input class="form-control" id="search_book" name="search_book" type="text" placeholder="Find books by name or author" aria-label="Search">
                </form>
            </div>
              
            <div class="btn-group" >
                <button type="button" class="btn btn-primary" onclick="checked_book_manager();">Select/Unselect All Book In This Page</button>
                <button type="button" class="btn btn-primary" onclick="delete_book_manager(<?php echo $data['page']; ?>);">Delete</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo URLROOT; ?>/books/addBook'">Add</button>
                
            
                                            
            </div>
            <br><br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th width="250px">Book name</th>
                        <th width="200px">Author</th>
                        <th width="200px">Type</th>
                        <th width="200px">User Post</th>
                        <th width="180px">Trade</th>
                        <th width="150px">Description</th>
                        <th width="130px">Edit</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php 
                    if($data['resultsBook']){
                    foreach ($data['resultsBook'] as $row) { ?>
                        <tr>
                            <td>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="radio" class="checked_book_manager" id="<?php echo $row['id']; ?>checked_book_manager_id">
                                    </label>
                                </div>
                            </td>
                           
                            <td><?php echo $row['id'] ;?></td>
                          
                            <td width="250px"><?php echo $row['book_name'] ?></td>
                            <td width="200px"><?php echo $row['author'] ?></td>
                            <td width="200px"><?php 
                            foreach ($data['resultsType'] as $rowType){
                                if ($rowType['type_id']==$row['type_id']){
                                    echo $rowType['type_name'];
                                }
                            } 
                            ?></td>
                            <td width="200px"><?php 
                            foreach ($data['resultsUsr'] as $rowUsr){
                                if ($rowUsr['id']==$row['user_id']){
                                    echo $rowUsr['firstname'].' '.$rowUsr['lastname'];
                                }
                            } 
                            ?></td>
                           <td width="180px">
                               <?php
                                   if ($row['trade_conditions'] == 1)
                                        echo "Completed";
                                    else echo "Not yet";
                                ?>
                            </td>
                            <td width="150px">
                            <?php
                                if ($row['checked_book'] == 1){
                                    // echo "Checked"; ?>
                                    <button class="mota" style="background-color:green; color: #FFF;" onclick="window.location.href='#'">Checked</button>
                               <?php } else{ ?>
                                    <button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href='<?php echo URLROOT; ?>/books/adminConfirmBook?id=<?php echo $row['id'];?>&page=<?php echo $data['page'];?>'">Pending</button>
                                <?php } ?>
                                  </td>
                            <td width="120px">
                                <button class="mota" style="background-color:#F37B1B; color: #FFF;" onclick="window.location.href='<?php echo URLROOT; ?>/books/editBook?id=<?php echo $row['id']; ?>'">Edit</button>
                            </td>
                        </tr>
                    <?php
                    }} 
                    ?>
                </tbody>
            </table>

            <div class="pagination">
                <?php
                    $nums_book = count($data['resultsAllBook']);
                    $nums_page = ceil($nums_book/10);
                    for ($i = 1; $i <= $nums_page; $i++) { 
                        ?>
                        <a href="<?php echo URLROOT; ?>/books/adminManageBook?page=<?php echo $i; ?>" class="<?php 
                        if($i==1 && $data['page']=='' ||
                        $data['page']==$i
                        ){
                            echo 'active';
                        }
                        ?>"><?php echo $i; ?></a> 
                <?php } ?> 
            </div>
        </div>

    </div>
    <br/><br/><br/><br/><br/>
</section>
<script>
function delete_book_manager(page_next) {
  let delete_obj = document.getElementsByClassName("checked_book_manager");
  let delete_element = "";
  for (let i = 0; i < delete_obj.length; i++) {
    if (delete_obj[i].checked == true) {
      delete_element =
        delete_element == ""
          ? parseInt(delete_obj[i].id).toString()
          : delete_element + "_" + parseInt(delete_obj[i].id).toString();
    }
  }
  console.log(delete_element);
  let urlRoot = "<?php echo URLROOT; ?>";
  let page = "<?php echo $data['page'];?>";
  window.location.href = urlRoot+"/books/deleteBook?idGroup="+delete_element+"&page="+page;
}
</script>
<?php
    require APPROOT . '/views/includes/footer.php';
?>