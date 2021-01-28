<div class="container-fluid background" id="hangheader">
    <div class="row height100" id="hanglogo">
                
        <div class="col-xl-1 col-lg-1 col-md-3 col-sm-3 col-3 text-center">
            <img src="<?php echo URLROOT ?>/image/logo.png" id="logo" alt="Image Not Found">
        </div>
    
        <div class="col-xl-7 col-lg-6 col-md-9 col-sm-9 col-9">
            <h1 class="mauchu" id="tieude"><b>OURBOOKS</b></h1>
        </div>

        <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12">
            <button class="btn nutdangnhap maunen chunutlon">
                <a style="color: white; text-decoration: none;">
                <?php if(!isset($_SESSION['firstname'])) : ?>
                    <a href="<?php echo URLROOT; ?>/users/register">Register</a>
                <?php  elseif ($_SESSION['firstname'] == 'admin') : ?>
                    <a href="<?php echo URLROOT; ?>/users/admin">Admin Page</a>
                <?php  else  : ?>
                    <a href="<?php echo URLROOT; ?>/users/personal">Hello <?php echo $_SESSION['firstname'];?></a>
                <?php endif; ?>

                </a
            ></button>
            <button class="btn nutdangnhap maunen chunutlon">
                <a style="color: white; text-decoration: none;">
                <?php if(isset($_SESSION['firstname'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
                <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
                <?php endif; ?>
                </a>
            </button>
        </div>
    
    </div>
    
    <div class="row height100" id="hangmenu">
                
        <!-- Begin Menu Button -->
        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1" id="cotmenu">
            <div class = "text-right">
                <button class="btn btn-outline-light w-50" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bars fa-2x" style="color: #f48225"></i>
                </button>            

                <div class="dropdown-menu menudropdown" aria-labelledby="dropdownMenuButton">
                    <?php foreach ($data['booktypes'] as $row) { ?>
                        <a class="dropdown-item maunen" href="<?php echo URLROOT; ?>/books/filterTypeBook?typeid=<?php echo $row['type_id']?>"><?php echo $row['type_name']; ?></a>
                    <?php } ?>
                </div>
            </div>
                                        
        </div>
        <!-- End Menu Button -->

        <!-- Begin Search Bar -->
        <div class="col-xl-6 col-lg-6 col-md-11 col-sm-11 col-11" id="cottimkiem">

            <form class="form-inline w-100" id="otimkiem" action="<?php echo URLROOT; ?>/pages/search" method="get">
                <input class="form-control" id="otextsearch" type="text" placeholder="Find books" aria-label="Search" name="search" value="<?php 
                echo array_key_exists('keywordSearch',$data) ? $data['keywordSearch'] : '' 
                ?>">
                <button class="btn btn-outline-dark" id="iconsearch">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </button>
            </form>                        
        </div>
        <!-- End Search Bar -->
    
        <!-- Begin Navigation Bar -->
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12" id="cotdieuhuong">

            <nav class="navbar navbar-expand-lg" id="thanhdieuhuong">
                <div class="collapse navbar-collapse" id="collapsedieuhuong">
                    <ul class="navbar-nav" id="danhsachlink">
                        <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu">
                            <a class="nav-link text-dark" href="<?php echo URLROOT; ?>"><b class="menudidong">HOME</b></a>
                        </li>
                        <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu_2">
                            <a class="nav-link text-light" href="<?php echo URLROOT; ?>/pages/blog"><b class="menudidong">BLOGS</b></a>
                        </li>
                        <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu_3">
                            <a class="nav-link text-light" href="<?php echo URLROOT; ?>/pages/support"><b class="menudidong">SUPPORT</b></a>
                        </li>
                        <!-- <li class="nav-item btn-primary kichthuocmenu text-center" id="trangchu_4">
                            <a class="nav-link text-light" href="trangcanhan.php"><b class="menudidong">TÀI KHOẢN</b></a>
                        </li> -->
                    </ul>
                </div>                            
                        
                <div class="text-right right-block" id="nutmenudidong">
                    <button class="btn btn-outline-light" type="button" id="thanhgach" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars fa-2x" style="color: #f48225;"></i>
                    </button>            

                    <div class="dropdown-menu menudropdown" aria-labelledby="thanhgach">
                        <a class="dropdown-item text-dark" href="<?php echo URLROOT; ?>/index" id="trangchu_5">HOME</a>
                        <a class="dropdown-item text-light" href="trangbaiviet.php" id="trangchu_7">BLOGS</a>
                        <a class="dropdown-item text-light" href="trangtrogiup.php" id="trangchu_8">SUPPORT</a>
                        <!-- <a class="dropdown-item text-light" href="trangcanhan.php" id="trangchu_9">Tài khoản</a> -->
                    </div>
                </div>

            </nav>
        </div>
        <!-- End Navigation Bar -->
    
    </div>
            
</div>
