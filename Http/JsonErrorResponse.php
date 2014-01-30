<?php

namespace Orkestra\Bundle\ApplicationBundle\Http;

use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Form\Form;

/**
 * A JsonSuccessResponse containing error information tailored to the Orkestra client side library
 */
class JsonErrorResponse extends JsonResponse
{
    /**
     * Constructor
     *
     * If $message is an instance of Form, the appropriate message will be
     * fetched from the form errors and the validation updates will be sent
     * to the browser.
     *
     * @param \Symfony\Component\Form\Form|string $message
     */
    public function __construct($message = null)
    {
        if ($message instanceof Form) {
            $data = $this->getFormErrorData($message);
        } else {
            $data = $this->getResponseData($message ?: 'An error occurred. Please try again later.');
        }

        parent::__construct($data);
    }

    /**
     * Iterates over the given Form returning error information contained within
     *
     * @todo Handle validation updates -- probably needs a FormView instead of a Form to get field IDs
     *
     * @param \Symfony\Component\Form\Form $form
     *
     * @return array
     */
    private function getFormErrorData(Form $form)
    {
        if ($form->isValid()) {
            // A JsonErrorResponse was created with a valid form-- no errors will be found
            return $this->getResponseData('An error occurred while processing the submitted information');
        }

        $errors = $this->getErrors($form);
        $message = $this->getMainErrorMessage($form);

        return $this->getResponseData($message, $errors);
    }

    private function getMainErrorMessage(Form $form)
    {
        $message = 'An error occurred. ';

        $errors = $form->getErrors();
        if (!empty($errors)) {
            $message .= implode('. ', array_map(function(FormError $error) {
                return rtrim($error->getMessage(), '.');
            }, $errors));

        } else {
            $message .= 'The form contains invalid values.';
        }

        return $message;
    }

    /**
     * Gets error message recursively through a form and all its children
     *
     * @param \Symfony\Component\Form\Form $form
     *
     * @return array
     */
    private function getErrors(Form $form)
    {
        $errors = array();

        $id = $form->createView()->vars['id'];
        foreach ($form->getErrors() as $error) {
            if (!isset($errors[$id])) {
                $errors[$id] = array();
            }

            $errors[$id][] = $error->getMessage();
        }

        foreach ($form->all() as $child) {
            $errors = array_merge($this->getErrors($child), $errors);
        }

        return $errors;
    }

    /**
     * Returns an array of data ready to be consumed by the Orkestra client-side javascript
     *
     * @param $message
     *
     * @return array
     */
    private function getResponseData($message, array $fieldErrors = array())
    {
        return array(
            'type'         => 'error',
            'message'      => $message,
            'field_errors' => $fieldErrors
        );
    }
}
