$(document).ready(function (){

});
function checkAll(){
    if($(".chx").prop("checked") == true){
        $(".chx").prop("checked", false);
        return false;
    }
    $(".chx").prop("checked", true);
}
function Approve(){
    var request = [];
    $(".chx:checked").each(function (){
       request.push(
            $(this).attr('id')
       );
    });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/UpdateRequest",
        type : "POST",
        data : {request : request},
        success : function (data){
            console.log(data);
        }
    })
}
