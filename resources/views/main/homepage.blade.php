<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="icon" type="image/x-icon" href="logo/logo.png">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/userpage/homepage.css') }}">
    <script src="{{ asset('js/homepage/homepage.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700,300">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.1.2/css/material-design-iconic-font.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Epilogue:wght@400&family=Finger+Paint&display=swap">
<script src="https://cdnjs.cloudflare.com/ajax/libs/zmdi/1.0.0/zmdi.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.0/push.min.js">
</head>
<body>
@include('layout.header')

<div class="homepage-latest">
            <span class="homepage-latest-span">
            <div class="homepage-latest-text">
                <p>"The prime mover in strengthening respect, 
                    understanding, and practice of human rights 
                    as the essential cornerstone of peace, unity,
                     and nation-building"
                     <br> <strong class="mantra">MANTRA</strong> <br>
                     CHR ng Lahat: Naglilingkod Maging Sino Ka Man
                </p>
              
                </div>
            </span>
</div>
<br><br><br><br><br><br><br>
<div class="chatbot">
<i class="fa-solid fa-message"></i>
</div>

<div class="card">
<a href="#" class="button-x">X</a>
    <div id="header">
      <h1>Chat Me </h1>
    </div>
    <div id="message-section">
      <div class="message" id="bot" style="z-index: 0 !important; "><span id="bot-response" style="z-index: 4 !important;">Please Ask anything!</span></div>
      <button class="feedback-btn" style="margin-bottom:8px;">Feedback</button>
      <!-- @foreach($chat as $chats)
      <button class="feedback-btn" onclick="showDetails(this)" style="margin-bottom:8px;">
        <span>{{ ucfirst($chats->title) }}</span>
        <input type="hidden" name="details" value="{{ $chats->details }}">
        <input type="hidden" name="chatbot_id" id="{{ $chats->id }}">
      </button>
      @endforeach -->
      @if (!auth()->check())
    <!-- Show these buttons only if the user is not logged in -->
      <a href="{{ route('Reset') }}">
        <button class="feedback-btn" style="margin-bottom:8px;">
            <span>Forgot Password</span>
        </button>
    </a>
    
    <a href="{{ route('Register') }}">
        <button class="feedback-btn" style="margin-bottom:8px;">
            <span>Create Account</span>
        </button>
    </a>
    @endif

    @if (auth()->check())
    <!-- Show these buttons only if the user is not logged in -->
      <a href="{{ route('Ask') }}">
        <button class="feedback-btn" style="margin-bottom:8px;">
            <span>Ask Question</span>
        </button>
    </a>
    
   
    @endif
    </div>

    <div id="message-details" style="display:none;position: absolute; top:78px; background-color:#fff; min-height: 290px; 
    max-height:292px;  z-index:0; overflow-y: auto;">
    <p id="message-detailed" style="margin-top: 40px; margin-left:20px; margin-right:20px;"></p>
    <a href="javascript:void(0);" onclick="closeDetails()" style="position:absolute; top:10px; right:10px; text-decoration:none; font-weight:bold; color:red;">X</a>
    </div>
    <div id="input-section">
      <input id="input" type="text" placeholder="Type a message" autocomplete="off" autofocus="autofocus" onkeypress="checkEnter(event)"/>
      <button class="send"  onclick="sendMessage()">
        <div class="circle"><i class="zmdi zmdi-mail-send"></i></div>
      </button>
    </div>
  </div>
  
  <div class="feedback-card">
    <h2>How are you feeling today?</h2>
    <p>Your input is valuable in helping us better understand your needs and tailor our service accordingly.</p>
    <form id="feedbackForm" action="/save-feedback" method="POST">
        @csrf
        <div class="emojis">
        
            <span class="emoji" data-value="1">😢</span>
            <span class="emoji" data-value="2">😞</span>
            <span class="emoji" data-value="3">😐</span>
            <span class="emoji" data-value="4">🙂</span>
            <span class="emoji" data-value="5">🥰</span>
        </div>
        <input type="hidden" name="user_email" value="{{ session('user_email') ?? null }}">
        <input type="hidden" name="rating" id="rating">
        <textarea name="comment" class="comment-box" placeholder="Add a Comment..(Optional)"></textarea>
        <button type="submit" class="submit-btn">Submit Now</button>
    </form>
    <button class="button_x">x</button>
</div>
@if (session('success'))
        <div class="modal" id="successModal">
            <div class="modal-content">
                <h2>Thank You!</h2>
                <p>Your feedback has been submitted successfully.</p>
                <button id="closeModal" class="ok-btn">OK</button>
            </div>
        </div>
    @endif

