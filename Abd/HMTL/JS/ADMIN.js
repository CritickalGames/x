window.addEventListener("load", main);
window.addEventListener("load", main2);


function main() {
    ListarPorInicialAnime(["Anime", ""]);
    selectAnime();
    
    document.getElementById("btnANIME")
        .addEventListener("click", btnAnime);
    document.getElementById("sANIME")
        .addEventListener("change", selectAnime);
}


function btnAnime() {
    let btn = $("#btnANIME");
    switch (btn.text()) {
        case "Subir":
            let nombreSUBIR = document.getElementById("nombreANIME").value;
            inicialSUBIR = inicialSUBIR.charAt(0);
            
            SubirAnime(["Anime", nombreSUBIR]);
        break;
        case "Borrar":
            let nombreBORRAR = document.getElementById("nombreANIME").value;

            BorrarAnime(["Anime", nombreBORRAR]);
        break;
        case "Buscar":
            let nombreBUSCAR = document.getElementById("nombreANIME").value;
            
            BuscarAnime(["Anime", nombreBUSCAR]);
        break;
        case "Editar":
        break;
        case "Listar":
            ListarAnime(["Anime"]);
        break;
        case "Inicial":
            let nombreINICIAL = document.getElementById("nombreANIME").value;
            nombreINICIAL = nombreINICIAL.charAt(0);

            if (ListarPorInicialAnime(["Anime", nombreINICIAL])) {
                alert(nombreINICIAL);
            }
        break;
        case "Contar":
        break;
        default:
            alert(btn.text());
            break;
    }
}

function selectAnime() {
    let select = $("#sANIME").val();
    let btn = $("#btnANIME");

    btn.text(select);

    $("#btnANIME").prop('disabled', false);
    $("#nombreANIME").prop('disabled', false).attr("placeholder", "Nombre");
    $("#tempESTADO").prop('disabled', false).attr("placeholder", "Temporada");
    $("#capESTADO").prop('disabled', false).attr("placeholder", "Capitulo");
    $("#estadoESTADO").prop('disabled', false).attr("placeholder", "Estado");
    $("#starESTADO").prop('disabled', false).attr("placeholder", "Opinión");

    switch (select) {
        case "Subir":
            $("#tempESTADO").prop('disabled', true);
            $("#capESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#starESTADO").prop('disabled', true);
        break;
        case "Borrar":
            $("#tempESTADO").prop('disabled', true);
            $("#capESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#starESTADO").prop('disabled', true);
        break;
        case "Buscar":
            $("#tempESTADO").prop('disabled', true);
            $("#capESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#starESTADO").prop('disabled', true);
        break;
        case "Editar":
            $("#btnANIME").prop('disabled', true);
            $("#nombreANIME").prop('disabled', true);
            $("#tempESTADO").prop('disabled', true);
            $("#capESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#starESTADO").prop('disabled', true);
        break;
        case "Listar":
            ListarAnime(["Anime"]);
            $("#btnANIME").prop('disabled', true);
            $("#nombreANIME").prop('disabled', true);
            $("#tempESTADO").prop('disabled', true);
            $("#capESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#starESTADO").prop('disabled', true);
        break;
        case "Inicial":
            $("#tempESTADO").prop('disabled', true);
            $("#capESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#starESTADO").prop('disabled', true);
        break;
        case "Contar":
            ContarAnime(["Anime"]);
            $("#btnANIME").prop('disabled', true);
            $("#nombreANIME").prop('disabled', true);
            $("#tempESTADO").prop('disabled', true);
            $("#capESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#starESTADO").prop('disabled', true);
        break;
    
        default:
            break;
    }
}

///////////////////////////////////////////////////////////////
function tablaAnime(elemento, tabla) {
    //alert("entra");
    let fila = tabla.insertRow();
    let celda0 = fila.insertCell();
    celda0.innerHTML="";
    
    let celda1 = fila.insertCell();
    celda1.innerHTML=elemento.nombre;
                    
    let celda2 = fila.insertCell();
    celda2.innerHTML="";
    //alert("funciona");
    let celda3 = fila.insertCell();
    celda3.innerHTML="";

    let celda4 = fila.insertCell();
    celda4.innerHTML="";

    let celda5 = fila.insertCell();
    celda5.innerHTML="";
}

