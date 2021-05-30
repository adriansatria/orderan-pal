<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav<?php echo $this->uri->segment(2) == ''?'active':''?>";>
            <div class="sb-sidenav-menu-heading text-success">Home</div>
            <a class="nav-link" href="<?php echo site_url ('admin/katalog') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Katalog
            </a>
            <div class="sb-sidenav-menu-heading text-success">Core</div>
            <a class="nav-link" href="<?php echo site_url ('admin/overview') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="<?php echo site_url ('admin/user') ?>">
                <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                User
            </a> 
            <a class="nav-link" href="<?php echo site_url ('admin/customer') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Customer
            </a>
            <a class="nav-link" href="<?php echo site_url ('admin/pegawai') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Pegawai
            </a>
            <a class="nav-link" href="<?php echo site_url ('admin/barang') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Barang
            </a>
            <a class="nav-link" href="<?php echo site_url ('admin/promo') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Promo
            </a>
            <!-- <a class="nav-link" href="<?php echo site_url ('admin/detailpemb') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Detail Pembelian
            </a> -->
            <div class="sb-sidenav-menu-heading text-success">Transaksi</div>
            <a class="nav-link" href="<?php echo site_url ('admin/penyewaan') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Penyewaan
            </a>
            <a class="nav-link" href="<?php echo site_url ('admin/pembayaran') ?>">
                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                Pembayaran
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </na>
                    </div>
                </nav>
            </div>

     <div class="sb-sidenav-menu-heading text-success">Addons</div>
     <a class="nav-link" href="charts.html">
        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
        Charts

    </a>

    <a class="nav-link" href="tables.html">
        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
        Tables
    </a>
</div>
</div>
<div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    Start Bootstrap
</div>
</nav>