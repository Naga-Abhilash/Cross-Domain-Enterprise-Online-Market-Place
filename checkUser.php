<?php

function redirect($url, $value, $key) {
    $html = "<html><body><form id='form' action='$url' method='post'>";
    $html .= "<input type='hidden' name='status' value=$value>";
    $html .= "<input type='hidden' name='marketuser' value=$key>";
    $html .= "</form><script>document.getElementById('form').submit();</script>";
    $html .= "</body></html>";
    print($html);
}


	$site = $_GET['site'];
	if($site==="paradise")
	{
	    if(isset($_COOKIE['marketuser']))
	    {
	        $key = $_COOKIE['marketuser'];
            redirect("http://nagajulakanti.com/paradise/index.php", "success", $key);	        
	    }
	    else
	    {
	        redirect("http://nagajulakanti.com/paradise/index.php", "failure", "");	 
	    }
	    

	}
	else if($site==="makeup")
	{
	    if(isset($_COOKIE['marketuser']))
	    {
	        $key = $_COOKIE['marketuser'];
            redirect("http://janakidwadasi.xyz/goGirls/index.php", "success", $key);	        
	    }
	    else
	    {
	        redirect("http://janakidwadasi.xyz/goGirls/index.php", "failure", "");	 
	    }
	    

	}

?>