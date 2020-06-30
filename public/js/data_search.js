function fillTable(data) {
    var table="";
    data.forEach(function(album) {
        table+=
            "<td>" +
            "<a href='albums/"+album.id+"'>"+
            "<img width='150' height='100' src='/storage/"+album['img']+"'>" +
            "<p>"+album.album_name+"</p>"+
            "</a>" +
            "</td>"
    });
    $("#albumInfo").html(table);
}

$ (function () {
    $("#selectedAlbum").change(filterAlbums);
});

function filterAlbums() {
        $("#albumInfo").empty();
        var album_name = $("#selectedAlbum").val();
        var checkImage = document.getElementById("checkImage").checked ? 1 : 0;

        $.get("search/sending", {
            album_name: album_name,
            checkImage: checkImage,
        }, function (data) {
            fillTable(data);
        });
}
