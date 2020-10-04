<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class UserDialog extends Command
{
    protected function configure()
    {
        $this
            ->setName('user_dialog')
            ->setDescription('Ask data`s about user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new Question('You name? ', '');
        $userName = $helper->ask($input, $output, $question);

        $question = new Question('You age? ', '');
        $question->setValidator(function ($answer) {
            if (!is_numeric($answer)) {
                throw new \RuntimeException('The age must be number!');
            }
            return $answer;
        });
        $userAge = $helper->ask($input, $output, $question);

        $question = new ChoiceQuestion(
            'You sex (male or female)?',
            ['male', 'female'],
            null
        );
        $userSex = $helper->ask($input, $output, $question);

        $output->writeln("User: {$userName}, age: {$userAge} years, sex: {$userSex}");
        return Command::SUCCESS;
    }
}
