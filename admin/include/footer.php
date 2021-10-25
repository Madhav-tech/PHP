<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js

" crossorigin="anonymous">
    var menu_btn = document.querySelector("#menu-btn");
    var sidebar = document.querySelector("#sidebar");
    var container = document.querySelector(".my-container");
    menu_btn.addEventListener("click", () => {
        sidebar.classList.toggle("active-nav");
        container.classList.toggle("active-cont");
    });
</script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.1/js/froala_editor.pkgd.min.js'>

</script>
<script>
    var editor = new FroalaEditor('#example');

    $("#selectAllBox").click(function($event) {
        if (this.checked) {
            $('.checkBox').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkBox').each(function() {
                this.checked = false;
            });
        }
    });

    // $("#selectAllBox").click(function() {
    //     $('input:checkbox').not(this).prop('checked', this.checked);
    // });
</script>
</body>

</html>

