<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Specific data
    $genres = [
      [
        [
          "imgUrl" => "https://i.pinimg.com/736x/90/09/ff/9009ff18b3e274ff3a400b7fb0d18821.jpg",
          "type" => "Fantasy",
          "desc" => "Books set in imaginary worlds often involving magic, mythical creatures, and epic quests."
        ],
        [
          "imgUrl" => "https://i.pinimg.com/564x/79/b8/77/79b87720b2cdcbdc285f6a4aee308373.jpg",
          "type" => "Science Fiction",
          "desc" => "Stories that explore scientific and technological advancements, often set in the future or in alternative universes."
        ],
        [
          "imgUrl" => "https://i.pinimg.com/564x/b9/03/63/b903634269152fe6948b3869b2ad87c6.jpg",
          "type" => "Mystery",
          "desc" => "Books focused on solving a crime or unraveling a puzzle, often featuring detectives or amateur sleuths."
        ],
        [
          "imgUrl" => "",
          "type" => "Romance",
          "desc" => "Novels centered around love and relationships, with an emphasis on emotional connections and romantic experiences."
        ],
        [
          "imgUrl" => "",
          "type" => "Thriller",
          "desc" => "Suspenseful books that keep readers on the edge of their seats, often involving danger, intense action, and unexpected twists."
        ],
        [
          "imgUrl" => "",
          "type" => "Historical Fiction",
          "desc" => "Stories set in the past, often incorporating real events, places, or people from history."
        ],
        [
          "imgUrl" => "",
          "type" => "Horror",
          "desc" => "Books intended to frighten and invoke a sense of fear, often featuring supernatural elements or psychological suspense."
        ],
        [
          "imgUrl" => "",
          "type" => "Biography",
          "desc" => "Non-fiction books that tell the life story of a real person, providing insights into their achievements, struggles, and experiences."
        ],
        [
          "imgUrl" => "",
          "type" => "Self-Help",
          "desc" => "Books aimed at personal development and self-improvement, offering guidance and advice on various aspects of life."
        ],
        [
          "imgUrl" => "",
          "type" => "Poetry",
          "desc" => "Literary works written in verse, expressing emotions, thoughts, and experiences through the creative use of language and imagery."
        ],
        [
          "imgUrl" => "",
          "type" => "Young Adult (YA)",
          "desc" => "Books specifically written for teenage readers, addressing themes and issues relevant to that age group."
        ],
        [
          "imgUrl" => "",
          "type" => "Historical Non-fiction",
          "desc" => "Non-fiction books that explore specific events, eras, or figures from history, providing factual information and analysis."
        ],
        [
          "imgUrl" => "",
          "type" => "Comedy",
          "desc" => "Books intended to be humorous and entertaining, often featuring witty dialogue, amusing situations, and comedic storytelling."
        ],
        [
          "imgUrl" => "",
          "type" => "Dystopian",
          "desc" => "Stories set in a future society characterized by oppression, deprivation, and often a struggle against a totalitarian regime."
        ],
        [
          "imgUrl" => "",
          "type" => "Adventure",
          "desc" => "Books featuring exciting and often dangerous journeys, with protagonists facing challenges and overcoming obstacles."
        ]
      ]
    ];



    foreach ($genres as $genreData) {
      foreach ($genreData as $data) {
        Genre::factory()
          ->specificGenre($data["type"], $data["imgUrl"], $data["desc"])
          ->create();
      }
    }
  }
}
