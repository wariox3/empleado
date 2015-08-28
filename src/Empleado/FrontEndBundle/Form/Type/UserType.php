<?php
namespace Empleado\FrontEndBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroIdentificacion', 'text', array('required' => true))
            ->add('password', 'text', array('required' => true))
            ->add('guardar', 'submit', array('label' => 'Guardar'));
    }

    public function getName()
    {
        return 'form';
    }
}
