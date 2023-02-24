/*
All Video Related Functions
*/

//Add Video
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

//Hide Video
function hideVideo(id, name) {
    let text;
    if (confirm(`Are you sure you want to Hide "${name}"`) == true) {
        $.post("backend.php",
            {
                hide: id,
            },
            function (data, status) {
                alert("Data: " + data + "\nStatus: " + status);
                location.reload()
            });

    } else {
    }
}

// Un-Hide video
function unhideVideo(id, name) {
    if (confirm(`Are you sure you want to Un-Hide "${name}"`) == true) {
        $.post("backend.php",
            {
                unhide: id,
            },
            function (data, status) {
                alert("Data: " + data + "\nStatus: " + status);
                location.reload()
            });

    } else {
    }
}

//Hide Multiple Videos
function hideMultiple() {
    let selectedElements = document.getElementsByClassName("multiple_selector");
    console.log(selectedElements)
    let data = [];
    Array.from(selectedElements).forEach(element => {
        if ($(element).prop("checked")) {
            let id = element.getAttribute("id");
            let title = element.getAttribute("title");
            data.push([id, title])
        }
    });
    if (data == "") {
        alert("Bhai kuch select toh kar le!");
    }
    else {
        let confirmText = "";
        data.forEach((element, index) => {
            confirmText += index + 1 + ". " + element[1] + "\n"
        });
        data = JSON.stringify(data);
        console.log(data)
        if (confirm(`Are you sure you want to Hide:\n${confirmText}`) == true) {
            if (confirm(`Bhai ek baar aur soch le!\nAre you sure you want to Hide:\n${confirmText}`) == true) {
                $.post("backend.php",
                    {
                        multipleHide: data,
                    },
                    function (data, status) {
                        alert("Data: " + data + "\nStatus: " + status);
                        location.reload()
                    });
            }
        } else {
        }
    }
}

// Un-Hide Multiple Videos
function unHideMultiple() {
    let selectedElements = document.getElementsByClassName("multiple_selector");
    console.log(selectedElements)
    let data = [];
    Array.from(selectedElements).forEach(element => {
        if ($(element).prop("checked")) {
            let id = element.getAttribute("id");
            let title = element.getAttribute("title");
            data.push([id, title])
        }
    });
    if (data == "") {
        alert("Bhai kuch select toh kar le!");
    }
    else {
        let confirmText = "";
        data.forEach((element, index) => {
            confirmText += index + 1 + ". " + element[1] + "\n"
        });
        data = JSON.stringify(data);
        console.log(data)
        if (confirm(`Are you sure you want to Un-Hide:\n${confirmText}`) == true) {
            if (confirm(`Bhai ek baar aur soch le!\nAre you sure you want to Un-Hide:\n${confirmText}`) == true) {
                $.post("backend.php",
                    {
                        multipleUnHide: data,
                    },
                    function (data, status) {
                        alert("Data: " + data + "\nStatus: " + status);
                        location.reload()
                    });
            }
        } else {
        }
    }
}

//Delete Video
function deleteVideo(id, name) {
    if (confirm(`Are you sure you want to Delete "${name}"`) == true) {
        if (confirm(`Bhai ek baar aur soch le\nAre you sure you want to Delete "${name}"`) == true) {
            $.post("backend.php",
                {
                    deleteVideo: id,
                },
                function (data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
                    location.reload()
                });
        }
    } else {
    }
}

// Delete Multiple Videos
function deleteMultiple() {
    let selectedElements = document.getElementsByClassName("multiple_selector");
    console.log(selectedElements)
    let data = [];
    Array.from(selectedElements).forEach(element => {
        if ($(element).prop("checked")) {
            let id = element.getAttribute("id");
            let title = element.getAttribute("title");
            data.push([id, title])
        }
    });
    if (data == "") {
        alert("Bhai kuch select toh kar le!");
    }
    else {
        let confirmText = "";
        data.forEach((element, index) => {
            confirmText += index + 1 + ". " + element[1] + "\n"
        });
        data = JSON.stringify(data);
        console.log(data)
        if (confirm(`Are you sure you want to Delete:\n${confirmText}`) == true) {
            if (confirm(`Bhai ek baar aur soch le!\nAre you sure you want to Delete:\n${confirmText}`) == true) {
                $.post("backend.php",
                    {
                        multipleDelete: data,
                    },
                    function (data, status) {
                        alert("Data: " + data + "\nStatus: " + status);
                        location.reload()
                    });
            }
        } else {
        }
    }
}

// Change Category
function changeCategory() {
    let selectedElements = document.getElementsByClassName("multiple_selector");
    console.log(selectedElements)
    let data = [];
    Array.from(selectedElements).forEach(element => {
        if ($(element).prop("checked")) {
            let id = element.getAttribute("id");
            let title = element.getAttribute("title");
            data.push([id, title])
        }
    });
    if (data == "") {
        alert("Bhai kuch select toh kar le!");
    }
    else {
        $('#modal').modal('show');
        data = JSON.stringify(data);
        console.log(data)

        $("#modalSave").click(() => {
            let categoryId = $("#modalSelector option:selected").val();
            let categoryName = $("#modalSelector option:selected").text();
            $.post("backend.php",
                {
                    categoryId: categoryId,
                    changeCategory: data,
                    categoryName: categoryName
                },
                function (data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
                    location.reload()
                });
        })

    }
}

/*
All Playlist Related Functions
*/

//Create Playlist
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

