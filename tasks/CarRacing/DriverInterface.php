<?php

interface DriverInterface
{
    public function getName(): string;

    public function getSpeed(): int;

}