function SubirAnime(valores) {
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Subir.php",
        data:{nombre:valores[1]},
        //dataType: "json",
        success:function(res){
            ListarPorInicialAnime(["Anime", valores[1]]);
            //alert(res);
            //alert("ID: "+res.Inicial+"-"+res.Id+" Nombre: "+res.nombre);
        }
    });
}
function BorrarAnime(valores) {
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Borrar.php",
        data:{nombre:valores[1]},
        success:function(res){
            ListarPorInicialAnime(["Anime", valores[1]]);
            //alert(res);
        }
    });
}
function ListarPorInicialAnime(valores) {
    $("#noBorrar").nextAll("tr").remove();
    alert("HOLO");

    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Inicial.php",
        data:{inicial:valores[1]},
        dataType: "json",
        success:function(res){
            alert("Entró");
            let data = JSON.stringify(res);
            data = JSON.parse(data);
            let tabla = document.getElementById("tableAnime");
            for (elemento of data) {
                tablaAnime(elemento, tabla);
            } 
        }
    });

}
function BuscarAnime(valores) {
    $("#noBorrar").nextAll("tr").remove();
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Buscar.php",
        data:{nombre:valores[1]},
        dataType: "json",
        success:function(res){
            let data = JSON.stringify(res);
            data = JSON.parse(data);
            let tabla = document.getElementById("tableAnime");
            for (elemento of data) {
                tablaAnime(elemento, tabla);
            }
        }
    });
}

function ListarAnime(valores) {
    $("#noBorrar").nextAll("tr").remove();

    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Listar.php",
        dataType: "json",
        success:function(res){
            let data = JSON.stringify(res);
            data = JSON.parse(data);
            let tabla = document.getElementById("tableAnime");
            for (elemento of data) {
                tablaAnime(elemento, tabla);
            }  
        }
    });
}

function ContarAnime(valores) {
    $("#noBorrar").nextAll("tr").remove();

    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Contar.php",
        dataType: "json",
        success:function(res){
            let data = JSON.stringify(res);
            data = JSON.parse(data);
            let tabla = document.getElementById("tableAnime");
                //alert("entra");
                let fila = tabla.insertRow();
                let celda0 = fila.insertCell();
                
                celda0.innerHTML=JSON.stringify(data);
                
                let celda1 = fila.insertCell();
                celda1.innerHTML="";
                                
                let celda2 = fila.insertCell();
                celda2.innerHTML="";
                //alert("funciona");
                let celda3 = fila.insertCell();
                celda3.innerHTML="";

                let celda4 = fila.insertCell();
                celda4.innerHTML="";

                let celda5 = fila.insertCell();
                celda5.innerHTML="";
        }
    });
}






///////////////////////////////////////////////////////////////
function main2() {
    document.getElementById("subir").addEventListener("click", subir);
    document.getElementById("borrar").addEventListener("click", borrar);
    document.getElementById("editar").addEventListener("click", editar);
    document.getElementById("listar").addEventListener("click", listar);
    document.getElementById("buscar").addEventListener("click", buscar);
    document.getElementById("conseguir").addEventListener("click", conseguir);
}

function subir() {
    let inicial = document.getElementById("inicialSubir").value;
    let nombre = document.getElementById("nameSubir").value;
    $.ajax({
        type:"POST",
        url:"PHP/SubirAnime.php",
        data:{inicial:inicial,nombre:nombre},
        dataType: "json",
        success:function(res){
            alert("ID:"+res.IdAnime+res.IdNumero+"-Nombre:"+res.nombre);
        }
    });
}
function borrar() {
    let inicial = document.getElementById("inicialBorrar").value;
    let id = document.getElementById("idBorrar").value;
    $.ajax({
        type:"POST",
        url:"PHP/BorrarAnime.php",
        data:{inicial:inicial,id:id},
        success:function(res){
            alert(res);
        }
    });
}
function editar() {
    let inicial = document.getElementById("inicialEditar").value;
    let id = document.getElementById("idEditar").value;insertCell
    let nombre = document.getElementById("nameEditar").value;
    $.ajax({
        type:"POST",
        url:"PHP/EditarAnime.php",
        data:{inicial:inicial,id:id,nombre:nombre},
        success:function(res){
            alert(res);
        }
    });
}
function listar() {
    let inicial = document.getElementById("inicialListar").value;
    $("#noBorrar").nextAll("tr").children().remove();
    $.ajax({
        type:"POST",
        url:"PHP/ListarInicialAnime.php",
        data:{inicial:inicial},
        dataType: "json",
        success:function(res){

            let data = JSON.stringify(res);
            data = JSON.parse(data);
            let tabla = document.getElementById("table1");
            for (elemento of data) {
                //alert("entra");
                let fila = tabla.insertRow();
                let celda0 = fila.insertCell();
                celda0.innerHTML=elemento.IdAnime+elemento.IdNumero;

                let celda2 = fila.insertCell();
                celda2.innerHTML=elemento.nombre;
                //alert("funciona");
            }  
        }
    });
}
function buscar() {
    let nombre = document.getElementById("nameBuscar").value;
    $.ajax({
        type:"POST",
        url:"PHP/BuscarAnime.php",
        data:{nombre:nombre},
        success:function(res){
            alert(res);
        }
    });
}
function conseguir() {
    let inicial = document.getElementById("inicialConseguir").value;
    let id = document.getElementById("idConseguir").value;
    $.ajax({
        type:"POST",
        url:"PHP/ConseguirAnime.php",
        data:{inicial:inicial,id:id},
        success:function(res){
            alert(res);
        }
    });
}