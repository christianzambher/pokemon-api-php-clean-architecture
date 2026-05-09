<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailService
{
    public function sendPokemonRegisteredMail(array $pokemon): bool
    {
        $mail = new PHPMailer(true);

        try {

            // CONFIG SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['MAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['MAIL_USERNAME'];
            $mail->Password = $_ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['MAIL_PORT'];

            // REMITENTE
            $mail->setFrom(
                $_ENV['MAIL_FROM'],
                $_ENV['MAIL_FROM_NAME']
            );

            // DESTINATARIO
            $mail->addAddress($_ENV['MAIL_USERNAME']);

            // CONTENIDO
            $mail->isHTML(true);

            $mail->Subject = 'Pokemon registrado';

            $mail->Body = "
                <h2>Pokemon registrado correctamente</h2>

                <ul>
                    <li><strong>Nombre:</strong> {$pokemon['nombre']}</li>
                    <li><strong>Numero:</strong> {$pokemon['numero']}</li>
                    <li><strong>Habilidad:</strong> {$pokemon['habilidad']}</li>
                </ul>

                <img src='{$pokemon['sprite_url']}' width='150'>
            ";

            $mail->send();

            return true;

        } catch (Exception $e) {

            throw new \Exception(
                'Error sending email: ' . $mail->ErrorInfo
            );
        }
    }

    public function sendPokemonMail(array $data): string
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();

            $mail->Host =
                $_ENV['MAIL_HOST'];

            $mail->SMTPAuth = true;

            $mail->Username =
                $_ENV['MAIL_USERNAME'];

            $mail->Password =
                $_ENV['MAIL_PASSWORD'];

            $mail->SMTPSecure =
                PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Port =
                $_ENV['MAIL_PORT'];

            $mail->setFrom(
                $_ENV['MAIL_FROM'],
                $_ENV['MAIL_FROM_NAME']
            );

            $mail->addAddress(
                $data['email']
            );

            $pokemon =
                $data['pokemon'];

            $mail->isHTML(true);

            $mail->Subject =
                'Pokemon Information';

            $mail->Body =
                $this->buildPokemonTemplate(
                    $pokemon
                );

            $mail->send();

            return 'Correo enviado correctamente';

        } catch (Exception $e) {

            throw new \Exception(
                $mail->ErrorInfo
            );
        }
    }

    private function buildPokemonTemplate(array $pokemon): string {
        $abilities = '';

        foreach (
            $pokemon['abilities']
            as $ability
        ) {

            $abilities .= '
                <li>' .
                $ability['ability']['name'] .
                '</li>
            ';
        }

        return "
            <h1>
                {$pokemon['name']}
            </h1>

            <h3>Abilities</h3>

            <ul>
                {$abilities}
            </ul>

            <p>
                Base experience:
                {$pokemon['baseExperience']}
            </p>
        ";
    }
}