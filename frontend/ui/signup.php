  <div class="modal fade" id="signupModal" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-warning" id="staticBackdropLabel">Signup Page</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="home.php" method="post" id="form">
            <div class="form-floating  shadow-sm rounded">
                <input type="text" class="form-control "style="border:none;" name="name" id="name" placeholder="Enter your Name" required>
                <label for="name" class="form-label">Name</label>
              </div>
              <label for=""id="errorName" class="text-danger mb-4"></label>
            <div class="form-floating  shadow-sm rounded">
                <input type="email" class="form-control "style="border:none;" name="email" id="signupemail" placeholder="Enter your gmail" required>
                <label for="email" class="form-label">Email</label>
              </div>
              <label for=""id="errorEmail" class="text-danger mb-4"></label>
            <div class="form-floating  shadow-sm rounded">
                <input type="tel" class="form-control "style="border:none;" name="Mobile" id="mobile" placeholder="Enter your mobile number" required>
                <label for="Mobile" class="form-label">Mobile</label>
              </div>
              <label for=""id="errorMobile" class="text-danger mb-4"></label>
              <div class="row">
                <div class="col-6">
                  <div class="form-floating  shadow-sm rounded">
                    <input type="text" class="form-control "style="border:none;" name="state" id="state" placeholder="Enter your state" required>
                    <label for="state" class="form-label">State</label>
                  </div>
                  <label for=""id="errorState" class="text-danger mb-4"></label>
                </div>
                <div class="col-6">
                <div class="form-floating shadow-sm rounded">
                    <input type="text" class="form-control "style="border:none;" name="city" id="city" placeholder="Enter your City" required>
                    <label for="city" class="form-label">City</label>
                    </div>
                    <label for=""id="errorCity" class="text-danger mb-4"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-floating  shadow-sm rounded">
                      <input type="password" class="form-control" style="border:none;" name="password" id="signuppassword" placeholder="Enter your password" required>
                      <label for="password">Password</label>
                  </div>
                  <label for=""id="errorPassword" class="text-danger mb-4"></label>
                </div>
                <div class="col-6">
                  <div class="form-floating  shadow-sm rounded">
                    <input type="password" class="form-control" style="border:none;" name="confirmPassword" id="confirmPassword" placeholder="Enter your password" required>
                    <label for="confirmPassword">Confirm Password</label>
                  </div>
                  <label for=""id="errorConfirmPassword" class="text-danger mb-4"></label>
                </div>
              </div>
            <div class="d-flex justify-content-between">
                <div class="mb-2">
                    <label for="password">Already have an account?</label>
                    <a type="#" class="text-decoration-underline" style="cursor:pointer;"data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </a>
                </div>
                <div class="mb-2 text-end">
                    <input type="submit" class="btn btn-primary px-4 me-2 shadow" name="signup" id="signup" value="Sign Up">
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // console.log("Script loaded");
        const form = document.querySelector("#form");
        const nameInput = document.getElementById("name");
        const emailInput = document.getElementById("signupemail");
        const mobileInput = document.getElementById("mobile");
        const cityInput = document.getElementById("city");
        const stateInput = document.getElementById("state");
        const passwordInput = document.getElementById("signuppassword");
        const confirmPasswordInput = document.getElementById("confirmPassword");

        form.addEventListener("submit", function (e) {
            console.log("form submited");
            e.preventDefault();
            let isValid = true;
            document.getElementById("errorName").innerText = "";
            document.getElementById("errorEmail").innerText = "";
            document.getElementById("errorMobile").innerText = "";
            document.getElementById("errorPassword").innerText = "";
            document.getElementById("errorConfirmPassword").innerText = "";
            if (!nameInput.value.match(/^[A-Za-z\s]+$/)) {
                document.getElementById("errorName").innerText = "Name can only contain letters and spaces.";
                isValid = false;
            }
            if (!emailInput.value.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
                document.getElementById("errorEmail").innerText = "Please enter a valid email address.";
                isValid = false;
            }
            if (!mobileInput.value.match(/^[6-9][0-9]{9}$/)) {
                document.getElementById("errorMobile").innerText = "Please enter a valid 10-digit mobile number.";
                isValid = false;
            }
            if (passwordInput.value.length < 6) {
                document.getElementById("errorPassword").innerText = "Password must be at least 6 characters long.";
                isValid = false;
            }
            if (passwordInput.value !== confirmPasswordInput.value) {
                document.getElementById("errorConfirmPassword").innerText = "Password and Confirm Password must match.";
                isValid = false;
            }
            if (isValid) {
              $.ajax({
                url: "../../database/verify_signup.php",
                type: "POST",
                data: {
                  name: nameInput.value,
                  email: emailInput.value,
                  mobile: mobileInput.value,
                  address: cityInput.value+","+stateInput.value,
                  password: passwordInput.value
                },
                success: function (response){
                  console.log(response);
                  if(response.trim() === "success"){
                    console.log("form submited student added");
                    form.submit();
                  }else if(response.trim() === "error"){
                    console.log("email already exist");
                    document.getElementById("errorEmail").innerText = "Email already exist use another email.";
                  }else{
                      console.log("Other error");
                  }
                }
              }) 
            }
        });
    });
  </script>