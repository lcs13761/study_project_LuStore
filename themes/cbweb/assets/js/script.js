function mudaImagem(i) {


    if (i == 1) {
        var imagem = $("#imagem1").attr('src');
        document.getElementById("imagem0").src = imagem;
    }
    if (i == 2) {
        var imagem = $("#imagem2").attr('src');
        document.getElementById("imagem0").src = imagem;
    }
    if (i == 3) {
        var imagem = $("#imagem3").attr('src');
        document.getElementById("imagem0").src = imagem;
    }
    if (i == 4) {
        var imagem = $("#imagem4").attr('src');
        document.getElementById("imagem0").src = imagem;
    }
}

$(".j_collapse").click(function () {
    var collapse = $(this);
    if($(".j_collapse_icon").attr("class") === "j_collapse_icon bi-caret-right-fill"){
        collapse.parents().find(".j_collapse_icon").removeClass("bi-caret-right-fill").addClass("bi-caret-down-fill");
    }else if($(".j_collapse_icon").attr("class") === "j_collapse_icon bi-caret-down-fill") {
        collapse.find(".j_collapse_icon").removeClass("bi-caret-down-fill").addClass("bi-caret-right-fill");
    }
    
    

    if (collapse.find(".j_collapse_box").is(":visible")) {
        collapse.find(".j_collapse_box").slideUp(200);
    } else {
        collapse.parent().find(".j_collapse_box").slideUp(200);
        collapse.find(".j_collapse_box").slideDown(200);
    }
});
