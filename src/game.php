<?php

namespace BrainGames\Game;

use function cli\line;
use function cli\prompt;

function run()
{
    
    $endOfCicle = 0;
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    line(" ");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    $endOfCicle = 0;
    while ($endOfCicle<3) {
        $randomNumber = rand(1, 100);
        line("Question: %d", $randomNumber);
        $answer = prompt('Your answer');
        $answerStrLower = mb_strtolower($answer);
        if (($answerStrLower !=="yes") && ($answerStrLower !=="no")) {
            $endOfCicle = 0;
            if ($randomNumber % 2 == 0) {
                line("'{$answer}' is wrong answer :(. Corrct answer was 'yes' \n Let's try again, %s ", $name);
            } else {
                line("'{$answer}' is wrong answer :(. Corrct answer was 'no' \n Let's try again, %s ", $name);
            }
            continue;
        }
        if ($answerStrLower=="yes" && ($randomNumber % 2) == 0) {
            line("Correct!");
            $endOfCicle = $endOfCicle + 1;
            continue;
        } else {
            if (($answerStrLower == "no") && ($randomNumber % 2 ) !== 0) {
                line("Correct");
                $endOfCicle = $endOfCicle + 1;
                continue;
            } else {
                line("'{$answer}' is wrong answer :(. Corrct answer was 'yes' \n Let's try again, %s ", $name);
                $endOfCicle = 0;
                continue;
            }
        }
        if (($answerStrLower == "no") && ($randomNumber % 2 ) !== 0) {
            line("Correct");
            $endOfCicle = $endOfCicle + 1;
            continue;
        } else {
            line("'{$answer}' is wrong answer :(. Corrct answer was 'yes' \n Let's try again, %s ", $name);
            $endOfCicle = 0;
            continue;
        }
    }
    line("Congratulations, %s!", $name);
}
