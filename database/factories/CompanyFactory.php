<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyName = fake('id')->company();
        $cleanCompanyName = Str::replaceMatches('/\W+/', '', $companyName);
        $username = fake('id')->username();
        $tld = fake('id')->tld();
        $domainWord = Str::slug($cleanCompanyName);
        $domain = "$domainWord.$tld";

        return [
            'name' => $companyName,
            'email' => "$username@$domain",
            'logo' => "https://ui-avatars.com/api/?name=$companyName",
            'website' => "https://$domain",
        ];
    }
}
