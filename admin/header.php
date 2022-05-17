<?php
if(isset($_SESSION['user'])){
?>
<nav class="navbar navbar-default top-navbar" role="navigation" style="background-color: #09192A;">
    <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
        <a class="navbar-brand" href="#" style="color: white; width: 344px; font-family: 'Open Sans', sans-serif;">Al - Barokah Shop</a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="profil_admin.php?username=<?php echo $_SESSION['user'];?>"><i class="fa fa-user fa-user"></i> &nbsp;Profil Pengguna</a>
                </li>
                <li class="divider"></li>
                <li><a href="keluar.php"><i class="fa fa-gear fa-sign-out-alt"></i> Keluar</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
</nav>
<!--/. NAV TOP  -->
<?php
}else{
    echo'<script>window.location="index.php"</script>';
}
?>