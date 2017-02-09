<?php

namespace Yooper;

/**
 * Loads the csv file into memory and creates an inverted index with all the 
 * nick names
 * @author yooper
 */
class Nicknames 
{
    /**
     * The key links to all the other names
     * @var array
     */
    protected $index = [];
    
    public function __construct()
    {
        $this->buildIndex();
    }
    
    private function getDataFilePath() : string
    {
        return dirname(__DIR__)."/data/names.csv";
    }    
    
    /**
     * 
     * @return array
     */
    protected function getRows() : array
    {
        return array_map('str_getcsv', file($this->getDataFilePath()));        
    }
    
    protected function buildIndex()
    {
        $rows = $this->getRows();
        foreach($rows as $row)
        {
            if(!isset($this->index[$row[0]])) {            
                $this->index[$row[0]] = array_slice($row, 1);
            }
        }
    }
    
    public function getIndex() : array
    {
        return $this->index;
    }
    
    /**
     * Returns a list of nick names
     * @param string $name
     * @return array
     */
    public function query($name) : array
    {
        if(isset($this->index[strtolower($name)])) {
            return $this->index[strtolower($name)];
        }
        return [];
    }
    
}
