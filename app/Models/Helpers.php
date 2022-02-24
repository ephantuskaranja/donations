<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Helpers
{
    public function generateRandomFour()
    {
        return substr(str_shuffle('1234567890456789453456'), 0, 8);
    }

    public function generateTransId()
    {
        $timestamp = now();
        return hash('CRC32', microtime() . rand(1, 999999999) . $timestamp . 'XCodeNinja' . rand(9, 888777666)) . $this->generateRandomFour();
    }
}
