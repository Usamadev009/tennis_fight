<?php

namespace Database\Seeders;

use App\Models\TermsCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TermsCondition::insert([
            'termsCondition' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vulputate turpis libero, nec congue tortor dictum quis. Morbi vestibulum felis et erat efficitur tempus. Mauris commodo vehicula ipsum, a tincidunt erat bibendum ac. Ut ultricies tincidunt volutpat. Aliquam venenatis et urna ut hendrerit. Maecenas sed mattis nisi. Nullam sodales felis odio, vitae varius turpis finibus nec. Nunc posuere pharetra enim eu maximus. Quisque nec enim id leo varius luctus id quis nisi. Fusce id libero id magna tempor porta a vel enim. Donec vestibulum tellus eget nulla gravida, ut interdum urna rhoncus. In finibus nec ex at lacinia. Aliquam in lacus et justo pretium semper. Ut accumsan ipsum velit, eu placerat turpis vulputate nec. Maecenas at augue a ante convallis pulvinar. Aliquam eget nulla sodales, maximus eros quis, imperdiet augue. Integer vel elit ut ipsum vulputate sagittis id et metus. Maecenas risus est, varius vitae nunc nec, malesuada vestibulum purus. Morbi volutpat, turpis eget sagittis eleifend, nibh nulla sollicitudin magna, quis gravida velit sem sollicitudin ex. Donec est elit, pretium id consectetur ut, elementum non libero.',
        ]);
    }
}
