<?php

declare(strict_types=1);

namespace Controller;

use Core\Validator;
use Core\View;
use Entity\Users;
use Form\UserForm;
use Model\UsersRepository;
use ValueObject\Identity;

class UsersController
{

	private $user;
	private $userRepository;
	
    public function __construct(Users $user, UsersRepository $usersRepository)
    {
        $this->user = $user;
        $this->userRepository= $usersRepository;
    }
    
    public function defaultAction()
    {
        echo "users default";
    }
    
    public function addAction()
    {
        $user = new Users();
        $form = $user->getRegisterForm();
        
        
        $v = new View("addUser", "front");
        $v->assign("form", $form);
        
        
    }
    
    public function saveAction()
    {
        
        $user   = new Users();
        $form   = $user->getRegisterForm();
        $method = strtoupper($form["config"]["method"]);
        $data   = $GLOBALS["_" . $method];
        
        
        if ($_SERVER['REQUEST_METHOD'] == $method && !empty($data)) {
            
            $validator      = new Validator($form, $data);
            $form["errors"] = $validator->errors;
            
            if (empty($errors)) {
                $user->setFirstname($data["firstname"]);
                $user->setLastname($data["lastname"]);
                $user->setEmail($data["email"]);
                $user->setPwd($data["pwd"]);
                $user->save();
            }
            
            
            
        }
        
        $v = new View("addUser", "front");
        $v->assign("form", $form);
        
        
    }
    
    
    public function loginAction()
    {
        
        $user = new Users();
        $form = $user->getLoginForm();
        
        
        
        $method = strtoupper($form["config"]["method"]);
        $data   = $GLOBALS["_" . $method];
        if ($_SERVER['REQUEST_METHOD'] == $method && !empty($data)) {
            
            $validator      = new Validator($form, $data);
            $form["errors"] = $validator->errors;
            
            if (empty($errors)) {
                $token = md5(substr(uniqid() . time(), 4, 10) . "mxu(4il");
                // TODO: connexion
            }
            
        }
        
        $v = new View("loginUser", "front");
        $v->assign("form", $form);
        
    }
    
    
    public function forgetPasswordAction()
    {
        
        $v = new View("forgetPasswordUser", "front");
        
    }
}