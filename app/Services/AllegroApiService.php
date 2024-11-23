<?php

namespace App\Services;

class AllegroApiService {

    const API_VER = '2.1';

    public function __construct(
        private $apiKey,
        private $apiPassword,
    ) {}

    public function getOrders() {
        return [
            1 => 'Order #1',
            2 => 'Order #2',
            3 => 'Order #3',
            4 => 'Order #4',
            5 => 'Order #5',
        ];
    }
}
