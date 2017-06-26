<?php
/*
**		@author     	Võ Tiến Diễn							**
**		@version    	1.0										**
**		@phone			01699.768.750							**
**		@Facebook		http://fb.com/votiendien95				**
**		@email			tiendien95@gmail.com					**
**		@copyright  	Copyright (C) 2016						**
*/


class helper extends core 
{
    public function asset ($path,$theme) {
        if ($theme=="admin") {
            return $this->base_url."/admin/".$this->theme($theme)."/".$path."";
        } else {
            return $this->base_url."/home/".$this->theme($theme)."/".$path."";
        }
    }
    

}
?>