<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SayHello extends Command
{
    protected function configure()
    {
        $this
            ->setName('say_hello')
            ->setDescription('output hello with argument')
            ->addArgument('string', InputArgument::REQUIRED, 'String for using');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $string = $input->getArgument('string');
        $output->writeln("Привет, {$string}");
        return Command::SUCCESS;
    }
}
