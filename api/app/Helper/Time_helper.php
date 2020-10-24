<?php

namespace App\Helper;


class Time_helper {

    public $mainTimeString;
//put your code here
    public $year;
    public $month;
    public $day;
    public $hour;
    public $minute;
    public $second;
    public $diffMin;
    public $diffHour;
    public $diffDay;
    public $difWeek;
    public $diffYear;
public $diffFromNow;//object based on diff without positive or negative or just compare year by year| and return as object
    public $timeStamp;
    public $phpTime;

    /**
     *
     * @param type $Australiantimeformat
     * @param type $option
     * 0=aus time format(dd/mm/yyyy HH:mm),
     * option 1=1 timeformate (yyyy-MM-06 HH:ii:ss  2017-09-06 09:27:25)
     * option 2 you pass xmhstimeformat(yyMMddHHmmss)
     */
    public function __construct($timeString = "", $option = 0) {
        date_default_timezone_set('Australia/Melbourne');

        $this->constr1($timeString,$option);
    }
    
    private function constr1($timeString,$option){
        $this->second = 00;
        if ($timeString == "") {   //if it is empty we put current time
            $currentTime = Time(); //if you gonna put time in next week time() + (7 * 24 * 60 * 60);
            $timeString = date('d/m/Y H:i:s', $currentTime);
        }

        $this->mainTimeString = $timeString;

        if ($timeString != "" && $option == 0) {//australian timeformat
            $dateArray = explode("/", $timeString);
            $a = explode(" ", $dateArray[2]);
            if (is_array($a) && sizeof($a) == 2) {
                $timeArray = explode(":", $a[1]);
                $this->minute = $timeArray[1];
                $this->hour = $timeArray[0];
            } else {
                $this->hour = "00";
                $this->minute = "00";
            }

            $this->day = $dateArray[0];
            $this->month = $dateArray[1];
            $this->year = $a[0];

            $this->phpTime();
            $this->timeDiffFromNow();
        } elseif ($timeString != "" && $option == 1) {//try to do different time format
            $dateArray = explode("-", $timeString);
            $a = explode(" ", $dateArray[2]);
            if (is_array($a) && sizeof($a) == 2) {
                $timeArray = explode(":", $a[1]);
                $this->second = $timeArray[2]; //it used to be 0 alltime because we rarely need second
                $this->minute = $timeArray[1];
                $this->hour = $timeArray[0];
            } else {
                $this->hour = "00";
                $this->minute = "00";
            }
            $this->day = $a[0];
            $this->month = $dateArray[1];
            $this->year = $dateArray[0];
            $this->phpTime();
            $this->timeDiffFromNow();
        } elseif ($timeString != "" && $option == 2) {//xmhs time format has been passed 170918143458
            if (strlen(trim($timeString)) == 12) {
                $this->second = substr($timeString, -2);
                $this->minute = substr($timeString, 8, 2);
                $this->hour = substr($timeString, 6, 2);
            } elseif (strlen(trim($timeString)) == 6) {
                $this->second = "";
                $this->minute = "";
                $this->hour = "";
            }



            $this->day = substr($timeString, 4, 2);
            $this->month = substr($timeString, 2, 2);
            $this->year = "20" . substr($timeString, 0, 2);
//            $this->phpTime(); /// we wont use it temp becuase sometimes xmhs has hour and minute sometimes it does not
//        $this->timeDiffFromNow();
        }

        //----------------------all calculation
    }
    

    /**
     *
     * @param type $word e.g -45 hour, -2 day, 5 day, -3 month
     * @return type
     */
    public static function getTimeFormatbackFromNow($word) {
        return $lw = date('d/m/Y H:i:s', strtotime($word));
    }

    /*     * it check if theset three timeobject are in order $t1<$t2<$t3
     *
     * @param type $t1 Time objcet
     * @param type $t2 Time object
     * @param type $t3 Time object
     */

    public static function isTimeObjectInOrder($t1, $t2, $t3) {
        $result = true;


        if ($t1 != "" && $t3 != "") {
            if (self::compareTwoTime($t1->phpTime() - $t2->phpTime()) > 0) {
                $result = false; //first time is after second time
            }
            if (self::compareTwoTime($t2->phpTime() - $t3->phpTime()) > 0) {
                $result = false;
            }
        }
        return $result;
    }

