<?php

class Application
{
    private VideoCollection $videoCollection;

    public function __construct()
    {
        $this->videoCollection = new VideoCollection();
        $this->videoCollection->addVideo(new Video('The Matrix', [50, 20, 70, 90]));
        $this->videoCollection->addVideo(new Video('Godfather II', [60, 90, 80, 50]));
        $this->videoCollection->addVideo(new Video('Star Wars Episode IV: A New Hope', [100, 25, 95]));
    }

    public function run(): void
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rate video(as user)\n";
            echo "Choose 3 to rent video (as user)\n";
            echo "Choose 4 to return video (as user)\n";
            echo "Choose 5 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;

                case 1:
                    $title = new Video(readline('Input movie name: '));
                    $this->videoCollection->addVideo($title);
                    break;

                case 2:
                    echo $this->videoCollection->listInventory();
                    $title = readline('Input movie name: ');
                    do {
                        $rating = readline('How will you rate the movie?(0-100) ');
                    } while ($rating < 0 || $rating > 100 || !is_numeric($rating));
                    $this->videoCollection->setRating($title, $rating);
                    break;

                case 3:
                    echo $this->videoCollection->listInventory();
                    $title = readline('Input movie name: ');
                    $this->videoCollection->rentVideo($title);
                    break;

                case 4:
                    echo $this->videoCollection->listInventory();
                    $title = readline('Input movie name: ');
                    $this->videoCollection->returnVideo($title);
                    break;

                case 5:
                    echo $this->videoCollection->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

}