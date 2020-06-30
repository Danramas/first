$(document).ready(function(){
    $(document).on('change','#selectAlbum', function () {

        var AlbumId = $(this).val();
        var div = $(this).parent();

        var option="";

        $.ajax({
            type:'get',
            url:'search/photos',
            data:{'id': AlbumId},
            success:function (data) {
                option+='<option value="" >Выбери фото</option>';
                for (var i = 0; i < data.length; i++){
                    option+='<option value="'+data[i].id+'">'+data[i].photo_name+'</option>'
                }
                div.find('#selectPhoto').html(" ");
                div.find('#selectPhoto').append(option);
            },
        });
        $("#selectPhoto").empty();
        $("#selectPhoto").prepend( $('<option value="">Выбери фото</option>') );
    });
});
