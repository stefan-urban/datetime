<?php

namespace StefanUrban;

class DateInterval
{
    
    // Seconds as float
    private $seconds;
    
    public function __construct($seconds)
    {
        $this->seconds = (float) $seconds;
    }
    
    public function format($format)
    {
        // First part
        $dt = new \DateInterval('PT' . floor($this->seconds) . 'S');
        $formattedString = $dt->format($format);
        
        // Replace microseconds in formatted string
        $microseconds = round(($this->seconds - floor($this->seconds)) * 1000 * 1000);
        
        $formattedString = str_replace('%u', $microseconds, $formattedString);
        $formattedString = str_replace('%U', str_pad($microseconds, 6, "0", STR_PAD_LEFT), $formattedString);
        
        return $formattedString;
    }
    
    public function getSeconds()
    {
        return $this->seconds;
    }

    public function __get($name)
    {
        switch ($name)
        {
            default:
                throw new \Exception('Property "' . $name . '" on ' . __CLASS__ . ' not found.');
                break;

            // Overall number of days
            case 'days':
                return floor(abs($this->seconds) / 24 / 60 / 60);
        }
    }
}
