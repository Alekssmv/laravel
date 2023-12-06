<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Легковые',
                'sort' => 1,
                'children' => [
                    [
                        'name' => 'Седаны',
                        'sort' => 1
                    ],
                    [
                        'name' => 'Хетчбеки',
                        'sort' => 2
                    ],
                    [
                        'name' => 'Универсалы',
                        'sort' => 3
                    ],
                    [
                        'name' => 'Купе',
                        'sort' => 4
                    ],
                    [
                        'name' => 'Родстеры',
                        'sort' => 5,
                        'children' => [
                            [
                                'name' => 'Test',
                                'sort' => 3
                            ],
                            [
                                'name' => 'Test2',
                                'sort' => 2
                            ],
                            [
                                'name' => 'Test3',
                                'sort' => 1
                            ],
                        ]
                    ]
                ]
            ],
            [
                'name' => 'Внедорожники',
                'sort' => 2,
                'children' => [
                    [
                        'name' => 'Рамные',
                        'sort' => 1
                    ],

                    [
                        'name' => 'Пикапы',
                        'sort' => 2
                    ],
                    [
                        'name' => 'Кроссоверы',
                        'sort' => 0
                    ],
                ]
            ],

            [
                'name' => 'Раритетные',
                'sort' => 3
            ],
            [
                'name' => 'Распродажа',
                'sort' => 4
            ],
            [
                'name' => 'Новинки',
                'sort' => 5
            ]


        ];

        foreach ($this->categoriesWalk($categories) as $category) {
            Category::create($category);
        }
    }
    private function categoriesWalk(array $categories): array
    {
        array_walk($categories, function (&$category) {
            $category['slug'] = Str::slug($category['name']);
            if (isset($category['children'])) {
                $category['children'] = $this->categoriesWalk($category['children']);
            }
        });
        return $categories;
    }
}
