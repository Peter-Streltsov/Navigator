<?php

namespace Scientometrics\Models\Records;

use Scientometrics\Models\Records as Records;
use Scientometrics\Models\Subrecords as Subrecords;

/**
 * basic class for Models\Records
 */
abstract class Record implements \Scientometrics\Interfaces\RecordInterface
{
    protected $pdo;
    protected $fluent;
    protected $slimpdo;
    protected $querydata;
    public $tablename;
    
    final public function __construct(\PDO $pdo, $fluent = null, $slimpdo = null)
    {

        $this->pdo = $pdo;
        $this->fluent = $fluent;
        $this->slimpdo = $slimpdo;

        $this->tableName();

    } // end construct



    /**
     * setter
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    private function __set($name, $value): void
    {

        $this->$name = $value;

    } // end function

    

    /**
     * Finds all items from current class table
     * Returns array of objects of current class
     *
     * @return array
     */
    final public function find(): array
    {

        $query = "SELECT * FROM ".$this->tablename;
        $this->querydata = $this->pdo->prepare($query);
        $this->querydata->execute();

        return $this;

    } // end function



    /**
     * Return $this->result in current condition
     *
     * @return void
     */
    final public function all()
    {

        return $this->result;

    } // end function



    /**
     * setting current table
     *
     * @return void
     */
    final private function tableName(): void
    {

        $this->tablename = strtolower(array_pop(explode("\\", get_class($this))));
        
    } // end function



    /**
     * Undocumented function
     *
     * @return void
     */
    final private function tableSchema()
    {

    } // end function



    /**
     * Undocumented function
     *
     * @param [type] $result
     * @return array
     */
    final protected function getArray($result): array
    {

        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);

    } // end function

} // end class
