
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

