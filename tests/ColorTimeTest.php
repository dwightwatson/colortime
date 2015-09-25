<?php

use Watson\ColorTime\ColorTime;

class ColorTimeTest extends \PHPUnit_Framework_TestCase
{
    public $colorTime;

    public $dateTimeMock;

    public function setUp()
    {
        $this->dateTimeMock = Mockery::mock(DateTime::class);

        $this->colorTime = new ColorTime($this->dateTimeMock);
    }

    /** @test */
    public function factory_creates_new_instance()
    {
        $instance = ColorTime::make();

        $this->assertInstanceOf('Watson\ColorTime\ColorTime', $instance);
    }

    /** @test */
    public function factory_uses_injected_datetime_instance()
    {
        $instance = ColorTime::make($this->dateTimeMock);

        $this->assertEquals($this->dateTimeMock, $instance->getDateTime());
    }

    /** @test */
    public function it_gets_datetime_instance()
    {
        $this->assertEquals($this->dateTimeMock, $this->colorTime->getDateTime());
    }

    /** @test */
    public function it_sets_datetime_instance()
    {
        $dateTime = Mockery::mock(DateTime::class);

        $this->colorTime->setDateTime($dateTime);

        $this->assertEquals($dateTime, $this->colorTime->getDateTime());
    }

    /** @test */
    public function it_returns_self_after_setting_datetime()
    {
        $instance = $this->colorTime->setDateTime($this->dateTimeMock);

        $this->assertEquals($instance, $this->colorTime);
    }

    /** @test */
    public function it_returns_correct_hex_for_time()
    {
        $this->dateTimeMock->shouldReceive('format')->times(3)->andReturn(10);

        $hex = $this->colorTime->hex();

        $this->assertEquals('#101010', $hex);
    }
}
