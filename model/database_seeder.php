<?php

require "database_handler.php";

require "user.php";
require "project.php";
require "project_image.php";


require "vendor/autoload.php";

use Faker\Factory;

class DatabaseSeeder {

    private $faker;

    public function __construct() {
        $this->faker = Factory::create();
    }

    public function seedUsers() {

        $faker = $this->faker;

        new User("SiteOwner123","testPassword123","admin");
        new User("regularJOE","passwOfJoe1","user");

        for ($i = 0; $i < 48; $i++) {
            $randomUsername = $faker->userName;
            $randomPassword = $faker->password;
            $randomDate = $faker->dateTimeThisYear()->format('Y-m-d H:i:s');
            new User($randomUsername,$randomPassword,"user",$randomDate);
        }
    }

    public function seedProjects() {

        $faker = $this->faker;

        for ($i = 0; $i < 10; $i++) {
            $randomTitle = $faker->sentence(3);
            $randomShortDesc = $faker->sentences(3,true);
            $randomLongtDesc = $faker->sentences(6,true);
            $randomLink = $faker->url;
            $createdAtDate = $faker->dateTimeThisYear()->format('Y-m-d H:i:s');
            $updatedAtDate = $faker->dateTimeBetween($createdAtDate, 'now')->format('Y-m-d H:i:s');
            new Project($randomTitle,$randomShortDesc,$randomLongtDesc,$randomLink,$createdAtDate,$updatedAtDate);
        }
    }

    public function seedProjectImages() {

        $faker = $this->faker;

        //create one thumbnail for every project
        for ($i = 0; $i < 10; $i++) {
            $project_id = $i + 1;
            $image_path = '/images/' . $faker->uuid . '.jpg';
            $caption= $faker->sentence();
            $is_thumbnail = true;
            
            new ProjectImage($project_id, $image_path, $caption, $is_thumbnail);
        }

        //create non-thumbnail images
        $numberOfNonThumbnailImages = $faker->numberBetween(12,24);
        for ($i = 0; $i < $numberOfNonThumbnailImages; $i++) {
            $project_id = $faker->numberBetween(1,10);
            $image_path = '/images/' . $faker->uuid . '.jpg';
            $caption= $faker->sentence();
            $is_thumbnail = false;
            
            new ProjectImage($project_id, $image_path, $caption, $is_thumbnail);
        }
    }

    public function seedBlogPosts(){

    }

    public function seedBlogContentBlocks(){

    }

    public function seedBlogGallery(){

    }

    public function seedBlogLinks(){

    }



}