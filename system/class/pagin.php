<?php
/*
**		@author     	Võ Tiến Diễn							**
**		@version    	4.0										**
**		@phone			01699.768.750							**
**		@Facebook		http://fb.com/votiendien95				**
**		@email			tiendien95@gmail.com					**
**		@copyright  	Copyright (C) 2016						**
*/
class pagin extends helper {
    public function get_paging ($kmess,$view = null) {
        if (isset($view)) {
            $page=$this->param_paging($view);
        } else {
            $page=intval($this->param_paging());
        }
        if ($this->is_paging($view)) {
            if ($page==0) {
                return 0;
            } else {
                return $page*$kmess-$kmess;
            }
        } else {
            return 0;
        }
    }
	public function paging($theme,$total,$kmess,$view=null)
    {
        $url=$this->url($theme,$view);
        $start=$this->get_paging($kmess,$view);
        $neighbors = 2;
        if ($start >= $total)
            $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
        else
            $start = max(0, (int)$start - ((int)$start % (int)$kmess));
        $base_link = '<li><a href="' . strtr($url, array('%' => '%%')) . '/%d/'.$this->all_param($view).'' . '">%s</a></li>';
        $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt;');
        if ($start > $kmess * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start > $kmess * ($neighbors + 1))
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start >= $kmess * $nCont) {
                $tmpStart = $start - $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        $out[] = '<li class="active"><a href="#" aria-label="Previous"><span aria-hidden="true">' . ($start / $kmess + 1) . '</span></a></li>';
        $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start + $kmess * $nCont <= $tmpMaxPages) {
                $tmpStart = $start + $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages)
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        if ($start + $kmess * $neighbors < $tmpMaxPages)
            $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
        if ($start + $kmess < $total) {
            $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
            $out[] = ''.sprintf($base_link, $display_page, '&gt;&gt;').'';
        }

        return implode(' ', $out);
    }




}
?>