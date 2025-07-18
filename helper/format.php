<?php
function currency_format($number, $suffix = ' VND'){
    return number_format($number).$suffix;
}