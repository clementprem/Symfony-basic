<?php

/**
 * Article form.
 *
 * @package    sis
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ArticleForm extends BaseArticleForm
{
   public function configure()
  {
    $authorQuery = Doctrine::getTable('Author')->getActiveAuthorsQuery();

    // widgets
    $this->widgetSchema['content']->setAttributes(array('rows' => 10, 'cols' => 40));
    $this->widgetSchema['status'] = new sfWidgetFormSelect(array('choices' => ArticleTable::getStatuses()));
    $this->widgetSchema['author_id']->setOption('query', $authorQuery);
    $this->widgetSchema['file'] = new sfWidgetFormInputFile();

    // validators
    $this->validatorSchema['slug']->setOption('required', false);
    $this->validatorSchema['content']->setOption('min_length', 5);
    $this->validatorSchema['status'] = new sfValidatorChoice(array('choices' => array_keys(ArticleTable::getStatuses())));
    $this->validatorSchema['author_id']->setOption('query', $authorQuery);
    $this->validatorSchema['file'] = new sfValidatorFile();

    unset($this['created_at'], $this['updated_at'], $this['published_at']);
  }

     public function updateObject($values = null)
  {
    $object = parent::updateObject($values);

    $object->setFile(str_replace(sfConfig::get('sf_upload_dir').'/', '', $object->getFile()));

    return $object;
  }
    public function dosave($con = null)
  {
    if (file_exists($this->getObject()->getFile()))
    {
      unlink($this->getObject()->getFile());
    }

    $file = $this->getValue('file');
    $filename = sha1($file->getOriginalName()).$file->getExtension($file->getOriginalExtension());
    $file->save(sfConfig::get('sf_upload_dir').'/'.$filename);

    return parent::dosave($con);
  }
}
