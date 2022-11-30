<?php

namespace Foundation\Database;

class Table
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var string
     */
    protected $sql = "CREATE TABLE IF NOT EXISTS %s ( %s ) ENGINE=InnoDB DEFAULT CHARSET=utf8";

    /**
     * @var array
     */
    protected $fields = [];

    /**
     * Constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function increments($fieldName)
    {
        $this->fields[] = "{$fieldName} int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT";

        return $this;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function integer($fieldName)
    {
        $this->fields[] = "{$fieldName} int(10) NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function tinyInteger($fieldName)
    {
        $this->fields[] = "{$fieldName} tinyint(1) NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @param int $m
     * @param int $d
     * @return $this
     */
    public function decimal($fieldName, $m = 10, $d = 2)
    {
        $this->fields[] = "{$fieldName} DECIMAL({$m}, ${d}) NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @param $values
     * @return $this
     */
    public function enum($fieldName, $values)
    {
        $values = array_map(function ($value) {
            return "'" . $value . "'";
        }, $values);

        $this->fields[] = "{$fieldName} ENUM(" . implode(',', $values) . ") NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function string($fieldName)
    {
        $this->fields[] = "{$fieldName} varchar(191) NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function text($fieldName)
    {
        $this->fields[] = "{$fieldName} text NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function boolean($fieldName)
    {
        $this->fields[] = "{$fieldName} tinyint(1) NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function date($fieldName)
    {
        $this->fields[] = "{$fieldName} DATE NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function dateTime($fieldName)
    {
        $this->fields[] = "{$fieldName} DATETIME NOT NULL";

        return $this;
    }

    /**
     * @param $fieldName
     * @return $this
     */
    public function timestamp($fieldName)
    {
        $this->fields[] = "{$fieldName} TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";

        return $this;
    }

    /**
     * @return $this
     */
    public function nullable()
    {
        $this->fields[] = str_replace("NOT", "DEFAULT", array_pop($this->fields));

        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function default($value)
    {
        $this->fields[] = array_pop($this->fields) . " DEFAULT '" . $value . "'";

        return $this;
    }

    /**
     * @return $this
     */
    public function unique()
    {
        $this->fields[] = array_pop($this->fields) . " UNIQUE";

        return $this;
    }

    /**
     * @return string
     */
    public function sql()
    {
        return sprintf($this->sql, $this->name, implode(', ', $this->fields));
    }
}
