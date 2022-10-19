function remove(element){
    if(confirm("Are you sure?")){
        var userid = $(element).attr('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : '/DeleteUser',
            type : 'POST',
            data : {userid : userid},
            success : function (data){
               var response = JSON.parse(data);
               if(response.status == 200){
                   alert(response.message);
                   window.location.reload();
               }else{
                   alert(response.message);
                }
            }
        })
    }
}
