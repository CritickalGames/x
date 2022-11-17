window.addEventListener("load", main);
window.addEventListener("load", main2);


function main() {
    document.getElementById("btnANIME")
        .addEventListener("click", btnAnime);
    document.getElementById("sANIME")
        .addEventListener("change", selectAnime);
}


function btnAnime() {
    
}

function selectAnime(params) {
    let select = $("#sANIME").val();
    let btn = $("#btnANIME");

    alert(select);
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