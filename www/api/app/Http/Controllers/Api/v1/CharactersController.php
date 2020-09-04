<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Repositories\Contracts\CharacterRepositoryInterface;
use App\Services\PotterApi\HousesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CharactersController extends Controller
{
    protected $characterRepository;

    public function __construct(CharacterRepositoryInterface $characterRepository)
    {
        $this->characterRepository = $characterRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('house')){
            $criteria = [['house', $request->get('house')]];
            $characters = $this->characterRepository->findBy($criteria);
        } else {
            $characters = $this->characterRepository->findAll();
        }

        return response()->json($characters, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacterRequest $request)
    {
        HousesService::validateHouseId($request->get('house'));
        $characterCreated = $this->characterRepository->create($request->all());
        return response()->json($characterCreated, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {
        $character = $this->characterRepository->findById($id);
        if (!$character) {
            return response()->json(['error' => 'Personagem não encontrado'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($character, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCharacterRequest $request, Int $id)
    {
        HousesService::validateHouseId($request->get('house'));

        $character = $this->characterRepository->findById($id);

        if (!$character) {
            return response()->json(['error' => 'Personagem não encontrado'], Response::HTTP_NOT_FOUND);
        }

        $character = $this->characterRepository->update($request->except('id'), $id);
        return response()->json($character, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id)
    {
        $character = $this->characterRepository->findById($id);
        if (!$character) {
            return response()->json(['error' => 'Personagem não encontrado'], Response::HTTP_NOT_FOUND);
        }

        $this->characterRepository->delete($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
