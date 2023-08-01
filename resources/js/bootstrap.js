import "bootstrap";
import * as mdb from "mdb-ui-kit"; // lib

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';

// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'dcc17e587562426c66fa',
//     cluster: 'ap1',
//     encrypted: true,
// });

import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    wsHost:
        import.meta.env.VITE_PUSHER_HOST ??
        `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
    cluster: "ap1",
    encrypted: true,
});

export let loader = document.getElementById('loader');

window.addEventListener('load', function () {
    console.log("Hello finish")
    loader.style.display = "none";
})

const commentsContainer = document.getElementById("comments-container");
const emptyCommentState = document.getElementById('emptyreply');

window.Echo.channel(`comments`).listen(
    ".App\\Events\\NewCommentPosted",
    (event) => {
        // Update the UI to display the new comment

        if (event.comment) {
            handleNewComment(event.comment);
            emptyCommentState.classList.add('d-none');
        } else {
            console.log(emptyCommentState)
            emptyCommentState.classList.remove('d-none');
        }
    }
);

//for deleting commment in real time

window.Echo.channel("comments").listen(
    ".App\\Events\\CommentDeleted",
    (event) => {


        const commentId = event.commentId;
        const commentElement = document.getElementById(`comment-${commentId}`);
        if (commentElement) {
            commentElement.remove();
            event.comment?.length == 0 ? emptyCommentState.classList.remove('d-none') : null;
        }
    }
);

//for real time deleting reply comments

window.Echo.channel("comments").listen(
    ".App\\Events\\ReplyDeleted",
    (event) => {
        const replyId = event.replyId;
        const commentElement = document.getElementById(`reply-${replyId}`);
        if (commentElement) {
            commentElement.remove();
        }
    }
);

//for realtime replying comment

window.Echo.channel("comments").listen(
    ".App\\Events\\NewReplyPosted",
    (event) => {
        const reply = event.reply;
        const parentCommentElement = document.getElementById(
            `comment-${reply.parent_id}`
        );
        if (parentCommentElement) {
            // Create a new div to hold the new reply
            const newReplyElement = document.createElement("div");
            newReplyElement.className = "card mt-2 ms-4";
            newReplyElement.setAttribute("id", `reply-${reply.id}`);
            const newReplyCardBody = document.createElement("div");
            newReplyCardBody.className = "card-body";
            newReplyCardBody.innerHTML = `
                    <div>
                    <i class="bi bi-reply me-2"></i><span>${
                        reply.content
                    }</span>
                    </div>
                        <span class="badge bg-black"><i class="bi bi-person"></i> ${
                            reply.user.name
                        }</span>
                        <span class="badge bg-black"><i class="bi bi-clock"></i> ${diffForHumans(
                            reply.created_at
                        )}</span>
                        <!-- Add the delete button here if needed -->
            `;
            newReplyElement.appendChild(newReplyCardBody);
            if (
                (window.Laravel.isAuthenticated &&
                    reply.user_id === window.Laravel.userId) ||
                (window.Laravel.isAuthenticated &&
                    window.Laravel.adminId === window.Laravel.userId)
            ) {
                console.log("I can delete reply");
                const deleteForm = document.createElement("form");
                deleteForm.action = `/comment/${reply.id}`;
                deleteForm.method = "post";
                deleteForm.classList.add("d-inline-block");
                const csrfInput = document.createElement("input");
                csrfInput.type = "hidden";
                csrfInput.name = "_token";
                csrfInput.value = window.LaravelToken.csrfToken;
                deleteForm.appendChild(csrfInput);
                const methodInput = document.createElement("input");
                methodInput.type = "hidden";
                methodInput.name = "_method";
                methodInput.value = "delete";
                deleteForm.appendChild(methodInput);
                const deleteButton = document.createElement("button");
                deleteButton.classList.add(
                    "badge",
                    "bg-black",
                    "border-0",
                    "ms-1"
                );
                deleteButton.innerHTML = '<i class="bi bi-trash3"></i> delete';
                deleteForm.appendChild(deleteButton);
                newReplyCardBody.appendChild(deleteForm);
            }

            // Append the new reply to the parent comment container
            parentCommentElement
                .querySelector(".replies-container")
                .prepend(newReplyElement);
        }
    }
);

function diffForHumans(createdAt) {
    const currentDate = new Date();
    const createdDate = new Date(createdAt);

    const diffInMilliseconds = currentDate - createdDate;

    const seconds = Math.floor(diffInMilliseconds / 1000);
    const minutes = Math.floor(seconds / 60);
    const hours = Math.floor(minutes / 60);
    const days = Math.floor(hours / 24);
    const months = Math.floor(days / 30);
    const years = Math.floor(months / 12);

    if (years > 0) {
        return years + (years === 1 ? " year ago" : " years ago");
    } else if (months > 0) {
        return months + (months === 1 ? " month ago" : " months ago");
    } else if (days > 0) {
        return days + (days === 1 ? " day ago" : " days ago");
    } else if (hours > 0) {
        return hours + (hours === 1 ? " hour ago" : " hours ago");
    } else if (minutes > 0) {
        return minutes + (minutes === 1 ? " minute ago" : " minutes ago");
    } else {
        return seconds + (seconds === 1 ? " second ago" : " seconds ago");
    }
}

function handleNewComment(comment) {
    // Create a new comment card and append it to the container
    const commentCard = createCommentCard(comment);
    commentsContainer.prepend(commentCard);
}

function createCommentCard(comment) {
    const card = document.createElement("div");
    card.classList.add("card", "mb-3");
    card.setAttribute("id", `comment-${comment.id}`);
    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    // Construct the comment HTML content
    const contentDiv = document.createElement("div");
    const contentIcon = document.createElement("i");
    contentIcon.classList.add("bi", "bi-chat-text-fill", "fs-5", "me-2");
    contentDiv.appendChild(contentIcon);
    const contentSpan = document.createElement("span");
    contentSpan.textContent = comment.content;
    contentDiv.appendChild(contentSpan);
    cardBody.appendChild(contentDiv);

    // Add the user information and timestamp
    const userBadge = document.createElement("span");
    userBadge.classList.add("badge", "bg-black");
    userBadge.innerHTML = `<i class="bi bi-person"></i> ${comment.user?.name}`;
    cardBody.appendChild(userBadge);
    const timeBadge = document.createElement("span");
    timeBadge.classList.add("badge", "bg-black", "ms-1");
    // const createdAt = new Date();
    const createdDate = diffForHumans(comment.created_at);
    timeBadge.innerHTML = `<i class="bi bi-clock"></i> ${createdDate}`;
    cardBody.appendChild(timeBadge);

    // Add delete button if the user can delete the comment
    if (
        (window.Laravel.isAuthenticated &&
            comment.user_id === window.Laravel.userId) ||
        (window.Laravel.isAuthenticated &&
            window.Laravel.adminId === window.Laravel.userId)
    ) {
        console.log("I can delete");
        const deleteForm = document.createElement("form");
        deleteForm.action = `/comment/${comment.id}`;
        deleteForm.method = "post";
        deleteForm.classList.add("d-inline-block");
        const csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = window.LaravelToken.csrfToken;
        deleteForm.appendChild(csrfInput);
        const methodInput = document.createElement("input");
        methodInput.type = "hidden";
        methodInput.name = "_method";
        methodInput.value = "delete";
        deleteForm.appendChild(methodInput);
        const deleteButton = document.createElement("button");
        deleteButton.classList.add("badge", "bg-black", "border-0", "ms-1");
        deleteButton.innerHTML = '<i class="bi bi-trash3"></i> delete';
        deleteForm.appendChild(deleteButton);
        cardBody.appendChild(deleteForm);
    }

    // Handle replying box and replies

    const replyBtn = document.createElement("span");
    replyBtn.classList.add(
        "user-select-none",
        "badge",
        "bg-black",
        "reply-btn",
        "ms-1"
    );
    replyBtn.innerHTML = '<i class="bi bi-reply pe-none"></i> Reply';
    replyBtn.setAttribute("data-comment-id", comment.id);
    replyBtn.setAttribute("role", "button");
    cardBody.appendChild(replyBtn);

    const replyForm = document.createElement("form");

    replyForm.action = `http://localhost:8000/comment`;
    replyForm.method = "post";
    replyForm.classList.add("mt-2", "ms-4", "reply-form", "d-none");
    replyForm.setAttribute("data-parent-id", comment.id);
    const replyCsrfInput = document.createElement("input");
    replyCsrfInput.type = "hidden";
    replyCsrfInput.name = "_token";
    replyCsrfInput.value = window.LaravelToken.csrfToken;
    replyForm.appendChild(replyCsrfInput);
    const replyContent = document.createElement("textarea");
    replyContent.name = "content";
    replyContent.rows = "2";
    replyContent.classList.add("form-control");
    replyContent.placeholder = `Replying to ${comment.user?.name}'s comment`;
    replyForm.appendChild(replyContent);
    const replyParentId = document.createElement("input");
    replyParentId.type = "hidden";
    replyParentId.name = "parent_id";
    replyParentId.value = comment.id;
    replyForm.appendChild(replyParentId);
    const replyArticleId = document.createElement("input");
    replyArticleId.type = "hidden";
    replyArticleId.name = "article_id";
    replyArticleId.value = comment.article_id;
    replyForm.appendChild(replyArticleId);
    const replyButtonsDiv = document.createElement("div");
    replyButtonsDiv.classList.add(
        "d-flex",
        "justify-content-between",
        "align-items-start",
        "mt-2"
    );
    const replyInfo = document.createElement("p");
    replyInfo.classList.add("mb-0");
    replyInfo.textContent = `Replying as ${window.Laravel.userName}`;
    replyButtonsDiv.appendChild(replyInfo);
    const replySubmitBtn = document.createElement("button");
    replySubmitBtn.classList.add("btn", "btn-sm", "btn-dark", "px-4");
    replySubmitBtn.textContent = "Reply";
    replyButtonsDiv.appendChild(replySubmitBtn);
    replyForm.appendChild(replyButtonsDiv);
    cardBody.appendChild(replyForm);

    const repliesContainer = document.createElement("div");
    repliesContainer.classList.add("replies-container");
    // if (comment.replies?.length > 0) {
    //     console.log("reply");
    //     // Create and append each reply to the replies container
    //     comment.replies.forEach((reply) => {
    //         const replyCard = createReplyCard(reply);
    //         repliesContainer.appendChild(replyCard);
    //     });
    // }
    cardBody.appendChild(repliesContainer);

    // ... Add code to handle replies ...

    card.appendChild(cardBody);
    return card;
}