<style>
     .modal {
    display: none; /* Hidden by default */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
    justify-content: center;
    align-items: center;
    z-index: 99999;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    text-align: center;
    max-width: 90%; /* Changed to 90% for better responsiveness */
    margin: auto;
}

.ok-btn {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.ok-btn:hover {
    background-color: #45a049;
}

/* Style for the success message */
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
    color: #fff;
    background-color: #28a745;
    border: 1px solid #218838;
}

.button_x {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 5px 10px;
    background-color: red; 
    color: #ffffff;        
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button_x:hover {
    background-color: #0056b3; /* Darker blue on hover */
}

.button_x:active {
    background-color: #003f7f; /* Even darker on click */
}

.feedback-card {
    display: none;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    width: 90%; /* Use width instead of inline-size for better compatibility */
    max-width: 400px; /* Set a max-width for larger screens */
    padding: 25px;
    text-align: center;
}

.feedback-card h2 {
    margin-block-end: 15px;
    color: #333333;
}

.feedback-card p {
    color: #585758;
    font-size: 15px;
    margin-block-end: 30px;
}

.emojis {
    transition: transform 0.3s, color 0.3s;
    display: flex;
    justify-content: space-between;
    margin-block-end: 20px;
}

.emoji {
    cursor: pointer;
    font-size: 30px;
    transition: transform 0.3s, color 0.3s, filter 0.3s;
    color: #cccccc;
}

.emoji:hover {
    transform: scale(1.3);
    filter: grayscale(0);
    color: inherit;
}

.emoji.selected {
    transform: scale(1.3);
    color: #03070a;
}

.comment-box {
    width: calc(100% - 20px); /* Changed inline-size to width */
    padding: 10px;
    border: 1px solid #dddddd;
    border-radius: 8px;
    margin-block-end: 20px;
    resize: none;
    font-size: 14px;
    font-family: inherit;
    outline: none;
}

.submit-btn {
    background: linear-gradient(45deg, #4caf50, #388e3c);
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    width: 100%; /* Use width instead of inline-size */
    font-size: 18px;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background: linear-gradient(-63deg, #03f00f, #2e7d32);
}

.selected {
    color: #ffcc00;
}


</style>





<style>
    
     .feedback-btn:hover{
        background-color: #f8f9fa; /* Light background */
        border: 2px solid #007bff;
        color: #007bff;
     }   
    .feedback-btn {
    color: #333; 
    border-radius: 8px; /* Rounded corners */
    padding: 5px 8px;
    display: inline-flex;
    align-items: center;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
}

.feedback-btn span {
    margin-left: 8px; /* Space between icon and text */
}


    .homepage-latest span{
    position: relative;
    border-radius: 10px;
    height: 600px;
    min-width: 350px;
    width: 1300px;
    background-color: #fff;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    background-image: url('logo/homepage.png'); 
    background-size: cover; 
    background-position: center;
    background-repeat: no-repeat;
}


    @media screen and (max-width: 800px) {
.homepage-latest span{
    background-image: url('logo/homepage_2.png');
    margin-left: 15px;
    margin-right: 15px;
}
.homepage-latest-text{
    position: absolute;
    top: 440px;
    right: 50px; 
    height: 220px;
    width: 340px;
    max-width: 100%;
}
.homepage-latest-text p{
    line-height:1;

}
.mantra{
    color:#333;
}
}


</style>

@include('layout.footer')
<script>
 document.addEventListener('DOMContentLoaded', function() {
  const chatbotIcon = document.querySelector('.chatbot');
  const card = document.querySelector('.card');
  const closeButton = document.querySelector('.button-x');

  // Show the card when the chatbot icon is clicked
  chatbotIcon.addEventListener('click', function() {
    card.style.display = 'block'; // Show the card
    chatbotIcon.style.display = 'none'; // Hide the chatbot button
  });

  // Hide the card when the close button (X) is clicked
  closeButton.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent default link behavior
    card.style.display = 'none'; // Hide the card
    chatbotIcon.style.display = 'flex'; // Use 'flex' to keep the alignment intact
  });
});

</script>
<script>
function showDetails(button) {
    // Get the hidden input value for details
    const details = button.querySelector('input[name="details"]').value;
    

    const messageDetailsDiv = document.getElementById('message-details');
    const messages = document.getElementById('message-detailed');

    messages.innerText = details;

    messageDetailsDiv.style.display = 'block';
}
function closeDetails() {
    // Hide the #message-details div
    document.getElementById('message-details').style.display = 'none';
}

</script>
<script>
    function sendMessage() {
        const inputField = document.getElementById('input');
        const userMessage = inputField.value;
        
        // Create a new message element for the user
        const userDiv = document.createElement('div');
        userDiv.classList.add('message', 'user');
        userDiv.innerHTML = `<div class="message" id="user" style="z-index:0;"><span id="user-response">${userMessage}</span></div>`;
        
        // Append the user message to the message section
        const messageSection = document.getElementById('message-section');
        messageSection.appendChild(userDiv);
        
        // Clear the input field
        inputField.value = '';

        // Generate bot response
        const botResponse = getBotResponse(userMessage);
        
        // Create a new message element for the bot
        const botDiv = document.createElement('div');
        botDiv.classList.add('message', 'bot');
        botDiv.innerHTML = ` <div class="message" id="bot"><span id="bot-response">${botResponse}</span></div>`;
        
        // Append the bot message to the message section
        messageSection.appendChild(botDiv);
        
        // Scroll to the bottom of the message section
        messageSection.scrollTop = messageSection.scrollHeight;
    }
    function checkEnter(event) {
        if (event.key === 'Enter') {
            sendMessage(); 
        }
    }
    // function getBotResponse(userMessage) {
    //     if (userMessage.toLowerCase().includes('hello')) {
    //         return 'Hello! How can I assist you today?';
    //     } else if (userMessage.toLowerCase().includes('how are you')) {
    //         return 'I am just a bot, but thanks for asking!';
    //     } else if (userMessage.toLowerCase().includes('help')) {
    //         return 'Sure! What do you need help with?';
    //     } else {
    //         return 'I am not sure how to respond to that.';
    //     }
    // }

    function getBotResponse(userMessage) {
    userMessage = userMessage.toLowerCase();

     const words = userMessage.split(/\s+/); // Split by whitespace


    if (userMessage.includes('hello') || userMessage.includes('hi') || userMessage.includes('hey')) {
        return 'Hello! How can I assist you today?';
    } else if (userMessage.includes('how are you') || userMessage.includes('how are you doing')) {
        return 'I am just a bot, but thanks for asking! How can I assist you today?';
    } else if (userMessage.includes('help') || userMessage.includes('assist') || userMessage.includes('support')) {
        return 'Sure! What do you need help with? Feel free to ask your question.';
    } else if (userMessage.includes('what is your name')) {
        return 'I am your friendly chatbot, here to assist you with any inquiries!';
    } else if (userMessage.includes('thank you') || userMessage.includes('thanks')) {
        return 'You are welcome! Let me know if you need anything else.';
    } else if (userMessage.includes('human rights') || userMessage.includes('rights')) {
        return 'Human rights are the basic rights and freedoms that belong to every person. Would you like to know more about specific rights or violations?';
    } else if (userMessage.includes('how to file a complaint') || userMessage.includes('file complaint') || userMessage.includes('complaint process')) {
        return 'You can file a complaint by visiting the "File a Complaint" section on our website. Would you like a direct link to the page?';
    } else if (userMessage.includes('contact') || userMessage.includes('reach out') || userMessage.includes('get in touch')) {
        return 'You can contact us via email, phone, or through our contact form on the website. Which method would you prefer?';
    } else if (userMessage.includes('what is the commission on human rights') || userMessage.includes('about commission') || userMessage.includes('commission purpose')) {
        return 'The Commission on Human Rights is an independent body created to promote and protect human rights. Would you like to know more about its specific duties?';
    } else if (userMessage.includes('goodbye') || userMessage.includes('bye') || userMessage.includes('see you')) {
        return 'Goodbye! Feel free to reach out if you have more questions later. Stay safe!';
    } else if (userMessage.includes('what are my rights')) {
        return 'Your rights include basic freedoms such as the right to life, freedom of expression, and equality before the law. Would you like to learn more about any specific right?';
    } else if (userMessage.includes('how can I protect my rights')) {
        return 'You can protect your rights by staying informed, standing up against violations, and contacting authorities or organizations like the Commission on Human Rights. Need further guidance?';
    } else if (userMessage.includes('how does the commission investigate') || userMessage.includes('investigation process')) {
        return 'The Commission investigates complaints through a structured process, including fact-finding, interviews, and legal analysis to confirm human rights violations. Would you like to know more about the process?';
    } else if (userMessage.includes('what actions can the commission take') || userMessage.includes('commission actions')) {
        return 'The Commission can take various actions such as recommending policy changes, providing legal assistance, or advocating for victims of human rights violations. Need help with a specific case?';
    } else if (userMessage.includes('what is discrimination') || userMessage.includes('discrimination meaning')) {
        return 'Discrimination refers to treating people unfairly based on characteristics such as race, gender, religion, or nationality. Do you need advice on a particular case?';
    } else if (userMessage.includes('is my complaint anonymous')) {
        return 'Yes, your complaint can be anonymous if you prefer, though providing your contact information may help us assist you better. Would you like to proceed anonymously?';
    } else if (userMessage.includes('what happens after I file a complaint') || userMessage.includes('complaint response')) {
        return 'After filing a complaint, the Commission reviews your case, investigates the allegations, and takes appropriate action based on the findings. Would you like to know more about the follow-up process?';
    } else if (userMessage.includes('what is the law on human rights') || userMessage.includes('human rights law')) {
        return 'Human rights laws vary by country, but they generally guarantee fundamental freedoms such as the right to life, equality, and freedom of expression. Would you like more information on your local laws?';
    } else if (userMessage.includes('how do I get legal assistance') || userMessage.includes('legal help')) {
        return 'The Commission provides legal assistance in cases of human rights violations. You can contact us to find out more about how we can help in your case.';
    } else if (userMessage.includes('what is equality') || userMessage.includes('equality definition')) {
        return 'Equality means treating everyone with fairness and without bias, regardless of their race, gender, religion, or background. Do you have any specific concerns about inequality?';
    } else if (userMessage.includes('what is freedom of expression') || userMessage.includes('freedom of speech')) {
        return 'Freedom of expression is the right to freely express your opinions, thoughts, and ideas without government interference. Would you like to know about its limitations?';
    } else if (userMessage.includes('what is the right to life')) {
        return 'The right to life is the fundamental right that guarantees every individual’s right to live and be free from unlawful killing. It’s one of the most essential human rights. Do you need more details?';
    } else if (userMessage.includes('where can I get human rights resources') || userMessage.includes('resources for human rights')) {
        return 'You can find human rights resources on our website, including guidelines, publications, and reports. Would you like a link to the resources page?';
    } else if (userMessage.includes('what is torture') || userMessage.includes('torture definition')) {
        return 'Torture refers to the intentional infliction of severe pain or suffering, often for the purpose of punishment or coercion. It is strictly prohibited under human rights law. Do you have a related concern?';
    } else if (userMessage.includes('what is child labor') || userMessage.includes('child labor definition')) {
        return 'Child labor is the exploitation of children through work that deprives them of their childhood and education. It is a serious violation of human rights. Would you like more information on this?';
    } else if (userMessage.includes('how can I report child labor') || userMessage.includes('report child labor')) {
        return 'You can report child labor to the Commission on Human Rights through our complaints section. We take these cases very seriously and work to protect children’s rights. Would you like to proceed?';
    } else {
        return 'I am not sure how to respond to that. Could you please clarify or ask something else?';
    }
}

</script>
<script>
    // Get the elements
    const feedbackBtn = document.querySelector('.feedback-btn');
    const feedbackCard = document.querySelector('.feedback-card');
    const closeBtn = document.querySelector('.button_x');


    feedbackBtn.addEventListener('click', () => {
        feedbackCard.style.display = 'block';
    });


    closeBtn.addEventListener('click', () => {
        feedbackCard.style.display = 'none';
    });
</script>
<script>

    let selectedRating = null;
    const emojis = document.querySelectorAll('.emoji');
    const ratingInput = document.getElementById('rating');

    emojis.forEach((emoji) => {
        emoji.addEventListener('click', () => {
            emojis.forEach((e) => e.classList.remove('selected'));
            emoji.classList.add('selected');
            selectedRating = emoji.getAttribute('data-value');
            ratingInput.value = selectedRating; // Set the selected rating in the hidden input
        });
    });

    const form = document.getElementById('feedbackForm');
    form.addEventListener('submit', (e) => {
        if (!selectedRating) {
            e.preventDefault();
            alert('Please select a rating.');
        }
    });

</script>
  <script>
        // Show the modal if success message is flashed
        @if (session('success'))
            document.getElementById('successModal').style.display = 'flex';
        @endif

        // Close the modal when the "OK" button is clicked
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('successModal').style.display = 'none';
        });
    </script>
<script>
        // Check if the browser supports notifications
        if ("Notification" in window) {
            // Request permission to show notifications
            Notification.requestPermission().then(permission => {
                if (permission === "granted") {
                    document.getElementById('notify-btn').addEventListener('click', () => {
                        // Create and show the notification
                        new Notification("Hello!", {
                            body: "This is a notification from your browser!",
                            icon: "https://via.placeholder.com/128" // Optional icon
                        });
                    });
                } else {
                    console.log("Notification permission denied");
                }
            }).catch(err => {
                console.error("Error requesting notification permission:", err);
            });
        } else {
            console.log("This browser does not support notifications.");
        }
    </script>
</body>
</html>