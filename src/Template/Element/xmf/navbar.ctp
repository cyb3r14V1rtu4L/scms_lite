<?php
if(isset($_SESSION['Auth']['User']))
{
?>    
    <nav class="navbar navbar-ct-info">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?= ($_SERVER['HTTP_HOST'] == 'portal:81' || $_SERVER['HTTP_HOST'] == 'pool') ? 'PortalGST' : 'Proceso Electoral Local' ?></a>
            </div>
            <div class="collapse navbar-collapse">

                <form class="navbar-form navbar-left navbar-search-form" role="search">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" value="" class="form-control" placeholder="Search...">
                    </div>
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <!--
                    <li>
                        <a href="charts.html">
                            <i class="fa fa-line-chart"></i>
                            <p>Stats</p>
                        </a>
                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-gavel"></i>
                            <p class="hidden-md hidden-lg">Actions</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Create New Post</a></li>
                            <li><a href="#">Manage Something</a></li>
                            <li><a href="#">Do Nothing</a></li>
                            <li><a href="#">Submit to live</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Another Action</a></li>
                        </ul>
                    </li>
                    -->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="notification">5</span>
                            <p class="hidden-md hidden-lg">Notifications</p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#" style="color:red;">CB212 INCIDENCIA</a></li>
                            <li><a href="#" style="color:blue;">CB209 PRESENTE</a></li>
                            <li><a href="#" style="color:orange;">CE332 INICIO VOTACI&Oacute;N</a></li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-with-icons">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <p class="hidden-md hidden-lg">...</p>
                        </a>
                        <ul class="dropdown-menu dropdown-with-icons">
                            <li>
                                <a href="/logout" class="text-danger">
                                    <i class="pe-7s-close-circle"></i>
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
<br/>
<?php
}
?>