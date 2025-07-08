function like(id) {
    axios
        .post(
            "/artigo/like/" + id,
            {},
            {
                headers: {
                    Authorization:
                        "Bearer " + localStorage.getItem("auth_token"),
                },
            }
        )
        .then(function (response) {
            if (response.data.success) {
                let likes = document.getElementById("like-count").textContent;
                return document.getElementById("like-count").textContent = parseInt(likes) + 1;
            } else {
                alert("Erro ao curtir o artigo." + response.data.message);                
            }
        })
        .catch(function (error) {
            alert("Erro ao curtir o artigo." + error.response.data.message);
        });
}

function save(id) {
    axios
        .post(
            "/artigo/save/" + id,
            {},
            {
                headers: {
                    Authorization:
                        "Bearer " + localStorage.getItem("auth_token"),
                },
            }
        )
        .then(function (response) {
            if (response.data.success) {
                let saves = document.getElementById("save-count").textContent;
                return document.getElementById("save-count").textContent = parseInt(saves) + 1;
            } else {
                alert("Erro ao salvar o artigo." + response.data.message);
            }
        })
        .catch(function (error) {
            alert("Erro ao salvar o artigo." + error.response.data.message);
        });
}

function deleteComment(commentId) {
    axios
        .delete(
            "/api/artigo/comment/delete/" + commentId,
        )
        .then(function (response) {
            if (response.data.success) {
                window.location.reload();
            } else {
                alert("Erro ao excluir o comentário. " + response.data.message);
            }
        })
        .catch(function (error) {
            alert("Erro ao excluir o comentário. " + error.response.data.message);
        });
}

function excluirArtigo(id) {
    axios
        .delete(
            "/artigo/delete/" + id,
            {},
            {
                headers: {
                    Authorization:
                        "Bearer " + localStorage.getItem("auth_token"),
                },
            }
        )
        .then(function (response) {
            if (response.data.success) {
                window.location.href = "/artigo";
            } else {
                alert("Erro ao excluir o artigo.");
            }
        })
        .catch(function () {
            alert("Erro ao excluir o artigo.");
        });
}

function editarButton(id_comentario) {
    var commentElement = $("#comment-" + id_comentario).val();
    const commentText = document.getElementById("comment-text");
    document.getElementById("comment-form").method = "PUT";
    commentText.value = commentElement.textContent;
}
