<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Weather extends Component
{
    #[Rule('required')]
    public $city;
    public $mainweather;
    public $weatherData;
    public $temp;
    public function fetchData()
    {
        $this->validate();

        $city = $this->city;
        $response = Http::get('http://api.openweathermap.org/geo/1.0/direct?q='.$city.'&limit=1&appid=83676b809d3ab9ff372f042f19d1faff');
        $jsonData = $response->json();
        //dd($jsonData);
        $lat = $jsonData[0]['lat'];
        $lon = $jsonData[0]['lon'];

        $weather = Http::get('http://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$lon.'&appid=83676b809d3ab9ff372f042f19d1faff');
        $weatherData = $weather->json();
        //dd($weatherData);
        //dd($this->weatherData=$weatherData['weather'][0]['description']);
        $this->mainweather = $weatherData['weather'][0]['main'];
        $this->weatherData=$weatherData['weather'][0]['description'];
        $this->temp=$weatherData['main']['temp'];

    }
    public function render()
    {
        return view('livewire.weather');
    }
}
