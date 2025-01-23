<?php

namespace App\Livewire\Ui;

use Illuminate\Support\Arr;
use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Modelable;

class CitySearch extends Component
{
    #[Modelable]
    public ?string $city = null;

    public ?string $label = null;

    public Collection $cities;

    private array $defaultCities = [
        'Białystok',
        'Bydgoszcz',
        'Gdańsk',
        'Gorzów Wielkopolski',
        'Katowice',
        'Kielce',
        'Kraków',
        'Lublin',
        'Łódź',
        'Olsztyn',
        'Opole',
        'Poznań',
        'Rzeszów',
        'Szczecin',
        'Toruń',
        'Warszawa',
        'Wrocław',
        'Zielona Góra',
    ];

    public function mount() {

        if($this->city !== null && !in_array($this->city, $this->defaultCities)) {
            $this->defaultCities[] = $this->city;
        }

        $this->cities = new Collection(
            Arr::map(
                $this->defaultCities,
                fn($value) => ['id' => $value, 'name' => $value]
            )
        );
    }

    public function search(string $value = '') {
        $selectedOption = DB::table('cities')->where('name', $this->city)->get();

        $this->cities = DB::table('cities')
        ->select(['name as id', 'name'])
        ->where('name', 'like', '%'.$value.'%')
        ->limit(15)
        ->get()
        ->merge($selectedOption);
    }

    public function render()
    {
        return view('livewire.ui.city-search');
    }
}
