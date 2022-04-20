function show_hide() {
    if (document.getElementById("course_player").style.display == "block") {
        document.getElementById("show_hide").innerText = "Show Player";
        document.getElementById("course_player").style.display = "none";
    } else {
        document.getElementById("course_player").style.display = "block";
        document.getElementById("show_hide").innerText = "Hide Player";
    }
}



var home_url = "http://localhost/blog/"

function expandCollapse() {
    if (document.getElementById("expand-collapse").src == home_url + "img/expand.ico") {
        document.getElementById("expand-collapse").src = home_url + "img/collapse.ico";
        document.getElementById("playlist-ki-list").style.display = "block";
        document.getElementById("playlist").style.height = "100vw"


    } else {
        document.getElementById("expand-collapse").src = home_url + "img/expand.ico";
        document.getElementById("playlist-ki-list").style.display = "none";
        document.getElementById("playlist").style.height = "50px"


    }

}