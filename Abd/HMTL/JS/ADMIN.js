window.addEventListener("load", main);
window.addEventListener("load", main2);


function main() {
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
            $.ajax({
                type:"POST",
                url:"PHP/Anime/Subir.php",
                data:{inicial:inicialSUBIR,nombre:nombreSUBIR},
                //dataType: "json",
                success:function(res){
                    alert(res);
                    //alert("ID: "+res.Inicial+"-"+res.Id+" Nombre: "+res.nombre);
                }
            });
        break;
        case "Borrar":
            let IdIBORRAR = document.getElementById("inicialANIME").value;
            let IdNBORRAR = document.getElementById("nombreANIME").value;
            $.ajax({
                type:"POST",
                url:"PHP/Anime/Borrar.php",
                data:{IdIBORRAR:IdIBORRAR,IdNBORRAR:IdNBORRAR},
                success:function(res){
                    alert(res);
                }
            });
        break;
        case "Buscar":
            
        break;
        case "Editar":
            
        break;
        case "Listar":
            
        break;
        case "Inicial":
            let inicialINICIAL = document.getElementById("inicialANIME").value;
            //$("#noBorrar").nextAll("tr").children().remove();
            $.ajax({
                type:"POST",
                url:"PHP/Anime/Inicial.php",
                data:{inicial:inicialINICIAL},
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