// function createReplyCard(reply) {
//     console.log(reply);
//     const replyCard = document.createElement("div");
//     replyCard.classList.add("card", "mt-2", "ms-4");
//     const replyCardBody = document.createElement("div");
//     replyCardBody.classList.add("card-body");

//     // Construct the reply HTML content
//     const replyContentDiv = document.createElement("div");
//     const replyContentIcon = document.createElement("i");
//     replyContentIcon.classList.add("bi", "bi-reply", "me-2");
//     replyContentDiv.appendChild(replyContentIcon);
//     const replyContentSpan = document.createElement("span");
//     replyContentSpan.textContent = reply.content;
//     replyContentDiv.appendChild(replyContentSpan);
//     replyCardBody.appendChild(replyContentDiv);

//     // Add the user information and timestamp for the reply
//     const replyUserBadge = document.createElement("span");
//     replyUserBadge.classList.add("badge", "bg-black");
//     replyUserBadge.innerHTML = `<i class="bi bi-person"></i> ${reply.user?.name}`;
//     replyCardBody.appendChild(replyUserBadge);
//     const replyTimeBadge = document.createElement("span");
//     replyTimeBadge.classList.add("badge", "bg-black");
//     const replyCreatedAt = diffForHumans(reply.created_at);
//     replyTimeBadge.innerHTML = `<i class="bi bi-clock"></i> ${replyCreatedAt}`;
//     replyCardBody.appendChild(replyTimeBadge);

