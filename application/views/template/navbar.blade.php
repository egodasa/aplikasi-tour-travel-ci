<div class="navbar-header">

                <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                    <img src="{{ base_url() }}assets/img/logo.png" alt="Obaju logo" class="hidden-xs">
                    <img src="{{ base_url() }}assets/img/logo-small.png" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="">Beranda</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="{{ base_url() }}contoh" class="dropdown-toggle">Artikel</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="{{ base_url() }}contoh/tabel" class="dropdown-toggle">Tabel</a>
                    </li>
                    
                    <li class="dropdown yamm-fw">
                        <a href="{{ base_url() }}contoh/form" class="dropdown-toggle">Form</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="/kontak.php" class="dropdown-toggle">Kontak</a>
                    </li>
                    <li class="nav-item dropdown"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">Menu <b class="caret"></b></a>
	                  <ul class="dropdown-menu">
	                    <li class="dropdown-item"><a href="/daftarPesanan.php" class="nav-link"><i class="fa fa-list"></i> Kelola Pesanan</a></li>
						<li class="dropdown-item"><a href="/kelolaUser.php" class="nav-link"><i class="fa fa-user"></i> Kelola User</a></li>
						<li class="dropdown-item"><a href="/kelolaLevelUser.php" class="nav-link"><i class="fa fa-user"></i> Kelola Level User</a></li>
						<li class="dropdown-item"><a href="/kelolaProduk.php" class="nav-link"><i class="fa fa-list"></i> Kelola Produk</a></li>
						<li class="dropdown-item"><a href="/kelolakota.php" class="nav-link"><i class="fa fa-list"></i> Kelola Kota</a></li>
						<li class="dropdown-item"><a href="/logout.php" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>

            </div>
            <!--/.nav-collapse -->
            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
                </div>

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>
