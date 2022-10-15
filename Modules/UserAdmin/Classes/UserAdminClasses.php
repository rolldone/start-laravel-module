<?php

namespace Modules\UserAdmin\Classes;

use DateTime;
use Illuminate\Support\Facades\Log;
use Modules\Auth\Classes\BaseClasses;

class UserAdminClasses extends BaseClasses
{
  protected ?int $id;
  protected ?string $name;
  protected ?string $email;
  protected ?bool $is_root;
  protected ?DateTime $created_at = null;
  protected ?DateTime $updated_at = null;

  public function jsonSerialize()
  {
    return [
      "id" => $this->id,
      "name" => $this->name,
      "email" => $this->email,
      "is_root" => $this->is_root,
      "created_at" => $this->created_at,
      "updated_at" => $this->updated_at
    ];
  }

  public static function set($props)
  {
    if ($props == null) return null;
    $self = new UserAdminClasses();
    $self->setId($props->id);
    $self->setName($props->name);
    $self->setEmail($props->email);
    $self->setIs_root($props->is_root);
    $self->setCreated_at($props->created_at);
    $self->setUpdated_at($props->updated_at);
    return $self;
  }

  /**
   * Get the value of is_root
   */
  public function getIs_root()
  {
    return $this->is_root;
  }

  /**
   * Set the value of is_root
   *
   * @return  self
   */
  public function setIs_root($is_root)
  {
    $this->is_root = $is_root;

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
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
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
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

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
  public function setId($id)
  {
    $this->id = $id;

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
  public function setUpdated_at($updated_at)
  {
    $this->updated_at = $updated_at;

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
  public function setCreated_at($created_at)
  {
    $this->created_at = $created_at;

    return $this;
  }
}
