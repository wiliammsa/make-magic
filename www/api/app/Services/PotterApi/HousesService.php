<?php
namespace App\Services\PotterApi;

use App\Exceptions\HouseNotFoundException;
use App\Exceptions\UnsetPotterApiAccessKeyException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Http;

class HousesService
{
    const ENDPOINT = '/houses';

    public static function getById(String $id)
    {
        $potterAPIUrl = env('POTTERAPI_URL');
        $potterAPIAccessKey = env('POTTERAPI_ACCESS_KEY');

        if (!$potterAPIAccessKey){
            throw new UnsetPotterApiAccessKeyException('A potterapi access key não foi atribuída.');
        }

        $url = $potterAPIUrl . self::ENDPOINT . "/{$id}?key={$potterAPIAccessKey}";
        try {
            $response = Http::get($url);
            $response = $response->json();

            if (isset($response[0]['name'])){
                return true;
            }

            return false;
        } catch (ClientException $exception) {
            return $exception->getMessage();
        }
    }

    public static function validateHouseId(String $id)
    {

        $house = HousesService::getById($id);
        if (!$house){
            throw new HouseNotFoundException('O ID da casa é inválido');
        }
    }
}
