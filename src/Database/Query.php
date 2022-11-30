<?php

namespace Foundation\Database;

use Foundation\App;

trait Query
{
    /**
     * @var string
     */
    protected static $table = '';

    /**
     * @return string
     */
    public static function class()
    {
        return static::class;
    }

    /**
     * @return string
     */
    public static function table()
    {
        return static::$table;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function all()
    {
        return App::get('query')->all(static::$table, static::class);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public static function find($id)
    {
        return App::get('query')->find(static::$table, $id, static::class);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public static function first()
    {
        return App::get('query')->first(static::$table, static::class);
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public static function create($data)
    {
        return App::get('query')->create(static::$table, $data);
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function update($data)
    {
        return App::get('query')->update(static::$table, $data, $this->id);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function delete()
    {
        return APP::get('query')->delete(static::$table, $this->id);
    }

    /**
     * @param $field
     * @param $order
     * @return static
     * @throws \Exception
     */
    public static function orderBy($field, $order)
    {
        App::get('query')->setQuery(
            App::get('query')->orderBy($field, $order)
                ->getQuery()
        );

        return new static;
    }

    /**
     * @param $condition
     * @return static
     * @throws \Exception
     */
    public static function where($condition)
    {
        App::get('query')->setQuery(
            App::get('query')->where($condition)
                ->getQuery()
        );

        return new static;
    }

    /**
     * @param $condition
     * @return $this
     * @throws \Exception
     */
    public function andWhere($condition)
    {
        App::get('query')->setQuery(
            App::get('query')->andWhere($condition)
                ->getQuery()
        );

        return new static;
    }

    /**
     * @param $condition
     * @return $this
     * @throws \Exception
     */
    public function orWhere($condition)
    {
        App::get('query')->setQuery(
            App::get('query')->orWhere($condition)
                ->getQuery()
        );

        return new static;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function get()
    {
        $table = static::$table;
        App::get('query')->setQuery(
            "SELECT * FROM {$table} " . App::get('query')->getQuery()
        );
        return App::get('query')->get(static::class);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getFirst()
    {
        $table = static::$table;
        App::get('query')->setQuery(
            "SELECT * FROM {$table} " . App::get('query')->getQuery()
        );
        return App::get('query')->getFirst(static::class);
    }
}
