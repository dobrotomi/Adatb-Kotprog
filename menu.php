<?php

function menu() {

    $menu = '<nav class="navbar navbar-inverse">';
        $menu .= '<div class="containder-fluid">';
            $menu .= '<ul class="nav navbar-nav">';
                $menu .= '<li><a href="../Kezdolap/kezdolap.php">Műsorújság</a></li>';
                $menu .= '<li><a href="../Kezdolap/statisztika.php">Statisztikák</a></li>';
                $menu .= '<li><a href="../Musorujsagosszeallit/musorujsagosszeallit.php">Műsorújság összeállítása</a></li>';
                $menu .= '<li><a href="../Csatornak/csatornak.php">Csatornák</a></li>';
                $menu .= '<li><a href="../Sztomusor/szereploktomusor.php">Szereplők hozzáadása műsorhoz</a></li>';
                $menu .= '<li><a href="../Szereplok/szereplok.php">Szereplők</a></li>';
                $menu .= '<li><a href="../Musorok/musorok.php">Műsorok</a></li>';
                $menu .= '<li><a href="../Rendezo/rendezo.php">Rendezők</a></li>';
            $menu .= '</ul>';
        $menu .= '</div>';
    $menu .= '</nav>';



    return $menu;
}

?>


