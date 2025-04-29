<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
            <i class='bx bxs-store' ></i>
                <span>Home</span>
            </a>
        </li><!-- End Home Nav -->

        <?php
        if (session()->get('role') == 'admin') {
        ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'dashboard') ? "" : "collapsed" ?>" href="dashboard">
                <i class='bx bxs-dashboard'></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Produk Nav -->
        <?php
        }
        ?>

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="produk">
            <i class='bx bxs-package'></i>
                <span>Produk</span>
            </a>
        </li><!-- End Produk Nav -->
        
        <?php
        if (session()->get('role') == 'user') {
        ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="keranjang">
                <i class='bx bxs-cart' ></i>
                    <span>Keranjang</span>
                </a>
            </li><!-- End Keranjang Nav -->
        <?php
        }
        ?>

        <?php
        if (session()->get('role') == 'admin') {
        ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'pelanggan') ? "" : "collapsed" ?>" href="pelanggan">
                <i class='bx bxs-group' ></i>
                    <span>Pelanggan</span>
                </a>
            </li><!-- End Produk Nav -->
        <?php
        }
        ?>
        
        <?php
        if (session()->get('role') == 'admin') {
        ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'stokBarang') ? "" : "collapsed" ?>" href="stokBarang">
                <i class='bx bxs-doughnut-chart'></i>
                    <span>Stok Barang</span>
                </a>
            </li><!-- End Produk Nav -->
        <?php
        }
        ?>

        <?php
        if (session()->get('role') == 'user') {
        ?>
            <li class="nav-item">
                <a class="nav-link <?php echo (uri_string() == 'riwayatPembelian') ? "" : "collapsed" ?>" href="riwayatPembelian">
                <i class='bx bx-history'></i>
                    <span>Riwayat Pembelian</span>
                </a>
            </li><!-- End Produk Nav -->
        <?php
        }
        ?>

    </ul>

</aside><!-- End Sidebar-->