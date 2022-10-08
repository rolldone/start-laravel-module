<?php

namespace Modules\Employee\Entities\dto;

use DateTime;
use Exception;
use JsonSerializable;
use Modules\Auth\Classes\BaseClasses;
use Modules\Employee\Entities\EMEmployee;

class EmployeeDto extends BaseClasses
{
  private ?int $id;
  private ?string $first_name;
  private ?string $last_name;
  private ?string $address;
  private ?string $phone_number;
  private ?string $email;
  private ?int $status = null;
  private ?int $user_id = null;
  private ?DateTime $created_at = null;
  private ?DateTime $updated_at = null;
  private ?DateTime $deleted_at = null;

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "first_name" => $this->first_name,
      "last_name" => $this->last_name,
      "address" => $this->address,
      "phone_number" => $this->phone_number,
      "email" => $this->email,
      "status" => $this->status,
      "user_id" => $this->user_id,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at,
      "deleted_at" => $this->deleted_at
    ];
  }

  /**
   * add
   *
   * @param  EMEmployee $props
   * @return self
   */
  public static function set($props)
  {
    try {
      if ($props == null) {
        return null;
      }
      $self = new EmployeeDto();
      $self->setFirst_name($props->first_name);
      $self->setLast_name($props->last_name);
      $self->setId($props->id);
      $self->setAddress($props->address);
      $self->setPhone_number($props->phone_number);
      $self->setEmail($props->email);
      $self->setUser_id($props->user_id);
      $self->setStatus($props->status);
      $self->setCreated_at(new DateTime($props->created_at));
      $self->setUpdated_at(new DateTime($props->updated_at));
      $self->setDeleted_at($props->deleted_at == null ? null : new DateTime($props->deleted_at));

      return $self;
    } catch (Exception $ex) {
      throw $ex;
    }
  }

  /**
   * Get the value of first_name
   */
  public function getFirst_name()
  {
    return $this->first_name;
  }

  /**
   * Set the value of first_name
   *
   * @return  self
   */
  public function setFirst_name(string $first_name)
  {
    $this->first_name = $first_name;

    return $this;
  }

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
   * Get the value of last_name
   */
  public function getLast_name()
  {
    return $this->last_name;
  }

  /**
   * Set the value of last_name
   *
   * @return  self
   */
  public function setLast_name(string $last_name)
  {
    $this->last_name = $last_name;

    return $this;
  }

  /**
   * Get the value of address
   */
  public function getAddress()
  {
    return $this->address;
  }

  /**
   * Set the value of address
   *
   * @return  self
   */
  public function setAddress(string $address)
  {
    $this->address = $address;

    return $this;
  }

  /**
   * Get the value of phone_number
   */
  public function getPhone_number()
  {
    return $this->phone_number;
  }

  /**
   * Set the value of phone_number
   *
   * @return  self
   */
  public function setPhone_number(string $phone_number)
  {
    $this->phone_number = $phone_number;

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
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of user_id
   */
  public function getUser_id()
  {
    return $this->user_id;
  }

  /**
   * Set the value of user_id
   *
   * @return  self
   */
  public function setUser_id(?int $user_id)
  {
    if ($user_id == null) return;
    $this->user_id = $user_id;

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
  public function setCreated_at(?DateTime $created_at)
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
  public function setUpdated_at(?DateTime $updated_at)
  {
    $this->updated_at = $updated_at;

    return $this;
  }

  /**
   * Get the value of deleted_at
   */
  public function getDeleted_at()
  {
    return $this->deleted_at;
  }

  /**
   * Set the value of deleted_at
   *
   * @return  self
   */
  public function setDeleted_at(?DateTime $deleted_at)
  {
    if ($deleted_at == null) return;
    $this->deleted_at = $deleted_at;

    return $this;
  }

  /**
   * Get the value of status
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set the value of status
   *
   * @return  self
   */
  public function setStatus(?int $status)
  {
    $this->status = $status;

    return $this;
  }
}
