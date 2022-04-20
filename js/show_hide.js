replies = document.getElementsByClassName("reply");
Array.from(replies).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("edit");
    sno = e.target.id.substr(1);

    if (document.getElementById(`reply${sno}`).style.display == "block") {
      document.getElementById(`reply${sno}`).style.display = "none";
    } else {
      document.getElementById(`reply${sno}`).style.display = "block";
    }
  });
});

show_replies = document.getElementsByClassName("show_replies");
Array.from(show_replies).forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log("edit ");
    sno = e.target.id.substr(6);

    if (
      document.getElementById(`replies_container${sno}`).style.display ==
      "block"
    ) {
      document.getElementById(`replies_container${sno}`).style.display = "none";
    } else {
      document.getElementById(`replies_container${sno}`).style.display =
        "block";
    }
  });
});
