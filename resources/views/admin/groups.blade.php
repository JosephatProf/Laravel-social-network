<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ChukaSoc - Admin Panel</title>

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('lib/jquery-ui.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('./bootstrap/css/bootstrap.css') }}">
    <script type="text/javascript" src="{{ URL::asset('./lib/jquery-2.2.4.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('./lib/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('./bootstrap/js/bootstrap.min.js') }}"></script>
    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ URL::asset('./css/plugins/admin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('./font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<style type="text/css">
    .navbar-custom {
    background-color:#45A79B;
    color:#ffffff;
    border-radius:0;
}

.navbar-custom .navbar-nav > li > a {
    color:#fff;
}

.navbar-custom .navbar-nav > .active > a {
    color: #ffffff;
    background-color:transparent;
}

.navbar-custom .navbar-nav > li > a:hover,
.navbar-custom .navbar-nav > li > a:focus,
.navbar-custom .navbar-nav > .active > a:hover,
.navbar-custom .navbar-nav > .active > a:focus,
.navbar-custom .navbar-nav > .open >a {
    text-decoration: none;
    background-color: #45A79B;
}

.navbar-custom .navbar-brand {
    color:#eeeeee;
}
.navbar-custom .navbar-toggle {
    background-color:#eeeeee;
}
.navbar-custom .icon-bar {
    background-color:#33aa33;
}
</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin Panel </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Emails <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">

                      
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Professor <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ route('admin.index') }}"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Users</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.groups') }}"><i class="fa fa-fw fa-table"></i> Groups</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope"></i> Emails</a>
                    </li>
                    
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Manage <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Adverts</a>
                            </li>
                            <li>
                                <a href="#">Staff</a>
                            </li>
                        </ul>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">ChukaSoc admin user management</h2>
                       
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Members list</h3>
                            </div>
                            <div class="panel-body">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-line-chart">
                                        
                                       
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr >

                                        <th>Group Name</th>
                                        <th>Group Image</th>
                                        <th>Members </th>
                                        <th>Created By</th>
                                        
                                    </tr>
                                </thead>
                                @foreach($groups as $group)
                                <tbody>
                                    <tr >
                                        <td>{{$group->group_name}}</td>
                                        <td><img class="img-thumbnail" src="{{ asset('images/groups'.'/'.$group->group_image) }}" width="40px" height="40px"></td>
                                        <td>{{$group->members}}</td>
                                        <td>{{$group->user_id}}</td>
                                       
                                        <td><button class="btn btn-danger"><span class="gyphicon glyphicon-cancel"></span> Disable</button></td>
                                    </tr>
                                   
                                    
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                   
                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
      

    </div>
<script src="{{ URL::asset('js/plugins/admin/admin.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/admin/raphael.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugins/admin/admin.min.js') }}"></script>
    
    <script src="{{ URL::asset('js/plugins/admin/morris-data.js') }}"></script>

</body>

</html>
