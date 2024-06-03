<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            /* Dark space background */
            color: #0b2546;
            /* Dark text color */
            margin: 0;
            padding-top: 70px;2
        }

        /* Navigation Bar */
        .navbar {
            background-color: #ffffff;
            /* Deep space black */
            padding: 0.5rem;
            margin-bottom: -1.5%;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            font-weight: bold;
        }

        .navbar ul a {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-decoration: none;
            color: #0b2546;
            /* Dark text color */
            display: flex;
            font-size: 16px;
            margin-top: 25px;
        }

        .navbar a:hover {
            color: #f0c600;
            /* Hyperspace blue */
        }

        .navbar a[href="login.php"] {
            color: #f0c600;
        }

        /* Add hover color for the admin link */
        .navbar a[href="login.php"]:hover {
            color: #ff0000;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 5rem 0;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.8;
        }

        /* Button Styles */
        .overlay-content button {
            background-color: #f0c600;
            /* Hyperspace blue */
            color: #0b2546;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .overlay-content button:hover {
            background-color: #0b2546;
            color: #fff;
        }

        /* Image with Overlay */
        .image-overlay {
            position: relative;
            text-align: center;
            color: #fff;
        }

        .image-overlay h2 {
            color: #0b2546;
            /* Dark text color */
            font-size: 60px;
            white-space: nowrap;
            /* Prevent wrapping */
        }

        .image-overlay p {
            color: #0b2546;
            /* Dark text color */
            font-size: 22px;
            white-space: nowrap;
            /* Prevent wrapping */
            font-weight: bold;
        }

        .image-overlay img {
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.561);
            /* Black overlay with 50% opacity */
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 0;
            /* Align to the left */
            right: 0;
            /* Align to the right */
            transform: translateY(-50%);
        }

        /* Introduction Section */
        .introduction {
            text-align: center;
            padding: 4rem 0;
            margin-top: -3.5%;
        }

        .inline-tags h1,
        .inline-tags h2 {
            display: inline;
            /* or display: inline-block; */
            margin: 0;
            /* Optionally, remove default margins */
        }

        .inline-tags h1 {
            font-size: 40px;
            color: #f0c600;
            /* Hyperspace blue */
        }

        .introduction h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #0b2546;
            /* Dark text color */
        }

        .introduction p {
            font-size: 23px;
            font-weight: 500;
            color: #0b2546;
            /* Dark text color */
            line-height: 1.6;
            width: fit-content;
            padding: 20px;
            padding-bottom: -20%;
            margin-left: 70px;
            margin-right: 70px;
        }

        .divider {
            margin-top: -6%;
        }

        /* Services Section */
        .services {
            text-align: center;
            background-color: #f7f7f7;
            padding: 4rem 0;
            margin-top: 2%;
        }

        .sertitle {
            text-align: center;
            color: #0b2546;
            /* Dark text color */
            font-size: 2rem;
            margin-top: -4%;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .service-card {
            background-color: #ffffff;
            color: #0b2546;
            /* Dark text color */
            border-radius: 10px;
            padding: 1rem;
            margin: 1rem;
            display: inline-block;
            width: calc(33.3333% - 2rem);
        }

        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .service-card p {
            font-size: 1rem;
        }

        /* Inquiry Section */
        .inquiry {
            text-align: center;
            padding: 4rem 0;
        }

        .inquiry h2 {
            text-align: center;
            color: #0b2546;
            /* Dark text color */
            font-size: 2rem;
            margin-top: 0%;
            margin-bottom: -2%;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .inquiry p {
            font-size: 23px;
            font-weight: 500;
            color: #0b2546;
            /* Dark text color */
            line-height: 1.6;
            width: fit-content;
            padding: 40px;
            padding-bottom: -20%;
            margin-bottom: 40px;
            margin-left: 70px;
            margin-right: 70px;
        }

        .inquiry-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: -35px;
            margin-bottom: 20px;
        }

        .inquiry-buttons button {
            background-color: #f0c600;
            /* Hyperspace blue */
            color: #fff;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: large;
            text-transform: uppercase;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .inquiry-buttons button:hover {
            background-color: #0b2546;
        }


        .contact-container {
            max-width: 600px;
            color: #f7f7f7;
            margin: 50px auto;
            margin-bottom: -25px;
            margin-top: -25px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #0b2546;
        }

        .contact-container h2 {
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);
        }

        .contact-container p {
            margin-bottom: 20px;
        }

        .contact-details p {
            margin-bottom: 10px;
        }

        .contact-details strong {
            margin-right: 5px;
        }

        /* Footer */
        footer {
            background-color: #0b2546;
            padding: 1rem 0;
            text-align: center;
        }

        footer p {
            margin: 0;
            color: #fff;
            /* White text color */
        }

        /* Chat Box */
        .chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f0c600;
            /* Hyperspace blue */
            color: #0b2546;
            /* Dark text color */
            width: 60px;
            height: 60px;
            border-radius: 50%;
            text-align: center;
            line-height: 60px;
            cursor: pointer;
            z-index: 9999;
        }

        .chat-box {
            display: none;
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 300px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            z-index: 9998;
        }

        .chatbot header {
            position: relative;
            /* Ensure relative positioning for absolute positioning of close button */
            padding: 16px 0;
            text-align: center;
            color: #fff;
            background: #f0c600;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .close-btn {
            position: absolute;
            /* Position the close button */
            top: 10px;
            /* Adjust top distance as needed */
            left: 10px;
            /* Adjust right distance as needed */
            background: none;
            border: none;
            font-size: 2rem;
            color: #0b2546;
            cursor: pointer;
            outline: none;
        }

        .chat-content {
            padding: 20px;
            max-height: 300px;
            overflow-y: auto;
        }

        .chat-options {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .chat-options li {
            margin-bottom: 10px;
        }

        .chat-options li a {
            display: block;
            padding: 10px;
            background-color: #f0c600;
            /* Hyperspace blue */
            color: #0b2546;
            /* Dark text color */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .chat-options li a:hover {
            background-color: #0b2546;
            /* Dark text color */
            color: #fff;
            /* White text color */
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presidency Real Estate</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul>
            <li><img src="\img\Logo2.png" height="70px" width="120px"></li>
            <li><a href="customer-form.php">CUSTOMER FORM</a></li>
            <li><a href="owner-form.php">OWNER FORM</a></li>
            <!-- Apply hover color to the admin link -->
            <li><a href="login.php">ADMIN</a></li>
        </ul>
    </nav>

    <!-- Image with Overlay -->
    <div class="image-overlay">
        <img src="\img\back.png" alt="Background Image">
        <div class="overlay">
            <div class="overlay-content">
                <h2>UNLOCK SIMPLIFIED SOLUTIONS <br>FOR ALL YOUR REAL ESTATE NEEDS.</h2>
                <p>Embark on a journey with us from search to paperwork.
                    We connect you with the right match to suit your <br> specifications
                    with cutting-edge technology and convenient processes.
                    Trust our rigorous research and rest <br>assured!</p>

                <button onclick="document.getElementById('inquiry').scrollIntoView();">Inquiry Section</button>
            </div>
        </div>
    </div>

    <!-- Introduction Section -->
    <section class="introduction">
        <div class="inline-tags">
            <h1>[ </h1>
            <h2> WE MAKE REAL ESTATE A BREEZE </h2>
            <h1> ]</h1>
        </div>
        <p>Our goal is to provide you with the best possible experience in buying, selling,
            or renting property. We understand that navigating the real estate market
            can be overwhelming, but with our expertise and comprehensive services,
            we’re here to make it easy and stress-free for you.
            We offer a wide range of properties to meet your
            unique needs and preferences, including residential,
            commercial, and investment properties. Whether you’re a
            first-time homebuyer, a seasoned investor, or a landlord, our team
            of experienced professionals is dedicated to helping you find the right
            property and achieve your real estate goals.
            We strive to offer you the highest level of customer service
            and satisfaction, and we’re always here to answer any questions and provide
            support throughout the entire process. So, take a look around and let
            us help you find the property of your dreams today!</p>
        <!-- Button directing to the inquiry section -->
    </section>
    <section class="divider">
        <img src="\img\divider.png" width="fit-content"></img>
    </section>
    <!-- Services Section -->
    <section class="services">
        <section class="sertitle">
            <center>
                <h1>SERVICES</h1>
            </center>
        </section>
        <div class="service-card">
            <img src="\img\buildingicon.png" width="52px">
            <h3>Rent</h3>
            <p>We provide flexible and affordable rental solutions for all your needs.</p>
        </div>
        <div class="service-card">
            <img src="\img\key.png" width="52px">
            <h3>Sell</h3>
            <p>Sell your home quickly and easily with our professional real estate services..</p>
        </div>
        <div class="service-card">
            <img src="\img\money.png" width="52px">
            <h3>Buy</h3>
            <p>We provide comprehensive services to help you find and purchase the perfect home for your needs.</p>
        </div>
    </section>


    <!-- Inquiry Section -->
    <section id="inquiry" class="inquiry">
        <h2>BECOME A VALUED MEMBER OF OUR CLIENTELE !</h2>
        <p>Our services accommodate both those in search of properties for purchase
            or rental and individuals interested in listing their properties for sale.
            This will enable us to better understand your requirements and provide tailored assistance.
            <br><br> We're committed to assisting buyers, renters, and property sellers alike.
            Simply choose the relevant option and complete the form to receive personalized support.
        </p>
        <div class="inquiry-buttons">
            <button onclick="window.location.href='customer-form.php'">Customer Requirements/Inquiry Form</button>
            <button onclick="window.location.href='owner-form.php'">Owner Property Listing</button>
        </div>
    </section>


    <section class="contact-container">
        <h2>CONTACT US</h2>
        <p>Feel free to reach out to us via phone or email!</p>
        <div class="contact-details">
            <u>
                <p><strong>Phone:
            </u></strong> +91 1234567890</p>
            <p><u><strong>Email:</u></strong> info@presidencyrealestate.com</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2024 Presidency Real Estates. All rights reserved.</p>
    </footer>

    <!--chatbox -->

    <style>
        /* Import Google font - Poppins */
        .chatbot {
            position: fixed;
            right: 20px;
            bottom: 20px;
            width: 520px;
            height: auto;
            max-height: 80%;
            background: #fff;
            border-radius: 15px;
            overflow-y: auto;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 9999;
        }

        .chatbot.closed {
            opacity: 0;
            pointer-events: none;
            transform: translateY(100%);
        }

        .chatbot header {
            padding: 16px 0;
            text-align: center;
            color: #fff;
            background: #f0c600;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        header h2 {
            font-size: 1.4rem;
            margin: 0;
        }

        .chatbox {
            padding: 20px;
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        .chatbox .chat {
            display: flex;
            list-style: none;
            margin-bottom: 20px;
        }

        .chatbox .incoming,
        .chatbox .outgoing {
            align-items: flex-end;
        }

        .chatbox .incoming span,
        .chatbox .outgoing span {
            width: 45px;
            height: 45px;
            color: #fff;
            cursor: default;
            text-align: center;
            line-height: 32px;
            background: #f0c600;
            border-radius: 50%;
            margin-right: 10px;
        }

        .chatbox .incoming p,
        .chatbox .outgoing p {
            white-space: pre-wrap;
            padding: 12px 16px;
            border-radius: 10px;
            max-width: 75%;
            color: #000;
            font-size: 0.95rem;
            background: #f2f2f2;
            margin: 0;
        }

        .chatbot .chat-input {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .chat-input textarea {
            flex: 1;
            height: 40px;
            border: none;
            outline: none;
            resize: none;
            font-size: 0.95rem;
        }

        .chat-input span {
            color: #0b2546;
            cursor: pointer;
            font-size: 1.35rem;
        }

        .chatbot-toggler {
            position: fixed;
            bottom: 20px;
            right: 20px;
            outline: none;
            border: none;
            height: 50px;
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #000;
            color: #fff;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 9999;
        }

        .chatbot-toggler.closed {
            background: #0b2546;
            width: 80px;
            height: 80px;
            box-shadow: 0 0 15px #0b2546;
        }
    </style>
    </head>

    <body>

        <button class="chatbot-toggler closed" onclick="toggleChatbot()">
            <span><img src="/img/chat.png" style="width:47px;padding-top:10px;"></span> <!-- Symbol for chat icon -->
        </button>

        <div class="chatbot closed">
            <header>
                <h2>Chat With Our AI Assistant</h2>
                <button class="close-btn" onclick="toggleChatbot()">x</button> <!-- Move the close button here -->
            </header>
            <ul class="chatbox">
                <li class="chat incoming">
                    <span><img src="/img/bot.png" style="width:38px;"></span> <!-- Symbol for incoming message -->
                    <p>Hi there 👋<br>I am your AI Real Esate Assistant, How can I help you today?</p>
                </li>
                <!-- Add more chat messages here -->
            </ul>
            <div class="chat-input">
                <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
                <span id="send-btn">Send</span> <!-- Symbol for send icon -->
            </div>
        </div>

        <script>
            const chatbotToggler = document.querySelector(".chatbot-toggler");
            const closeBtn = document.querySelector(".close-btn");
            const chatbox = document.querySelector(".chatbox");
            const chatInput = document.querySelector(".chat-input textarea");
            const sendChatBtn = document.querySelector(".chat-input span");

            let userMessage = null; 
            const API_KEY = "sk-proj-A1SBAoKIcIMgTcQBnmjDT3BlbkFJjlgcv7R5XxhUQCwwjzaT"; 
            const inputInitHeight = chatInput.scrollHeight;

            const createChatLi = (message, className) => {
                // Create a chat <li> element with passed message and className
                const chatLi = document.createElement("li");
                chatLi.classList.add("chat", `${className}`);
                let chatContent = className === "outgoing" ? `<span class="material-symbols-outlined" style="background-color:#0b2546;"><img src="/img/user.png"style="width:32px;margin-top:5px"></span><p></p>` : `<span class="material-symbols-outlined"><img src="/img/bot.png"style="width:38px;"></span><p></p>`;
                chatLi.innerHTML = chatContent;
                chatLi.querySelector("p").textContent = message;
                return chatLi; // return chat <li> element
            }

            const generateResponse = (chatElement) => {
                const API_URL = "https://api.openai.com/v1/chat/completions";
                const messageElement = chatElement.querySelector("p");

                // Define the properties and message for the API request
                const requestOptions = {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Authorization": `Bearer ${API_KEY}`
                    },
                    body: JSON.stringify({
                        model: "gpt-3.5-turbo",
                        messages: [{ role: "user", content: userMessage }],
                    })
                }

                // Send POST request to API, get response and set the response as paragraph text
                fetch(API_URL, requestOptions)
                    .then(res => res.json())
                    .then(data => {
                        // Check if the user is asking "who are you"
                        if (userMessage.toLowerCase().includes("who are you")) {
                            messageElement.textContent = "I am an AI real estate assistant at Presidency Real Estate.We currently opperate only in Bangalore, Karnataka";
                        } else {
                            // Check various user queries and generate appropriate responses
                            let responseMessage;
                            const lowercaseUserMessage = userMessage.toLowerCase();
                            if (lowercaseUserMessage.includes("i am a customer") || lowercaseUserMessage.includes("i want to buy a property") || lowercaseUserMessage.includes("i want to buy a home")) {
                                responseMessage = "Sure, I can assist you with finding your dream home. Please fill out this form: <a href='customer-form.php'>Customer Form</a>";
                            } else if (lowercaseUserMessage.includes("i am a owner") || lowercaseUserMessage.includes("i want to sell my property") || lowercaseUserMessage.includes("i want to sell my home")) {
                                responseMessage = "Great! If you're looking to list your property, please fill out this form: <a href='owner-form.php'>Owner Form</a>";
                            } else if (lowercaseUserMessage.includes("contact details") || lowercaseUserMessage.includes("reach you")) {
                                responseMessage = "You can reach our agents at agent@presidencyrealestate.com or call us at +1234567890.We are here to assist you!";
                            } else {
                                responseMessage = data.choices[0].message.content.trim();
                            }
                            messageElement.innerHTML = responseMessage;
                        }
                    })
                    .catch(() => {
                        messageElement.classList.add("error");
                        messageElement.textContent = "Oops! Something went wrong. Please try again.";
                    })
                    .finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
            }



            const handleChat = () => {
                userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
                if (!userMessage) return;

                // Clear the input textarea and set its height to default
                chatInput.value = "";
                chatInput.style.height = `${inputInitHeight}px`;

                // Append the user's message to the chatbox
                chatbox.appendChild(createChatLi(userMessage, "outgoing"));
                chatbox.scrollTo(0, chatbox.scrollHeight);

                setTimeout(() => {
                    // Display a message while waiting for the response
                    const incomingChatLi = createChatLi("Thinking...", "incoming");
                    chatbox.appendChild(incomingChatLi);
                    chatbox.scrollTo(0, chatbox.scrollHeight);
                    generateResponse(incomingChatLi);
                }, 600);
            }

            chatInput.addEventListener("input", () => {
                // Adjust the height of the input textarea based on its content
                chatInput.style.height = `${inputInitHeight}px`;
                chatInput.style.height = `${chatInput.scrollHeight}px`;
            });

            chatInput.addEventListener("keydown", (e) => {
                // width is greater than 800px, handle the chat
                if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
                    e.preventDefault();
                    handleChat();
                }
            });
            function toggleChatbot() {
                const chatbot = document.querySelector('.chatbot');
                const chatbotToggler = document.querySelector('.chatbot-toggler');

                chatbot.classList.toggle('closed');
                chatbotToggler.classList.toggle('closed');
            }

            sendChatBtn.addEventListener("click", handleChat);
            closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
            chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
        </script>
    </body>

</html>