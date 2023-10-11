<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Models\ChargerType;
use GuzzleHttp\Client;
use App\Models\Currency;
use Exception;

class PriceController extends Controller {

    public function index(Request $request){
        $price = Price::all();
        $type = ChargerType::all();
        
        $countryData = Price::select('id', 'country', 'price')->get();

        return view('price/price', ['prices' => $price, 'charger' => $type, 'countryData' => $countryData]);
    }

    public function store(){
        
        $client = new Client();

        $apiUrl = 'https://api.monobank.ua/bank/currency';
        
        $currency = $client->get($apiUrl);

        if ($currency->getStatusCode() == 200) {

            $data = json_decode($currency->getBody(), true);
        }


        $iso4217 = new \Payum\ISO4217\ISO4217; 

        if (is_array($data)) {
            foreach ($data as $datas) {
                try {
                    if ($datas !== null) {

                        $currencyA = $iso4217->findByNumeric($datas['currencyCodeA'])->getAlpha3();
                        $currencyB = $iso4217->findByNumeric($datas['currencyCodeB'])->getAlpha3();

                        $datas['currencyA'] = $currencyA;   
                        $datas['currencyB'] = $currencyB;

                        unset($datas['currencyCodeA']);
                        unset($datas['currencyCodeB']);

                        Currency::create($datas);
                    }
                } catch (Exception $e) {

                    \Log::error('Error: ' . $e->getMessage());
                }
            }
        }
    }

}
