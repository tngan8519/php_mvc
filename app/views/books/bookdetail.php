<?php require APPROOT . '/views/includes/header.php'; ?>

<?php require APPROOT . '/views/includes/navigation.php'; ?>



  <section>
            <div class="container padding" id="containerchua">

                <div class="row" id="khungchuagiua">

                    <!-- Begin Slider -->
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12" id="khungchuaslide">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block" src="<?php echo URLROOT ?>/<?php echo $data['book']['image']; ?>" alt="First slide" height="360px" width="100%">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block" src="<?php echo URLROOT ?>/<?php echo $data['book']['image_detail1']; ?>" alt="Second slide" height="360px" width="100%">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block" src="<?php echo URLROOT ?>/<?php echo $data['book']['image_detail2']; ?>" alt="Third slide" height="360px" width="100%">
                              </div>
                            </div>
                            <div class="carousel-indicators">
                                <div data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="width: 33%;">
                                    <img class="d-block" src="<?php echo URLROOT ?>/<?php echo $data['book']['image']; ?>" alt="First slide" height="100px" width="100%" style="margin: 0px; float: left;">
                                </div>

                                <div data-target="#carouselExampleIndicators" data-slide-to="1" style="width: 33%;">
                                    <img class="d-block" src="<?php echo URLROOT ?>/<?php echo $data['book']['image_detail1']; ?>" alt="First slide" height="100px" width="100%" style="margin: 0px; float: left;">
                                </div>

                                <div data-target="#carouselExampleIndicators" data-slide-to="2" style="width: 33%;">
                                    <img class="d-block" src="<?php echo URLROOT ?>/<?php echo $data['book']['image_detail2']; ?>" alt="First slide" height="100px" width="100%" style="margin: 0px; float: left;">
                                </div>

                                <div style="clear: both;"></div>            
                            </div>

                          </div>
                                
                    </div>
                    <!-- End Slider -->

                    <!-- Begin Nội Dung Sách -->
                    <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">

                        <div class="row" id="tuadesach">
                            <img src="<?php echo URLROOT ?>/image/codanhdau.png" alt="No image found" id="danhdau">
                            <p class="mautuade" id="tensachdacbiet" style="width: 90%; font-size: 51px;"><b><?php echo $data['book']['book_name']; ?></b></p>
                        </div>

                        <div class="row" id="hangnoidung1">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                                <h4 class="mautacgia canhgiua cochudidong">
                                    Tác giả: <?php echo $data['book']['author']; ?>
                                </h4>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                                <h4 class="mautheloai canhgiua cochudidong" id="theloaisach">
                                    Thể loại: <?php echo $data['type']; ?>
                                </h4>
                            </div>

                        </div>

                        <div class="row" id="hangnoidung2">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                                <h5 class="canhgiua cochudidong" id="nguoidang">
                                    Người đăng: <?php echo $data['user']; ?>
                                </h5>
                            </div>
                
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-center">
                            </div>
                                        
                        </div>

                        <div class="row text-center" id="hangnoidung3" >

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <p class="maugia" id="cochugia"><b>$ <?php echo number_format($data['book']['book_price']);  ?></b></p>
                            </div>

                            <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                <button type="button" class="btn btn-danger maunutchonmua canhgiua" id="chonmua">ADD TO CART</button>
                            </div> -->

                            <!-- pop-up đặt mua -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog" id="khungchuapopup_sach">
                              
                                  <div class="modal-content" id="popupdonhang_sach">
                                    <div class="modal-header">
                                      <h4 class="modal-title">ORDER INFORMATION</h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php
                                            // include('xulydonhang.php');
                                        ?>
                                        <form action="ketquadonhang.php" method="POST" id="formhoadon">
                                            <div class="form-group text-left">
                                                <label class="kichcochuID" for="idnguoiban"><b>ID người bán</b></label>
                                                <input type="text" style="display: inline;" class="form-control" name="idnguoiban" id="idnguoiban" value="<?php echo $idnguoiban; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <input type="text" style="display: inline;" class="form-control" name="tennguoiban" id="tennguoiban" placeholder="Họ Tên" value="<?php echo $hoten_nguoiban; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="nhanguoiban" id="nhanguoiban" placeholder="Số Nhà" value="<?php echo $sonha_nguoiban; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="duongnguoiban" id="duongnguoiban" placeholder="Đường" value="<?php echo $duong_nguoiban; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <input type="text" style="display: inline;" class="form-control" name="sdtnguoiban" id="sdtnguoiban" placeholder="Số điện thoại" value="<?php echo $sdt_nguoiban; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="xanguoiban" id="xanguoiban" placeholder="Quận/Huyện" value="<?php echo $quanhuyen_nguoiban; ?>" readonly="readonly">
                                                <select style="display: inline;" class="form-control" name="tinhnguoiban" id="tinhnguoiban" disabled>
                                                    <option><?php echo $thanhpho_nguoiban; ?></option>
                                                    <?php
                                                        $sql = "SELECT * FROM tinhthanhpho WHERE ten_tp <> '" . $thanhpho_nguoiban . "'";
                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0)
                                                        {
                                                            while($row = mysqli_fetch_array($result)) {
                                                                echo
                                                                '
                                                                <option>'
                                                                . $row['ten_tp']
                                                                .
                                                                '</option>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </select>
                                            </div>
    
                                            <div class="form-group text-left">
                                                <label class="kichcochuID" for="idnguoimua"><b>ID người mua</b></label>
                                                <input type="text" style="display: inline;" class="form-control" name="idnguoimua" id="idnguoimua" value="<?php echo $idnguoimua; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <input type="text" style="display: inline;" class="form-control" name="tennguoimua" id="tennguoimua" placeholder="Họ Tên" value="<?php echo $hoten_nguoimua; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="nhanguoimua" id="nhanguoimua" placeholder="Số Nhà" value="<?php echo $sonha_nguoimua; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="duongnguoimua" id="duongnguoimua" placeholder="Đường" value="<?php echo $duong_nguoimua; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <input type="text" style="display: inline;" class="form-control" name="sdtnguoimua" id="sdtnguoimua" placeholder="Số điện thoại" value="<?php echo $sdt_nguoimua; ?>" readonly="readonly">
                                                <input type="text" style="display: inline;" class="form-control" name="xanguoimua" id="xanguoimua" placeholder="Quận/Huyện" value="<?php echo $quanhuyen_nguoimua; ?>" readonly="readonly">
                                                <select style="display: inline;" class="form-control" name="tinhnguoimua" id="tinhnguoimua" disabled>
                                                    <option><?php echo $thanhpho_nguoimua; ?></option>
                                                    <?php
                                                        $sql = "SELECT * FROM tinhthanhpho WHERE ten_tp <> '" . $thanhpho_nguoimua . "'";
                                                        $result = mysqli_query($conn, $sql);

                                                        if (mysqli_num_rows($result) > 0)
                                                        {
                                                            while($row = mysqli_fetch_array($result)) {
                                                                echo
                                                                '
                                                                <option>'
                                                                . $row['ten_tp']
                                                                .
                                                                '</option>
                                                                ';
                                                            }
                                                        }
                                                    
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group text-left">
                                                <label class="kichcochuID" for="iddonhang"><b>ID đơn hàng</b></label>
                                                <input type="text" style="display: inline;" class="form-control" name="iddonhang" id="iddonhang" value="<?php echo $idhoadon; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <label for="thanhtoan">Hình thức thanh toán</label>
                                                <select class="form-control" name="thanhtoan" id="thanhtoan" style="display: inline;" disabled>
                                                    <option selected="selected">Thanh toán bằng tiền mặt khi nhận hàng</option>
                                                </select>
                                                <label id="labelidsach" for="idsach">ID Sách</label>
                                                <input type="text" style="display: inline;" class="form-control" name="idsach" id="idsach" value="<?php echo $idsach; ?>" readonly="readonly">
                                            </div>

                                            <div class="form-group text-left">
                                                <label id="labelngaydathang" for="ngaydathang">Ngày đặt hàng</label>
                                                <input type="date" style="display: inline;" class="form-control" name="ngaydathang" id="ngaydathang" value="<?php echo $ngaydathang; ?>" readonly="readonly">
                                                <label id="labeltensach" for="tensach_1">Tên sách</label>
                                                <input type="text" style="display: inline;" class="form-control" name="tensach" id="tensach_1" value="<?php echo $tensach; ?>" readonly="readonly">
                                            </div>

                                            <div class="row chinhhangpopup" id="hangcuoicung">

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="cotghichu">

                                                    <div class="form-group text-left">
                                                        <label for="ghichu">Ghi chú</label><br>
                                                        <textarea cols="40" rows="5" class="form-control" name="ghichu" id="ghichu" readonly="readonly"></textarea>
                                                    </div>

                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="cotchuadongia">

                                                    <div class="form-group text-left">
                                                        <label class="labeldongia" for="dongia">Đơn giá</label>
                                                        <input type="text" name="dongia" id="dongia" style="display: inline;" class="form-control" value="<?php echo $giasach; ?>" readonly="readonly">
                                                        đồng
                                                    </div>

                                                    <div class="form-group text-left">
                                                        <label class="labeldongia" for="phivanchuyen">Phí vận chuyển</label>
                                                        <input type="text" name="phivanchuyen" id="phivanchuyen" style="display: inline;" class="form-control"  readonly="readonly">
                                                        đồng    
                                                    </div>

                                                    <div class="form-group text-left">
                                                        <label class="labeldongia" for="tongcong">Tổng Cộng</label>
                                                        <input type="text" name="tongcong" id="tongcong" style="display: inline;" class="form-control" readonly="readonly">
                                                        đồng        
                                                    </div>

                                                </div>

                                            </div>
    
                                            <div class="row">

                                                <div class="col">

                                                    <div class="form-group text-left">

                                                        <button type="button" name="chinhsua" class="btn" id="nutchinhsua"><img id="anhnutchinhsua" src="./image/edit.png" alt="Image Not Found"></button>
                                                        <button type="button" name="huy" id="nutpopup_1" data-dismiss="modal" class="btn btn-primary" ><b>HỦY</b></button>
                                                        <button type="button" name="xacnhan" id="nutpopup_2" class="btn btn-primary"><b>XÁC NHẬN</b></button>
                                                                
                                                    </div>
                
                                                </div>

                                            </div>
                                        </form>

                                    </div>
                                  </div>
                              
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <p class="mautuade1 canhgiua"><b>DESCRIPTION</b></p>
                                <p class="canhgiua" id="noidungmotasach">
                                    <?php
                                        echo $data['book']['descriptions'];
                                    ?>
                                </p>
                            </div>
                        </div>
                            
                    </div>
                    <!-- End Nội Dung Sách -->

                </div>
                <br>
                <br>
                <!-- Tựa Đề -->
                <div class="row text-center">

                    <div class="col" id="tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu"><b> ~ SIMILAR BOOKS ~ </b></h1>
                    </div>

                </div>
                <!-- End Tựa Đề -->

                <div class="row p-3" id="hangsach">
            <?php foreach ($data['similar'] as $row) { ?>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">
                        
            <div class="card-100 text-center">
                <div class="sach"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>"><img src="<?php echo URLROOT ?>/<?php echo $row['image'] ?>" alt="No image found" style="width: 160px; height: 260px;"></a></div>
                <div class="giasach"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>"><img src="<?php echo URLROOT ?>/image/shelf.png" alt="No image found"></a></div>
                <div class="card-body card-1">
                    <h5 class="card-title text-center" style="height: 60px;"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>" class="mautuadechitiet"><b><?php echo $row['book_name']; ?></b></a></h5>
                    <p class="maugia1"><b>$<?php echo number_format($row['book_price']); ?></b></p>								
                </div>

            </div>
                
        </div>
             <?php } ?>
                </div>
            </div>
        </section>
