<?php
require_once "../USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    $inicial = $_POST['inicial'];
    $nombre = $_POST['nombre'];
    

    if (($inicial!=NULL) && ($nombre!=NULL)) {
        $ultimaTupla = $objUserAdmin->mostrarUltimosXAnimeWhere(1,"IdAnime='$inicial'");
        $IDdelUltimo =  intval($ultimaTupla[0]["IdNumero"]);
        
        $count = $objUserAdmin->agruparAnimePorInicial($inicial);
        
        $totalTupla = $count[0]["count(IdAnime)"];
        
        $lista = $objUserAdmin->mostrarPrimerosXAnimeWhere($totalTupla,"IdAnime='$inicial'");
    
        if (($IDdelUltimo!=$totalTupla)) {
            $bool = true;
            for ($j=0, $i=1; $j <$totalTupla ; $j++) { 
                $IdNumerica=$lista[$j]["IdNumero"];
                if ($bool) {
                    for ($i; $i <= $IDdelUltimo; $i++) { 
                        if ($IdNumerica==$i) {
                            $i++;
                            break;
                        }else {
                            $objUserAdmin->subirAnime("$inicial","$i","$nombre");
                            $bool=false;
                            $subido=$objUserAdmin->conseguirAnimeById("$inicial", "$i");
                                echo json_encode($subido[0]);
                            break;
                        }
                    }
                }else{
                    break;
                }
            }
        }else{
            $objUserAdmin->subirAnime("$inicial",($totalTupla+1),"$nombre");
                $subido=$objUserAdmin->conseguirAnimeById("$inicial", ($totalTupla+1));
                echo json_encode($subido[0]);
        }
    
    }else{
        echo "Inicial: $inicial <br>";
        echo "Nombre: $nombre <br>";
    }

    
?>