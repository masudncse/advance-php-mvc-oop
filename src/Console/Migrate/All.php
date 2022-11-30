<?php

namespace Foundation\Console\Migrate;

use Migrations;

class All extends Migrator
{
    /**
     * @param $args
     * @return bool
     */
    public function execute($args) {
        if(count($args) == 0) {
            $this->migrate(array_keys(Migrations::list()));
            return true;
        }

        return $this->outputHelp();
    }

    /**
     * @return bool
     */
    protected function outputHelp() {
        echo 'Available commands:' . PHP_EOL;
        echo 'php run migrate all' . PHP_EOL;

        return false;
    }
}