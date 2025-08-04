<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="../IndexAdmin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Master Data</div>
                            <a class="nav-link collapsed" href="/admin/Data_Karyawan/IndexDataKaryawan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Karyawan
                            </a>
                            <a class="nav-link collapsed" href="/admin/Data_Produk/IndexDataProduk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Data Produk
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION['role']; ?>
                    </div>
                </nav>
            </div>