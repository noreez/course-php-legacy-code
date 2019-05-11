<?php

declare(strict_types=1);

namespace Entity;

use Repository\UsersRepository;

class Users implements UserInterface
{
	public $id = null;
	public $email;
	public $pwd;
	public $role = 1;
	public $status = 0;
	private $userRepository;
	public $name;
	public function __construct(UsersRepository $usersRepository, Name $name)
	{
		$this->userRepository=$usersRepository;
		$this->name=$name;
	}
	public function setId(int $id)
	{
		$this->id = $id;
		$this->userRepository->getOneBy(['id' => $id], true);
	}
	public function setEmail(string $email)
	{
		$this->email = strtolower(trim($email));
	}
	public function setPwd(string $pwd)
	{
		$this->pwd = password_hash($pwd, PASSWORD_DEFAULT);
	}
	public function setRole(string $role)
	{
		$this->role = $role;
	}
	public function setStatus(string $status)
	{
		$this->status = $status;
	}
	public function getId(): int
	{
		return $this->id;
	}
	public function getEmail(): string
	{
		return $this->email;
	}
	public function getPwd(): string
	{
		return $this->pwd;
	}
	public function getRole(): int
	{
		return $this->role;
	}
	public function getStatus(): int
	{
		return $this->status;
	}
}
