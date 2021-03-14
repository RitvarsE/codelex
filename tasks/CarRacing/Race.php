<?php


class Race
{
    private DriverCollection $drivers;
    private Track $track;

    public function __construct(Track $track, DriverCollection $drivers)
    {
        $this->drivers = $drivers;
        $this->track = $track;
    }

    public function stillRacing(): bool
    {
        foreach ($this->drivers->getDrivers() as $driver) {
            if ($driver->getCrashed() === false && $driver->getPosition() < $this->track->getLength()) {
                return true;
            }
        }
        return false;
    }

}