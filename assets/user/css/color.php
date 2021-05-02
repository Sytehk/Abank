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





.aboutTop .box:hover {
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
}


.site-preloader {
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);

}
#mainHeader.header.stiky {
position: fixed;
top: 0;
left: 0;
width: 100%;
z-index: 9999;
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
border-bottom: 0px;
box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
}

.sectionSeparator {
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
}
.tab-content::after {

background: -webkit-linear-gradient(to right, rgba(240, 181, 253, 0.30), rgba(82, 113, 196, 0.30));
background: -moz-linear-gradient(to right, rgba(240, 181, 253, 0.30), rgba(82, 113, 196, 0.30));
background: linear-gradient(to right, rgba(22, 114, 183, 0.19), rgba(82, 113, 196, 0.30));
z-index: -1;
border-radius: 10px;
}


.calculate .box {
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%););

}

#footer .newslatterBox .box {
background: <?php echo $color ?>;
}
#welcomeArea .topcontent {
padding: 240px 0px 140px;
}

/*tamim style*/

.header .navbar-nav .dropdown-menu {
    display: block;
    visibility: hidden;
    opacity: 0;
    margin-top: 40px;
}

.header .nav-item.dropdown:hover .dropdown-menu {
    visibility: visible;
    opacity: 1;
}



.card-header {
padding: .75rem 1.25rem;
margin-bottom: 0;
background-color: <?php echo $color ?>;
border-bottom: 1px solid <?php echo $color ?>;
color: white;
font-size: 24px;
}
.card {
border: 1.5px solid <?php echo $color ?>;
}

.viweBtn {

border: 2px solid <?php echo $color ?>;
color: <?php echo $color ?>;
text-align: center;
background: none;
line-height: 36px;
text-transform: uppercase;

border-radius: 4px;
display: inline-block;
}
.viweBtn:hover {
border-color: <?php echo $color ?>;
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
color: #fff;
}

.table tr td {
color: #fff;
font-weight: 400;
font-size: 16px;
text-align: center;
padding: 20px 0px 0px 12px;
}

.dropdown a {
transition: 0.4s;
}

.dropdown-menu {
opacity: 0;
visibility: hidden;
transition: all 0.5s;
display: block;
background: #0c2127;
margin-top: 23px;
width: 220px;
}

.dropdown:hover .dropdown-menu {
opacity: 1;
visibility: visible;
border-radius: 0;
}

.dropdown-menu a {
text-transform: capitalize !important;
font-weight: normal !important;
letter-spacing: initial !important;
padding-top: 7px;
padding-bottom: 7px;
}



.dropdown-menu a:focus {
background: #0c2127;
color: var(--cl-white);
}

.menu-toggle {
position: relative;
display: block;
width: 25px;
height: 20px;
background: transparent;
border-top: 2px solid #fff;
border-bottom: 2px solid #fff;
color: var(--primary-color);
font-size: 0;
-webkit-transition: all 0.25s ease-in-out;
-o-transition: all 0.25s ease-in-out;
transition: all 0.25s ease-in-out;
}
.menu-toggle:before, .menu-toggle:after {
content: '';
display: block;
width: 100%;
height: 2px;
position: absolute;
top: 50%;
left: 50%;
background: #fff;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
transition: -webkit-transform 0.25s ease-in-out;
-webkit-transition: -webkit-transform 0.25s ease-in-out;
-o-transition: -webkit-transform 0.25s ease-in-out;
transition: transform 0.25s ease-in-out;
-moz-transition: -webkit-transform 0.25s ease-in-out;
-ms-transition: -webkit-transform 0.25s ease-in-out;
}
span.is-active {
border-color: transparent;
}
span.is-active:before {
-webkit-transform: translate(-50%, -50%) rotate(45deg);
-ms-transform: translate(-50%, -50%) rotate(45deg);
transform: translate(-50%, -50%) rotate(45deg);
}
span.is-active:after {
-webkit-transform: translate(-50%, -50%) rotate(-45deg);
-ms-transform: translate(-50%, -50%) rotate(-45deg);
transform: translate(-50%, -50%) rotate(-45deg);
}
span.menu-toggle:hover {
color: #ffb606;
}
span.is-active {
border-color: transparent;
}
span.is-active:before {
-webkit-transform: translate(-50%, -50%) rotate(45deg);
-ms-transform: translate(-50%, -50%) rotate(45deg);
transform: translate(-50%, -50%) rotate(45deg);
}
span.is-active:after {
-webkit-transform: translate(-50%, -50%) rotate(-45deg);
-ms-transform: translate(-50%, -50%) rotate(-45deg);
transform: translate(-50%, -50%) rotate(-45deg);
}

