<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Sales;
use Carbon\Carbon;
use DB;
use Config;

class SalesFormController extends Controller
{

    const installments = "1";

    public function createForm(Request $request)
    {
        return view('salesForm');
    }

    public function sendFormData(Request $request)
    {
        $date = Carbon::now();
        $client = new Client(['headers' => ['Content-Type' => 'application/json']]);
        $url = "https://preprod.paymeservice.com/api/generate-sale";
        if (!is_numeric($request->price)) {
            $error = "price must be numeric";

            return view('salesForm', compact('error',));

        }
        try {
            $response = $client->post($url, [
                'json' => [
                    "seller_payme_id" => Config::get('constants.seller_payme_id'),
                    "sale_price"      => ($request->price) * 100,
                    "currency"        => $request->currency,
                    "product_name"    => "$request->productName",
                    "installments"    => Config::get('constants.installments'),
                    "language"        => Config::get('constants.language'),
                ]
            ]);
        } catch (RequestException $e) {
            $e->getCode();
            $error = json_decode($e->getResponse()->getBody())->status_error_details;

            return view('salesForm', compact('error',));

        }
        $responseBody = json_decode($response->getBody());

        $this->saveToDB($request, $responseBody, $date);

        return view('payments', compact('responseBody'));

    }

    public function getSalesData()
    {
        $sales = DB::select('select * from sales');

        return view('salesTable', ['sales' => $sales]);

    }

    private function saveToDB($request, $responseBody, $date)
    {
        $data = new Sales;
        $data->time = $date;
        $data->saleNumber = $responseBody->payme_sale_code;
        $data->amount = $request->price;
        $data->currency = $request->currency;
        $data->link = $responseBody->sale_url;
        $data->description = $request->productName;
        $data->save();
    }

}
