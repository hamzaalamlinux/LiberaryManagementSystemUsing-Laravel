function EditPanelties(){
  var detail = [];
  var panelty = 0;
  $("#Paneltiesdetails tr").each(function (){
      panelty = parseInt($(this).children(":nth-child(2)").text());
  });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/UpdatePanelties",
        type : "POST",
        dataType : "json",
        data : {panelty : panelty},
        success : function (data){
            if(data.status == 200){
                alert(data.message);
                window.location.reload();
                return false;
            }
            alert(data.message);
        }
    })
}
