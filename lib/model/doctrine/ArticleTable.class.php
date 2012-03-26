<?php

/**
 * ArticleTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ArticleTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ArticleTable
     */

    static protected $statuses = array('draft', 'online', 'offline');

  static public function getStatuses()
  {
    return self::$statuses;
  }
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Article');
    }

    
}