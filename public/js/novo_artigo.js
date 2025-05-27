function createNovoArtigo() {
    const titulo = document.getElementById('titulo').value;
    const conteudo = document.getElementById('conteudo').value;

    if (!titulo || !conteudo) {
        alert('Por favor, preencha todos os campos.');
        return;
    }

    const artigo = {
        titulo: titulo,
        conteudo: conteudo
    };

    $.ajax({
        url: '/artigos',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            artigo
        },
        success: function(response) {
            if (response.success) {
                window.location.href = '/artigos/' + response.artigo.id;
            } else {
                alert('Erro ao criar o artigo.');
            }
        },
        error: function() {
            alert('Erro ao criar o artigo.');
        }
    });
}