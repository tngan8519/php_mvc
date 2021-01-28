<?php require APPROOT . '/views/includes/header.php'; ?>

<?php require APPROOT . '/views/includes/navigation.php'; ?>

        <section>
            <div class="container" id="containerchua">            
                
                <div class="row text-center">
                    <div class="col" id="tuadesachtuongtu">
                    <h1 style="display: inline" class="mautuadechitiet" id="sachtuongtu">~ <?php echo $data['booktype'] ?> ~</h1>
                    </div>
                </div>
                    
                <div class="row p-3 hangsach">
                <?php foreach ($data['books'] as $row) { ?>
                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 p-3"> 
                                <div class="card-100 text-center">
                                    <div class="sach">
                                        <a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>">
                                            <img src="<?php echo URLROOT ?>/<?php echo $row['image'] ?>" alt="No image found" style="width: 160px; height: 260px;">
                                        </a>
                                    </div>
                                    <div class="giasach"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>"><img src="<?php echo URLROOT ?>/image/shelf.png" alt="No image found"></a></div>
                                    <div class="card-body card-100">
                                        <h5 class="card-title text-center" style="height: 60px;"><a href="<?php echo URLROOT; ?>/books/showBookDetail?id=<?php echo $row['id']; ?>" class="mautuadechitiet"><b><?php echo $row['book_name']?>
                                        </b></a></h5>
                                        <p class="maugia1"><b><?php echo '$'.number_format($row['book_price']); ?>
                                        </b></p>								
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                         
                        </div>    
       
                
                
            </div>
        </section>

