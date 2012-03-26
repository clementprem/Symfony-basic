<?php


class contentActions extends sfActions
{

public function executeShow()
{
	$today=getdate();
	$this->hour=$today['hours'];
	$this->minute=$today['minutes'];

}

    public function executeUpdate($request)
    {
   $name= $this->name = $request->getParameter('name');
    }










 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
 // public function executeIndex(sfWebRequest $request)
 // {
 //   $this->forward('default', 'module');
 // }
}
