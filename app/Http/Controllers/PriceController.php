<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Models\ChargerType;
use GuzzleHttp\Client;
use App\Models\Currency;
use Exception;
use Locale;

class PriceController extends Controller {

    public function index(Request $request){
        $price = Price::all();
        $type = ChargerType::all();
        $countryData = Price::select('id', 'country', 'price')->get();

        $userLocale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        
        switch($userLocale){

                case 'fr':
                    $userCountry = 'France';
                    break;
                case 'it_IT':
                    $userCountry = 'Italy';
                    break;
                case 'uk-UA':
                    $userCountry = 'Ukraine';
                    break;
                case 'de':
                    $userCountry = 'Germany';
                    break;
                case 'ro_RO':
                    $userCountry = 'Romania';
                    break;
                case 'pl':
                    $userCountry = 'Poland';
                    break;
                case 'ro-MD':
                    $userCountry = 'Moldova';
                    break;
                case 'cs':
                    $userCountry = 'the Czech Republic';
                    break;
                case 'hu_HU':
                    $userCountry = 'Hungary';
                    break;
                case 'de-AT':
                    $userCountry = 'Austia';
                    break;
                default:
                    $userCountry = 'Ukraine';
                    break;
            }

        return view('price/price', ['prices' => $price, 
                                    'charger' => $type, 
                                    'countryData' => $countryData,
                                    'userLocale' => $userLocale,
                                    'userCountry' => $userCountry,
                                    ]);
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
