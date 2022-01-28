<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" /> 
    <link rel="stylesheet" href="main.css" />


    <script src="https://kit.fontawesome.com/c041cc118c.js" crossorigin="anonymous"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />



    <!--animate-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="javascript.js"></script>

    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link type ="text/css" rel="stylesheet" href="mystyle.css">

</head>
</head>

<body>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: rgb(26, 23, 23);
    }

    h1 {
        text-align: center;
    }

    .navbar-custom {
        padding-top: 1rem;
        padding-bottom: 1rem;
        background-color: rgba(7, 7, 7, 0.582);
    }

    .footer {
        text-align: center;
        align-items: center;
        padding: 1rem;
        background-color: gray;
    }
    </style>
    </div>
<div id="menu" class="layout">
		<ul>
<li><a href="home.php" alt="desciption">Home</a></li>
	<li><a href="donation.php" alt="desciption"> Donation</a></li>
	<li><a href="edu.php" alt="desciption">Providing education</a></li>
	<li><a href="enroll.php" alt="desciption">Enrolling in NGO</a></li>
                
<li><a href="contact us.php" alt="desciption">Contact us</a></li>


	</ul>
</div>
    <div class="container" style="width:80%;margin-right: 10%;margin-left: 10%;margin-top:100px;">
        <form class="form" style="width:40%;margin:auto;justify-content:center;">
            <h1>PAYMENT FORM</h1>
            <hr>
            <h2>User information : </h2>
            <div class="form-group" style="width:300px">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group" style="width:300px">
                <label for="exampleInputEmail1">Email-id</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group" style="width:300px">
                <label for="exampleInputEmail1">Phone number</label>
                <input type="number" class="form-control" name="Phone number" id="number" required>
            </div>
            <div class="form-group" style="width:300px">
                <label for="exampleInputEmail1">Amount</label>
                <input type="number" class="form-control" name="Amount" id="amount" required>
            </div>
            <hr>
            <button class="btn btn-primary" type="butoon" id="paymentclick" onclick="pay_now(event)">pay amount</button>

    </div>



   
</body>

</html>
<script>
function pay_now(e) {
    var name = jQuery('#name').val();
    var amt = jQuery('#amount').val();
    var phone = jQuery('#number').val();
    var email = jQuery('#email').val();

    var options = {
        "key": "rzp_test_u1D40YsM5Cc0pP",
        "amount": amt * 100,
        "name": "NGO",
        "description": "",
        "image": "images/logo.png",
        "handler": function(response) {
            jQuery.ajax({
                type: "post",
                url: "payment.php",
                data: "payment_id=" + response.razorpay_payment_id + "&amt=" + amt + "&name=" + name +
                    "&phone=" + phone + "&email=" + email,
                success: function(result) {
                    Swal.fire(
                        'thank you for donation!',
                        'payment successful',
                        'success'

                    )
                    setTimeout(() => {
                        window.location.href = "index.php";

                    }, 5000);
                }

            });
            console.log(response);
        },
        "prefill": {
            "name": name,
            "email": email,
            "contact": phone
        },
        "notes": {
            "address": "address"
        },
        "theme": {
            "color": "#15b8f3"
        }
    };
    console.log(options);
    var propay = new Razorpay(options);
    propay.open();
    e.preventDefault();


}
</script>