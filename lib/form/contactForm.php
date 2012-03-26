<?php
/**
 * Created by JetBrains PhpStorm.
 * User: DAS
 * Date: 3/14/12
 * Time: 1:21 PM
 * To change this template use File | Settings | File Templates.
 */

class contactForm extends sfForm
{

    protected static $subjects = array('Subject A', 'Subject B', 'Subject C');



    public function configure()
    {

        $this->setWidgets(array(
                               'name'    => new sfWidgetFormInputText(array(),
                                            array('class' => "name")),
                               'subject' => new sfWidgetFormSelect(array('choices' => self::$subjects)),
                               'email'   => new sfWidgetFormInputText(array(),
                                            array('class' => "email", 'id' => "email")),
                               'message' => new sfWidgetFormTextarea(),

                          ));


        // Assign validation for fields
        $this->setValidators(array(
                                  'name'    => new sfValidatorOr(array(
                                                         new sfValidatorAnd(array(
                                                             new sfValidatorString(array('min_length' => 5)),
                                                             new sfValidatorRegex(array('pattern' => '/[\w- ]+/')),)),)),


                                  'email'   => new sfValidatorEmail(array(),
                                             array('invalid' => 'The email address is invalid.')),


                                  'subject' => new sfValidatorChoice(
                                                array('choices' => array_keys(self::$subjects))),
                                  'message' => new sfValidatorString(array('min_length' => 4),
                                                array('required' => 'Please enter the message',
                                                'min_length' => 'The message "%value%" is too short')),


                             ));

        //Allow filed without validation eg- Name is not validated
        $this->validatorSchema->setOption('allow_extra_fields', true);
       // $this->validatorSchema->setOption('filter_extra_fields', false);


        $this->widgetSchema->setNameFormat('contact[%s]');
    }


}

?>