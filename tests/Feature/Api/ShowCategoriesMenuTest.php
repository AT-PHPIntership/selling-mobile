<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Category;

class ShowCategoriesMenuTest extends TestCase
{
    use DatabaseMigrations;
    
    public function setUp()
    {
        parent::setUp();
        factory('App\Models\Category', 1)->create();
        factory('App\Models\Category', 1)->create([
            'parent_id' => 1,
        ]);
    }
     /**
     * Test status code
     *
     * @return void
     */
    public function testStatusCodeForCategory()
    {
        $response = $this->json('GET', '/api/categories');
        $response->assertStatus(200);
    }

     /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureListCategories()
    { 
        return [
            [
                'url' => '/api/categories',
                'structure' => [
                    'result' => [
                        [
                            'id',
                            'name',
                            'parent_id',
                            'created_at',
                            'updated_at',
                            'childrens' => [ 
                                [
                                    'id',
                                    'name',
                                    'parent_id',
                                    'created_at',
                                    'updated_at'
                                ]
                            ]   
                        ]
                    ],
                    'code'
                ]
            ]
        ];      
    }

    /**
     * @dataProvider jsonStructureListCategories
     *
     * @param string $url url of api caterogy 
     * @param array  $structure structure of json 
     *
     * Test api structure
     *
     * @return void
     */
    public function testJsonStructure($url, $structure)
    {
        $response = $this->json('GET', $url);
        $response->assertJsonStructure($structure);
    }

     /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $response = $this->json('GET', 'api/categories');
        $data = json_decode($response->getContent())->result;
        foreach ($data as $category) {
            $arrayCompare = [
                'id' => $category->id,
                'name' => $category->name,
                'parent_id' => $category->parent_id,
            ];
            $this->assertDatabaseHas('categories', $arrayCompare);
        }
    }
}
