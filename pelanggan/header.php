            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>AL - BAROKAH</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <?php
                    echo'<li><a href="profil_pelanggan.php?username='.$_SESSION['user'].'"><img src="../images/images_pelanggan/'.$_SESSION['foto'].'" height="25px" width="25px"> '.$_SESSION['user'].'</a></li>';
                    ?>
                    <li><a href="keluar.php">Keluar</a></li>

                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Info <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Telp : </strong>089695356694</a></li>
                            <li><a href="#"><strong>E-Mail : </strong>info@yourdomain.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Alamat : </strong>
                                <div>
                                    Jln. Raya No. 15,<br />
                                    Tempeh - Kab. Lumajang
                                </div>
                            </a></li>
                        </ul>
                    </li> -->
                </ul>