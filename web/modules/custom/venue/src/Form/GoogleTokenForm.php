<?php

namespace Drupal\venue\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class GoogleTokenForm.
 */
class GoogleTokenForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'venue.googletoken',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'google_token_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('venue.googletoken');
    $form['token_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Token Key'),
      '#description' => $this->t('Enter google api key'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('token_key'),
    ];
    $form['zoom'] = [
      '#type' => 'number',
      '#title' => $this->t('Zoom'),
      '#description' => $this->t('Enter zoom'),
      '#default_value' => $config->get('zoom'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('venue.googletoken')
      ->set('token_key', $form_state->getValue('token_key'))
      ->set('zoom', $form_state->getValue('zoom'))
      ->save();
  }

}
