<!DOCTYPE HTML>
<html>
<head>
<title>Login Page</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/image/icon.ico');?>"/>
    <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>

	<style>
    	body{
		background-color: #29648a;	
		}
    </style>
</head>
<body>
	<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            
            <div class="row">
                <div class="col-md-4 mx-auto">

                    <!-- form card login -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <div class="card-body">
                           <!-- <form class="form" role="form" id="loginForm" action="" method="POST">-->
                            <?php echo form_open('login/check_user',['class'=>'form','id'=>'loginForm']) ?>
                                <div class="form-group">
                                    <label for="uname1">User Name</label>
                                    <input type="text" class="form-control" name="uname" id="uname" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="pwd" id="pwd" required>
                                </div>
                                <button type="submit" class="btn btn-success float-right" id="btnLogin">Login</button>
                            </form>
                        </div>
                      
                    </div>
                    
                </div>


            </div>

        </div>
    </div>
</div>
	
</body>

</html>