<?php require APPROOT . '/views/includes/header.php'; ?>

<?php require APPROOT . '/views/includes/navigation.php'; ?>

        <div class="container" id="edit_container">
            <div class="row">
                <div class="col">
                    <h1 class="text-center tieude mt-3">ADD BOOK</h1>

                    <span class="invalid-feedback"><?php echo empty($data['errors']['files']) ? '' : implode('<br/>', $data['errors']['files']); ?></span>
                    <form method="POST" action="<?php echo URLROOT; ?>/books/addBook" enctype="multipart/form-data">
                        <div class="form-group text-left">
                            <div class='my-2'>
                                <label class="label_book_in4 mr-4" for="tensach">Book name</label>
                                <input type="text" style="display: inline;" class="form-control" id="tensach" name="bookName" >
                                <span class="invalidFeedback">
                                    <?php echo $data['bookNameError']; ?>
                                </span>
                            </div>
                            <div class='my-2'>
                                <label class="label_book_in4 mr-4" for="giasach">Price</label>
                                <input type="text" style="display: inline" class="form-control" id="giasach" name="bookPrice" >
                                <span class="invalidFeedback">
                                    <?php echo $data['priceError']; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group text-left">
                            <div class='my-2'>
                                <label class="label_book_in4 mr-4" for="tentacgia">Author name</label>
                                <input type="text" style="display: inline" class="form-control" id="tentacgia" name="authorName" >
                                <span class="invalidFeedback">
                                    <?php echo $data['authorNameError']; ?>
                                </span>
                            </div>
                            <div class='my-2'>
                                <label class="label_book_in4 mr-4" for="theloai">Type</label>
                            <select class="form-control" style="display: inline" id="theloai" name="type">
                                <option value="">---Seclect---</option>
                                <?php
                                    foreach ($data['types'] as $row) {
                                        echo "<option value='". $row['type_name'] ."'>" . $row['type_name'] . "</option>";
                                    }
                                ?>
                            </select>
                            <span class="invalidFeedback">
                                    <?php echo $data['typeError']; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group text-left">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="label_book_in4" for="anhbia_1" style="cursor:pointer;border:1px solid gray;background:#bababa;padding:4px">Image Cover Page
                                     <input type="file" style="display:none;" id="anhbia_1" name="img1" >
                                    </label>
                                    <p id="img1"></p>
                                    <span class="invalidFeedback">
                                        <?php echo $data['img1UploadStatus']; ?>
                                    </span>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="label_book_in4" for="anhchitiet_1" style="cursor:pointer;border:1px solid gray;background:#bababa;padding:4px">Image Detail 1
                                    <input type="file" style="display:none;" id="anhchitiet_1" name="img2">
                                    </label>
                                    <p id="img2"></p>
                                    <span class="invalidFeedback">
                                        <?php echo $data['img2UploadStatus']; ?>
                                    </span>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <label class="label_book_in4" for="anhchitiet_2" style="cursor:pointer;border:1px solid gray;background:#bababa;padding:4px">Image Detail 2
                                     <input type="file" style="display:none;" id="anhchitiet_2" name="img3">
                                    </label>
                                   <p id="img3"></p>
                                   <span class="invalidFeedback">
                                        <?php echo $data['img3UploadStatus']; ?>
                                   </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-left">
                            <label class="label_book_in4" for="mota">Description</label>
                            <textarea id="mota" name="description"></textarea>
                            <span class="invalidFeedback">
                                <?php echo $data['descriptionError']; ?>
                            </span>
                        </div>

                        <div class="form-group text-left">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <button type="button" name="huy" data-dismiss="modal" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_1" onclick="window.location.href='<?php echo URLROOT; ?>/books/adminManageBook'"><b>HỦY</b></button>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12">
                                    <button type="submit" name="xacnhan" class="btn btn-primary btn-block background_color_and_width bg_color_and_width nutpopup_2"><b>SAVE</b></button>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-sm-12 col-md-3 col-12"></div>
                            </div>
                        </div>
                        <center><?php echo $data['addBookReturn']; ?></center>
                    </form>

                </div>
            </div>
        </div>

<script>
const anhbia_1 = document.querySelector('#anhbia_1');
anhbia_1.addEventListener('change', (event) => {
  const img1 = document.querySelector('#img1');
  img1.textContent = event.target.files[0].name;
});

const anhchitiet_1 = document.querySelector('#anhchitiet_1');
anhchitiet_1.addEventListener('change', (event) => {
  const img2 = document.querySelector('#img2');
  img2.textContent = event.target.files[0].name;
});

const anhchitiet_2 = document.querySelector('#anhchitiet_2');
anhchitiet_2.addEventListener('change', (event) => {
  const img3 = document.querySelector('#img3');
  img3.textContent = event.target.files[0].name;
});
</script>
<?php
    require APPROOT . '/views/includes/footer.php';
?>