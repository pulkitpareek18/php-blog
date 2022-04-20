var post_id = document.getElementById("video_id").value; // let comment_text = document.getElementById("commentText").value;


function escape(str) {
    return str
        .replace(/[\\]/g, "\\\\")
        .replace(/[\"]/g, '\\"')
        .replace(/[\/]/g, "\\/")
        .replace(/[\b]/g, "\\b")
        .replace(/[\f]/g, "\\f")
        .replace(/[\n]/g, "\\n")
        .replace(/[\r]/g, "\\r")
        .replace(/[\t]/g, "\\t");
}

function show_replies(comment_id) {
    if (
        document.getElementById(`replyContainer${comment_id}`).style.display ==
        "flex"
    ) {
        document.getElementById(`replyContainer${comment_id}`).style.display =
            "none";
    } else {
        document.getElementById(`replyContainer${comment_id}`).style.display =
            "flex";
    }
}

function arrangeCommentData(data) {
    if (data.length > 1) {
        get_data = JSON.parse(data);
        var part_1 = "";
        var part_2 = "";
        var part_3 = "";
        get_data.arr.forEach((comments) => {
            part_1 += `
         <div class="img-comment">
         <img src="${home_url}img/user.png">
     <div class="m-2 p-3 comment">
     <div class="user-date"><p class="username">@${
       comments.username
     }</p><p class="date">${comments.dates}</p></div>
     <p class="comment_content">${comments.comment_content.replace(
       /\n/g,
       "<br>"
     )}</p>
     
     <div><button onclick="replyComment(${
       comments.comment_id
     })" class="btn btn-danger btn-reply">Reply</button></div>
     </div>
</div>
     ${send_show_hide(comments.comment_id, comments.num_replies)}

<div>
     <form class="mt-5" id="replyForm${
       comments.comment_id
     }" style="display: none;">
     <div class="mb-3">
     <textarea id="replyText${comments.comment_id}"  placeholder="Reply @${
        comments.username
      }" class="form-control" name="comment"></textarea>
     </div>
     
                       <button type="button"  onclick="addReplyNew(${
                         comments.comment_id
                       })" class="button">Submit</button>
                    </form>`;

            if (comments.num_replies > 0) {
                part_2 = `
             <div id="replyContainer${comments.comment_id}" class="replyContainer">
             `;
                comments.comment_replies.forEach((replies) => {
                    part_3 += `<div class="img-comment reply">
                            <img src="${home_url}img/user.png">
                            <div class="m-2 p-3 ">
                                <div class="user-date"><p class="username">@${
                                  replies.replier_username
                                }</p><p class="date">${replies.dates}</p></div>
                                <p class="comment_content">${replies.reply_comment_content.replace(
                                  /\n/g,
                                  "<br>"
                                )}</p>
                            </div>
                        </div>`;
                });
            }
        });
    }

    return part_1 + part_2 + part_3 + "</div>";
}

function replyComment(comment_id) {
    if (
        document.getElementById(`replyForm${comment_id}`).style.display == "block"
    ) {
        document.getElementById(`replyForm${comment_id}`).style.display = "none";
    } else {
        document.getElementById(`replyForm${comment_id}`).style.display = "block";
    }
}

function addReply(comment_id) {
    var reply_comment_text = document.getElementById(
        `replyText${comment_id}`
    ).value;
    $.get(
        home_url + "video_add_reply.php", {
            reply_comment_text: escape(reply_comment_text),
            reply_comment_id: comment_id,
        },
        function(data) {
            console.log(data);
            var replies = JSON.parse(data);
            document.getElementById(`replyForm${comment_id}`).style.display = "none";
            var container = "#newReplyContainer" + comment_id;
            document.getElementById(`replyContainer${comment_id}`).style.display =
                "flex";
            container = `${container}`;
            console.log(container);
            $(container).append(`
            <div class="img-comment reply">
            <img src="${home_url}img/user.png">
            <div class="m-2 p-3 ">

                <div class="user-date"><p class="username">@${
                  replies.arr[0].replier_username
                }</p><p class="date">${replies.arr[0].dates}</p></div>
                <p class="comment_content">${replies.arr[0].reply_comment_content.replace(
                  /\n/g,
                  "<br>"
                )}</p>
            </div>
        </div>`);
        }
    );
}

function addReplyNew(comment_id) {
    var reply_comment_text = document.getElementById(
        `replyText${comment_id}`
    ).value;
    $.get(
        home_url + "video_add_reply.php", {
            reply_comment_text: escape(reply_comment_text),
            reply_comment_id: comment_id,
        },

        function() {
            document.getElementById(`replyForm${comment_id}`).style.display = "none";

            $.get(
                home_url + "video_show_comment.php", { last_comment_display_post_id: post_id },

                function(data) {
                    document.getElementById("newComment").style.display = "flex";
                    console.log(arrangeCommentData(data));
                    document.getElementById(
                        `newComment${comment_id}`
                    ).innerHTML = `${arrangeCommentData(data)}`;
                    document.getElementById(`replyContainer${comment_id}`).style.display =
                        "none";

                    // document.getElementById(`newComment${comment_id}`).innerHtml = ``;
                }
            );

            // document.getElementById("newComment").style.flexDirection = "column";
        }
    );
}

function add_comment(text) {
    $.get(
        home_url + "video_add_comment.php",

        {
            comment: escape(text),
            post_id: post_id,
        },
        function() {
            $.get(
                home_url + "video_show_comment.php", { last_comment_display_post_id: post_id },

                function(data) {
                    console.log(data);
                    if (data.length > 1) {
                        get_data = JSON.parse(data);
                        document.getElementById("newComment").style.display = "flex";
                        var comments = get_data.arr[0];

                        $("#newComment").append(
                            `<div id="newComment${comments.comment_id}" >${arrangeCommentData(
                data
              )}</div>`
                        );

                        console.log(comments.comment_content);
                        document.getElementById("comment-box").style.pointerEvents = "all";
                        document.getElementById("comment-box").style.backgroundColor =
                            "white";
                    }
                }
            );
        }
    );
}

function send_show_hide(comment_id, num_replies) {
    var num = Number(num_replies);
    if (num > 0) {
        return `<div><button id="replyNumber${comment_id}" class="replyNumber" onclick="show_replies(${comment_id})">View ${num_replies} replies</button></div>`;
    } else {
        return "";
    }
}

var get_data;

function show_comment() {
    $.get(
        home_url + "video_show_comment.php",

        {
            post_id: `${post_id}`,
        },

        function(data) {
            console.log(data);
            if (data.length > 1) {
                get_data = JSON.parse(data);

                get_data.arr.forEach((comments) => {
                    document.getElementById("showComment").innerHTML += `
                    <div class="img-comment">
                    <img src="${home_url}img/user.png">
                <div class="m-2 p-3 comment">
                <div class="user-date"><p class="username">@${
                  comments.username
                }</p><p class="date">${comments.dates}</p></div>
                <p class="comment_content">${comments.comment_content.replace(
                  /\n/g,
                  "<br>"
                )}</p>
                
                <div><button onclick="replyComment(${
                  comments.comment_id
                })" class="btn btn-danger btn-reply">Reply</button></div>
                

                ${send_show_hide(comments.comment_id, comments.num_replies)}


                <form class="mt-5" id="replyForm${
                  comments.comment_id
                }" style="display: none;">
                <div class="mb-3">
                <textarea id="replyText${
                  comments.comment_id
                }"  placeholder="Reply @${
            comments.username
          }" class="form-control" name="comment"></textarea>
                </div>
                
                <button type="button"  onclick="addReply(${
                  comments.comment_id
                })" class="button">Submit</button>
                </form>`;

                    if (comments.num_replies > 0) {
                        if (comments.num_replies > 0) {
                            let replies = comments.comment_replies.map(
                                (replies) =>
                                `<div class="img-comment reply">
                                    <img src="${home_url}img/user.png">
                                    <div class="m-2 p-3 ">
                        
                                        <div class="user-date"><p class="username">@${
                                          replies.replier_username
                                        }</p><p class="date">${
                    replies.dates
                  }</p></div>
                                        <p class="comment_content">${replies.reply_comment_content.replace(
                                          /\n/g,
                                          "<br>"
                                        )}</p>
                                    </div>
                                </div>`
                            );

                            $("#showComment").append(
                                `<div id="newReplyContainer${
                  comments.comment_id
                }" class="newReplyContainer"></div><div id="replyContainer${
                  comments.comment_id
                }" class="replyContainer">${replies.join("")}</div>`
                            );
                        }
                    } else {
                        $("#showComment").append(
                            `<div id="newReplyContainer${comments.comment_id}" class="newReplyContainer"></div><div id="replyContainer${comments.comment_id}" class="replyContainer"></div>`
                        );
                    }

                    console.log(comments.comment_content);
                });
            }
        }
    );
}

show_comment();

// $(#send).click({

// add_comment();

// }
// )