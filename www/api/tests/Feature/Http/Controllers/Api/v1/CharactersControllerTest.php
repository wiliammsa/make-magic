<?php

namespace Tests\Feature\Http\Controllers\Api\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CharactersControllerTest extends TestCase
{
    /**
     * Teste de criação de personagem.
     *
     * @return void
     */
    public function testCreate()
    {
        $dataCharacter = [
            'name' => 'Harry Potter',
            'role' => 'student',
            'school' => 'Hogwarts School of Witchcraft and Wizardry',
            'house' => '5a05e2b252f721a3cf2ea33f',
            'patronus' => 'stag'
        ];

        $response = $this->post('/api/v1/characters', $dataCharacter);

        $response
            ->assertStatus(Response::HTTP_CREATED);
    }
}
