<div class="breadcrumb-area pt-245 pb-245 " style="background-image:url(img/bg9.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="breadcrumb-wrapper text-center">
          <div class="breadcrumb-text">
            <h1>Contact Us</h1>
          </div>
          <div class="breadcrumb-menu mt-20">
            <ul>
              <li><a href="?a=home">home</a></li>
              <li><span>Contact Us</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="contact-area gray-bg pt-120" style="margin-bottom: -500px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="contact-info text-center mb-30">
          <i class="fas fa-rocket"></i>
          <h5>location</h5>
          <span><?php echo $company_location;?></span>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="contact-info text-center mb-30">
          <i class="fas fa-headphones"></i>
          <h5>support</h5>
          <span><?php echo $support_phone;?> <br> <?php echo $support_email;?></span>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="contact-bg white-bg mt-60">
          <div class="section-title section3-title title-contact text-center mb-50">
            <h1>Have Any Questions ?</h1>
            <p>Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days.
              We will be happy to answer your questions.</p>
          </div>

          <script language=javascript>
            function checkform() {
              if (document.mainform.name.value == '') {
                alert("Please type your full name!");
                document.mainform.name.focus();
                return false;
              }
              if (document.mainform.email.value == '') {
                alert("Please enter your e-mail address!");
                document.mainform.email.focus();
                return false;
              }
              if (document.mainform.message.value == '') {
                alert("Please type your message!");
                document.mainform.message.focus();
                return false;
              }
              return true;
            }
          </script>

          <form method=post name=mainform id="support_form">

            <div class="row">
              <div class="col-lg-6 col-md-6 mb-20">
                <input type="text" name="name" id="support_name" value="" placeholder="Your Name"
                  style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
              </div>
              <div class="col-lg-6 col-md-6 mb-20">
                <input type="text" name="email" id="support_email" value="" placeholder="Your E-mail"
                  style=" width: 100%;height: 50px; border: 1px solid #ddd; padding: 0 15px;">
              </div>
              <div class="col-lg-12 col-md-12 mb-20">
                <textarea name="message" id="support_message" cols="30" rows="10" placeholder="Message"
                  style="width: 100%; padding: 15px; border: 1px solid #ddd; height: 200px;"></textarea>

                <div class="text-center mt-20">
                  <button class="btn" id="support_submit" type="submit">Send</button>
                </div>
              </div>
            </div>
          </form>
          <div class="input-row s_message" style="padding: 0px !important; margin: 25px auto !important;text-align: center;display: flex;justify-content: center; ">
                        <!-- <div class="alert alert-danger" style="border-radius:3px;text-align:center;background-color:#E23D28;color:#fff;padding:5px 85px;margin-top:0px"> Registration Successful</div> -->
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="map-area">
  <div id="map" class="map"></div>
</div>

<script>
  $(document).ready(function () {
    $("#support_form").submit(function (event) {
      event.preventDefault();


      var name = $("#support_name").val();
      var email = $("#support_email").val();
      var message = $("#support_message").val();
      var support_submit = $("#support_submit").val();

      console.log("name: " + name + " email: " + email + " message: " + message);


      //                $("#new-password--js").val('');
      $("#support_submit").html('<b>....</b>');
      $.ajax({
        type: "POST",
        url: "phpscripts/support.php/",
        data: {
          name: name,
          email: email,
          message: message,
          support_submit: support_submit
        },
        success: function (response) {
          $(".s_message").html(response);
          //      console.log(response);
          //      console.log("Done"); 
          $("#support_submit").html('Send');
        },
        error: function (response) {
          console.log(response);
          $("#support_submit").html('Send');
        }
      });

    });

  });
</script>