    /*     * regradless of time format you pass it return only HH:mm if you need
     *
     * @return type HH:mm
     */

    public function getTimeWithcolon() {
        return $this->hour . ":" . $this->minute;
    }

    public function getAusDateFormat() {
        return $this->day . "/" . $this->month . "/" . $this->year;
    }

    public function getAusDateFormatWithTime() {
        return $this->day . "/" . $this->month . "/" . $this->year . " " . $this->hour . ":" . $this->minute . ":" . $this->second;
    }

    

    /**
     * 
     * @param type $option   option=0 return yyyy-mm-dd hh:ii   option=1 return yyyy-mm-dd
     * @return type
     */
    public function getDbFormat($option=0) {
        $return=null;
        if($option==0){
        $return=$this->year . '-' . $this->month . '-' . $this->day . ' ' . $this->hour . ':' . $this->minute;
        }elseif($option==1){
            $return=$this->year . '-' . $this->month . '-' . $this->day;
        }
        return $return;
    }
    public function getDbFormatOnlyDate() {
        return $this->year . '-' . $this->month . '-' . $this->day ;
    }

    /** that is better to choose this function for time difference
     * calculate all time difference and put it into corresponding attribute.
     */
    private function timeDiffFromNow() {
        $t = new \DateTime('' . $this->year . '-' . $this->month . '-' . $this->day . ' ' . $this->hour . ':' . $this->minute . ":00");

        $this->timeStamp = $tst = $t->getTimestamp();

        $tnowstmp = new \DateTime('' . date('Y') . '-' . date('m') . '-' .date('d') . ' ' . date('G') . ':' . date('i') . ":".date('s'));
        $this->diffFromNow=$tnowstmp->diff($t);

        //$timediff=$tst-($tnowstmp->getTimestamp());


//        $this->diffYear = $this->time_elapsed_A($timediff, 4);
//        $this->difWeek = $this->time_elapsed_A($timediff, 3);
//        $this->diffDay = $this->time_elapsed_A($timediff, 2);
//        $this->diffHour = $this->time_elapsed_A($timediff, 1);
//        $this->diffMin = $this->time_elapsed_A($timediff, 0);
        $this->diffYear = floatval(($t>$tnowstmp?'+':'-').$this->time_elapsed_B(null,4));
        $this->difWeek = floatval(($t>$tnowstmp?'+':'-').$this->time_elapsed_B(null,3));
        $this->diffDay = floatval(($t>$tnowstmp?'+':'-').$this->time_elapsed_B(null, 2));
        $this->diffHour = floatval(($t>$tnowstmp?'+':'-').$this->time_elapsed_B(null,1));
        $this->diffMin = floatval(($t>$tnowstmp?'+':'-').$this->time_elapsed_B(null, 0));
    }

    public function phpTime() {
        $t = new \DateTime('' . $this->year . '-' . $this->month . '-' . $this->day . ' ' . $this->hour . ':' . $this->minute . ":00");
        $this->phpTime = $t;
        return $tst = $t->getTimestamp();
    }

    public function getXmhsTime() {

        return substr($this->year, -2) . $this->month . $this->day . $this->hour . $this->minute;
    }

    public function getXmhsTimeWithSecond() {

        return substr($this->year, -2) . $this->month . $this->day . $this->hour . $this->minute . $this->second;
    }

    public function getBatchNumberDateForRequest() {
        $currentTime = Time(); //if you gonna put time in next week time() + (7 * 24 * 60 * 60);
        $second = date('s', $currentTime);

        return substr($this->year, -2) . $this->month . $this->day . $this->hour . $this->minute . $second;
    }

    public function __toString() {
        return "year is:" . $this->year . " <br> month is: " . $this->month . " <br> your day is:" . $this->day . ""
                . "<br> your hour is:" . $this->hour . "<br> your minute is:" . $this->minute . "<br> your second is:" . $this->second;
    }

    private function time_elapsed_B($timeDiffFromNow=null, $option = 0) {
        $td=null;
        if($timeDiffFromNow==null){
            $td=$this->diffFromNow;
        }





    if ($option == 0) {//diff in minutes
        return $td->i + $td->h * 60 + $td->d * 24 * 60 + $td->m*30 * 24 * 60 + $td->y*365 * 24 * 60;
    } elseif ($option == 1) {//diff in hour
        return $td->h + $td->d * 24 + $td->m*30 * 24+ $td->y*365 * 24;
    } elseif ($option == 2) {//diff in day
        return $td->d + $td->m*30+ $td->y*365;
    } elseif ($option == 3) {//diff in week
        return 'unknown';
    } else {//diff in years
        return $td->y;
    }
}

