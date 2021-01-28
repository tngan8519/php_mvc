<?php
   require APPROOT . '/views/includes/header.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

        <section>
            <div class="container">

                <div class="row chieucao">

                    <!-- Begin Slider -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?php
                        require APPROOT . '/views/includes/slider.php';
                        ?>
                    </div>
                    <!-- End Slider -->

                </div>
                <br>
                <br>
                
                <div class="row text-center">
                    <div class="col tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet sachtuongtu"><b> ~ HOT BOOKS ~ </b></h1>
                    </div>
                </div>
                

                <div class="row p-3 hangsach">
                 <?php foreach ($data['cheapbooks'] as $row) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">  
                        <div class="card-100 text-center">
                            <div class="sach"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>"><img src="<?php echo URLROOT ?>/<?php echo $row['image'] ?>" alt="Image Not Found" style="width: 160px; height: 260px;"></a></div>
                            <div class="giasach"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>"><img src="<?php echo URLROOT ?>/image/shelf.png" alt="Image Not Found"></a></div>
                            <div class="card-body card-1">
                                <h5 class="card-title text-center" style="height: 60px;"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>" class="mautuadechitiet"><b><?php echo $row['book_name']; ?></b></a></h5>
                                <p class="maugia1"><b>$<?php echo number_format($row['book_price']); ?></b></p>								
                            </div>
                        </div>
                    </div>
                <?php }?>
                </div>

                
                <div class="row text-center">
                    <div class="col tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet sachtuongtu"><b> ~ NEW BOOKS ~ </b></h1>
                    </div>
                </div>
                

                <div class="row p-3 hangsach">
                <?php foreach ($data['hotbooks'] as $row) { ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3">  
                        <div class="card-100 text-center">
                            <div class="sach"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>"><img src="<?php echo URLROOT ?>/<?php echo $row['image'] ?>" alt="Image Not Found" style="width: 160px; height: 260px;"></a></div>
                            <div class="giasach"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>"><img src="<?php echo URLROOT ?>/image/shelf.png" alt="Image Not Found"></a></div>
                            <div class="card-body card-1">
                                <h5 class="card-title text-center" style="height: 60px;"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>" class="mautuadechitiet"><b><?php echo $row['book_name']; ?></b></a></h5>
                                <p class="maugia1"><b>$<?php echo number_format($row['book_price']); ?></b></p>								
                            </div>
                        </div>
                    </div>
                <?php }?>

                  
                </div>

                
                <div class="row text-center">
                    <div class="col tuadesachtuongtu">
                        <h1 style="display: inline" class="mautuadechitiet sachtuongtu"><b> ~ NEW BLOGS ~ </b></h1>
                    </div>
                </div>
                

                <div class="row p-3">
                 <?php foreach ($data['newblogs'] as $row) { ?>
                     <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 p-3"> 
                        <div class="baiviet" style="text-align: center; width: 320px; height: 210px">
                             <a href="<?php echo URLROOT; ?>/pages/blogDetail?blogid=<?php echo $row['blog_id'];?>">
                                <img src="<?php echo URLROOT.'/'.$row['blog_image'] ?>" alt="Ko tìm thấy ảnh" style="max-width: 300px; max-height: 180px">
                            </a>
                            <h4 class = "text-center"><a href="<?php echo URLROOT; ?>/pages/blogDetail?blogid=<?php echo $row['blog_id'];?>" class="mautuadechitiet">
                            <b><?php echo mb_strtoupper($row['blog_name']); ?></b></a></h4>
                        </div>						
                    </div>
                <?php }?>
                  
                </div>
            </div>
        </section>

