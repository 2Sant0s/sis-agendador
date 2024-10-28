$(document).ready(function(){
// atualiza flag Fav.
    $('.flagFavorito').click(function(){
        var idContato = $(this).prop("id");
        var titulo = $(this).prop("title");

        if(titulo === "Favorito") {
            $(this).html('<i class="bi bi-star"></i>').prop("title", "Não Favorito");
            $.getJSON('./paginas/contatos/atualizaFavoritoContato.php?idContato='+idContato+'&flagFavorito=0')
        } else {
            $(this).html('<i class="bi bi-star-fill"></i>').prop("title", "Favorito");
            $.getJSON('./paginas/contatos/atualizaFavoritoContato.php?idContato='+idContato+'&flagFavorito=1');
        }
    })
})

