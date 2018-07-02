<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pengolahan Data Konsumen PT. Federal Internasional Finance<</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://www.gstatic.com/firebasejs/3.4.0/firebase.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Silahkan Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <?php
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $querylogin=$koneksi->query("select id_admin,level,username from admin where username='".$username."' and password='".$password."'");
            $jumlah=mysqli_num_rows($querylogin);
            
            if ($jumlah > 0)
            {
                $data=$querylogin->fetch_assoc();
                @$_SESSION['id_admin']=$data['id_admin'];
                @$_SESSION['username']=$data['username'];
                @$_SESSION['password']=$data['password'];
                @$_SESSION['level']=$data['level'];

                echo '<div class="alert alert-success">Anda berhasil login</div>';
                echo "<meta http-equiv='refresh' content=2;url='./'/>";
            }
            else
            {
                echo '<div class="alert alert-danger">Username/Password salah</div>';
                echo "<meta http-equiv='refresh' content='2';url=''/>";
            }
        }
        ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <!--<a class="btn btn-lg btn-success btn-block" name="btnlogin">Login</a> -->
                                <button id="btnlogin" name="login" class="btn btn-lg btn-success btn-block">Login</button>
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="app.js"></script>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
