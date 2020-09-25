<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';

  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = '@gmail.com';                     // SMTP username
      $mail->Password   = '';                               // SMTP password
      // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      //$mail->Port       = 587;
      $mail->Port       = 465;

      //Recipients
      $mail->setFrom('admin@mail.com');
      $mail->addAddress('@gmail.com');

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $_SESSION['user_name'].' Request';
      $mail->Body    = '<p>Dear supervirsor, employee '.$_SESSION['user_name'].' requested for some time off
      <br>starting on: '.$_POST['start_date'].' and ending on: '.$_POST['end_date'].',
      <br>stating the reason: '.$_POST['reason'].'.</p>
      <p>Click on one of the below links to approve or reject the application:
      <br><a href="api/application/update.php?id='.$_SESSION['user_id'].'&status=approved">Approve</a> - <a href="api/application/update.php?id='.$_SESSION['user_id'].'&status=rejected">Reject</a></p>';

      $mail->send();
      echo 'Message has been sent';
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>
