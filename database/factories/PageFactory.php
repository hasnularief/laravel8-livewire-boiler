<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words(3, true);
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->text(),
        ];
    }
}
