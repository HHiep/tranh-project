<?php

function promotionPercentage($originalPrice, $promotionalPrice)
{
    $precent = (($originalPrice - $promotionalPrice) / $originalPrice) * 100;
    return $precent;
}

