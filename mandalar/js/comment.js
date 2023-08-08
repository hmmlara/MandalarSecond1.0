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
			let CommentList;
			let response = JSON.parse(data);
			response.forEach((element) => {
				CommentList += `
                     <div class ="comment' >
                                <div class="d-flex">
                                    <img src="image/user-profile/${element.img}"  class="profile-picture-comment" alt="${element.img}" style="width: max-content" />
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
                                            <button class="btn btn-link btn-sm see-reply" onclick="seeReplies(event)">see replies

                                        </div>
                                    </div>
                                </div>

                                <div class="replies">
                            `;
				$.ajax({
					url: "php/load_replies.php",
					type: "POST",
					data: { parent_comment_id: element.id },
					success: function (data) {
						let result = JSON.parse(data);
						console.log(result)
						result.forEach((element) => {
							CommentList += `
								 <div class ="comment' >
											<div class="d-flex">
												<img src="image/user-profile/${element.img}"  class="profile-picture-comment" alt="${element.img}" style="width: max-content" />
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
														<button class="btn btn-link btn-sm" onclick="assignParentId(event)" data-cm-id = ${element.id}>Reply</button>
														<button class="btn btn-link btn-sm see-reply" onclick="seeReplies(event)">see 2
			
													</div>
												</div>
											</div>
			
											<div class="replies">
										`;
							$.ajax({
								url: "php/load_replies.php",
								type: "POST",
								data: { parent_comment_id: element.id },
								success: function (data) {
									let result = JSON.parse(data);
									result.forEach((element) => {
										CommentList += `
											 <div class ="comment' >
														<div class="d-flex">
															<img src="image/user-profile/${element.img}"  class="profile-picture-comment" alt="${element.img}" style="width: max-content" />
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
																	<button class="btn btn-link btn-sm" onclick="assignParentId(event)" data-cm-id = ${element.id}>Reply</button>
																	<button class="btn btn-link btn-sm see-reply" onclick="seeReplies(event)">see 2
						
																</div>
															</div>
														</div>
						
														<div class="replies">
													`;
										$.ajax({
											url: "php/load_replies.php",
											type: "POST",
											data: { parent_comment_id: element.id },
											success: function (data) {
												let result = JSON.parse(data);
												result.forEach((element) => {
													CommentList += `
														 <div class ="comment' >
																	<div class="d-flex">
																		<img src="image/user-profile/${element.img}"  class="profile-picture-comment" alt="${element.img}" style="width: max-content" />
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
																				<button class="btn btn-link btn-sm" onclick="assignParentId(event)" data-cm-id = ${element.id}>Reply</button>
																				<button class="btn btn-link btn-sm see-reply" onclick="seeReplies(event)">see 2
									
																			</div>
																		</div>
																	</div>
									
																	<div class="replies">
																`;
													$.ajax({
														url: "php/load_replies.php",
														type: "POST",
														data: { parent_comment_id: element.id },
														success: function (data) {
															let result = JSON.parse(data);
															
														}
													});
									
													CommentList += `    </div> 
																</div>`;
												});
												
											}
										});
						
										CommentList += `    </div> 
													</div>`;
									});
								},
							});

						
						});
						CommentList += `    </div> 
						</div>`;
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
					},
				});

			
			});
	
		},
	});
};

setInterval(() => {
	loadComments();
}, 5000);

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
function seeReplies(e) {
    console.log()
    e.target.parentElement.parentElement.parentElement.nextElementSibling.classList.toggle('d-none')
}