//Hide Playlist
function hidePlaylist(id, name) {
    if (confirm(`Are you sure you want to Hide "${name}"`) == true) {
        $.post("backend.php",
            {
                hidePlaylist: id,
            },
            function (data, status) {
                alert("Data: " + data + "\nStatus: " + status);
                location.reload()
            });

    } else {
    }
}

//Un-Hide Playlist
function unhidePlaylist(id, name) {
    if (confirm(`Are you sure you want to Un-Hide "${name}"`) == true) {
        $.post("backend.php",
            {
                unhidePlaylist: id,
            },
            function (data, status) {
                alert("Data: " + data + "\nStatus: " + status);
                location.reload()
            });

    } else {
    }
}

//Hide Multiple Playlists
function hideMultiplePlaylists() {
    let selectedElements = document.getElementsByClassName("multiple_selector");
    console.log(selectedElements)
    let data = [];
    Array.from(selectedElements).forEach(element => {
        if ($(element).prop("checked")) {
            let id = element.getAttribute("id");
            let title = element.getAttribute("title");
            data.push([id, title])
        }
    });
    if (data == "") {
        alert("Bhai kuch select toh kar le!");
    }
    else {
        let confirmText = "";
        data.forEach((element, index) => {
            confirmText += index + 1 + ". " + element[1] + "\n"
        });
        data = JSON.stringify(data);
        console.log(data)
        if (confirm(`Are you sure you want to Hide:\n${confirmText}`) == true) {
            if (confirm(`Bhai ek baar aur soch le!\nAre you sure you want to Hide:\n${confirmText}`) == true) {
                $.post("backend.php",
                    {
                        multipleHidePlaylists: data,
                    },
                    function (data, status) {
                        alert("Data: " + data + "\nStatus: " + status);
                        location.reload()
                    });
            }
        } else {
        }
    }
}

//Un-Hide Multiple Playlists
function unHideMultiplePlaylists() {
    let selectedElements = document.getElementsByClassName("multiple_selector");
    console.log(selectedElements)
    let data = [];
    Array.from(selectedElements).forEach(element => {
        if ($(element).prop("checked")) {
            let id = element.getAttribute("id");
            let title = element.getAttribute("title");
            data.push([id, title])
        }
    });
    if (data == "") {
        alert("Bhai kuch select toh kar le!");
    }
    else {
        let confirmText = "";
        data.forEach((element, index) => {
            confirmText += index + 1 + ". " + element[1] + "\n"
        });
        data = JSON.stringify(data);
        console.log(data)
        if (confirm(`Are you sure you want to Un-Hide:\n${confirmText}`) == true) {
            if (confirm(`Bhai ek baar aur soch le!\nAre you sure you want to Un-Hide:\n${confirmText}`) == true) {
                $.post("backend.php",
                    {
                        multipleUnHidePlaylists: data,
                    },
                    function (data, status) {
                        alert("Data: " + data + "\nStatus: " + status);
                        location.reload()
                    });
            }
        } else {
        }
    }
}

//Delete Playlist
function deletePlaylist(id, name) {
    if (confirm(`Are you sure you want to Delete "${name}"`) == true) {
        if (confirm(`Bhai ek baar aur soch le\nAre you sure you want to Delete "${name}"`) == true) {

            $.post("backend.php",
                {
                    deletePlaylist: id,
                },
                function (data, status) {
                    alert("Data: " + data + "\nStatus: " + status);
                    location.reload()
                });

        }
    } else {
    }
}

//Delete Multiple Playlists
function deleteMultiplePlaylists() {
    let selectedElements = document.getElementsByClassName("multiple_selector");
    console.log(selectedElements)
    let data = [];
    Array.from(selectedElements).forEach(element => {
        if ($(element).prop("checked")) {
            let id = element.getAttribute("id");
            let title = element.getAttribute("title");
            data.push([id, title])
        }
    });
    if (data == "") {
        alert("Bhai kuch select toh kar le!");
    }
    else {
        let confirmText = "";
        data.forEach((element, index) => {
            confirmText += index + 1 + ". " + element[1] + "\n"
        });
        data = JSON.stringify(data);
        console.log(data)
        if (confirm(`Are you sure you want to Delete:\n${confirmText}`) == true) {
            if (confirm(`Bhai ek baar aur soch le!\nAre you sure you want to Delete:\n${confirmText}`) == true) {
                $.post("backend.php",
                    {
                        multipleDeletePlaylists: data,
                    },
                    function (data, status) {
                        alert("Data: " + data + "\nStatus: " + status);
                        location.reload()
                    });
            }
        } else {
        }
    }
}

/**
Other Important Functions
*/

//Toggle Selected All Checkboxes
function selectAll() {
    let selectedElements = document.getElementsByClassName("multiple_selector");
    let selectText = document.getElementById("selectText");
    if (selectText.innerText == "Select All") {
        Array.from(selectedElements).forEach(checkbox => {
            checkbox.checked = true;
        });
        selectText.innerText = "Deselect All";
    } else if (selectText.innerText == "Deselect All") {
        Array.from(selectedElements).forEach(checkbox => {
            checkbox.checked = false;
        });
        selectText.innerText = "Select All";
    }

}


// List Playlist
function listPlaylist() {
console.log("clicked")
            let categoryId = $("#modalSelector option:selected").val();
            $("#category_id").val(categoryId)
            console.log(categoryId)
            $.post("backend.php",
                {
                    getPlaylistNew: categoryId
                },
                function (data) {
                    $("#listData").html(data) 
                    // console.log(data)
                });
}