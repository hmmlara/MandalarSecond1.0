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
			ParentCommentId = 0;
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
			let CommentList = '';
			let response = JSON.parse(data);
			console.log(response);
			response.forEach((element) => {
				console.log(element);
				CommentList += `
                     	<div class ="comment" >
                                <div class="d-flex">
                                    <img src="image/user-profile/${element.img}"  class="profile-picture-comment" alt="${element.img}" style="width: 40px;height:40px;object-fit:cover" />
                                    <div>
                                        <div class="comment-content">
                                            <div class="comment-details">
                                                <span class="comment-author">${element.name}</span>
                                                <span class="comment-date">Posted on ${element.date}</span>
                                            </div>
                                            ${element.content}
                                        </div>
                                        <div class="comment-actions">
                                            <button class="btn btn-link btn-sm" onclick="assignParentId(event)" data-cm-id = ${element.id}>Reply</button>
                                            <button class="btn btn-link btn-sm see-reply" onclick="seeReplies(event,${element.id})">see replies

                                        </div>
                                    </div>
                                </div>

                                <div class="replies d-none">
								</div>
						</div>
                            `;
		
			
						if (
							normalizeWhitespace(CommentList) !==
							normalizeWhitespace(commentContainer.innerHTML)
						) {
							// Your logic here
							commentContainer.innerHTML = CommentList;
							// console.log(normalizeWhitespace(CommentList));
							// console.log(normalizeWhitespace(commentContainer.innerHTML));
							// console.log("reassign");
						}

			
			});
	
		},
	});
};

// setInterval(() => {
// 	loadComments();
// }, 5000);
loadComments();

//Assign Parent Id Value
function assignParentId(e) {
	commentInput.value = "";
	ParentCommentId = e.target.dataset.cmId;
	let CommentUser =
		e.target.parentElement.previousElementSibling.children[0].children[0]
			.innerHTML;
	console.log(CommentUser);
	console.log("ParentCommentId : ", ParentCommentId);
	commentInput.value = CommentUser;
}

function normalizeWhitespace(str) {
	return str.replace(/\s+/g, " ").trim();
}

//see Replys
function seeReplies(e,parent_comment_id) {
    console.log()
	$.ajax({
		url:'php/load_replies.php',
		type:'POST',
		data:{parent_comment_id:parent_comment_id},
		success: function(data){
			let response = JSON.parse(data);
			console.log(response);
			let repliesContainer = e.target.parentElement.parentElement.parentElement.nextElementSibling
			console.log(repliesContainer);
			let replyComments = '';
			response.forEach(
				(element)=>{
					console.log("is ok")
					replyComments += `
			<div class ="comment" >
					<div class="d-flex">
						<img src="image/user-profile/${element.img}"  class="profile-picture-comment" alt="${element.img}" style="width: 40px;height:40px;object-fit:cover" />
						<div>
							<div class="comment-content">
								<div class="comment-details">
									<span class="comment-author">${element.name}</span>
									<span class="comment-date">Posted on ${element.date}</span>
								</div>
								${element.content}
							</div>
							<div class="comment-actions">
								<button class="btn btn-link btn-sm" onclick="assignParentId(event)" data-cm-id = ${element.id}>Reply</button>
								<button class="btn btn-link btn-sm see-reply" onclick="seeReplies(event,${element.id})">see replies

							</div>
						</div>
					</div>

					<div class="replies">
					</div>
			</div>
					`
				}
			);
			repliesContainer.innerHTML = replyComments;
		}
	})
    e.target.parentElement.parentElement.parentElement.nextElementSibling.classList.toggle('d-none')
}