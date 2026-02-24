<?php
namespace App\Enum;

enum MeasureType: string
{
    case SPEED = 'speed';
    case TEMP = 'temp';
    case VOLUME = 'volume';
}