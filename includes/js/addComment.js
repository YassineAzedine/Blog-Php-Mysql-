var data;
$(`#addComment`).on('submit',function(e){
e.preventDefault();
var id = $('#article_id').val();
data = $(this).serializeArray();
data.push({name:'article_id',value:id});
sendData();

});
function sendData(){
    console.log(data);
   
    $.ajax({
        url:"http://localhost/Blog-Php-Mysql-/addComment.php",
        data:data,
        type:'POST',
        success : function(response){
            $(`#results`).html(response);
            $(`#addComment`).trigger("reset");

        },
        error:function(){
            $(`#results`).html('<div class = "alert alert-danger"> erreur essyer plus tard</div>');
        }

    })

}