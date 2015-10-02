<?php

namespace StefanUrban;

use StefanUrban\DateInterval;

/**
 * Custom DateTime class that supports microseconds better
 * 
 * - does not implement all of PHP \DateTime object's methods
 * - especially no timezone support
 */
class DateTime
{
    
    private $timestamp;
    private $microseconds;
    
    /**
     * 
     * @param type $time: supports only format: Y-m-d H:i:s.u
     * @param type $timezone
     */
    public function __construct($time = "now", $timezone = null)
    {
        list($timestamp, $microseconds) = explode('.', microtime(true));
        
        if ($time == "now")
        {
            $this->timestamp = $timestamp;
            $this->microseconds = $microseconds;
        }
        elseif (is_string($time))
        {
            $obj = \DateTime::createFromFormat('Y-m-d H:i:s.u', $time);
            
            $this->timestamp = $obj->getTimestamp();
            $this->microseconds = $obj->format('u');
        }
        elseif ($time instanceof \DateTime)
        {
            $this->timestamp = $time->getTimestamp();
            $this->microseconds = $time->format('u');
        }
        else
        {
            throw new \InvalidArgumentException('Time must be not given, "now", string with the format "Y-m-d H:i:s.u" or instance of \DateTime');
        }
    }
    
    private static function createFromDateTimeObject(\DateTime $dt)
    {
        $instance = new self;
        
        $instance->timestamp = $dt->getTimestamp();
        $instance->microseconds = (int) $dt->format('u');
        
        return $instance;
    }
    
    private function convertToDateTimeObject()
    {
        $timestampDateTime = new \DateTime();
        $timestampDateTime->setTimestamp($this->timestamp);
        
        $time = $timestampDateTime->format('Y-m-d H:i:s') . '.' . $this->microseconds;
        
        return \DateTime::createFromFormat('Y-m-d H:i:s.u', $time);
    }

    public static function createFromFormat($format, $time, $timezone = null)
    {
        $dt = \DateTime::createFromFormat($format, $time);
        
        return self::createFromDateTimeObject($dt);
    }
    
    public function format($format)
    {
        $dt = $this->convertToDateTimeObject();
        
        return $dt->format($format);
    }
    
    public function getTimestamp()
    {
        return $this->timestamp + $this->microseconds / 1000 / 1000;
    }
    
    public function diff(DateTime $datetime)
    {
        $diff = $datetime->getTimestamp() - $this->getTimestamp();
        
        return new DateInterval($diff);
    }
    
    public function add(DateInterval $interval)
    {
        $seconds = $interval->getSeconds();
        
        $this->timestamp += floor($seconds);
        $this->microseconds += round(($seconds - floor($seconds)) * 1000 * 1000);
        
        return $this;
    }
    
    public function sub(DateInterval $interval)
    {
        $seconds = $interval->getSeconds();
        
        $this->timestamp -= floor($seconds);
        $this->microseconds -= ($seconds - floor($seconds)) * 1000 * 1000;
        
        return $this;
    }

}