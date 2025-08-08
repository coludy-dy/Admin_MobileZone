<?php

namespace App;

trait Custom
{
    private function productStatus()
    {
        return [
            'available' => 'Available',
            'outout_of_stock' => 'Out of Stock'
        ];
    }

    private function orderStatus()
    {
        return [
            'pending' => 'Pending',
            'complete' => 'Complete'
        ];
    }
     private function color()
    {
        return [
            'white' => 'White',
            'black' => 'Black',
            'blue' => 'Blue',
            'pink' => 'Pink',
            'gray' => 'Gray',
        ];
    }

     private function ram()
    {
        return [
            '6gb' => '6GB',
            '8gb' => '8GB',
            '12gb' => '12GB'

        ];
    }
     private function storage()
    {
        return [
            '128gb' => '128GB',
            '256gb' => '256Gb',
            '512gb' => '512gb'

        ];
    }
}