.dropdown-toggle::after {
display: none;
}



.header-area {
padding: 27px 0 27px;
position: fixed;
top: 0;
width: 100%;
z-index: 3;
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
}



.main-menu ul li:last-child {
margin-right: 0px;
}

.main-menu ul li a {
color: #fff;
opacity: .8;
font-family: var(--heading-font);
font-weight: 600;
font-size: 15px;
text-transform: uppercase;
letter-spacing: 1px;
}

.main-menu ul li a:hover {
color: #ffffff;
opacity: unset;
}
.dropdown-menu a:hover {
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
}

.menu-btn {
margin-left: 10px;
}



@media (max-width: 991px){

.navbar-brand {
margin-left: 15px;
}

.main-menu ul li {
margin-right: 0;
position: relative;
margin: 3px 0;
}

.main-menu ul li.dropdown:after {
position: absolute;
content: "\f107";
font-family: FontAwesome;
right: 0;
top: 0;
color: #fff;
line-height: 45px;
overflow: hidden;
z-index: -1;
width: 45px;
text-align: center;
}

.dropdown-menu {
display: none;
}
.dropdown-menu {
width: auto;
margin: 10px 0;
background: #16272b;
}

.navbar-collapse {
padding-top: 20px;
}

.menu-btn {
margin-left: 0;
margin-top: 15px;
}
.menu-btn a {

}
}

@media (max-width: 575px){

.navbar-brand {
margin-left: 0;
}
}


.bttn-mid {
position: relative;
font-size: 16px;
font-weight: 600;
padding: 12px 45px;
display: inline-block;
cursor: pointer;
font-family: var(--heading-font);
text-transform: capitalize;
transition: 0.4s;
}


.bttn-small {
position: relative;
font-size: 16px;
font-weight: 600;
padding: 4px 25px;
display: inline-block;
cursor: pointer;
font-family: var(--heading-font);
transition: 0.4s;
text-transform: uppercase;
}


.bttn-mid i {
margin-right: 5px;
font-weight: normal;
}

.btn-fill{
background: #FF2056;
color: #fff;
border: 2px solid #FF2056;
}

.btn-fill:hover{
border: 2px solid #fff;
color: #fff;
background: transparent;
}

.btn-emt{
background: transparent;
color: #fff;
border: 2px solid #fff;
}

.btn-emt:hover{
color: #fff;
box-shadow: none;
background: #FF2056;
border: 2px solid transparent;
}



.btn-wht{
background: #fff;
color: #EB3B5A;
}

.btn-wht:hover{
background: #FF2056;
color:#fff;
}


.viewPlan a {
width: 140px;
height: 50px;
display: inline-block;
border: 2px solid #fff;
text-align: center;
line-height: 50px;
color: #fff;
text-transform: uppercase;
margin-left: 30px;
border-radius: 4px;
}

.viewPlan a:hover {
background: #fff;
border-color: #fff;
color: <?php echo $color ?>;
}

.mr_btn_solid:hover{
background: #fff;
border-color: <?php echo $color ?>;
color: <?php echo $color ?>;
}

.mr_btn_solid {

border: 2px solid #fff;
color: #fff;
background-color: <?php echo $color ?>;
}


@media (max-width: 991.98px){
 .viewPlan a {
margin-left: 30px;
margin-bottom: 40px;
}
}

.deposit-st{
color: #fff;
}.method-st{
color: #fff;
}

.tab-content {
border-radius: 10px;
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
position: relative;
}

.priceBox .button a {

background: -webkit-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: -moz-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
}
.priceBox:hover {

background: -webkit-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: -moz-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
}


.aboutTop .box i {

background: <?php echo $color ?>
}
.aboutTop .box i {

background: -webkit-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: -moz-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
-webkit-background-clip: text;
}





.aboutTop .box span {

background: -webkit-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: -moz-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
-webkit-background-clip: text;

}
#welcomeArea .topcontent {
padding: 240px 0px 130px;
}

.margin-bottom-30{
margin-bottom: 30px;
}

.calculate .box::after {
background: linear-gradient(to right, rgba(22, 114, 183, 0.35), rgba(82, 113, 196, 0.30));

}





