<?php

namespace Foundation\Console;

class Run
{
    /**
     * @var string[]
     */
    protected $commandsWhitelist = [
        'migrate' => 'Foundation\Console\Migrate',
        'drop' => 'Foundation\Console\Drop',
        'seed' => 'Foundation\Console\Seed'
    ];

    /**
     * @param $args
     * @return bool|mixed
     */
    public function execute($args)
    {
        if (count($args) > 1) {
            $commandName = array_shift($args);

            if (array_key_exists($commandName, $this->commandsWhitelist)) {
                return $this->executeCommand(
                    $this->commandsWhitelist[$commandName], $args
                );
            }

            return $this->outputHelp();
        }

        return $this->outputHelp();
    }

    /**
     * @return bool
     */
    protected function outputHelp()
    {
        echo 'Available commands:' . PHP_EOL;

        foreach ($this->commandsWhitelist as $key => $value) {
            echo 'php run ' . $key . PHP_EOL;
        }

        return false;
    }

    /**
     * @param $commandClass
     * @param $args
     * @return mixed
     */
    protected function executeCommand($commandClass, $args)
    {
        $command = new $commandClass;
        return $command->execute($args);
    }
}
