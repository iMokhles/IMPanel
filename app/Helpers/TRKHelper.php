<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 18/02/2018
 * Time: 23:45
 */

namespace App\Helpers;


use Illuminate\Http\Request;

function serverValue($key = null)
{
    $value = "";
    if ($key === "REMOTE_ADDR") {
        $value = Request::capture()->server($key);
//        if ($value === "127.0.0.1") {
//            $value = TRKHelper::getClientIp();
//        }
    }

    return is_null($value) ? '' : $value;
}

class TRKHelper
{
    /*
    *   Get client ip
    */
    public static function getClientIp() {
        $ipaddress = '';
        $ch = curl_init('https://api.ipify.org?format=json');
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = '';
        if (($json = curl_exec($ch)) !== false) {
            // return country code
            $ipaddress = json_decode($json,true)['ip'];
        } else {
            // return false if api failed
            $ipaddress = serverValue('REMOTE_ADDR');
        }

        return $ipaddress;
    }
    /*
    *   Get referrer
    */
    static function getReferrer() {
        global $_SERVER;
        $user_referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']: '';
        $referrer = implode(array_slice(explode('/', preg_replace('/https?:\/\/(www\.)?/', '', $user_referrer)), 0, 1));
        return $referrer;
    }

    /*
    *   Get user country
    */
    static function getCountryName() {
        //get country from api
        $ch = curl_init('http://freegeoip.net/json/'.serverValue('REMOTE_ADDR'));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = '';
        if (($json = curl_exec($ch)) !== false) {
            // return country code
            $country = json_decode($json,true)['country_name'];
            // Save for one month
            setcookie("country",$country,time()+2592000);
        } else {
            // return false if api failed
            $country = "LocalHost_CountryName";
        }
        curl_close($ch);
        return (strlen($country) > 0) ? $country : 'LocalHost_CountryName' ;
    }
    static function getCountryCode() {
        //get country from api
        $ch = curl_init('http://freegeoip.net/json/'.serverValue('REMOTE_ADDR'));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = '';
        if (($json = curl_exec($ch)) !== false) {
            // return country code
            $country = json_decode($json,true)['country_code'];
            // Save for one month
            setcookie("country",$country,time()+2592000);
        } else {
            // return false if api failed
            $country = "LocalHost_CountryCode";
        }
        curl_close($ch);
        return (strlen($country) > 0) ? $country : 'LocalHost_CountryCode' ;
    }

    static function getCity() {
        //get country from api
        $ch = curl_init('http://freegeoip.net/json/'.serverValue('REMOTE_ADDR'));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = '';
        if (($json = curl_exec($ch)) !== false) {
            // return country code
            $country = json_decode($json,true)['city'];
            // Save for one month
            setcookie("country",$country,time()+2592000);
        } else {
            // return false if api failed
            $country = "LocalHost_City";
        }
        curl_close($ch);
        return (strlen($country) > 0) ? $country : 'LocalHost_City' ;
    }

