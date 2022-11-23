<?php
require_once "../USER/Admin.php";
    $objUserAdmin = new UserAdmin();

    
    if ($_POST) {
        $inicial = strtoupper($_POST['inicial']);
        $nombre = $_POST['nombre'];

        $ultimaTupla =  $objUserAdmin->listarAnimePorInicial($inicial);
    $numeroDeTuplas = count($objUserAdmin->listarAnimePorInicial($inicial));
    $IDdelUltimo =  intval($ultimaTupla[$numeroDeTuplas-1]["Id"]);

    if (($inicial!=NULL) && ($nombre!=NULL)) {
        if (($IDdelUltimo!=$numeroDeTuplas)) {
            $bool = true;
            for ($j=0, $i=1; $j <$numeroDeTuplas ; $j++) { 
                $IdNumerica=$ultimaTupla[$j]["Id"];
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
            $objUserAdmin->subirAnime("$inicial",($numeroDeTuplas+1),"$nombre");
                $subido=$objUserAdmin->conseguirAnimeById("$inicial", ($numeroDeTuplas+1));
                echo json_encode($subido[0]);
        }
    
    }else{
    $ultimaTupla =  $objUserAdmin->listarAnime();
    echo json_encode($ultimaTupla[count($objUserAdmin->listarAnime())-1]);
    }

    }else{
        echo "MAMAHUEVOOOOO";
    }
    
    
    
?>