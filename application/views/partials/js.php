  <?php $template = base_url() . "assets/";?>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= $template ?>js/stisla.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Template JS File -->
  <script src="<?= $template ?>js/scripts.js"></script>
  <script src="<?= $template ?>js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= $template ?>js/page/index.js"></script>

  <script type="text/javascript" src="<?= $template ?>js/DataTables/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#table_id').DataTable();
    } );
  </script>

  <script> window.setTimeout(function() { $(".alert").fadeTo(700, 0).slideUp(700, function(){ $(this).remove(); }); }, 1500); </script> 