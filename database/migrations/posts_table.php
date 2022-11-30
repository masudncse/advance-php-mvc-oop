<?php

use Foundation\Database\Table;

class PostsTable
{
    /**
     * @return Table
     */
    public function build()
    {
        $table = new Table('posts');
        $table->increments('id');
        $table->string('title');
        $table->text('body');
        $table->timestamp('created_at');

        return $table;
    }
}
