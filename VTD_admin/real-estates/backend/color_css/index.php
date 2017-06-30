<?php
if (system::param(0)=="color-1") {
	setcookie("color_css","color-1",time() + 31104000,'/');
} else if (system::param(0)=="color-2") {
	setcookie("color_css","color-2",time() + 31104000,'/');
} else if (system::param(0)=="color-3") {
	setcookie("color_css","color-3",time() + 31104000,'/');
} else if (system::param(0)=="color-4") {
	setcookie("color_css","color-4",time() + 31104000,'/');
} else if (system::param(0)=="color-5") {
	setcookie("color_css","color-5",time() + 31104000,'/');
} else {
	setcookie("color_css","inverse",time() + 31104000,'/');
}
?>