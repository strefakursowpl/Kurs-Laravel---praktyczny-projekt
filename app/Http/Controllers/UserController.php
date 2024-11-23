<?php

namespace App\Http\Controllers;

use App\Services\AllegroService;
use App\Services\UserService;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService,
        protected Hasher $hasher,
        protected AllegroService $allegroService
    ) {}

    /**
     * Show information about the given podcast.
     */
    public function index()
    {
        $text = $this->userService->getIntroText();

        echo $text;

        $hash = $this->hasher->make('test123');

        echo '<br>'.$hash;
        
        $hash = Hash::make('asdasd');
        
        echo '<br>'.$hash;

        $orders = $this->allegroService->prepareOrders();
        
        dd($orders);
    }

}

