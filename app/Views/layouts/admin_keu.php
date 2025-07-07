<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>DASHBOARD KEUANGAN</title>
        <!-- Custom fonts for this template-->
        <link href="<?= base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

        <?= $this->renderSection('styles') ?>

        <style>
            footer.sticky-footer {
                position: fixed;
                bottom: 0;
                left: 50;
                width: 85%;
                border-top: 0px solid #e3e6f0; 
                padding: 15px 0; 
                justify-content: center; 
                align-items: center; 
            }
        </style>

    </head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Sidebar -->
            <?= $this->include('layouts/components/sidebar_keu') ?>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <?= $this->include('layouts/components/topbar_keu') ?>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <?= $this->renderSection('content') ?>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <!-- <footer class="sticky-footer bg-white"> 
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; PT. Beverly International <?= Date('Y') ?></span>
                        </div>
                    </div>
                </footer> -->
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="/logout_ac">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

        <script>       
          $(document).ready(function(){
            load_dt_user();
          });

          function load_dt_user(){
            $('#dt_user').DataTable({ 
                ajax : {
                    url : '/dt_user',
                    dataSrc: '',
                },
                columns: [  
                            { data: 'id_user' },
                            { data: 'first_name' },
                            { data: 'last_name' },
                            { data: 'email_user' },                
                            { data: 'pass_user' },
                        ],
                dom : 'lBfrtip',
                buttons: [{
                            extend: 'excelHtml5',
                            text: 'Export to Excel',
        			title: 'data user',
        			 download: 'open',
        			 orientation:'landscape',
        			  exportOptions: {
        			  columns: ':visible'
        			}
                         }]
            });
          }
    </script>

        <?= $this->renderSection('scripts') ?>
    </body>
</html>