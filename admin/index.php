<!--  -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Bilik Foto</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">WELCOME !</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Booking</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>User</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Default Bootstrap Modal</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">...</div>
                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div>
                        </div>
                    </div>
                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Button trigger modal -->

                    <!-- Modal -->


                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-2 text-gray-800">DATA Booking</h1>
                        <!-- <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modal-add"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Product</button> -->
                    </div>
                    <!-- Page Heading -->
                    <?php
                    if (isset($_GET['alert'])) {
                        if ($_GET['alert'] == 'gagal') {
                    ?>
                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                                Ekstensi Tidak Diperbolehkan
                            </div>
                        <?php
                        } elseif ($_GET['alert'] == "berhasil") {
                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                Berhasil Disimpan
                            </div>
                        <?php
                        } elseif ($_GET['alert'] == "berhasilupdate") {
                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                Berhasil Update
                            </div>
                        <?php
                        } elseif ($_GET['alert'] == "berhasilhapus") {
                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                Berhasil Hapus
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <form action="add_product.php" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Tambah Booking</h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" required="required" class="form-control " placeholder="Masukkan Nama Product ..">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" name="harga" required="required" class="form-control " placeholder="Masukkan Harga ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Rating</label>
                                            <input type="number" name="rating" required="required" class="form-control" placeholder="Masukkan Rating ..">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <input type="text" name="deskripsi" required="required" class="form-control" placeholder="Masukkan Deskripsi ..">
                                        </div>
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="number" name="stok" required="required" class="form-control" placeholder="Masukkan Stok ..">
                                        </div>
                                        <div class="form-group">
                                            <label>Ukuran</label>
                                            <input type="text" name="ukuran" required="required" class="form-control" placeholder="Masukkan Ukuran ..">
                                        </div>
                                        <div class="form-group">
                                            <label>FOto</label>
                                            <input type="file" name="foto" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">

                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Jam Booking</th>
                                            <th>Status</th>
                                            <th>Note</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'koneksi.php';
                                        $nomor = 1;

                                        // Query untuk mengambil data dari tabel tbl_booking dan user
                                        $query = "
                                            SELECT 
                                                b.id, 
                                                u.name AS nama_user, 
                                                u.no_hp, 
                                                b.booking_datetime AS jam_booking, 
                                                b.status, 
                                                b.note 
                                            FROM 
                                                tbl_booking b
                                            JOIN 
                                                users u 
                                            ON 
                                                b.user_id = u.id
                                        ";
                                        $data = mysqli_query($koneksi, $query);

                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr class="text-center p-5">
                                                <td><?= $nomor++; ?></td>
                                                <td><?= htmlspecialchars($d['nama_user']); ?></td>
                                                <td><?= htmlspecialchars($d['no_hp']); ?></td>
                                                <td><?= date('l, d F Y H:i', strtotime($d['jam_booking'])); ?></td>
                                                <td class="p-2">
                                                    <span
                                                        class="<?php
                                                                if ($d['status'] == 'pending') echo 'bg-warning text-white';
                                                                elseif ($d['status'] == 'confirmed') echo 'bg-success text-white';
                                                                elseif ($d['status'] == 'cancelled') echo 'bg-danger text-white';
                                                                else echo 'bg-secondary text-white';
                                                                ?>"
                                                        style="padding: 5px; border-radius: 5px;">
                                                        <?= htmlspecialchars($d['status']); ?>
                                                    </span>
                                                </td>
                                                <td><?= htmlspecialchars($d['note']); ?></td>
                                                <td>
                                                    <!-- <button class="btn" data-bs-toggle="modal" data-bs-target="#modal-edit<?php echo $d['id'] ?>"><i class="fas fa-sm fa-edit text-warning"></i></button> -->
                                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#modal-hapus<?php echo $d['id'] ?>"><i class="fas fa-trash text-danger"></i></button>
                                                </td>
                                            </tr>

                                            <!-- <form action="edit_product.php" method="post" enctype="multipart/form-data">
                                                <div class="modal fade" id="modal-edit<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Edit Siswa</h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label>Nama</label>
                                                                    <input type="text" name="nama" required="required" class="form-control " placeholder="Masukkan Nama Siswa .." value="<?= $d['nama']; ?>">
                                                                    <input type="hidden" name="id" required="required" class="form-control " placeholder="Masukkan Nama Siswa .." value="<?= $d['id']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Harga</label>
                                                                    <input type="text" name="harga" required="required" class="form-control " placeholder="Masukkan Harga ..." value="<?= $d['harga']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Rating</label>
                                                                    <input type="number" name="rating" required="required" class="form-control" placeholder="Masukkan Rating .." value="<?= $d['rating']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi</label>
                                                                    <input type="text" name="deskripsi" required="required" class="form-control" placeholder="Masukkan Deskripsi .." value="<?= $d['deskripsi']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Stok</label>
                                                                    <input type="number" name="stok" required="required" class="form-control" placeholder="Masukkan Stok .." value="<?= $d['stok']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Ukuran</label>
                                                                    <input type="text" name="ukuran" required="required" class="form-control" placeholder="Masukkan Ukuran .." value="<?= $d['ukuran']; ?>">
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> -->

                                            <div class="modal fade" id="modal-hapus<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Yakin akan menghapus Product ?</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <a class="btn btn-primary" href="hapus_booking.php?id=<?php echo $d['id'] ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>