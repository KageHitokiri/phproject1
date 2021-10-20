<?php
    $title = "Contact";
    require_once "./utils/utils.php";

    $info = $firstName = $lastName = $email = $subject = $message = "";
    $firstNameError = $emailError = $subjectError = $thereAreErrors = false;
    $errors = [];

    if ("POST" === $_SERVER["REQUEST_METHOD"]) {
        $firstName = sanitizeInput($_POST["firstName"] ?? "");
        $lastName = sanitizeInput($_POST["lastName"] ?? "");
        $email = sanitizeInput($_POST["email"] ?? "");
        $subject = sanitizeInput($_POST["subject"] ?? "");
        $message = sanitizeInput($_POST["message"] ?? "");

        if (empty($firstName)) {
            $errors = "El nombre es obligatorio";
            $firstNameError = true;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors = "Formato de correo electrónico incorrecto";
            $emailError = true;
        }
        if (empty($subject)) {
            $errors = "El asunto es obligatorio";
            $subjectError = true;
        }
        if (sizeof($errors) > 0) {
            $thereAreErrors = true;
        }
        if (!$thereAreErrors) {
            $info = "Mensaje insertado correctamente";
            $firstName = $lastName = $email = $subject = $message = "";
        } else {
            $info = "Datos erróneos";
        }

    }

    include("./views/contact.view.php");