$(document).ready(function(){
    $.ajax({
       
        url: '<?php echo base_url()?>/index.php/homepage/get_post',
        type: 'GET',
        success: function(res) {
            console.log(res);
            
            var res=JSON.parse(res);
        },
        error : function(){
            console.log("unable to get the data");
        }
    });
});