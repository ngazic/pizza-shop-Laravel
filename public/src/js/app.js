var id = 0;
var body = "";
var article = null;
var inputText = $("#post-body");
$(".edit").on("click", function(e) {
    e.preventDefault();
    article = e.target.parentNode.parentNode;
    body = article.childNodes[1].textContent;
    id = article.dataset["articleId"];
    inputText.val(body);
    $("#edit-modal").modal();
});

$("#modal-save").on("click", function(e) {
    body = inputText.val();
    article.childNodes[1].textContent = body;
    $.post(
        url, {
            _token: sessionToken,
            message: "hi",
            id: id,
            body: body,
        },
        function(data, status) {
            $("#edit-modal").modal("hide");
        }
    );
});