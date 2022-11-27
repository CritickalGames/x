window.addEventListener("load", main);


function main() {
    selectAnime();
    
    
    document.getElementById("nombreANIME")
        .addEventListener("keyup", actualizarLista);
    document.getElementById("nombreANIME")
        .addEventListener("change", actualizarLista);
    document.getElementById("sANIME")
        .addEventListener("change", selectAnime);
    document.getElementById("btnANIME")
        .addEventListener("click", btnAnime);
}
function actualizarLista() {
    let select = $("#sANIME").val();
    let nombre = document.getElementById("nombreANIME").value;
    
    switch (select) {
        case "Contar":
        break;
        case "Nuevo Capitulo":
            BuscarAnimeAll(["ANIME", nombre]);
        break;
        case "Editar Estado":
            BuscarAnimeAll(["ANIME", nombre]);
        break;
        case "Buscar":
            BuscarAnimeAll(["ANIME", nombre]);
        break;
        default:
            BuscarAnimeNombre(["ANIME", nombre]);
            break;
    }
    
}
function selectAnime() {
    let select = $("#sANIME").val();
    let btn = $("#btnANIME");
    actualizarLista();
    btn.text(select);

    $("#btnANIME").prop('disabled', false);
    $("#nombreANIME").prop('disabled', false).attr("placeholder", "Nombre");
    $("#temporadaESTADO").prop('disabled', false).attr("placeholder", "Temporada");
    $("#capituloESTADO").prop('disabled', false).attr("placeholder", "Capitulo");
    $("#estadoESTADO").prop('disabled', false).attr("placeholder", "Estado");
    $("#opinon").prop('disabled', false).attr("placeholder", "Opinión");

    switch (select) {
        case "Subir":
            $("#temporadaESTADO").prop('disabled', true);
            $("#capituloESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
        case "Borrar":
            $("#temporadaESTADO").prop('disabled', true);
            $("#capituloESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
        case "Buscar":
            $("#temporadaESTADO").prop('disabled', true);
            $("#capituloESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
        case "Editar":
            $("#btnANIME").prop('disabled', true);
            $("#nombreANIME").prop('disabled', true);
            $("#temporadaESTADO").prop('disabled', true);
            $("#capituloESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
        case "Listar":
            ListarAnime(["Anime"]);
            $("#btnANIME").prop('disabled', true);
            $("#temporadaESTADO").prop('disabled', true);
            $("#capituloESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
        case "Inicial":
            actualizarLista();

            $("#temporadaESTADO").prop('disabled', true);
            $("#capituloESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
        case "Contar":
            ContarAnime(["Anime"]);
            $("#btnANIME").prop('disabled', true);
            $("#nombreANIME").prop('disabled', true);
            $("#temporadaESTADO").prop('disabled', true);
            $("#capituloESTADO").prop('disabled', true);
            $("#estadoESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
        case "Editar Estado":
            $("#capituloESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
        case "Nuevo Capitulo":
            $("#estadoESTADO").prop('disabled', true);
            $("#opinon").prop('disabled', true);
        break;
    
        default:
            break;
    }
}
function btnAnime() {
    let btn = $("#btnANIME");
    let nombre = document.getElementById("nombreANIME").value;
    let temporada = document.getElementById("temporadaESTADO").value;
    let capitulo = document.getElementById("capituloESTADO").value;
    let estado = document.getElementById("estadoESTADO").value;
    switch (btn.text()) {
        case "Subir":
            SubirAnime(["ANIME", nombre]);
        break;
        case "Borrar":
            BorrarAnime(["ANIME", nombre]);
        break;
        case "Buscar":
        break;
        case "Editar":
        break;
        case "Listar":
            ListarAnime(["ANIME"]);
        break;
        case "Inicial":
        break;
        case "Contar":
        break;
        case "Nuevo Capitulo":
            SubirEstado(["ESTADOS", nombre, temporada, capitulo, estado]);
        break;
        case "Editar Estado":
        break;
        case "Opinión":
        break;
        default:
            break;
    }
}



///////////////////////////////////////////////////////////////
function tablaAnime(elemento, fila) {
    //alert("entra");
    let nombre = fila.insertCell();
    if (elemento.nombre) {
        nombre.innerHTML=elemento.nombre;
        
        nombre.setAttribute("style", "cursor:pointer");
        nombre.setAttribute("class", "btn-success text-dark");
        nombre.addEventListener("click", (e)=>{
            $("#nombreANIME").val(nombre.innerText);
        });
        
    }else{
        nombre.innerHTML="";
    }
}

function tablaEstado(elemento, fila){
    if ((elemento.temporada)&&(elemento.capitulo)&&(elemento.estado)) {
        let temporada = fila.insertCell();
        temporada.innerHTML=elemento.temporada;
        //alert("funciona");
        let capitulo = fila.insertCell();
        capitulo.innerHTML=elemento.capitulo;
    
        let estado = fila.insertCell();
        estado.innerHTML=elemento.estado;
    
    }else{
        let temporada = fila.insertCell();
        temporada.innerHTML="";
        //alert("funciona");
        let capitulo = fila.insertCell();
        capitulo.innerHTML="";
    
        let estado = fila.insertCell();
        estado.innerHTML="";
    }
    let celda5 = fila.insertCell();
        celda5.innerHTML="";
}

function celdaVacia(contenido, fila) {
    let vacio = fila.insertCell();
                
    vacio.innerHTML=contenido;
}
///////////////////////////////////////////////////////////////
function SubirAnime(valores) {
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Subir.php",
        data:{nombre:valores[1]},
        //dataType: "json",
        success:function(res){
            alert(res);
            //valores[1] = valores[1].charAt(0);
            //alert(valores[1]);
            //ListarPorInicialAnime(["ANIME", valores[1]]);
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
            //alert(res);
            //valores[1] = valores[1].charAt(0);
            //ListarPorInicialAnime(["ANIME", valores[1]]);
            //alert(res);
        }
    });
}

function BuscarAnimeAll(valores) {
    $("#noBorrar").nextAll("tr").remove();
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/BuscarAll.php",
        data:{nombre:valores[1]},
        dataType: "json",
        success:function(res){
            let data = JSON.stringify(res);
            data = JSON.parse(data);
            let tabla = document.getElementById("tableAnime");
            for (elemento of data) {
                let fila = tabla.insertRow();
                celdaVacia("", fila);
                tablaAnime(elemento, fila);
                tablaEstado(elemento, fila);
            }
        }
    });
}

function BuscarAnimeNombre(valores) {
    $("#noBorrar").nextAll("tr").remove();
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/BuscarNombre.php",
        data:{nombre:valores[1]},
        dataType: "json",
        success:function(res){
            let data = JSON.stringify(res);
            data = JSON.parse(data);
            let tabla = document.getElementById("tableAnime");
            for (elemento of data) {
                let fila = tabla.insertRow();
                celdaVacia("", fila);
                tablaAnime(elemento, fila);
                tablaEstado(elemento, fila);
            }
        }
    });
}

function ListarPorInicialAnime(valores) {
    $("#noBorrar").nextAll("tr").remove();//AGREGAR UNA ANIMACIÓN AL DESAPARECER Y REAPARECER

    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Inicial.php",
        data:{inicial:valores[1]},
        dataType: "json",
        success:function(res){
            let data = JSON.stringify(res);
            data = JSON.parse(data);
            let tabla = document.getElementById("tableAnime");
            for (elemento of data) {
                let fila = tabla.insertRow();
                celdaVacia("", fila);

                tablaAnime(elemento, fila);
                tablaEstado(elemento, fila);
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
                let fila = tabla.insertRow();
                celdaVacia("", fila);

                tablaAnime(elemento, fila);
                tablaEstado(elemento, fila);
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
                celdaVacia(JSON.stringify(data), fila);
                tablaAnime("", fila);
                tablaEstado("", fila);
        }
    });
}

function SubirEstado(valores) {
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Subir.php",
        data:{nombre:valores[1],temporada:valores[2],capitulo:valores[3],estado:valores[4]},
        success:function(res){
            actualizarLista()

            //alert(res);
            //valores[1] = valores[1].charAt(0);
            //ListarPorInicialAnime(["ANIME", valores[1]]);
            //alert(res);
        }
    });
}
