<?php
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class	ve_number
{
//	Public	function
	public function price($wtext)
    {
            $tong=strlen($wtext);
            $wtext=strrev($wtext);
            $wso='';
            for ($i=1;$i<=$tong;$i++)
            {
                    if ($i % 3 == 0)
                    {
                            $wso=$wso.substr($wtext,($i-1),1).'.';
                    }
                    else
                    {
                            $wso=$wso.substr($wtext,($i-1),1);
                    }
            }
            $wso=strrev($wso);
            if (substr($wso,0,1)=='.')
            {
                    $wso=substr($wso,1,($tong+2));
            }
            return $wso;
    }
}
?>