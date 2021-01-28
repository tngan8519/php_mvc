<?php
   require APPROOT . '/views/includes/header.php';
?>

<?php
    require APPROOT . '/views/includes/navigation.php';
?>

 <section>
        <?php
            require APPROOT . '/views/includes/admin_nav.php';
        ?>
    </section>

     <script type="text/javascript">
        var buttons = document.getElementsByClassName('tablinks');
        var contents = document.getElementsByClassName('tabcontent');
        function showContent(id) {
            for (var i = 0; i < contents.length; i++) {
                contents[i].style.display = 'none';
            }
            var content = document.getElementById(id);
            content.style.display = 'block';
        }
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener("click", function () {
                var id = this.textContent;
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].classList.remove("active");
                }
                this.className += " active";
                showContent(id);
            });
        }
        showContent('PHP');
    </script>
<?php
    require APPROOT . '/views/includes/footer.php';
?>