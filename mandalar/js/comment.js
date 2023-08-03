//Assign html Dom 
const commenterStoreBox = document.querySelector("#commenter_id");
const postIdStoreBox = document.querySelector("#post_id");
const commentInput = document.querySelector("#comment-input");
const commentBtn = document.querySelector("#comment-btn");


//Assign Value 
let CommenterId = commenterStoreBox.dataset.userId;
let PostId = postIdStoreBox.dataset.postId;
let ParentCommentId = null;
let Content = '';

//Assign Content Value From Input
commentInput.addEventListener('keyup', (e) => {
    Content = e.target.value;
})

//Tranfer to Comment Controller Php When Comment Btn Click;
commentBtn.addEventListener('click', (e) => {
    $.ajax({
        url: 'php/createComment.php',
        type: 'POST',
        data: { post_id: PostId, user_id: CommenterId, content: Content, parent_comment_id: ParentCommentId },
        success: function(data) {
            console.log(data);
            Content = ''
            commentInput.value = '';
        }
    });
})