//     // Add delete button if the user can delete the reply
//     // if (reply.can_delete) {
//     //     ... your existing code for the delete button ...
//     // }

//     replyCard.appendChild(replyCardBody);
//     return replyCard;
// }

// ... Your existing code ...

commentsContainer.addEventListener("click", (e) => {
    if (e.target.classList.contains("reply-btn")) {
        const btn = e.target;
        const commentId = btn.getAttribute("data-comment-id");
        const replyForm = document.querySelector(
            `.reply-form[data-parent-id="${commentId}"]`
        );

        if (replyForm) {
            e.target.nextElementSibling.classList.toggle("d-none");
        }

        replyForm.addEventListener("submit", (e) => {
            e.preventDefault();

            const formData = new FormData(replyForm);

            axios
                .post("/comment", formData)
                .then((response) => {
                    // Handle the response, if needed
                    replyForm.reset();
                    replyForm.classList.add("d-none");
                })
                .catch((error) => {
                    // Handle the error, if needed
                });
        });

        // const csrfToken = window.LaravelToken.csrfToken;
        // const csrfInput = document.createElement("input");
        // csrfInput.type = "hidden";
        // csrfInput.name = "_token";
        // csrfInput.value = csrfToken;
        // replyForm.appendChild(csrfInput);
    }
});
