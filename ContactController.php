<?php
include_once 'controller/Controller.php';

class ContactController extends Controller
{
    public function index()
    {
        if (!empty($_POST['contactform_submit'])) {
            header("HTTP/1.1 303 See Other");
            header("Location: " . "success");
        }
    }

    protected function show()
    {
// TODO: Implement show() method.
    }

    protected function init()
    {
        echo <<<'Form'

<form id="contactform" action="{URI_KONTAKT}" method="post" name="contactform">
    <label for="contactform-subject">Betreff</label>
    <input type="text" id="contactform-subject" name="subject" required>

    <label for="contactform-message">Mitteilung</label>
    <textarea id="contactform-message" name="message" rows="8" cols="50" required></textarea>

    <label for="contactform-name">Name</label>
    <input type="text" id="contactform-name" name="name" required>

    <label for="contactform-first_name">Vorname</label>
    <input type="text" id="contactform-first_name" name="first_name" required>

    <label for="contactform-phone">Telefon-Nr.</label>
    <input type="text" id="contactform-phone" name="phone">

    <label for="contactform-email">Email-Adresse</label>
    <input type="text" id="contactform-email" name="email" required>

    <label for="contactform-newsletter">Newsletter abonnieren</label>
    <input type="checkbox" id="contactform-newsletter" name="newsletter" checked>

    <input type="hidden" name="contact" value="1">
    <input type="submit" name="contactform_submit" value="Senden">
</form>

Form;
    }

    protected function create()
    {
        echo "<p>Vielen Dank für Ihre Anfrage, wir setzen uns sobald wie möglich mit Ihnen in Verbindung.</p>";
        $this->init();
    }

    public function new()
    {
        $this->init();
    }

    public function success()
    {
        $this->create();
    }

}