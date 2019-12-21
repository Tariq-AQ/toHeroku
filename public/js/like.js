var JobId = 0;

$(".like").on("click", function(event) {
    event.preventDefault();
    JobId = event.target.parentNode.parentNode.dataset["Jobid"];
    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        method: "POST",
        url: urlLike,
        data: { isLike: isLike, JobId: JobId, _token: token }
    }).done(function() {
        event.target.innerText = isLike
            ? event.target.innerText == "Like"
                ? "You like this job"
                : "Like"
            : event.target.innerText == "Dislike"
            ? "You Dont like this post"
            : "Dislike";

        if (isLike) {
            event.target.nextElementSibling.innerText = "Dislike";
        } else {
            event.target.previousElementSibling.innerText = "Like";
        }
    });
});
