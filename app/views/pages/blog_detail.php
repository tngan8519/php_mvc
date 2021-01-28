<?php require APPROOT . '/views/includes/header.php'; ?>

<?php require APPROOT . '/views/includes/navigation.php'; ?>

        <section>
            <div class="container" id="containerchua">

                <div class="row" id="hinhnenchitietbaiviet">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="row" id="hangtieudetomtat">

                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">

                                <div class="row bopadding" id="hangtieudebaiviet">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 bopadding text-center">
                                        <h1 class="mautuadechitiet text-center" id="tieudebaivietchitiet"><b><?php echo $data['blog']['blog_name']; ?></b></h1>
                                    </div>
                                </div>

                                <div class="row text-center" id="chinhthongtinbaiviet">

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <p class="mauchobaiviet" style="font-size: 19px">
                                            <b>Ngày đăng: <?php echo strval(date('d/m/Y', strtotime($data['blog']['created']))); ?> </b>
                                        </p>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                        <p class="mauchobaiviet" style="font-size: 19px">
                                            <b>Người đăng: <?php echo $data['user']; ?> </b>
                                        </p>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 text-center" id="cotchuaanh">
                                <img src="<?php echo URLROOT.'/'.$data['blog']['blog_image']; ?>" alt="Image Not Found" id="hinhanhbaivietchitiet" style="max-width: 90%; max-height: 250px;">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >

                                <p id="noidungbaivietchitiet" style="font-size: 16.5px">
                                    <?php echo $data['blog']['blog_description']; ?>
                                </p>

                            </div>


                        </div>

                    </div>

                </div>
                <br>
                <br>
            </div>

            <div class="container">

                <!-- Tựa Đề -->
                <div class="row text-center">
                    <div class="col" id="tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu"><b> ~ SIMILAR BLOGS ~ </b></h1>
                    </div>
                </div>
                <!-- End Tựa Đề -->
                <?php ?>

                <div class="row p-3">
                <?php foreach ($data['similar'] as $row) { ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-3">
                                    <div class="baiviet text-center">
                                        <a href="<?php echo URLROOT; ?>/pages/blogDetail?blogid=<?php echo $row['blog_id'];?>">
                                            <img src="<?php echo URLROOT.'/'.$row['blog_image']; ?>" alt="Image Not Found" style="max-width: 400px; max-height: 210px; vertical-align: midddle;">
                                        </a>
                                        <h4 class = "text-center"><a href="<?php echo URLROOT; ?>/pages/blogDetail?blogid=<?php echo $row['blog_id'];?>" class="mautuadechitiet"><b><?php echo $row['blog_name']; ?></b></a></h4>
                                    </div>
                                </div>
                <?php } ?>
                </div>
                
                    
                
            </div>
        </section>