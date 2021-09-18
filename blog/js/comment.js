let sendBtn = document.getElementById("send");
sendBtn.addEventListener("click", sendComment);

let rep = document.getElementById("rep");
rep.addEventListener("submit", console.log("ss"));

function sendComment() {
  let post_id = document.getElementById("post_id").value;
  let comment = document.getElementById("commentText").value;
  let slug = document.getElementById("commentText").slug;

  console.log("You have clicked the sendBtn");

  $.post(
    "add_comment.php",

    {
      post_id: `${post_id}`,

      comment: `${comment}`,
    },

    function () {
      $("#commentText").val("");

      $.post(
        "show_comment.php",

        { post_id: `${post_id}`, slug: `${slug}` },

        function (data) {
          $("#showComment").html(data);
        }
      );
    }
  );
}

function replyComment(reply_comment_id) {
  let post_id = document.getElementById("post_id").value;
  let slug = document.getElementById("commentText").slug;

  reply_comment = document.getElementById(`t${reply_comment_id}`).innerText;

  console.log("replyyyyyyyy");

  $.post(
    "add_reply.php",

    {
      reply_comment: `${reply_comment}`,

      reply_comment_id: `${reply_comment_id}`,
    },

    function () {
      $(`t${reply_comment_id}`).val("");

      $.post(
        "show_comment.php",

        { post_id: `${post_id}`, slug: `${slug}` },

        function (data) {
          $("#showComment").html(data);
        }
      );
    }
  );
}
