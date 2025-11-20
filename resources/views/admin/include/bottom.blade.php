<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="{{ asset('public/assets/admin/js/jquery-1.10.2.js') }}"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('public/assets/admin/js/bootstrap.js') }}"></script>
<!-- METISMENU SCRIPTS -->
<script src="{{ asset('public/assets/admin/js/jquery.metisMenu.js') }}"></script>
  <!-- CUSTOM SCRIPTS -->
<script src="{{ asset('public/assets/admin/js/custom.js') }}"></script>

<!-- Data Table -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>   

    function confirmSubmit(msg=''){
        return confirm(msg)? true : false ;
    }

    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ( (charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }
    $(document).ready(function(){
        $(".auto-close").fadeTo(2000, 500).slideUp(5000, function(){
          $(".auto-close").slideUp(5000);
        });
    });
    
</script>
