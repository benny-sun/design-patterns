<?php

interface Booking
{
    public function getPrice();
}

class Room implements Booking
{
    public function getPrice()
    {
        return 500;       
    }
}

class SingleRoom extends Room
{
    public function __construct()
    {
        
    }
}

class DoubleRoom extends Room
{

}
