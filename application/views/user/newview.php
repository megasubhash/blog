<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            html+='<tr><td>'+
                '<a style="color:white; cursor:pointer;" class="badge badge-primary edit-btn"  id="'+res[i].id+'">Edit</a>&nbsp;&nbsp;'+
                '<a style="color:white; cursor:pointer;"   class="badge badge-success copy-btn" id="'+res[i].id+'">Copy</a>&nbsp;&nbsp;'+
                '<a style="color:white; cursor:pointer;"  class="badge badge-danger delete-btn " id="'+res[i].id+'" >Delete</a>&nbsp;&nbsp;'+
                '</td>'+
                '<td>'+res[i].id+'</td>'+
                '<td>'+res[i].post+'</td>'+
                '<td>'+res[i].author+'</td>'+
                '<td>'+res[i].date+'</td>'+
            '</tr>';
           }
           $('#showdata').html(html);
          
       },
       error : function(){
           console.log("unable to get the data");
       }
   });
    });

    
$(document).on("click", ".delete-btn", function () {
     var pid = $(this).attr('id');
     //alert(pid);
     $.ajax({
       
       url: '<?php echo base_url()?>/index.php/homepage/delete_post',
       type: 'GET',
       data: {pid:pid},
       success: function() {
           //console.log(res);
           window.location="<?= base_url('index.php/newcontroller');?>"
          },
        error : function(){
            console.log("unable to delete the data");
        }
    });

});

$(document).on("click", ".edit-btn", function () {
    $('#myModal').modal('show');
     var pid = $(this).attr('id');
     //alert(pid);

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
               if(res[i].id != pid)
                continue;
                else
                    html1+='  <div class="form-group">'+
                                    '<label for="post">Post</label>'+
                                    '<input type="hidden" value="'+res[i].id+'" name="pid" />'+
                                    '<input type="text" class="form-control" value="'+res[i].post+'" name="post" id="post" required>'+
                                '</div>'+
                                '<div class="form-group">'+
                                 '   <label>Author</label>'+
                                    '<input type="text" class="form-control" name="author" value="'+res[i].author+'" id="author" required>'+
                                '</div>';
                              
           }
           $('#edit-modal').html(html1);
          
       },
       error : function(){
           console.log("unable to get the data");
       }
   });
    

});

$(document).on("click", ".copy-btn", function () {
     var pid = $(this).attr('id');
     //alert(pid);
     $.ajax({
       
       url: '<?php echo base_url()?>/index.php/homepage/copy_post',
       type: 'GET',
       data: {pid:pid},
       success: function() {
           //console.log(res);
           window.location="<?= base_url('index.php/newcontroller');?>"
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
        <br>
          <table class="table table-strip table-border">
            <tr>
                <th>Modify</th>
                <th>ID</th>
                <th>Post</th>
                <th>Author</th>
                
                <th>Date</th>
            </tr>
            <tbody id="showdata">
           
            </tbody>
          </table>
          
        </div>
       
      </div>

    </div>
    
    <footer class="py-3 navbar-custom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Subhash & Sanjoy</p>
      </div>
     
    </footer>
  </div>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
    
        <div class="modal-header">
          <h4 class="modal-title">Edit the Blog</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php echo form_open('homepage/edit_post',['class'=>'form','id'=>'editForm']) ?>
        
        <div class="modal-body" id="edit-modal">


        
         
         
        </div>
    
        <div class="modal-footer" id="model-delete">
        
        <button type="submit" class="btn"> 
     YES </button>
          
         		<button type="button" class="btn" data-dismiss="modal"> 
     NO </button>
     </form>
       
        </div>
        
      </div>
    </div>
  </div>


  </body>

</html>
