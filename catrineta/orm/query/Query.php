<?php

/*
 * Copyright (C) 2017 Luis Pinto <luis.nestesitio@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Catrineta\orm\query;

use \Catrineta\register\CatExceptions;
use \Catrineta\db\PdoQuery;
use \Catrineta\orm\Model;
use \Catrineta\db\Sql;

/**
 * Description of Query
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Oct 8, 2017
 */
class Query
{
    /**
     *
     * @var \Catrineta\orm\Model 
     */
    protected $model;
    
    /**
     *
     * @var array The columns for output
     */
    protected $fetch = [];
    
    protected $columns = [];
    
    /**
     * 
     * @param array $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }
    
    /**
     * 
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }
    
    
    /**
     * 
     * @return array Get the fetched columns
     */
    public function mergeFetch($fetch)
    {
        
        return $this->fetch = array_merge($this->fetch, $fetch);
    }
    

    /**
     * 
     * @param string $alias
     * @return \Catrineta\db\mysql\MysqlSelect
     */
    protected function setSelectStatement($alias)
    {
        $this->statement = new \Catrineta\db\mysql\MysqlSelect($this->model->getTableName(), $alias);
        return $this->statement;
    }
    
    /**
     * 
     * @param string $alias
     * @return \Catrineta\db\mysql\MysqlWrite
     */
    protected function setWriteStatement($alias)
    {
        $this->statement = new \Catrineta\db\mysql\MysqlWrite($this->model->getTableName(), $alias);
        return $this->statement;
    }


    /**
     * 
     * @param string $column
     * @param mixed $value
     * @param string $operator (= | <= | < | > | >=)
     * @return $this
     */
    public function filterByColumn($column, $value, $operator = Sql::EQUAL)
    {
        
        if ($value === Sql::ISNULL || $value === Sql::ISNOTNULL) {
            $this->statement->whereIsNullOrNot($column, $value);
        }else{
            $this->statement->setCondition($column, $value, $operator);
        }
        if(!is_array($value) && $operator == Sql::EQUAL){
            $this->model->setColumnValue($column, $value);
            $this->model->joinCondition($this->statement->getActualTable(), $column, $value);
        }
        
        return $this;
    }
    
    
    /**
     * 
     * @param string $column
     * @param datetime $min
     * @param datetime $max
     * @param string $operator (= | <= | < | > | >=)
     * @return $this
     */
    public function filterByDateColumn($column, $min = null, $max = null, $operator = Sql::BETWEEN)
    {
        if($max == Sql::EQUAL || $operator == Sql::EQUAL){
            $value = \Catrineta\tools\DateTools::convertToSqlDate($min);
            $this->filterByColumn($column, $value, Sql::EQUAL);
        }else{
            $this->filterByColumn($column, ['min'=>$min, 'max'=>$max], $operator);
        }
        return $this;
    }
    
    /**
     * 
     * @return \Catrineta\db\mysql\MysqlSelect 
     */
    public function getStatement()
    {
        return $this->statement;
    }
    
    /**
     * 
     * @param \Catrineta\db\mysql\MysqlSelect $statement
     */
    public function setStatement($statement)
    {
        $this->statement = $statement;
    }
    
    /**
     * 
     * @param \Catrineta\db\mysql\MysqlStatement $stmt
     * @return PdoQuery
     */
    protected function setPdo(\Catrineta\db\mysql\MysqlStatement $stmt)
    {
        $pdo = new PdoQuery();
        $pdo->setParams($stmt->getParams());
        return $pdo;
    }
    
    /**
     * Convert row from result query to a model
     * @param Model $model
     * @param array $row
     * @return \Catrineta\orm\Model
     * @throws CatExceptions
     */
    protected function getRow(Model $model, $row)
    {
        $className = get_class($model);
        //declare new Model
        $item = new $className();
        $i = 0;
        foreach($row as $col => $value){
            if(!isset($this->fetch[$i])){
                throw new CatExceptions('no fetch with index ' . $i . ' for field ' 
                        . $col . ' and ' . $value, CatExceptions::CODE_ORM);
            }
            $column = $this->fetch[$i];
            //utf8_encode($value)
            if(!mb_check_encoding ($value, 'UTF-8')){
                $value  = utf8_encode($value);
            }
            
            $i++;

            $item->setColumnValue($column, $this->sanitizeValue($value));
        }
        return $item;
    }
    
    private function sanitizeValue($value)
    {
        if($value === 0){
            return 0;
        }
        if(empty($value)){
            return '';
        }
        
        return $value;
    }

}
