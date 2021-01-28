 <?php
   require APPROOT . '/views/includes/header.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

  <section style="height:auto">
            <div class="container t_show" style="color:#260a07">
                <br>
                <h1>FAQ</h1> <br><br>
                <h4 id="timkiemsach" onmouseover='this.style.cursor="pointer"' ><u>How to find books</u></h4><br>
               
                <h4 id="taotaikhoan" onmouseover='this.style.cursor="pointer"' ><u>How to create account</u></h4><br>
    
                <h4 id="khoiphucmatkhau" onmouseover='this.style.cursor="pointer"' ><u>How to reset password</u></h4> <br>
                <h4 id="themsach" onmouseover='this.style.cursor="pointer"' ><u>How to add book</u></h4><br>
                <h4 id="thembaiviet" onmouseover='this.style.cursor="pointer"' ><u>How to add blog</u></h4><br>
                <h4 id="xemthongtinsach" onmouseover='this.style.cursor="pointer"' ><u>How to edit book</u></h4><br>
                <h4 id="xemthongtinbaiviet" onmouseover='this.style.cursor="pointer"' ><u>How to edit blog</u></h4><br>
                
                <h4>Whenever you have questions, 
                    please contact <span style="font-weight:bold" >contactourbooks@gmail.com</span>
                    to get help from us.
                </h4>
                <br>
            </div>
        </section>

         <button class="btn btn-danger d_close" style="display: none">X</button>
        <div class="d_toggle1 dpopup" style="display: none;padding: 25px;">
            <h4>How to find books</h4>
            <br>
            <p>You can find books by name or type <br>
            <h6>Find by name:</h6>
            Type name of the book and then enter or click search button<br>
           
            The resutls will show <br>
           
            <h6>Find by type: </h6>
            Click on hamburger bar on the left side<br>
            Choose type of book<br>
           
            The results will show <br>
           
            </p>
        </div>

       

        <div class="d_toggle3 dpopup" style="display: none;padding: 25px;">
            <h4>How to register account</h4>
            <br>
            <p>In order to add books or add blogs, you must have an account<br>
            Click on Register button <br>
           
            Enter all of the information <br>
            </p>
        </div>

     

        <div class="d_toggle5 dpopup" style="display: none;padding: 25px;">
            <h4>How to reset password</h4>
            <br>
            <p>Go to log in page <br>
            Click on forget password <br>   
            </p>
        </div>

        <div class="d_toggle6 dpopup" style="display: none;padding: 25px;">
            <h4>How to add books</h4>
            <br>
            <p>Log in to your account <br>
            Click on your name button on the top of the page <br>
            Your personal page will show up <br>
            Click on add book button on the right of the page
            </p>
        </div>

        <div class="d_toggle7 dpopup" style="display: none;padding: 25px;">
            <h4>How to add blogs</h4>
            <br>
            <p>Log in to your account<br>
           Click on your name button on the top of the page <br>
            Your personal page will show up <br>
           Click on add blogs button on the right of the page
            </p>
        </div>

        <div class="d_toggle8 dpopup" style="display: none;padding: 25px;">
            <h4>How to edit book</h4>
            <br>
            <p>Log in to your account <br>
            Click on your name button on the top of the page <br>
            Your personal page will show up  <br>
           Choose the book and click on the edit icon on the top right of book's image
            </p>
        </div>

        <div class="d_toggle9 dpopup" style="display: none;padding: 25px;">
           <h4>How to edit blog</h4>
            <br>
            <p>Log in to your account <br>
            Click on your name button on the top of the page <br>
            Your personal page will show up  <br>
           Choose the blog and click on the edit icon on the top right of blog's image
           </p>
        </div>


        <script>
        $( document ).ready(function() {
            $(".t_show h4#timkiemsach").click(function(){
                console.log("a");
                $(".d_toggle1").show();
                $(".d_close").show();
            });
            $(".t_show h4#taotaikhoan").click(function(){
                $(".d_toggle3").show();
                $(".d_close").show();
            });
            $(".t_show h4#khoiphucmatkhau").click(function(){
                $(".d_toggle5").show();
                $(".d_close").show();
            });
            $(".t_show h4#themsach").click(function(){
                $(".d_toggle6").show();
                $(".d_close").show();
            });
            $(".t_show h4#thembaiviet").click(function(){
                $(".d_toggle7").show();
                $(".d_close").show();
            });
            $(".t_show h4#xemthongtinsach").click(function(){
                $(".d_toggle8").show();
                $(".d_close").show();
            });
            $(".t_show h4#xemthongtinbaiviet").click(function(){
                $(".d_toggle9").show();
                $(".d_close").show();
            });
            $(".d_close").click(function(){
                $(".d_toggle1").hide();
                $(".d_toggle3").hide();
                $(".d_toggle4").hide();
                $(".d_toggle5").hide();
                $(".d_toggle6").hide();
                $(".d_toggle7").hide();
                $(".d_toggle8").hide();
                $(".d_toggle9").hide();
                $(".d_close").hide();
            });
            });
        </script>