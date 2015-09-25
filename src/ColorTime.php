<?php

namespace Watson\ColorTime;

use DateTime;

class ColorTime
{
    /**
     * The DateTime instance.
     *
     * @var \DateTime
     */
    protected $dateTime;

    /**
     * Construct the class.
     *
     * @param  \DateTime  $dateTime
     * @return void
     */
    public function __construct(DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * Create a new instance of the class.
     *
     * @param  \DateTime  $dateTime
     * @return self
     */
    public static function make(DateTime $dateTime = null)
    {
        return new static($dateTime ?: new DateTime);
    }

    /**
     * Get the DateTime instance.
     *
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set the DateTime instance.
     *
     * @param  \DateTime  $dateTime
     * @return self
     */
    public function setDateTime(DateTime $dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get the hex representation of the time.
     *
     * @return string
     */
    public function hex()
    {
        return "#{$this->hours()}{$this->minutes()}{$this->seconds()}";
    }

    /**
     * Get the hours with leading zeros.
     *
     * @return string
     */
    protected function hours()
    {
        return $this->getDateTime()->format('H');
    }

    /**
     * Get the minutes with leading zeros.
     *
     * @return string
     */
    protected function minutes()
    {
        return $this->getDateTime()->format('i');
    }

    /**
     * Get the seconds with leading zeros.
     *
     * @return string
     */
    protected function seconds()
    {
        return $this->getDateTime()->format('s');
    }
}