    /** this function gives you difference of two time in minutes or hours or ....(depending on option)
     *
     * option=0 => difference in minutes
     * 1====> difference in hours
     * 2====> difference in days
     * 3=====> difference in week
     * 4=====> difference in years
     * @param type $secs (you should put php time()1-time()2)
     * @return type elepse time(in minutes only. it does not give you more than 59 mins) if you give time()-time()
     */
    private function time_elapsed_A($secs, $option = 0) {
        $bit = array(
            'y' => $secs / 31556926 % 12,
            'w' => $secs / 604800 % 52,
            'd' => $secs / 86400 % 7,
            'h' => $secs / 3600 % 24,
            'm' => $secs / 60 % 60,
            's' => $secs % 60
        );



        if ($option == 0) {//diff in minutes
            return $bit['m'] + $bit['h'] * 60 + $bit['d'] * 24 * 60 + $bit['w'] * 7 * 24 * 60 + $bit['y'] * 52 * 7 * 24 * 60;
        } elseif ($option == 1) {//diff in hour
            return $bit['h'] + $bit['d'] * 24 + $bit['w'] * 7 * 24 + $bit['y'] * 52 * 7 * 24;
        } elseif ($option == 2) {//diff in day
            return $bit['d'] + $bit['w'] * 7 + $bit['y'] * 52 * 7;
        } elseif ($option == 3) {//diff in week
            return $bit['w'] + $bit['y'] * 52;
        } else {//diff in years
            return $bit['y'];
        }
    }

    /** this function gives you difference of two time in minutes or hours or ....(depending on option)
     *
     * option=0 => difference in minutes
     * 1====> difference in hours
     * 2====> difference in days
     * 3=====> difference in week
     * 4=====> difference in years
     * @param type $secs (you should put php time()1-time()2)
     * @return type elepse time(in minutes only. it does not give you more than 59 mins) if you give time()-time()
     */
    public static function compareTwoTime($secs, $option = 0) {
        $bit = array(
            'y' => $secs / 31556926 % 12,
            'w' => $secs / 604800 % 52,
            'd' => $secs / 86400 % 7,
            'h' => $secs / 3600 % 24,
            'm' => $secs / 60 % 60,
            's' => $secs % 60
        );

        if ($option == 0) {//diff in minutes
            return $bit['m'] + $bit['h'] * 60 + $bit['d'] * 24 * 60 + $bit['w'] * 7 * 24 * 60 + $bit['y'] * 52 * 7 * 24 * 60;
        } elseif ($option == 1) {//diff in hour
            return $bit['h'] + $bit['d'] * 24 + $bit['w'] * 7 * 24 + $bit['y'] * 52 * 7 * 24;
        } elseif ($option == 2) {//diff in day
            return $bit['d'] + $bit['w'] * 7 + $bit['y'] * 52 * 7;
        } elseif ($option == 3) {//diff in week
            return $bit['w'] + $bit['y'] * 52;
        } else {//diff in years
            return $bit['y'];
        }
    }

    /**
     *
     * @param type $sql_date usually format (yyyy-mm-dd H:m:i)
     * @param type $full
     * @return string australian format(dd/mm/yy)
     */
    public static function sql_date_to_aus_date($sql_date, $full = true) {
        // Verify parameter as true sql date
        $len = strlen($sql_date);
        $return_str = "";

        // If length is 10 or more, then we can swap the YYYY and DD portions
        // of string
        if ($len >= 10) {
            $year = substr($sql_date, 0, 4);
            $month = substr($sql_date, 5, 2);
            $day = substr($sql_date, 8, 2);
            $time_str = "";
            if (($len > 10) && ($full == true)) {
                $time_str = substr($sql_date, 10, $len - 10);
            }
            $return_str = $day . "/" . $month . "/" . $year . $time_str;
        }
        return $return_str;
    }

    /**
     *
     * @return type it returns current time stamp in order to insert into db
     */
    public static function currentTimeStamp() {
        return date('Y-m-d H:i:s');
    }

}
