<?php

namespace Foundation\Console\Drop;

use Migrations;

class All extends Dropper
{
    /**
     * @param $args
     * @return bool
     */
    public function execute($args)
    {
        if (count($args) == 0) {
            $this->drop(array_keys(Migrations::list()));
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
        echo 'php run drop all' . PHP_EOL;

        return false;
    }
}