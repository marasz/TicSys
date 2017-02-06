<?php

include_once 'controller/FormController.php';
include_once 'view/registration/RegistrationInitView.php';
include_once 'view/registration/RegistrationConfirmationView.php';
include_once 'lib/MysqlAdapter.php';

class RegistrationController extends FormController {

    protected function init() {
        $view = new RegistrationInitView();
        $view->notification = $this->notification;
        $view->registrationUri = URI_REGISTRATION;
        $view->validatedUserName = $this->validate('username', true);
        $view->validatedPassword = $this->validate('password', true);
        $view->validatedPasswordRepetition = $this->validate('password_repetition', true);
        $view->validatedLastName = $this->validate('lastname', true);
        $view->validatedFirstName = $this->validate('first_name', true);
        $view->validatedPhone = $this->validate('phone');
        $view->validatedEmail = $this->validate('email', true);
        $view->display();
    }

    protected function create() {

        // Form submitted by human
        // validate form
        $valid = true;
        $valid &=!empty($_POST['username']);
        $valid &=!empty($_POST['password']);
        $valid &=!empty($_POST['password_repetition']);
        $valid &=!empty($_POST['last_name']);
        $valid &=!empty($_POST['first_name']);
        $valid &=!empty($_POST['email']);

        if ($valid) {
            $mysqlAdapter = new MysqlAdapter(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            $data = array();
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            $data['lastname'] = $_POST['last_name'];
            $data['firstname'] =$_POST['first_name'];
            $data['phone'] = $_POST['phone'];
            $data['email'] = $_POST['email'];
            $data['date'] = date('Y-m-d H:i:s');

            $mysqlAdapter->store('customers', $data);

            header("HTTP/1.1 303 See Other");
            header("Location: " . URI_REGISTRATION . "/success");
            exit();
        } else {
            $this->notification = "Bitte füllen Sie alle markierten Felder aus.";
            $this->init();
        }
    }

    protected function index() {
        if (preg_match('@/success$@i', $_SERVER['REQUEST_URI'])) {
            // show confirmation page
            $view = new RegistrationConfirmationView();
            $view->display();
        }
    }

}

