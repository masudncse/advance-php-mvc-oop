<?php

namespace Foundation\Console\Seed;

use Seeders;

class All extends Seeder
{
    /**
     * @param $args
     * @return bool
     */
    public function execute($args)
    {
        if (count($args) == 0) {
            $this->seed(array_keys(Seeders::list()));
            return true;
        }

        return $this->outputHelp();
    }

    /**
     * @return bool
     */
    protected function outputHelp()
    {
        echo 'Available commands:' . PHP_EOL;
        echo 'php run seed all' . PHP_EOL;

        return false;
    }
}