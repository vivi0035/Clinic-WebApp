<?php
                            $name = $_POST['namee'];
                            $email = $_POST['emaill'];
                            $messagee = $_POST['message'];

                            $to      = 'vivigo@localhost';
                            $subject = 'New Message';
                            $message = 'Patient name: ' . $name .  ' | Email: ' . $email .  ' | Message: ' . $messagee .'.';
                            $headers = 'From: f32ee@localhost' . "\r\n" .
                                'Reply-To: f32ee@localhost' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();

                            mail($to, $subject, $message, $headers,'-ff32ee@localhost');
                            echo ("mail sent to : ".$to);


                            echo '<script> window.location.href="contact.php"; </script>';
?>