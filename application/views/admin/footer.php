
    <!-- jQuery -->
    <script src="<?= base_url()?>aset/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>aset/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url()?>aset/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url()?>aset/admin/vendor/raphael/raphael.min.js"></script>
    <script src="<?= base_url()?>aset/admin/vendor/morrisjs/morris.min.js"></script>
    <script src="<?= base_url()?>aset/admin/data/morris-data.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?= base_url()?>aset/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>aset/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url()?>aset/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url()?>aset/admin/dist/js/sb-admin-2.js"></script>


    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>