//Assign html Dom
const commenterStoreBox = document.querySelector("#commenter_id");
const postIdStoreBox = document.querySelector("#post_id");
const commentInput = document.querySelector("#comment-input");
const commentBtn = document.querySelector("#comment-btn");

//Assign Value
let CommenterId = commenterStoreBox.dataset.userId;
let PostId = postIdStoreBox.dataset.postId;
let ParentCommentId = null;
let Content = "";

//Assign Content Value From Input
commentInput.addEventListener("keyup", (e) => {
	Content = e.target.value;
});

//Tranfer to Comment Controller Php When Comment Btn Click;
commentBtn.addEventListener("click", (e) => {
	$.ajax({
		url: "php/createComment.php",
		type: "POST",
		data: {
			post_id: PostId,
			user_id: CommenterId,
			content: Content,
			parent_comment_id: ParentCommentId,
		},
		success: function (data) {
			console.log(data);
			Content = "";
			commentInput.value = "";
		},
	});
});

let commentContainer = document.querySelector(".comments");

const loadComments = () => {
	$.ajax({
		url: "php/load_comment.php",
		type: "POST",
		data: { post_id: PostId },
		success: function (data) {
			console.log(data);
            commentContainer.innerHTML = "";

			let response = JSON.parse(data);

			response.forEach((element) => {
				commentContainer.innerHTML += `
                     <div class ="comment">
                                <div class="d-flex">
                                    <img src="image/user-profile/${element.img}" class="profile-picture-comment" alt="${element.img}" style="width: max-content" />
                                    <div>
                                        <div class="comment-content">
                                            <div class="comment-details">
                                                <span class="comment-author">${element.name}</span>
                                                <span class="comment-date">Posted on ${element.date}</span>
                                            </div>
                                            ${element.content}
                                        </div>
                                        <div class="comment-actions">
                                            <button class="btn btn-link btn-sm">Like</button>
                                            <button class="btn btn-link btn-sm">Reply</button>
                                            <button class="btn btn-link btn-sm see-reply" onclick="seeReplies(event)">see 2

                                        </div>
                                    </div>
                                </div>

                                <div class="replies">
                                </div> 
                        </div>`;
			});
		},
	});
};

setInterval(() => {
	loadComments();
}, 50000);
