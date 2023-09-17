<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateJobUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        DB::table('jobs')->insert([
            [
                'title' => 'Développeur Full Stack',
                'description' => 'Recherche d\'un développeur Full Stack expérimenté pour travailler sur un projet de 6 mois. Compétences requises : Node.js, React.js, MongoDB.',
                'price' => 250000,
                'user_id' => 1
            ],
            [
                'title' => 'Développeur Frontend',
                'description' => 'Nous cherchons un développeur frontend pour intégrer des maquettes. Compétences : HTML, CSS, JS, Vue.js.',
                'price' => 198000,
                'user_id' => 1
            ],
            [
                'title' => 'Ingénieur DevOps',
                'description' => 'Recherche d\'un ingénieur DevOps pour optimiser notre pipeline CI/CD. Compétences en Docker, Kubernetes exigées.',
                'price' => 370000,
                'user_id' => 1
            ],
            [
                'title' => 'Développeur Backend Python',
                'description' => 'Cherchons développeur backend spécialisé en Python. Expérience avec Flask ou Django est un plus.',
                'price' => 230000,
                'user_id' => 1
            ],
            [
                'title' => 'Développeur Mobile',
                'description' => 'Recherche d\'un développeur mobile pour une application e-commerce. Expérience en React Native nécessaire.',
                'price' => 200000,
                'user_id' => 1
            ],
            [
                'title' => 'Architecte Logiciel',
                'description' => 'Nous cherchons un architecte logiciel pour concevoir l\'architecture d\'une nouvelle plateforme SaaS.',
                'price' => 430000,
                'user_id' => 1
            ],
            [
                'title' => 'Développeur Java Senior',
                'description' => 'Cherchons un développeur Java avec 5 ans d\'expérience. Connaissance de Spring Boot est essentielle.',
                'price' => 500000,
                'user_id' => 1
            ],
            [
                'title' => 'Data Scientist',
                'description' => 'Recherche d\'un data scientist pour travailler sur des algorithmes de recommandation. Python, R, TensorFlow sont nécessaires.',
                'price' => 240000,
                'user_id' => 1
            ],
            [
                'title' => 'Développeur WordPress',
                'description' => 'Cherchons un développeur WordPress pour construire un site d\'e-commerce. Connaissance de WooCommerce est un plus.',
                'price' => 180000,
                'user_id' => 1
            ],
            [
                'title' => 'Développeur PHP Junior',
                'description' => 'Poste pour un développeur PHP junior avec au moins 1 an d\'expérience. Laravel ou Symfony est préféré.',
                'price' => 160000,
                'user_id' => 1
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_user');
    }
}
