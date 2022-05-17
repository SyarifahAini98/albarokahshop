<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Al - Barokah Shop</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "al_barokah_shop"); 
    ?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><strong>AL - BAROKAH</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="masuk.php">Masuk</a></li>
                    <li><a href="daftar.php">Daftar</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Info <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Telp: </strong>+09-456-567-890</a></li>
                            <li><a href="#"><strong>E-Mail: </strong>info@yourdomain.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Alamat: </strong>
                                <div>
                                    Jln. Raya No. 15,<br />
                                    Tempeh - Kab. Lumajang
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Cari Produk..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="col-md-3">
        <div>
            <a href="#" class="list-group-item active">Kategori</a>
            <ul class="list-group">
                <li class="list-group-item"><a href="kategori_alat_musik.php"><i class="fa fa-boxes"></i>Alat Musik</a>
                    <span class="label label-primary pull-right">234</span>
                </li>
                <li class="list-group-item"><a href="kategori_alat_pancing.php">Alat Pancing</a>
                    <span class="label label-success pull-right">34</span>
                </li>
                <li class="list-group-item"><a href="kategori_alat_olahraga.php">Alat Olahraga</a>
                    <span class="label label-danger pull-right">4</span>
                </li>
                <li class="list-group-item">Semua
                    <span class="label label-primary pull-right">4</span>
                </li>
            </ul>
        </div>
        <div>
            <a href="#" class="list-group-item active list-group-item-success">Testimoni</a>
            <ul class="list-group">
                <li class="list-group-item">Alat 
                    <span class="label label-primary pull-right">234</span>
                </li>
                <li class="list-group-item">Computers
                    <span class="label label-success pull-right">34</span>
                </li>
                <li class="list-group-item">Tablets
                    <span class="label label-danger pull-right">4</span>
                </li>
            </ul>
        </div>
        <!-- /.div -->
    </div>
    <div class="container" style='width:50%; float: left; width: 50%; margin-left:0px; margin-right:0px;'>
        <div class="row">
            <div class="col-md-9" style="width:100%;">
                <div class="row">
                    menu
                </div>
                <!-- /.row -->
                <div class="row">
                    isi
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
    </div><div class="col-md-3 text-center">
                <div class=" col-md-12 col-sm-6 col-xs-6" >
                </div>
            </div>
            <!-- /.col -->
    <div class="col-md-3">
        <div>
            <?php
            $query_populer = "SELECT * FROM produk ORDER BY id_produk";
            $result = mysqli_query($connect, $query_populer);
            $no=1;
            while($row = mysqli_fetch_array($result))
            {
            ?> 
            <a href="#" class="list-group-item active">Produk Populer</a>
            <div class="offer-text">
                TOP <?php echo $no;?>
            </div>
            <div class="thumbnail product-box">
                <img src="images/<?php echo $row["foto"]; ?>" height="75px" width="75px">
                <div class="caption">
                    <h3><a href="#"><?php echo $row["nama_produk"]; ?> </a></h3>
                </div>
            </div>
            <?php
            $no++;
            }
            ?>
        </div>
        <!-- /.div -->
    </div>

<?php include'footer.php';?>
</body>
</html>
