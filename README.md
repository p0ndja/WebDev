# SMD WebDev

![Image](https://repository-images.githubusercontent.com/216790969/da52a000-7792-11ea-997b-7503371435f0)

สำหรับโปรเจค WebDev นี้เป็นโปรเจคที่พัฒนาขึ้น บนภาษา **HTML, PHP, CSS, JavaScript, SQL** (รวมถึง Bootstrap 4.4.1) เพื่อสร้างเว็บไซต์โรงเรียนสาธิตมหาวิทยาลัยขอนแก่น ฝ่ายมัธยมศึกษา (มอดินแดง) ตามปณิธานของพวกเราที่ตั้งใจเอาไว้ว่าจะให้มันเป็นโปรเจคจบของพวกเรา **PondJaᵀᴴ และ ˢᵖᵉᶜᵗᵉʳRisaka**
ซึ่งโปรเจคนี้ถือเป็นโปรเจคด้านเว็บไซต์แรกที่มีโอกาสได้ทำ ซึ่งถ้าหากมีข้อผิดพลาดหรือบัคใด ๆ ที่รู้สึกขัดใจ สามารถ Pull เข้ามาได้เลยนะครับ จะได้ทำการปรับแก้ไขให้

This 'WebDev' project is base on **HTML, PHP, CSS, JavaScript, SQL Computer languages** (with Bootstrap 4.4.1) to create our dream website for our school, The demonstration school of Khon Kaen University (Mo Din Daeng) 
This is our first website project, if there's something which is not prefectly. Feel free to create a pull request to us.


#### **This project has a 'GNU General Public License v3.0', please keep in mind that you'll need to opensource your edited code if you using our code.**

![Image](https://me.pondja.com/img/Annotation%202019-11-29%20114539.jpg) ![Image](https://me.pondja.com/img/Annotation%202019-11-29%20115148.jpg) ![Image](https://me.pondja.com/img/Annotation%202019-11-29%20115227.jpg)

# Live Demo: [https://smd.pondja.com](https://smd.pondja.com)


#### PondJaᵀᴴ & ˢᵖᵉᶜᵗᵉʳRisaka

# Technical Zone

### Configuration
-----------------

สำหรับไฟล์ **'/global/connect.php'** จะไม่มีอยู่ในโฟลเดอร์นั้นเพราะว่าเรื่องความลับของข้อมูลที่เปิดเผยไม่ได้ โดยให้เราแก้ไขจากไฟล์ **'/global/connect.template.php'** นะครับ หรือไม่ก็ให้สร้างเองตาม Template ด้านล่างนี้นะครับ

For the **'/global/connect.php'** file. There's a secret on the database information, so I can't show you here,
but you can follow the template in **'/global/connect.template.php'** or this template below:

```
<?php
    ob_start();
    session_start();
    if (!isset($_SESSION['dark_mode'])) $_SESSION['dark_mode'] = false;

    //ตรงนี้ให้ปรับค่าตามเซิฟเวอร์แต่ละเครื่องนะครับ // You need to update this information to match with your server
    //ข้อมูลในส่วนนี้เป็นความลับ ไม่สามารถเผยแพร่ลงสาธารณะได้ครับ // This one is secret, so I can't public.
    //;w;

    //ไฟล์นี้จะมีเป็น Template ให้อยู่ใน /global/ นะครับ ชื่อ 'connect.template.php'
    //This template file is in /global/, named 'connect.template.php'

    $dbhost = "IP เซิฟเวอร์ MySQL ของคุณ";
    $dbuser = "Username สำหรับเข้าใช้งาน MySQL ของคุณ";
    $dbpass = "Password สำหรับเข้าใช้งาน MySQL ของคุณ";
    $dbdatabase = "Database ที่ต้องการให้ระบบใช้งาน";
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbdatabase);
    mysqli_set_charset($conn, 'utf8');

    if(! $conn ) {
        die('Could not connect: ' . mysqli_error($conn));
    }

    include(function.php);

?>
```

และสำหรับไฟล์ **'/global/verify/mail.php'** ที่เป็นไฟล์สำหรับระบบส่งอีเมล ให้แก้ไขจากไฟล์ **'/global/verify/mail.template.php'** นะครับหรือตาม Template ด้านล่าง

And for the **'/global/verify/mail.php'**, the mail system file, You need to create this file from the template in **'/global/verify/mail.template.php'** or the following template:
```
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../static/PHPMailer/PHPMailer.php'; // Only file you REALLY need
require '../../static/PHPMailer/Exception.php'; // If you want to debug
require '../../static/PHPMailer/SMTP.php';

// Form details
$email_to = $_GET['email'];

$fullname = "<<NAME SENDER HERE>>"; // required
$email_from = "<<EMAIL SENDER HERE>>"; // required
$subject = "สวัสดี! " . $_GET['name']; // required
$message = "กรุณายืนยันตัวตนเพื่อปลดล็อกการใช้งานฟังก์ชั่นบางอย่างในเว็บไซต์"; // required

$email_message = file_get_contents('email.html');
$email_message = str_replace("{{name}}", $_GET['name'], $email_message);
$email_message = str_replace("{{key}}", $_GET['key'], $email_message);
$email_message = str_replace("{{email}}", $_GET['email'], $email_message);

// No need to set headers here

// Replace the mail() function with PHPMailer

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

try {
    //Server settings
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->isHTML(true);
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '<<EMAIL SENDER HERE>>';                     // SMTP username
    $mail->Password   = '<<PASSWORD SENDER HERE>>';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($email_from, 'WE ARE SMD');
    $mail->addAddress($email_to, $fullname);     // Add the recipient

    //Content
    $mail->isHTML(true);                         // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $email_message;

    $mail->send();
    if (isset($_GET['method'])) {
        if ($_GET['method'] == "reg") {
            header("Location: ../../home");    
        } else if ($_GET['method'] == "changeEmail") {
            //Something could be happen here next day...
            $_SESSION['swal_warning'] = "คุณได้ทำการเปลี่ยนแปลงอีเมล";
            $_SESSION['swal_warning_msg'] = "อย่าลืมเข้าไปยืนยันตัวตนด้วยอีเมลใหม่ด้วยนะครับ";
        }
    } else {
        echo "SUCCESS";
    }
} catch (Exception $e) {
    die("ERROR! Mailer Error: $mail->ErrorInfo");
}
?>
```

### SQL Structure
-----------------
สำหรับ SQL Structure ของตัวเว็บไซด์ จะปรากฎในชื่อไฟล์ 'template.sql' นะครับ // The template file for SQL Structure is named 'template.sql' (Config,Achievement,User,Profile,Post)
เพียงแค่ Import เข้า Database ก็สามารถใช้งานได้เลยครับ // What you need just import that template file into your database.
#### Post Structure
```
pondjaco_smdkku
└── post
    ├── id<INT>
    ├── title<TEXT>
    ├── writer<INT>
    ├── time<TIME>
    ├── article<LONGTEXT>
    ├── cover<TEXT:URL>
    ├── category<TEXT>
    ├── tags<TEXT>
    ├── hide<BOOLEAN>
    ├── pin<BOOLEAN>
    ├── attachment<TEXT:URL>
    ├── type<TEXT>
    └── hotlink<TEXT:URL>
```

สำหรับ Forum จะแยก Database กับฐานข้อมูลหลักนะครับ // This for the Forum database, it's seperated from the main structure
(ในอนาคตอาจมีการปรับ Structure ใหม่) // (WIP on re-structuring)
#### Forum Structure [WIP]
```
pondjaco_smdkkuforum
├── forum_properties
│   ├── id<INT>
│   ├── category<TEXT>
│   ├── isPinned<BOOLEAN>
│   └── isHidden<BOOLEAN>
└── id_001/
    ├── id<INT> []
    ├── writer<INT>
    ├── title<TEXT>
    ├── message<LONGTEXT>
    ├── timestamp<TIME>
    └── attachment<FILE>
```