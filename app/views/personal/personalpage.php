<?php
   require APPROOT . '/views/includes/header.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

        <section>
            <div class="container">

                <div class="row hang1" id="body_background" style="padding: 0px;">

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 khungtrai" id="left_frame">

                        <div class="row"  id="avatar_frame">
                            <div class="col-sm-12 text-center">
                                <img src="<?php echo URLROOT ?>/image/avatar.JPG" alt="Không có hình" id="avatar">
                            </div>
                        </div>

                        <div class="row" id="name_frame">
                            <div class="col-12">
                                <div id="hoten">
                                    <?php
                                        echo $data['loggedInUser']['firstname'].' '.$data['loggedInUser']['lastname'];
                                    ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-center khunggiua">

                        <!-- Thong tin tai khoan -->
                        <div class="row" id="sub_title_1">

                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12 text-center" id="t_tin_ca_nhan">PERSONAL INFORMATION</div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12 text-center" id="icon_1" >
                                <a href="trangthongtincanhan.php">
                                    <img src="<?php echo URLROOT ?>/image/editbackground.PNG" alt="icon" id="icon_width_height">
                                </a>
                            </div>

                        </div>

                        <div class="row mt-2 in4_frame">

                            <div class="col-md-12 col-sm-12 thongtincanhan text-left">
                                <br>
                                <?php
                                    echo "<b>Email: </b>" .$data['loggedInUser']['email']."<br><br>";
                                    echo "<b>Điện thoại: </b>" . $data['loggedInUser']['phone']."<br><br>";
                                    // if ($_SESSION['quanhuyen'] != null){
                                    //     echo "<b>Địa chỉ: </b>" .$_SESSION['sonha']." ".$_SESSION['duong'] ." Quận " .$_SESSION['quanhuyen']. " ".$_SESSION['thanhpho']. " <br>" ;
                                    // }
                                    // else if ($_SESSION['quanhuyen'] == null){
                                    //     echo "<b>Địa chỉ: </b>" .$_SESSION['sonha']." ".$_SESSION['duong'] . " ".$_SESSION['thanhpho']. " <br>" ;
                                    // }       
                                ?>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 org_base khungphai">

                        <div class="row center-block mt-3 btn_edit" style="background-color: #EF8645; margin: auto; padding: 0px;">
                            <button type="button" class="btn btn-warning btn-block maubutton" onclick="window.location.href='<?php echo URLROOT; ?>/books/addBook'"><b class="font_color">ADD BOOK</b></button>
                        </div>

                        <!-- <div class="row center-block mt-3 btn_edit" style="background-color: #EF8645;margin: auto; padding: 0px;">
                            <button type="button" class="btn btn-warning btn-block maubutton" onclick="window.location.href='<?php echo URLROOT; ?>/blogs/addBlog'"><b class="font_color">ADD BLOG</b></button>
                        </div> -->

                        <!-- <div class="row center-block mt-3 btn_edit" style="background-color: #EF8645;margin: auto; padding: 0px;">
                            <button type="button" class="btn btn-warning btn-block maubutton" data-toggle="modal" data-target="#theodoidonhangban_moi"><b class="font_color">THEO DÕI ĐH BÁN</b></button>
                        </div> -->

                        <!-- <div class="row center-block mt-3 btn_edit" style="background-color: #EF8645;margin: auto; padding:0px;">
                            <button type="button" class="btn btn-warning btn-block maubutton" data-toggle="modal" data-target="#theodoidonhangmua_moi"><b class="font_color">THEO DÕI ĐH MUA</b></button>
                        </div> -->

                    </div>                   
                </div> 

                <div class="row mt-5 book_pos">
                    <div class="col-12">
                        <div class="center_text_html font_40px color_D2691E" style="color: #D2691E;">~ BOOKS POSTED ~</div>
                    </div>
                </div>

                
                <div style="display:flex;overflow-y: scroll;">
                <?php foreach ($data['booksPosted'] as $row) { ?>
                <div >    

                    <div style="display:flex"  >

                        <div >
                            <div class="card-100 text-center">
                                <div class="sach">
                                    <a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>">
                                    <img src="<?php echo URLROOT ?>/<?php echo $row['image'] ?>" alt="Không tìm thấy ảnh" style="width: 160px; height: 260px;">
                                    </a>
                                </div>
                                <div class="giasach"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>"><img src="<?php echo URLROOT ?>/image/shelf.png" alt="Không tìm thấy ảnh"></a></div>
                                <div class="card-body card-1">
                                    <h5 class="card-title text-center" style="height: 60px;"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>" class="mautuadechitiet"><b><?php echo $row['book_name']; ?></b></a></h5>
                                    <p class="maugia1"><b>$<?php echo number_format($row['book_price']); ?></b></p>								
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-2 col-lg-2 cotchuaiconchinhsua">
                            <a href="<?php echo URLROOT; ?>/books/editBook?id=<?php echo $row['id']; ?>&user=<?php echo $row['user_id']; ?>"><img src="<?php echo URLROOT ?>/image/edit.png" alt="Không tìm thấy ảnh" width="40" height="40" style="padding-right: 0px;"></a>
                            <a href="<?php echo URLROOT; ?>/books/deleteBook?idGroup=<?php echo $row['id']; ?>&user=<?php echo $row['user_id']; ?>" style="color:red;border:1px solid red;padding:2px;">X</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                </div>
                <!-- Tựa Đề -->
                <div class="row text-center">
                    <div class="col" id="tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu"><b> ~ BLOGS POSTED ~ </b></h1>
                    </div>
                </div>
                <!-- End Tựa Đề -->





                 <div style="display:flex;overflow-y: scroll;">
                <?php foreach ($data['blogsPosted'] as $row) { ?>
                <div >   
                    <div style="display:flex"  >
                        <div >
                            <div class="card-100 text-center">
                                <div class="sach">
                                    <a href="<?php echo URLROOT; ?>/pages/blogDetail?blogid=<?php echo $row['blog_id'];?>">
                                    <img src="<?php echo URLROOT.'/'.$row['blog_image'] ?>" alt="Không tìm thấy ảnh" style="width: 200px; height: 250px; object-fit:contain;">
                                    </a>
                                </div>
                                <h4 class = "text-center"><a href="<?php echo URLROOT; ?>/pages/blogDetail?blogid=<?php echo $row['blog_id'];?>" class="mautuadechitiet"><b><?php echo mb_strtoupper($row['blog_name']); ?></b></a></h4>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 cotchuaiconchinhsua">
                           <!-- <a href="chinhsuabaiviet.php?id='
                    .$row['Ma_bai_viet']
                    .
                    '"><img src="<?php echo URLROOT; ?>/image/edit.png" alt="Không tìm thấy ảnh" width="40" height="40" style="padding: 0px;"></a> -->
                    <!-- <button style="color:red;border:1px solid red;padding:2px;">X</button> -->
                        </div>
                    </div>
                </div>
                <?php } ?>
                </div>
        
        </section>