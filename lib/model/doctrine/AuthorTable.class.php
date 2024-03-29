<?php

/**
 * AuthorTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AuthorTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object AuthorTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Author');
    }
     public function getActiveAuthorsQuery()
  {
    $query = Doctrine_Query::create()
      ->from('Author a')
      ->where('a.active = ?', true);

    return $query;
  }
  
}