    static function getCountryInfoForIp($ip) {
        //get country from api
        $ch = curl_init('http://freegeoip.net/json/'.$ip);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $json = '';
        if (($json = curl_exec($ch)) !== false) {
            // return country code
            $country = json_decode($json,true);
        } else {
            // return false if api failed
            $country = false;
        }
        curl_close($ch);
        return $country;
    }
    /*
    *   Get user browser
    */
    static function getBrowser() {
        global $_SERVER;
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser		=   "Unknown Browser";
        $browser_array  =   array(
            '/msie/i'	   =>  'Internet Explorer',
            '/firefox/i'	=>  'Firefox',
            '/safari/i'	 =>  'Safari',
            '/chrome/i'	 =>  'Chrome',
            '/edge/i'	   =>  'Edge',
            '/opera/i'	  =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'	=>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/mobile/i'	 =>  'Handheld Browser'
        );
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser	=   $value;
            }
        }
        return $browser;
    }
    public static function getBrowserInfo(){

        $u_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT']:'Unknown';
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version= "";
        //First get the platform?
        if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $u_agent)){

            preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $u_agent,$matches);

            $platform = $matches[0];

        }
        elseif (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';

        }elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif(preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }else{
            $platform = 'Unknown';
        }
        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $bname = 'Apple Safari';
            $ub = "Safari";
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $bname = 'Opera';
            $ub = "Opera";
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $bname = 'Netscape';
            $ub = "Netscape";
        }else{
            $ub='Unknown';
        }
        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }
        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
                $version= $matches['version'][0];
            }
            else {
                $version= isset($matches['version'][1]) ? $matches['version'][1]:'';
            }
        }
        else {
            $version= $matches['version'][0];
        }
        // check if we have a number
        if ($version==null || $version=="") {$version="?";}
        return array(
            'userAgent' => $u_agent,
            'browser'   => $bname,
            'version'   => $version,
            'platform'  => $platform,
        );
    }

    /*
    *   Get user operation system
    */
    static function getOS() {
        global $_SERVER;
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $os_platform    =   "Unknown OS Platform";
        $os_array       =   array(
            '/windows nt 10/i'     =>  'Windows 10',
            '/windows nt 6.3/i'     =>  'Windows 8.1',
            '/windows nt 6.2/i'     =>  'Windows 8',
            '/windows nt 6.1/i'     =>  'Windows 7',
            '/windows nt 6.0/i'     =>  'Windows Vista',
            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
            '/windows nt 5.1/i'     =>  'Windows XP',
            '/windows xp/i'         =>  'Windows XP',
            '/windows nt 5.0/i'     =>  'Windows 2000',
            '/windows me/i'         =>  'Windows ME',
            '/win98/i'              =>  'Windows 98',
            '/win95/i'              =>  'Windows 95',
            '/win16/i'              =>  'Windows 3.11',
            '/macintosh|mac os x/i' =>  'Mac OS X',
            '/mac_powerpc/i'        =>  'Mac OS 9',
            '/linux/i'              =>  'Linux',
            '/ubuntu/i'             =>  'Ubuntu',
            '/iphone/i'             =>  'iPhone',
            '/ipod/i'               =>  'iPod',
            '/ipad/i'               =>  'iPad',
            '/android/i'            =>  'Android',
            '/blackberry/i'         =>  'BlackBerry',
            '/webos/i'              =>  'Mobile'
        );
        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform    =   $value;
            }
        }
        return $os_platform;
    }
    /*
     * Get location
     */
    public static function geolocation($ipaddress){
        $url = "http://www.geoplugin.net/php.gp?ip=".$ipaddress;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);

        $geo = unserialize($data);
        $geolocation = array();
        if(!empty($geo)){
            $geolocation = array(
                'ip' =>$ipaddress,
                'city'=> $geo['geoplugin_city'],
                'division' =>$geo['geoplugin_region'],
                'country' =>$geo['geoplugin_countryName'],
                'latitude' =>$geo['geoplugin_latitude'],
                'longitude'=>$geo['geoplugin_longitude']
            );

        }
        return $geolocation;
    }

    /*
     * Updater
     */

    static function updateCountries() {
        // Update visitors count
        $usercountry = self::getCountryCode();
        $usercountryname = self::getCountryName();
        $visit = DBHelper::allWhere('analytics_countries', [
            'ip_addr' => serverValue('REMOTE_ADDR')
        ]);
        // Update today visitors
        if (count($visit) > 0) {

            DBHelper::updateRecord('analytics_countries', [
                'ip_addr' => serverValue('REMOTE_ADDR')
            ],[
                'visits' => $visit->first()->visits+1
            ]);
        } else {
            DBHelper::insertToTable('analytics_countries', [
                'visits' => 1,
                'name' => $usercountryname,
                'iso' => $usercountry,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ]);
        }
    }

    static function updateCities() {
        // Update visitors count
        $usercity = self::getCity();
        $visit = DBHelper::allWhere('analytics_cities', [
            'ip_addr' => serverValue('REMOTE_ADDR')
        ]);
        // Update today visitors
        if (count($visit) > 0) {

            DBHelper::updateRecord('analytics_cities', [
                'ip_addr' => serverValue('REMOTE_ADDR'),
            ],[
                'visits' => $visit->first()->visits+1
            ]);
        } else {
            DBHelper::insertToTable('analytics_cities', [
                'visits' => 1,
                'name' => $usercity,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ]);
        }
    }

    static function updateVisitors() {
        // Update visitors count
        $visit = DBHelper::allWhere('analytics_visitors', [
            'ip_addr' => serverValue('REMOTE_ADDR')
        ]);
        // Update today visitors
        if (count($visit) > 0) {
            DBHelper::updateRecord('analytics_visitors', [
                'ip_addr' => serverValue('REMOTE_ADDR')
            ],[
                'visits' => $visit->first()->visits+1
            ]);
        } else {
            DBHelper::insertToTable('analytics_visitors', [
                'visits' => 1,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ]);
        }
    }

    static function updateOS() {
        // Get user operating system and update the database
        $useros = self::getOS();
        $os = DBHelper::allWhere('analytics_os', [
            'name' => $useros,
            'ip_addr' => serverValue('REMOTE_ADDR')
        ]);
        if (count($os) > 0)
        {
            DBHelper::updateRecord('analytics_os', [
                'name' => $useros,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ],[
                'visits' => $os->first()->visits+1
            ]);
        } else {
            DBHelper::insertToTable('analytics_os', [
                'visits' => 1,
                'name' => $useros,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ]);
        }
    }

    static function updateBrowser() {
        // Get visitor browser
        $userbrowser = self::getBrowser();
        $browser = DBHelper::allWhere('analytics_browsers', [
            'name' => $userbrowser,
            'ip_addr' => serverValue('REMOTE_ADDR')
        ]);
        if (count($browser) > 0)
        {
            DBHelper::updateRecord('analytics_browsers', [
                'name' => $userbrowser,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ],[
                'visits' => $browser->first()->visits+1
            ]);
        } else {
            DBHelper::insertToTable('analytics_browsers', [
                'visits' => 1,
                'name' => $userbrowser,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ]);
        }
    }

    static function updateReferrer() {
        // Get visitor browser
        $userreferrer = self::getReferrer();
        if(empty($userreferrer)){$userreferrer = 'Direct';}

        $referrer = DBHelper::allWhere('analytics_referrer', [
            'name' => $userreferrer,
            'ip_addr' => serverValue('REMOTE_ADDR')
        ]);
        if (count($referrer) > 0)
        {
            DBHelper::updateRecord('analytics_referrer', [
                'name' => $userreferrer,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ],[
                'visits' => $referrer->first()->visits+1
            ]);
        } else {
            DBHelper::insertToTable('analytics_referrer', [
                'visits' => 1,
                'name' => $userreferrer,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ]);
        }
    }

    static function updateUrls() {
        // Get user url and update the database
        $userUrl =  Request::capture()->url();
        $urlObject = DBHelper::allWhere('analytics_urls', [
            'name' => $userUrl,
            'ip_addr' => serverValue('REMOTE_ADDR')
        ]);
        if (count($urlObject) > 0)
        {
            DBHelper::updateRecord('analytics_urls', [
                'name' => $userUrl,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ],[
                'visits' => $urlObject->first()->visits+1
            ]);
        } else {
            DBHelper::insertToTable('analytics_urls', [
                'visits' => 1,
                'name' => $userUrl,
                'ip_addr' => serverValue('REMOTE_ADDR')
            ]);
        }
    }

    /**
     * @param $table
     * @return int
     */
    public static function getUniqueVisitors($table) {
        $visits = DBHelper::all($table);
        $uniqueVisits = [];
        foreach ($visits as $visit) {
            if (!in_array($visit->ip_addr, $uniqueVisits)) {
                array_push($uniqueVisits, $visit->ip_addr);
            }
        }
        return count($uniqueVisits);
    }

    /**
     * @return array
     */
    public static function getBrowsersStatics() {
        $browsers = DBHelper::all('analytics_browsers');

        $formattedArray = [];
        for($ib = 0; $ib < count($browsers); $ib++) {
            $browser = $browsers[$ib];

            if (array_key_exists($browser->name, $formattedArray)) {
                $browserVisits = $formattedArray[$browser->name];
                $formattedArray[$browser->name] = $browserVisits+$browser->visits;
            } else {
                $formattedArray[$browser->name] = $browser->visits;
            }
        }

        $browsersArray = [];
        foreach ($formattedArray as $key => $value) {
            array_push($browsersArray, [
                'label' => $key,
                'value' => $value
            ]);
        }
        return $browsersArray;
    }
    /**
     * @return array
     */
    public static function getCountriesStatics() {
        $countries = DBHelper::all('analytics_countries');

        $formattedArray = [];
        foreach ($countries as $country) {
            $formattedArray[$country->iso] = $country->visits;
        }
        return $formattedArray;
    }
}