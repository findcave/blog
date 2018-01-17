</main>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
            <script src="<?php echo base_url() . 'public/js/slugify.js'; ?>" type="text/javascript"></script>
            <script>

                var succ = '<?php echo $this->session->flashdata('toast_success') ;?>';
                if(succ != "") {
                    toastr.success(succ,{timeOut: 700,preventDuplicates: true, positionClass:'toast-top-right'});
                }

                var err= '<?php echo $this->session->flashdata('toast_error') ;?>';
                if(err != "") {
                    toastr.success(err,{timeOut: 700,preventDuplicates: true, positionClass:'toast-top-right'});
                }
            </script>

</body>
</html>
