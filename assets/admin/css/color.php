<?php
header ("Content-Type:text/css");
$color = "#746EF1"; // Change your Color Here
$color2 = "#746EF1"; // Change your Color Here
function checkhexcolor($color) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}
function checkhexcolor2($color2) {
    return preg_match('/^#[a-f0-9]{6}$/i', $color2);
}
if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
    $color = "#".$_GET[ 'color' ];
}
if( !$color OR !checkhexcolor( $color ) ) {
    $color = "#746EF1";
}
if( isset( $_GET[ 'color2' ] ) AND $_GET[ 'color2' ] != '' ) {
    $color2 = "#".$_GET[ 'color2' ];
}
if( !$color OR !checkhexcolor2( $color2 ) ) {
    $color2 = "#746EF1";
}
function hex2rgba( $color, $opacity) {
    if ($color[0] == '#') {
        $color = substr($color, 1);
    }
    if (strlen($color) == 6) {
        list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    } elseif (strlen($color) == 3) {
        list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity.')';
    return $rgb;
}
function hex2rgba2( $color2, $opacity2) {
    if ($color2[0] == '#') {
        $color2 = substr($color2, 1);
    }
    if (strlen($color2) == 6) {
        list($r, $g, $b) = array($color2[0] . $color2[1], $color2[2] . $color2[3], $color2[4] . $color2[5]);
    } elseif (strlen($color2) == 3) {
        list($r, $g, $b) = array($color2[0] . $color2[0], $color2[1] . $color2[1], $color2[2] . $color2[2]);
    } else {
        return false;
    }
    $r = hexdec($r);
    $g = hexdec($g);
    $b = hexdec($b);
    $rgb = 'rgba('.$r. ',' .$g .',' .$b. ',' . $opacity2.')';
    return $rgb;
}
?>

.card-header, .app-header , .app-sidebar, .treeview-menu  {
    background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
    background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
    background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
    color:#fff;
}
.card-header {
    font-size:24px;
}

.app-header__logo{
    background: transparent;
}


.app-menu__item.active, .app-menu__item:hover, .app-menu__item:focus , .treeview.is-expanded [data-toggle="treeview"] {
    background: #000036;
    border-left-color: #2ecc71;
    text-decoration: none;
    color: #fff;
}

.treeview-item.active, .treeview-item:hover, .treeview-item:focus {
    background: #000036;
}

.app-sidebar__toggle:focus, .app-sidebar__toggle:hover {
    background-color: #2ecc71;
}