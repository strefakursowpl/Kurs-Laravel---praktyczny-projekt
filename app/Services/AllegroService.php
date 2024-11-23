<?php

namespace App\Services;

use Illuminate\Support\Arr;

class AllegroService {

    public function __construct(
        public AllegroApiService $api,
    ) {}

    public function prepareOrders() {
        $orders = $this->api->getOrders();
        return Arr::only($orders, [1, 3]);
    }
}
