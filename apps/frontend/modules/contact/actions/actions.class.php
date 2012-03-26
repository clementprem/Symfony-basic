

<?php
/**
 * in this class
 */

class contactActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex($request)
    {
        $this->form=new ContactForm();


        if($request -> isMethod('POST')){


            $this->form->bind($request->getParameter('contact'));

           if($this->form->isValid())
           {

                $values=$this->form->getValues();


                $this->redirect('contact/thankyou?'.http_build_query($values));

        }}}


    public function executeThankyou(){

    }


}