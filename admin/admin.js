function submit() {

    // let title = $('input[name="title"]').val() ;
    // let content = $('textarea[name="content"]').val() ;
    // let imageUrl = $('input[name="imageUrl"]').val() ;
    // let catid = $('select[name="catid"]').find(":selected").val();
    // let slug = $('input[name="slug"]').val() ;
    // let url = $('input[name="url"]').val() ;
    // let meta_description = $('textarea[name="meta_description"]').val() ;
    // let meta_keywords = $('textarea[name="meta_keywords"]').val() ;
    // let hidden;
    // if($('input[name="hidden"]').prop("checked")){
    //     hidden = $('input[name="hidden"]').val() ;
    // }else{
    //     hidden=0
    // }

    // $.post("backend.php",
    // {
    //     title: title,
    //     content: content,
    //     imageUrl: imageUrl,
    //     catid: catid,
    //     slug: slug,
    //     url: url,
    //     meta_description: meta_description,
    //     meta_keywords: meta_keywords,
    //     hidden: hidden
    // },
    // function(data, status){
    //   alert("Data: " + data + "\nStatus: " + status);
    // });

}


$("#addVideo").submit(function (e) {
    if (!$("#hidden").prop("checked")) {
        document.getElementById("hidden").value = "0"
    }
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            alert(data)            // show response from the php script.
            location.reload()
        }
    });

});

// $("#updateVideo").submit(function(e) {
//     if($("#hidden").prop("checked")){
//         document.getElementById("hidden").value = "1"        
//     }else{
//         document.getElementById("hidden").value = "0"        
//     }
//     e.preventDefault(); // avoid to execute the actual submit of the form.

//     var form = $(this);
//     var actionUrl = form.attr('action');

//     $.ajax({
//         type: "POST",
//         url: actionUrl,
//         data: form.serialize(), // serializes the form's elements.
//         success: function(data)
//         {
//           alert(data); // show response from the php script.
//         }
//     });

// });


function hideVideo(id, name) {
    let text;
    if (confirm(`Are you sure you want to Hide "${name}"`) == true) {
        $.post("backend.php",
        {
            hide: id,
        },
        function(data, status){
          alert("Data: " + data + "\nStatus: " + status);
          location.reload()
        });
    
    } else {
    }
}

function unhideVideo(id, name) {
    if (confirm(`Are you sure you want to Un-Hide "${name}"`) == true) {
        $.post("backend.php",
        {
            unhide: id,
        },
        function(data, status){
          alert("Data: " + data + "\nStatus: " + status);
            location.reload()
        });
    
    } else {
    }
}

$("#createPlaylist").submit(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');

    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function (data, status) {
            alert("Data: " + data + "\nStatus: " + status);
            location.reload()
        }
    });

});

function hidePlaylist(id, name) {
    if (confirm(`Are you sure you want to Hide "${name}"`) == true) {
        $.post("backend.php",
        {
            hidePlaylist: id,
        },
        function(data, status){
          alert("Data: " + data + "\nStatus: " + status);
            location.reload()
        });
    
    } else {
    }
}

function unhidePlaylist(id, name) {
    if (confirm(`Are you sure you want to Un-Hide "${name}"`) == true) {
        $.post("backend.php",
        {
            unhidePlaylist: id,
        },
        function(data, status){
          alert("Data: " + data + "\nStatus: " + status);
            location.reload()
        });
    
    } else {
    }
}


