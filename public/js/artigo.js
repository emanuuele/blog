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
                $("#like-count-" + id).text(response.data.likes);
            } else {
                alert("Erro ao curtir o artigo.");
            }
        })
        .catch(function (error) {
            if (error.response && error.response.status === 401) {
                alert("Você precisa estar logado para curtir o artigo.");
            } else {
                alert("Erro ao curtir o artigo.");
            }
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
                $("#save-count-" + id).text(response.data.saves);
            } else {
                alert("Error saving the article.");
            }
        })
        .catch(function () {
            alert("Error saving the article.");
        });
}

function deleteComment(commentId) {
    axios
        .post(
            "/artigo/comment/delete/" + commentId,
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
                window.location.reload();
            } else {
                alert("Error deleting the comment.");
            }
        })
        .catch(function () {
            alert("Error deleting the comment.");
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
