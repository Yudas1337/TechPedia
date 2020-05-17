 <footer class="footer">
     © 2019 Techpedia by Yudas Malabi . All Rights Reserved
 </footer>
 <!-- ============================================================== -->
 <!-- End footer -->
 <!-- ============================================================== -->
 </div>
 <!-- ============================================================== -->
 <!-- End Wrapper -->
 <!-- ============================================================== -->
 <!-- ============================================================== -->
 <!-- All Jquery -->
 <!-- ============================================================== -->
 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/jquery/jquery-3.2.1.min.js') ?>"></script>
 <!-- Bootstrap popper Core JavaScript -->
 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/popper/popper.min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
 <!-- slimscrollbar scrollbar JavaScript -->
 <script src="<?= $init->base_url('UserDashboard/assets/dist/js/perfect-scrollbar.jquery.min.js') ?>"></script>
 <!--Wave Effects -->
 <script src="<?= $init->base_url('UserDashboard/assets/dist/js/waves.js') ?>"></script>
 <!--Menu sidebar -->
 <script src="<?= $init->base_url('UserDashboard/assets/dist/js/sidebarmenu.js') ?>"></script>
 <!--Custom JavaScript -->
 <script src="<?= $init->base_url('UserDashboard/assets/dist/js/custom.min.js') ?>"></script>
 <!-- ============================================================== -->
 <!-- This page plugins -->
 <!-- ============================================================== -->
 <!--morris JavaScript -->
 <script src=".<?= $init->base_url('UserDashboard/assets/node_modules/raphael/raphael-min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/morrisjs/morris.min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') ?>"></script>
 <!-- Chart JS -->
 <script src="<?= $init->base_url('UserDashboard/assets/dist/js/dashboard1.js') ?>"></script>

 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') ?>"></script>


 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') ?>"></script>


 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') ?>"></script>


 <script src="<?= $init->base_url('UserDashboard/assets/ckeditor/ckeditor.js'); ?>"></script>

 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js') ?>"></script>
 <!-- start - This is for export functionality only -->
 <script src="<?= $init->base_url('UserDashboard/assets/buttons/1.5.1/js/dataTables.buttons.min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/buttons/1.5.1/js/buttons.flash.min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/ajax/libs/jszip/3.1.3/jszip.min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/ajax/libs/pdfmake/0.1.32/pdfmake.min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/ajax/libs/pdfmake/0.1.32/vfs_fonts.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/buttons/1.5.1/js/buttons.html5.min.js') ?>"></script>
 <script src="<?= $init->base_url('UserDashboard/assets/buttons/1.5.1/js/buttons.print.min.js') ?>"></script>


 <script type="text/javascript" src="<?= $init->base_url('UserDashboard/assets/js/sweetalert.min.js') ?>"></script>



 <script>
     $('.sweetalertNya').click(function(e) {

         e.preventDefault();
         const href = $(this).attr('href');

         swal({
                 title: "Apa Anda Yakin Akan Logout?",
                 text: "Saat logout , Sesi anda akan berakhir dan anda harus login ulang!",
                 icon: "warning",
                 buttons: {
                     confirm: 'Logout',
                     cancel: 'Batal'
                 },
                 dangerMode: true,
             })
             .then((willDelete) => {
                 if (willDelete) {
                     swal({
                         title: "Pwnz!",
                         text: "Berhasil Logout",
                         icon: "success",
                     }).then((redirect) => {
                         document.location.href = href
                     });
                 }
             });


     });
 </script>
 <script>
     $(function() {
         $('#myTable').DataTable();
         var table = $('#example').DataTable({
             "columnDefs": [{
                 "visible": false,
                 "targets": 2
             }],
             "order": [
                 [2, 'asc']
             ],
             "displayLength": 25,
             "drawCallback": function(settings) {
                 var api = this.api();
                 var rows = api.rows({
                     page: 'current'
                 }).nodes();
                 var last = null;
                 api.column(2, {
                     page: 'current'
                 }).data().each(function(group, i) {
                     if (last !== group) {
                         $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                         last = group;
                     }
                 });
             }
         });
         // Order by the grouping
         $('#example tbody').on('click', 'tr.group', function() {
             var currentOrder = table.order()[0];
             if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                 table.order([2, 'desc']).draw();
             } else {
                 table.order([2, 'asc']).draw();
             }
         });
         // responsive table
         $('#config-table').DataTable({
             responsive: true
         });
         $('#example23').DataTable({
             dom: 'Bfrtip',
             buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
             ]
         });
         $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
     });
 </script>

 </body>


 </html>