.select2-container--default .select2-selection--single {
background-color: unset !important;
background: none !important;
border-top: 0px !important;
border-left: 0px !important;
border-right: 0px !important;
border-bottom: 1px solid rgba(255, 255, 255, 0.30) !important;
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
color: #fff !important;
line-height: 28px !important;
}
.select2-container--default .select2-selection--single .select2-selection__arrow b {
border-color: #fff transparent transparent transparent !important;
}
.select2-container .select2-selection--single .select2-selection__rendered {

padding-left: unset !important;;
}

.tab1 ul li a p {

color: <?php echo $color ?>;
}

.tab1 .nav-pills .nav-link.active {
background: -webkit-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: -moz-linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
background: linear-gradient(to right, <?php echo $color ?>, <?php echo $color2 ?>);
}

#transaction .tab1 ul {
border: 2px solid <?php echo $color ?>;
}

#investor .left .box {

background: -webkit-linear-gradient(to right, #efb1fd, #5271c4);
background: -moz-linear-gradient(to right, #efb1fd, #5271c4);
background: linear-gradient(to right, <?php echo $color ?>, #5271c4);
}

#paymentMethod .box a {
font-weight: 600;
font-family: 'Poppins', sans-serif;
background: -webkit-linear-gradient(to right, #efb1fd, #5271c4);
background: -moz-linear-gradient(to right, #efb1fd, #5271c4);
background: #fff;
-webkit-background-clip: text;
-moz-background-clip: text;
-webkit-text-fill-color: transparent;
-moz-text-fill-color: transparent;
position: relative;
}

#footer .box .social_links i {
background: #1672B7;
}

#footer {
background: #1e3056;
padding: 0px 0px 0px;
}

@media (max-width: 767px){
.social_links {
text-align: center;

}
.banding{
margin-left: 115px;
}
}
@media (max-width: 360px){

.banding{
margin-left: 50px;
}
}



.padding-top-10{
padding-top: 10px;
}
}

.viewPlan a {
width: 100%;
height: 50px;
display: inline-block;
border: 2px solid #fff;
text-align: center;
line-height: 50px;
color: #fff;
text-transform: uppercase;
margin-left: 30px;
border-radius: 4px;
}

.viewPlan a:hover {
color: <?php echo $color ?>;
}
.viewPlan a:hover {
background: #fff;
border-color: #fff;

}

#paymentMethod form button:hover {
border-color: #fff;
background: #fff;
color: <?php echo $color ?>;
}

.padding-bottom-70{
padding-bottom: 70px;
}

.priceBox .header h3 {

background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
-webkit-background-clip: text;
-moz-background-clip: text;
-webkit-text-fill-color: transparent;
-moz-text-fill-color: transparent;
}

.card-footer {

 background-color: unset !important;
border-top: unset !important;
}

#investors .box .info h5 {
font-size: 24px;
}

#investors .box .info {
text-align: center;
padding: 0 0px 11px;
}

.dropdown-toggle::after {
display: inline-block;
width: 0;
height: 0;
margin-left: .255em;
vertical-align: .255em;
content: "";
border-top: .3em solid;
border-right: .3em solid transparent;
border-bottom: 0;
border-left: .3em solid transparent;
}

@media (max-width: 991px){
.dropdown-toggle::after {
display: none;
}
}
@media (max-width: 991px){
.nav-link dropdown-toggle {
display: none;
}
}


.sbox::after {
position: absolute;
content: " ";
width: 95%;
height: 100%;
top: 20px;
left: 50%;
transform: translateX(-50%);
background: -webkit-linear-gradient(to right, rgba(240, 181, 253, 0.30), rgba(82, 113, 196, 0.30));
background: -moz-linear-gradient(to right, rgba(240, 181, 253, 0.30), rgba(82, 113, 196, 0.30));
background: linear-gradient(to right, rgba(22, 114, 183, 0.35), rgba(82, 113, 196, 0.30));
z-index: -1;
border-radius: 10px;
}

.sbox{

border-radius: 10px;
padding: 25px 5px 0;
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
position: relative;
}

.fileinput .thumbnail > img {
max-height: 100%;
width: 100%;
border-radius: 100px;
}



.navbar-brand{
color: #fff;
font-weight: 600;
font-size: 30px;
font-family: 'Exo', sans-serif;
}
.navbar-brand:hover{
color: #fff;

}



@media (min-width: 992px){

.main-menu ul li a {
       font-size: 12px;
       }
}
@media (min-width: 1200px){

.main-menu ul li a {
       font-size: 15px;
       }
}


@media (max-width: 991px){

.main-menu ul li a {
       font-size: 15px;
       }
}

#footer {
background: -webkit-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: -moz-linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
background: linear-gradient(-30deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
}






