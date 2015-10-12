<?php

namespace Framework;

use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;

class Model extends QueryBuilderHandler
{
    protected $table = "";

    function __construct(Connection $connection)
    {
        if($this->table === "")
        {
            $this->setDefaultTableName();
        }

        parent::__construct($connection);
        $this->addStatement('tables', $this->table);
    }

    private function setDefaultTableName()
    {
        $classPath = explode('\\', get_called_class());
        $tableName = strtolower(end($classPath));
        $this->table = $tableName . 's';
    }
}
