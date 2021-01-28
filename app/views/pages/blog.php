 <?php
   require APPROOT . '/views/includes/header.php';
?>
 
<?php
    require APPROOT . '/views/includes/navigation.php';
?>
<div class="row p-3">
  <?php foreach ($data['blogsFound'] as $row) { ?>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
            <div class="card-100 text-center px-2 my-4 mx-auto" style="width:400px">
                <h5 class="card-title text-center mautuadechitiet" style="width: 100%; height: 56px;"><b><?php echo mb_strtoupper($row['blog_name']); ?></b></h5>
                <div class="row">
                    <h6 class="col-4 text-left" style="color:#f2ca52"><?php echo strval(date('d/m/Y',strtotime($row['created']))); ?> 
                <h6 class="col-8 text-right" style="color:#f2ca52"> User Post: 
                </div>
                <div class="baiviet">
                    <a href="<?php echo URLROOT; ?>/pages/blogDetail?blogid=<?php echo $row['blog_id'];?>">
                        <img src="<?php echo URLROOT.'/'.$row['blog_image'] ?>" alt="Ko tìm thấy ảnh" style="max-width: 400px; max-height: 210px; vertical-align: midddle;">
                    </a>
                </div>
                <div class="card-body text-left" style="height: 140px">
                    <p><?php echo substr($row['blog_description'],0,100); ?>...</p>
                </div>
                <button type="button" class="btn btn-warning nutxemthem" style="color: white" onclick="window.location.href='<?php echo URLROOT.'/pages/blogDetail?blogid='.$row['blog_id'] ?>'">READ MORE</button> 
            </div>
        </div>
<?php } ?>
         
  </div>