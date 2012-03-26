<?php

/**
 * BaseArticleTag
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $article_id
 * @property integer $tag_id
 * @property Article $Article
 * @property Tag $Tag
 * 
 * @method integer    getArticleId()  Returns the current record's "article_id" value
 * @method integer    getTagId()      Returns the current record's "tag_id" value
 * @method Article    getArticle()    Returns the current record's "Article" value
 * @method Tag        getTag()        Returns the current record's "Tag" value
 * @method ArticleTag setArticleId()  Sets the current record's "article_id" value
 * @method ArticleTag setTagId()      Sets the current record's "tag_id" value
 * @method ArticleTag setArticle()    Sets the current record's "Article" value
 * @method ArticleTag setTag()        Sets the current record's "Tag" value
 * 
 * @package    sis
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseArticleTag extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('article_tag');
        $this->hasColumn('article_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('tag_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Article', array(
             'local' => 'article_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Tag', array(
             'local' => 'tag_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}