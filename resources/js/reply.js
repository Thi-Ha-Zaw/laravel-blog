
// document.addEventListener('DOMContentLoaded', function () {
// const replyBtnPr = document.querySelectorAll(".reply-btn");

// replyBtnPr.forEach(btn => {
//     btn.addEventListener("click", function () {
//         btn.nextElementSibling.classList.toggle("d-none");
//     })
// })
// })
const commentForm = document.getElementById("comment-form");

commentForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(commentForm);

    axios
        .post("/comment", formData)
        .then((response) => {
            // Handle the response, if needed
            commentForm.reset();
        })
        .catch((error) => {
            // Handle the error, if needed
        });
});

