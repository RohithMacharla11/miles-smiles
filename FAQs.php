<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/FAQs.css">
<title>FAQs Page</title>
</head>
<body>
<?php include('header.php'); ?>
  
<div class="faq">
  <h1 style="margin-top:2rem;">FAQs</h1>
  <p style="color: #4c4b4b; margin-top:0px; font-size: 15px;">On this page you will find answers to the most frequently asked questions.</p>
</div>
<div class="faq-container">
  <div class="faq-item">
    <div class="faq-question">
      <h3>What documents do I need to hire a car?
        </h3>
      <button class="faq-toggle" onclick="toggleAnswer(this)">+</button>
    </div>
    <div class="faq-answer">
      You will typically need a valid driver's license, proof of nationality, and a form of payment.
    </div>
  </div>
  <!-- 2Repeat for other questions ------------------------------////////////////////////////////////////////-->
  <div class="faq-item">
    <div class="faq-question">
      <h3>Can I hire a car in one location and return it in another location?</h3>
      <button class="faq-toggle" onclick="toggleAnswer(this)">+</button>
    </div>
    <div class="faq-answer">
      Yes, most car hire companies offer this service, often referred to as "one-way car hire".
       However, there may be an additional fee for this service.
    </div>
  </div>
   <!-- 3Repeat for other questions ------------------------------////////////////////////////////////////////-->
   <div class="faq-item">
    <div class="faq-question">
      <h3>What happens if I return the car late?</h3>
      <button class="faq-toggle" onclick="toggleAnswer(this)">+</button>
    </div>
    <div class="faq-answer">
      We charge for an extra day if the car is returned late. 
      It's always best to return the car on time to avoid additional charges.
    </div>
  </div>
     <!--4 Repeat for other questions ------------------------------////////////////////////////////////////////-->
     <div class="faq-item">
      <div class="faq-question">
        <h3>Can I add an additional driver to my car hire?
        </h3>
        <button class="faq-toggle" onclick="toggleAnswer(this)">+</button>
      </div>
      <div class="faq-answer">
        Yes, our car hire company provide you a additional driver, but there may be an additional fee.
         also, you can add an additional driver to your car hire but, 
The additional driver must also meet the car hire company's rental requirements.

      </div>
    </div>
       <!-- 5Repeat for other questions ------------------------------////////////////////////////////////////////-->
       <div class="faq-item">
        <div class="faq-question">
          <h3> What should I do if the car breaks down?
          </h3>
          <button class="faq-toggle" onclick="toggleAnswer(this)">+</button>
        </div>
        <div class="faq-answer">
          If your vehicle breaks down on a highway, the first and foremost priority is to ensure the safety of all passengers in the car. 
          Find a secure location to park the vehicle and turn on the hazard lights or place a warning sign to alert other drivers of the situation.
        </div>
      </div>
         <!--6 Repeat for other questions ------------------------------////////////////////////////////////////////-->
         <div class="faq-item">
          <div class="faq-question">
            <h3>Are there age restrictions for hiring a car?</h3>
            <button class="faq-toggle" onclick="toggleAnswer(this)">+</button>
          </div>
          <div class="faq-answer">
            Yes, our car hire company require drivers to be at least 18 years old,
             and drivers under 25 may have to pay a "young driver fee".
          </div>
        </div>
           <!-- 7Repeat for other questions ------------------------------////////////////////////////////////////////-->
           <div class="faq-item">
            <div class="faq-question">
              <h3> Can I cancel my car hire?
              </h3>
              <button class="faq-toggle" onclick="toggleAnswer(this)">+</button>
            </div>
            <div class="faq-answer">
              Yes, our car hire company allow cancellations, but the terms and conditions will 
              be apply after 5hours of booking.
            </div>
          </div>
           <!-- 8Repeat for other questions ------------------------------////////////////////////////////////////////-->
           <div class="faq-item">
            <div class="faq-question">
              <h3>  What is included in the price of car hire?
              </h3>
              <button class="faq-toggle" onclick="toggleAnswer(this)">+</button>
            </div>
            <div class="faq-answer">
              The price of car hire typically includes the rental of the vehicle and basic insurance. 
              Additional services or coverage, such as GPS, child seats, or additional insurance, are usually not included and it  will cost extra.
            </div>
          </div>
</div>
<div class="footer">
  <p>&copy; 2024 Company Name. All rights reserved.</p>
</div>
<script>
function toggleAnswer(btn) {
  var answer = btn.parentNode.nextElementSibling;
  if (answer.style.display === 'none') {
    answer.style.display = 'block';
    btn.textContent = '-';
  } else {
    answer.style.display = 'none';
    btn.textContent = '+';
  }
}
</script>

</body>
</html>
