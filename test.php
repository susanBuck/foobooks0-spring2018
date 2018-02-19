<?php

function floatNumeric($value)
{
    return str_replace(' ', '', $value) == (string)(float)$value
}

# Tests:
echo floatNumeric('1.5') ? 'yes' : 'no'; # Expected: yes
echo floatNumeric(1) ? 'yes' : 'no';     # Expected: yes
echo floatNumeric('1.5') ? 'yes' : 'no'; # Expected: yes
echo floatNumeric('abc') ? 'yes' : 'no'; # Expected: no

