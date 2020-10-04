<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RepeatString extends Command
{
    protected function configure()
    {
        $this
            ->setName('repeat_string')
            ->setDescription('display string times cycles')
            ->addArgument('string', InputArgument::REQUIRED, 'String for display')
            ->addOption(
                'times',
                null,
                InputOption::VALUE_OPTIONAL,
                'How many times display string',
                2
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $string = $input->getArgument('string');
        $times = $input->getOption('times');

        for ($i = 0; $i < $times; $i++) {
            $output->writeln($string);
        }

        return Command::SUCCESS;
    }
}
