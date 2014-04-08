<?php
class DateHelper extends AppHelper{

	public $helpers = array('Html');

	function time_elapsed_string($ptime) {
		$date = new DateTime($ptime);
		$ptime = $date->getTimestamp();

	    $etime = time() - $ptime;

	    if ($etime < 1)
	    {
	        return '0 secondes';
	    }

	    $a = array(
		    12 * 30 * 24 * 60 * 60 => 'année',
	        30 * 24 * 60 * 60 => 'mois',
	        24 * 60 * 60 => 'jour',
	        60 * 60 => 'heure',
	        60 => 'minute',
	        1 => 'seconde'
	    );

	    foreach ($a as $secs => $str)
	    {
	        $d = $etime / $secs;

	        if ($d >= 1)
	        {
	            $r = round($d);
	            if ($str == 'mois') {
	            	return 'il y a ' . $r . ' ' . $str;
	            } else {
	            	return 'il y a ' . $r . ' ' . $str . ($r > 1 ? 's' : '');
	            }
	        }
	    }
	}

	function aff_date($date, $lang = 'fr', $format_fr="%d %B %Y", $format_en ="%B %d, %Y") {
	    $date_formatee = "";
	    
	    $format = $format_fr;
	    if ($lang == 'en') $format = $format_en;
	                
	                
	    if ($lang == 'fr') setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
	            
	    $date_strtotime = strtotime($date);
	    $date_formatee = strftime($format,$date_strtotime);
	    return $date_formatee;
	}
}
