<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create(
            [
                'username' => 'admin',
                'email' => 'info@buddies.net',
                'customer_id' => '1111111',
                'email_verified_at' => now(),
                'password' => bcrypt(config('app.ADMIN_PASSWORD')),
                'remember_token' => '',
                'is_admin' => 1,
            ]
        );

        User::factory()->create(
            [
                'username' => 'Maurice',
                'email' => 'vanophoven@icloud.com',
                'customer_id' => '7777777',
                'sponsor_id' => '1',
                'email_verified_at' => now(),
                'password' => bcrypt(config('app.ADMIN_PASSWORD')),
                'remember_token' => '',
                'is_admin' => 0,
            ]
        );

        Profile::factory()->create(
            [
                'user_id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'Account',
                'birthday' => '1969-06-25',
                'phone' => '+31 642747479',
                'company_name' => null,
                'site_url' => null,
                'vat_number' => null,
                'main_avatar_url' => null,
                'other_avatar_url1' => null,
                'other_avatar_url2' => null,
                'other_avatar_url3' => null,
                'other_avatar_url4' => null,
                'other_avatar_url5' => null,
                'other_avatar_url6' => null,
                'other_avatar_url7' => null,
                'other_avatar_url8' => null,
                'banner_img_url' => null,
                'logo_url' => null,
                'followers' => null,
                'city' => '30080',
                'state' => '2592',
                'country' => '155',
                'street' => 'Postweg',
                'house_number' => '146',
                'postal_code' => '5915 HC',
                'job_title' => null,
                'main_interests' => null,
                'other_interests' => null,
                'story_content' => null,
                'trash_buddies' => null,
                'created_at' => '2023-09-20 18:48:03',
                'updated_at' => '2023-09-20 18:48:03',
                'distance' => null,
                'gender' => 'm',
                'age' => null,
                'interest_based' => 'f,m',
                'studio_header1' => null,
                'studio_content1' => null,
                'studio_footer1' => null,
                'studio_image1' => null,
                'studio_header2' => null,
                'studio_content2' => null,
                'studio_footer2' => null,
                'studio_image2' => null,
                'studio_header3' => null,
                'studio_content3' => null,
                'studio_footer3' => null,
                'studio_image3' => null,
                'studio_header4' => null,
                'studio_content4' => null,
                'studio_footer4' => null,
                'studio_image4' => null,
                'darken_mode_1' => 0,
                'darken_mode_2' => 0,
                'darken_mode_3' => 0,
                'darken_mode_4' => 0,
            ]
        );

        Profile::factory()->create(
            [
                'user_id' => 2,
                'first_name' => 'Maurice',
                'last_name' => 'van Ophoven',
                'birthday' => '1969-06-25',
                'phone' => '+31 642747479',
                'company_name' => null,
                'site_url' => null,
                'vat_number' => null,
                'main_avatar_url' => 'Maurice-main_avatar.jpg',
                'other_avatar_url1' => null,
                'other_avatar_url2' => null,
                'other_avatar_url3' => null,
                'other_avatar_url4' => null,
                'other_avatar_url5' => null,
                'other_avatar_url6' => null,
                'other_avatar_url7' => null,
                'other_avatar_url8' => null,
                'banner_img_url' => 'Maurice-banner_img.jpg',
                'logo_url' => null,
                'followers' => null,
                'city' => '30080',
                'state' => '2592',
                'country' => '155',
                'street' => 'Postweg',
                'house_number' => '146',
                'postal_code' => '5915 HC',
                'job_title' => 'CEO Brandfields Ltd.',
                'main_interests' => null,
                'other_interests' => 'Crafts,Dancing,Food,Music',
                'story_content' => "A wise man said: \"Don't be afraid to start over again. This time, you're not starting from scratch, you're starting from experience.\"",
                'trash_buddies' => null,
                'created_at' => '2023-09-22 10:30:38',
                'updated_at' => '2024-01-16 11:47:24',
                'distance' => null,
                'gender' => 'm',
                'age' => null,
                'interest_based' => 'f,m',
                'studio_header1' => null,
                'studio_content1' => null,
                'studio_footer1' => null,
                'studio_image1' => null,
                'studio_header2' => null,
                'studio_content2' => null,
                'studio_footer2' => null,
                'studio_image2' => null,
                'studio_header3' => null,
                'studio_content3' => null,
                'studio_footer3' => null,
                'studio_image3' => null,
                'studio_header4' => null,
                'studio_content4' => null,
                'studio_footer4' => null,
                'studio_image4' => null,
                'darken_mode_1' => 0,
                'darken_mode_2' => 0,
                'darken_mode_3' => 0,
                'darken_mode_4' => 0,
            ]
        );

    }
}
