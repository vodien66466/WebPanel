<?php
/*
**		@author     	Võ Tiến Diễn							**
**		@version    	4.0										**
**		@phone			01699.768.750							**
**		@Facebook		http://fb.com/votiendien95				**
**		@email			tiendien95@gmail.com					**
**		@copyright  	Copyright (C) 2016						**
*/


class pagin {
	///phân trang 2
	public function get_p_2 ($kmess_2) {
        $page_2_2=intval($_GET['page_2']);
        $start_2 = isset($_GET['page_2']) ? $page_2_2 * $kmess_2 - $kmess_2 : (isset($_GET['start_2']) ? abs(intval($_GET['start_2'])) : 0);
        return $start_2;
    }

    public function p_2($url, $start_2, $total, $kmess_2)
    {
        $neighbors = 2;
        if ($start_2 >= $total)
            $start_2 = max(0, $total - (($total % $kmess_2) == 0 ? $kmess_2 : ($total % $kmess_2)));
        else
            $start_2 = max(0, (int)$start_2 - ((int)$start_2 % (int)$kmess_2));
        $base_link = '<li><a href="' . strtr($url, array('%' => '%%')) . 'page_2=%d' . '">%s</a></li>';
        $out[] = $start_2 == 0 ? '' : sprintf($base_link, $start_2 / $kmess_2, '&lt;&lt;');
        if ($start_2 > $kmess_2 * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start_2 > $kmess_2 * ($neighbors + 1))
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start_2 >= $kmess_2 * $nCont) {
                $tmpstart_2 = $start_2 - $kmess_2 * $nCont;
                $out[] = sprintf($base_link, $tmpstart_2 / $kmess_2 + 1, $tmpstart_2 / $kmess_2 + 1);
            }
        $out[] = '<li class="active"><a href="#" aria-label="Previous"><span aria-hidden="true">' . ($start_2 / $kmess_2 + 1) . '</span></a></li>';
        $tmpMaxpage_2s = (int)(($total - 1) / $kmess_2) * $kmess_2;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start_2 + $kmess_2 * $nCont <= $tmpMaxpage_2s) {
                $tmpstart_2 = $start_2 + $kmess_2 * $nCont;
                $out[] = sprintf($base_link, $tmpstart_2 / $kmess_2 + 1, $tmpstart_2 / $kmess_2 + 1);
            }
        if ($start_2 + $kmess_2 * ($neighbors + 1) < $tmpMaxpage_2s)
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        if ($start_2 + $kmess_2 * $neighbors < $tmpMaxpage_2s)
            $out[] = sprintf($base_link, $tmpMaxpage_2s / $kmess_2 + 1, $tmpMaxpage_2s / $kmess_2 + 1);
        if ($start_2 + $kmess_2 < $total) {
            $display_page_2 = ($start_2 + $kmess_2) > $total ? $total : ($start_2 / $kmess_2 + 2);
            $out[] = ''.sprintf($base_link, $display_page_2, '&gt;&gt;').'';
        }

        return implode(' ', $out);
    }





    ///phân trang 3
	public function get_p_3 ($kmess_3) {
        $page_3_3=intval($_GET['page_3']);
        $start_3 = isset($_GET['page_3']) ? $page_3_3 * $kmess_3 - $kmess_3 : (isset($_GET['start_3']) ? abs(intval($_GET['start_3'])) : 0);
        return $start_3;
    }

    public function p_3($url, $start_3, $total, $kmess_3)
    {
        $neighbors = 2;
        if ($start_3 >= $total)
            $start_3 = max(0, $total - (($total % $kmess_3) == 0 ? $kmess_3 : ($total % $kmess_3)));
        else
            $start_3 = max(0, (int)$start_3 - ((int)$start_3 % (int)$kmess_3));
        $base_link = '<li><a href="' . strtr($url, array('%' => '%%')) . 'page_3=%d' . '">%s</a></li>';
        $out[] = $start_3 == 0 ? '' : sprintf($base_link, $start_3 / $kmess_3, '&lt;&lt;');
        if ($start_3 > $kmess_3 * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start_3 > $kmess_3 * ($neighbors + 1))
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start_3 >= $kmess_3 * $nCont) {
                $tmpstart_3 = $start_3 - $kmess_3 * $nCont;
                $out[] = sprintf($base_link, $tmpstart_3 / $kmess_3 + 1, $tmpstart_3 / $kmess_3 + 1);
            }
        $out[] = '<li class="active"><a href="#" aria-label="Previous"><span aria-hidden="true">' . ($start_3 / $kmess_3 + 1) . '</span></a></li>';
        $tmpMaxpage_3s = (int)(($total - 1) / $kmess_3) * $kmess_3;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start_3 + $kmess_3 * $nCont <= $tmpMaxpage_3s) {
                $tmpstart_3 = $start_3 + $kmess_3 * $nCont;
                $out[] = sprintf($base_link, $tmpstart_3 / $kmess_3 + 1, $tmpstart_3 / $kmess_3 + 1);
            }
        if ($start_3 + $kmess_3 * ($neighbors + 1) < $tmpMaxpage_3s)
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        if ($start_3 + $kmess_3 * $neighbors < $tmpMaxpage_3s)
            $out[] = sprintf($base_link, $tmpMaxpage_3s / $kmess_3 + 1, $tmpMaxpage_3s / $kmess_3 + 1);
        if ($start_3 + $kmess_3 < $total) {
            $display_page_3 = ($start_3 + $kmess_3) > $total ? $total : ($start_3 / $kmess_3 + 2);
            $out[] = ''.sprintf($base_link, $display_page_3, '&gt;&gt;').'';
        }

        return implode(' ', $out);
    }








    ///phân trang 4
	public function get_p_4 ($kmess_4) {
    	$page_4_4=intval($_GET['page_4']);
		$start_4 = isset($_GET['page_4']) ? $page_4_4 * $kmess_4 - $kmess_4 : (isset($_GET['start_4']) ? abs(intval($_GET['start_4'])) : 0);
		return $start_4;
    }

    public function p_4($url, $start_4, $total, $kmess_4)
    {
        $neighbors = 2;
        if ($start_4 >= $total)
            $start_4 = max(0, $total - (($total % $kmess_4) == 0 ? $kmess_4 : ($total % $kmess_4)));
        else
            $start_4 = max(0, (int)$start_4 - ((int)$start_4 % (int)$kmess_4));
        $base_link = '<li><a href="' . strtr($url, array('%' => '%%')) . 'page_4=%d' . '">%s</a></li>';
        $out[] = $start_4 == 0 ? '' : sprintf($base_link, $start_4 / $kmess_4, '&lt;&lt;');
        if ($start_4 > $kmess_4 * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start_4 > $kmess_4 * ($neighbors + 1))
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start_4 >= $kmess_4 * $nCont) {
                $tmpstart_4 = $start_4 - $kmess_4 * $nCont;
                $out[] = sprintf($base_link, $tmpstart_4 / $kmess_4 + 1, $tmpstart_4 / $kmess_4 + 1);
            }
        $out[] = '<li class="active"><a href="#" aria-label="Previous"><span aria-hidden="true">' . ($start_4 / $kmess_4 + 1) . '</span></a></li>';
        $tmpMaxpage_4s = (int)(($total - 1) / $kmess_4) * $kmess_4;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start_4 + $kmess_4 * $nCont <= $tmpMaxpage_4s) {
                $tmpstart_4 = $start_4 + $kmess_4 * $nCont;
                $out[] = sprintf($base_link, $tmpstart_4 / $kmess_4 + 1, $tmpstart_4 / $kmess_4 + 1);
            }
        if ($start_4 + $kmess_4 * ($neighbors + 1) < $tmpMaxpage_4s)
            $out[] = '<li class="disabled"><a href="#">...</a></li>';
        if ($start_4 + $kmess_4 * $neighbors < $tmpMaxpage_4s)
            $out[] = sprintf($base_link, $tmpMaxpage_4s / $kmess_4 + 1, $tmpMaxpage_4s / $kmess_4 + 1);
        if ($start_4 + $kmess_4 < $total) {
            $display_page_4 = ($start_4 + $kmess_4) > $total ? $total : ($start_4 / $kmess_4 + 2);
            $out[] = ''.sprintf($base_link, $display_page_4, '&gt;&gt;').'';
        }

        return implode(' ', $out);
    }




}
?>