<?php

namespace App\Controller;

use App;
use App\Objection\Objection;
use App\HTML\Form;
use App\Modele\CustomerModele;
use App\Core\SendMail\SendMail;
use App\Controller\AppController;
use App\Validator\CustomerValidator;

class UsersController extends AppController {

    public function clientlogin() {
        $errors = false;
        $message = null;
        if (!empty($_POST)) {
            if($_POST['adressemail'] == '' || $_POST['adressemail'] == '') {
                $message = "Veuillez remplir les champs";
            } else {
                if ($this->loadAuth('customer')->login($_POST['adressemail'], $_POST['password'])) {
                    header('Location: index.php');
                }else {
                    $errors = true;
                    $message = null;
                }

            }
            
        }

        $this->render('users.Clientlogin', compact('errors', 'message'));

    }

    public function ClientSignu() {
        $customer = new CustomerModele();
        $table = App::getInstance()->getTable('customer');
        $errors = [];

        $mail = new SendMail(true);
        $userExist = false;
        if (!empty($_POST)) {
            $p = new CustomerValidator($_POST, $table);
            Objection::objet($customer, $_POST, ['customername', 'customermail', 'customerpassword']);
            if ($p->validate()) {
                if ($table->showNewCustomer($_POST['customermail']) == null) {
                    
                    $table->createCustomer($customer);
                    $customer = $table->showNewCustomer($_POST['customermail']);
                    $message = "Un message de confirmation vous a été envoyé sur cette adresse, merci de cliquer sur ce <a href='http://localhost:85/index.php?page=users.confirm&id=".$customer->getId()."&confirm=".$customer->getConfirm()." class='alert alert-success m-1'>lien</a> pour confirmer votre inscription";
                    $mail->sendMail($_POST['customermail'], $message);
                }else {
                    $userExist = true;
                }
            }else {
                $errors[] = $p->errors();
            }
        }

        $form = new Form($customer, $errors);
        $this->render('users.ClientSignup', compact('errors', 'form', 'userExist'));
    }

    public function login() {
        $errors = false;
        if (!empty($_POST)) {
        if ($this->loadAuth('user')->login($_POST['adressemail'], $_POST['password'])) {
                header("Location: admin.php?page=admin.posts.index");
                http_response_code(301);
                exit();
        }else {
                $errors = true;
        }
        }
        $this->render('users.login', compact('errors'));
    }
    
    public function newPassword() {
        
        $table = $this->loadModel('customer');
        $errors = false;
        $mail = new SendMail(true);
        $userExist = false;
        $customer = new CustomerModele();
        $confirm = false;
        $messageError = null;

        if (!empty($_POST)) {
            if($_POST['customermail'] == '') {
               $messageError = "Veuillez remplir le champs";
            }else {
                    $messageError = null;
                    $p = new CustomerValidator($_POST, $table);
                    Objection::objet($customer, $_POST, ['customermail']);
                    if ($p->validate()) {
                        if ($table->showNewCustomer($_POST['customermail']) !== null) {
                        
                            $customer = $table->showNewCustomer($_POST['customermail']);
                            $message = "Merci de cliquer sur ce <a href='http://localhost:8000/index.php?page=users.passwordupdate&id=".$customer->getId()."' class='alert alert-success m-1'>lien</a> pour modifier votre mot de passe";
                            if ($mail->sendMail($_POST['customermail'], $message)) {
                                $confirm = true;
                            }
                        }else {
                            $userExist = true;
                        }
                    }else {
                        $errors[] = $p->errors();
                    }
                }
            }
        $this->render('users.newpassword', compact('errors', 'messageError', 'confirm', 'userExist'));

    }

    public function passwordupdate() {
        $table = $this->loadModel('customer');
        $errors = false;

        $confirm = true;
        if (!empty($_GET['id'])) {
            $customer = $table->find($_GET['id']);
            if (!empty($_POST)) {
                
                $p = new CustomerValidator($_POST, $table);
                
            // dd($table, $customer);
                Objection::objet($customer, $_POST, 'customerpassword');
                if ($p->validate()) {
                    if ($_POST['customerpassword'] === $_POST['password']) {
                        $table->updateCustomerPassword($customer);
                    }else {
                        $confirm = false;
                    }
                }else {
                    $errors = true;
                }
            }
        }
        $this->render('users.passwordUpdated', compact('errors', 'confirm'));
    }
    public function logout() {
        if (isset($_SESSION['auth'])) {
            session_destroy();
            header("Location: index.php?page=users.login");
            http_response_code(301);
            exit();
        }
    }

    public function confirm() {

        if (isset($_GET['id']) && isset($_GET['confirm']) && !empty($_GET['id']) && !empty($_GET['id'])) {
            $user = $this->loadModel('customer')->find($_GET['id']);
        
            if ($user) {
                //$user->setCustomermail($user->get)
                $this->loadModel('customer')->updateCustomer($user);
                header("Location: ?page=users.Clientlogin");
            }
        }
    }
}
