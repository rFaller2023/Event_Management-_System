<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification Modal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .open-modal-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .open-modal-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <button class="open-modal-btn" id="openOtpModalBtn">Open OTP Modal</button>

    <!-- OTP Verification Modal -->
    <div id="otpModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeOtpModalBtn" aria-label="Close">&times;</span>
            <h2>Verify OTP</h2>
            <form id="otpForm">
                <div class="form-group">
                    <label for="otp">Enter OTP:</label>
                    <input type="text" id="otp" name="otp" required>
                </div>
                <div class="form-group">
                    <button type="submit" id="submitOtpBtn">Verify OTP</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get the modals and buttons
        var otpModal = document.getElementById("otpModal");
        var openOtpModalBtn = document.getElementById("openOtpModalBtn");
        var closeOtpModalBtn = document.getElementById("closeOtpModalBtn");
        var otpForm = document.getElementById("otpForm");

        // Open OTP Modal
        openOtpModalBtn.onclick = function() {
            otpModal.style.display = "flex";
        }

        // Close OTP Modal
        closeOtpModalBtn.onclick = function() {
            otpModal.style.display = "none";
        }

        // Close OTP Modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target == otpModal) {
                otpModal.style.display = "none";
            }
        }

        // Handle OTP Form Submission
        otpForm.onsubmit = function(event) {
            event.preventDefault(); // Prevent default form submission

            var otpInput = document.getElementById("otp").value;

            if (otpInput) {
                // Simulate OTP verification process
                // Replace this with actual server request
                var isValidOtp = true; // Set this based on server response

                if (isValidOtp) {
                    // Close OTP modal
                    otpModal.style.display = "none";

                    // Redirect to a different page
                    window.location.href = "https://www.example.com"; // Replace with your target URL
                } else {
                    alert("Invalid OTP. Please try again.");
                }
            } else {
                alert("Please enter the OTP.");
            }
        }
    </script>

</body>
</html>
