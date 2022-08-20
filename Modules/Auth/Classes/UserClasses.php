<?php

namespace Modules\Auth\Classes;

use DateTime;
use Exception;

class UserClasses
{
  private int $id;
  private string $email;
  private string $name;
  private DateTime $email_verified_at;
  private string $password;
  private string $password_confirm;
  private string $remember_token;
  private DateTime $created_at;
  private DateTime $updated_at;



  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId(int $id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function setEmail(string $email)
  {
    try {
      $this->email = $email;
      return $this;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  string
   */
  public function setName(string $name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of email_verified_at
   */
  public function getEmail_verified_at()
  {
    return $this->email_verified_at;
  }

  /**
   * Set the value of email_verified_at
   *
   * @return  self
   */
  public function setEmail_verified_at(DateTime $email_verified_at)
  {
    $this->email_verified_at = $email_verified_at;

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword(string $password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of password_confirm
   */
  public function getPassword_confirm()
  {
    return $this->password_confirm;
  }

  /**
   * Set the value of password_confirm
   *
   * @return  self
   */
  public function setPassword_confirm(string $password_confirm)
  {
    $this->password_confirm = $password_confirm;

    return $this;
  }

  /**
   * Get the value of remember_token
   */
  public function getRemember_token()
  {
    return $this->remember_token;
  }

  /**
   * Set the value of remember_token
   *
   * @return  self
   */
  public function setRemember_token(string $remember_token)
  {
    $this->remember_token = $remember_token;

    return $this;
  }

  /**
   * Get the value of created_at
   */
  public function getCreated_at()
  {
    return $this->created_at;
  }

  /**
   * Set the value of created_at
   *
   * @return  self
   */
  public function setCreated_at(DateTime $created_at)
  {
    $this->created_at = $created_at;

    return $this;
  }

  /**
   * Get the value of updated_at
   */
  public function getUpdated_at()
  {
    return $this->updated_at;
  }

  /**
   * Set the value of updated_at
   *
   * @return  self
   */
  public function setUpdated_at(DateTime $updated_at)
  {
    $this->updated_at = $updated_at;

    return $this;
  }
}
