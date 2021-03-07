<?php

class Application
{
    private VideoCollection $videoCollection;

    public function __construct()
    {
        $this->videoCollection = new VideoCollection();
        $this->videoCollection->addVideos(new Video('The Matrix', 89));
        $this->videoCollection->addVideos(new Video('Godfather II', 80));
        $this->videoCollection->addVideos(new Video('Star Wars Episode IV: A New Hope', 40));
    }

    public function run(): void
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;

                case 1:
                    $title = new Video(readline('Input movie name: '));
                    $this->videoCollection->addVideos($title);
                    break;

                case 2:
                    echo $this->videoCollection->listInventory();
                    $title = readline('Input movie name: ');
                    $this->videoCollection->rentVideo($title);
                    break;

                case 3:
                    echo $this->videoCollection->listInventory();
                    $title = readline('Input movie name: ');
                    do {
                        $rating = readline('How will you rate the movie?(0-100) ');
                    } while ($rating < 0 || $rating > 100 || !is_numeric($rating));
                    $this->videoCollection->returnVideo($title, (int)$rating);
                    break;

                case 4:
                    echo $this->videoCollection->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

}