<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MrigaAayuVets | Contact</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <header class="header">
        <div class="logo-container">
            <img src="logo (1).png" alt="Veterinary Clinic Logo" class="logo">
            </div>
            <h1 class="clinic-title">Veterinary Home Services</h1>
            <nav class="navbar">
                <ul>
                    <li><a href="home.html" class="active">Home</a></li>
                
                    <li><a href="gallery.html">Gallery</a></li>
                    <li><a href="blogs.html">Blogs</a></li>
                    <li><a href="services.html">Services</a></li>
                    <li><a href="About.html">About</a></li>
                    <li><a href="conctact.html">Contact</a></li>
                    <li><a href="#">Policies</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="contact" id="contact">
        <h2 class="heading">Contact <span>Us</span></h2>
        <form action="conctact.php" method="post">
          <div class="input-box">
            <input type="text" name="full_name" placeholder="Full Name" required />
            <input type="email" name="email" placeholder="Email Address" required />
          </div>
          <div class="input-box">
            <input type="tel" name="mobile_number" placeholder="Mobile Number" required />
            <input type="text" name="subject" placeholder="Subject" required />
          </div>
          <textarea name="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
          <input type="submit" value="Send Message" class="btn" />
        </form>
      </section>
      
        <section id="call-now">
            <p>or Call Now : <a href="tel:+918208657969">+91 8208657969</a></p>
        </section>
    
    

    <footer>
        <div class="container">
            <ul class="social-links">
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/mrigaayuvets?igsh=eGYxZ2R4ajNta2hr"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
            <p>&copy; 2025 MrigaAayu Vets. | Designed with love</p>
        </div>
    </footer>

    <div class="chat">
        <a href="https://wa.me/918208657969" target="_blank">
            <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp Icon" />
          </a>
       </div>

    <script src="script.js"></script>

</body>
</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost"; // or your server IP
$username = "root";  // your MySQL username
$password = "Malluk@123";      // your MySQL password
$database = "vet_clinic";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$mobile_number = $_POST['mobile_number'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Insert into DB
$sql = "INSERT INTO contact_form (full_name, email, mobile_number, subject, message)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $full_name, $email, $mobile_number, $subject, $message);

if ($stmt->execute()) {
    echo "Thank you! Your message has been received.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
