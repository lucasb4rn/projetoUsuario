$(function () {
    $('#imagem-upload').change(function() {
         $('.nomeArquivo').html('<b>Arquivo Selecionado:</b>' + $(this).val());
    });
});