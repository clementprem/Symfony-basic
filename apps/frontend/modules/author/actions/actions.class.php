<?php

/**
 * author actions.
 *
 * @package    sis
 * @subpackage author
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->authors = Doctrine_Core::getTable('Author')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AuthorForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AuthorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($author = Doctrine_Core::getTable('Author')->find(array($request->getParameter('id'))), sprintf('Object author does not exist (%s).', $request->getParameter('id')));
    $this->form = new AuthorForm($author);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($author = Doctrine_Core::getTable('Author')->find(array($request->getParameter('id'))), sprintf('Object author does not exist (%s).', $request->getParameter('id')));
    $this->form = new AuthorForm($author);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($author = Doctrine_Core::getTable('Author')->find(array($request->getParameter('id'))), sprintf('Object author does not exist (%s).', $request->getParameter('id')));
    $author->delete();

    $this->redirect('author/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $author = $form->save();

      $this->redirect('author/edit?id='.$author->getId());
    }
  }
}
