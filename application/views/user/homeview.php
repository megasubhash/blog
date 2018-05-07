<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <title>Blogging Demo Website by Sanjoy & Subhash</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/image/icon.ico');?>"/>
   <link href="<?= base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">
    <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
    <!--<script src="<?= base_url('assets/js/myjquery.js');?>"></script>-->
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
   <script>
   $(document).ready(function(){
   

    $.ajax({
       
        url: '<?php echo base_url()?>/index.php/homepage/get_post',
        type: 'GET',
        dataType:'json',
        success: function(res) {
            console.log(res);
            var html='';
            var html1='';
            var i;
            for(i=0;i<res.length;i++)
            {
               html+='<p>'+res[i].post+'</p>'+
               '<small class="text-muted float-left">Author '+res[i].author+' on '+res[i].date+'</small>'+
               
               '<a style="color:white; cursor:pointer;"  data-id="'+res[i].id+'" class="badge badge-danger float-right open-AddBookDialog" >Delete</a>'+
               
              
                '<div class="clearfix"></div>'+
               '<hr>';

             
            }
            $('#showdata').html(html);
           
        },
        error : function(){
            console.log("unable to get the data");
        }
    });

//delete post
/*$('.className').click (function(){
//	alert("hi");
	//var myBookId = $(this).data('id');
     //$("#val1").val( myBookId );

});
$("#idName").click(function(){
	alert("deswfew");
	});
*/ 
});


$(document).on("click", ".open-AddBookDialog", function () {
     var pid = $(this).data('id');
    $('.btnDelete').attr('id' , pid); 
      $('#myModal').modal('show');
	  
	  
	  //alert(pid);
});

$(document).on("click", ".btnDelete", function () {
     var pid = $(this).attr('id');
    // alert(pid);
     $.ajax({
       
       url: '<?php echo base_url()?>/index.php/homepage/delete_post',
       type: 'GET',
       data: {pid:pid},
       success: function() {
           //console.log(res);
           window.location="<?= base_url('index.php/homepage');?>"
          },
        error : function(){
            console.log("unable to delete the data");
        }
    });

});


</script>


  </head>

  <body>

    
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url('index.php/homepage') ?>">Blogging</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url('index.php/homepage') ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/homepage/logout') ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-2">
        <br>
          <div class="list-group">
            <a href="<?php echo base_url('index.php/homepage') ?>" class="list-group-item ">Home</a>
            <a href="<?php echo base_url('index.php/addpost') ?>" class="list-group-item">Add Post</a>
            <a href="<?php echo base_url('index.php/newcontroller') ?>" class="list-group-item">New Table</a>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Posts
            </div>
            <div class="card-body" id="showdata">
            
              
              
            </div>
          </div>
          
        </div>
       
      </div>

    </div>
    
    <footer class="py-3 navbar-custom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Subhash & Sanjoy</p>
      </div>
     
    </footer>
<!-- Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
    
        <div class="modal-header">
          <h4 class="modal-title">Delete the Blog</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
    
        <div class="modal-body">
        <?php 
        if($this->session->userdata('username') =="admin")
        { ?> 
          Are you sure want to delete this blog?
          <?php
        }
        else
        {
          ?>
          You can't delete the post ! contact the admin.....
          <?php
         
        }
            ?>
         
          <div id="bookId"></div>
        </div>
    
        <div class="modal-footer" id="model-delete">
        <?php
        if($this->session->userdata('username') =="admin")
        { ?> 
            <a  class="btn btn-danger btnDelete" >Yes</a>  
            <?php
        }
       ?>
         		<button type="button" class="btn" data-dismiss="modal"> <?php if($this->session->userdata('username') =="admin")
        { ?> No<?php } else { ?> OK <?php }?></button>
        </div>
        
      </div>
    </div>
  </div>


  </body>

</html>
