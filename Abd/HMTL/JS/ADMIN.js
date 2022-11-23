window.addEventListener("load", main);
window.addEventListener("load", main2);


function main() {
    ListarPorInicialAnime(["Anime", ""]);

    document.getElementById("btnANIME")
        .addEventListener("click", btnAnime);
    document.getElementById("sANIME")
        .addEventListener("change", selectAnime);
}


function btnAnime() {
    let btn = $("#btnANIME");
    switch (btn.text()) {
        case "Subir":
            let inicialSUBIR = document.getElementById("inicialANIME").value;
            let nombreSUBIR = document.getElementById("nombreANIME").value;
            inicialSUBIR = inicialSUBIR.charAt(0);
            
            SubirAnime(["Anime", inicialSUBIR, nombreSUBIR]);
        break;
        case "Borrar":
            let inicialBORRAR = document.getElementById("inicialANIME").value;
            let IdBORRAR = inicialBORRAR.slice(1);
            inicialBORRAR = inicialBORRAR.charAt(0);

            BorrarAnime(["Anime", inicialBORRAR, IdBORRAR]);
        break;
        case "Buscar":
            let nombreBUSCAR = document.getElementById("nombreANIME").value;
            
            BuscarAnime(["Anime", nombreBUSCAR]);
        break;
        case "Editar":
            let inicialEDITAR = document.getElementById("inicialANIME").value;
            inicialEDITAR=inicialEDITAR.charAt(0);
            let idEDITAR = document.getElementById("inicialANIME").value;
            idEDITAR=idEDITAR.slice(1);
            let nombreEDITAR = document.getElementById("nombreANIME").value;

            EditarAnime(["Anime", inicialEDITAR, idEDITAR, nombreEDITAR]);
        break;
        case "Listar":
            ListarAnime(["Anime"]);
        break;
        case "Inicial":
            let inicialINICIAL = document.getElementById("inicialANIME").value;
            inicialINICIAL = inicialINICIAL.charAt(0);

            ListarPorInicialAnime(["Anime", inicialINICIAL]);
        break;
        case "Contar":
            ContarAnime(["Anime"]);
        break;
        default:
            alert(btn.text());
            break;
    }
}

function selectAnime(params) {
    let select = $("#sANIME").val();
    let btn = $("#btnANIME");

    btn.text(select);
}

///////////////////////////////////////////////////////////////
function SubirAnime(valores) {
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Subir.php",
        data:{inicial:valores[1],nombre:valores[2]},
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
        data:{IdIBORRAR:valores[1],IdNBORRAR:valores[2]},
        success:function(res){
            ListarPorInicialAnime(["Anime", valores[1]]);
            //alert(res);
        }
    });
}
function ListarPorInicialAnime(valores) {
    $("#noBorrar").nextAll("tr").remove();

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
                //alert("entra");
                let fila = tabla.insertRow();
                let celda0 = fila.insertCell();
                celda0.innerHTML="";
                
                let celda1 = fila.insertCell();
                celda1.innerHTML=elemento.Inicial+elemento.Id;
                                
                let celda2 = fila.insertCell();
                celda2.innerHTML=elemento.nombre;
                //alert("funciona");
                let celda3 = fila.insertCell();
                celda3.innerHTML="";

                let celda4 = fila.insertCell();
                celda4.innerHTML="";

                let celda5 = fila.insertCell();
                celda5.innerHTML="";
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
                //alert("entra");
                let fila = tabla.insertRow();
                let celda0 = fila.insertCell();
                celda0.innerHTML="";
                
                let celda1 = fila.insertCell();
                celda1.innerHTML=elemento.Inicial+elemento.Id;

                let celda2 = fila.insertCell();
                celda2.innerHTML=elemento.nombre;
                //alert("funciona");
                let celda3 = fila.insertCell();
                celda3.innerHTML="";

                let celda4 = fila.insertCell();
                celda4.innerHTML="";

                let celda5 = fila.insertCell();
                celda5.innerHTML="";
            }
        }
    });
}
function EditarAnime(valores) {
    $.ajax({
        type:"POST",
        url:"PHP/"+valores[0]+"/Editar.php",
        data:{inicial:valores[1],id:valores[2],nombre:valores[3]},
        success:function(res){
            ListarPorInicialAnime(["Anime", valores[1]]);
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
                //alert("entra");
                let fila = tabla.insertRow();
                let celda0 = fila.insertCell();
                celda0.innerHTML="";
                
                let celda1 = fila.insertCell();
                celda1.innerHTML=elemento.Inicial+elemento.Id;
                                
                let celda2 = fila.insertCell();
                celda2.innerHTML=elemento.nombre;
                //alert("funciona");
                let celda3 = fila.insertCell();
                celda3.innerHTML="";

                let celda4 = fila.insertCell();
                celda4.innerHTML="";

                let celda5 = fila.insertCell();
                celda5.innerHTML="";
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
            alert(data);
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