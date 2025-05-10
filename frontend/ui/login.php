<div class="modal fade" id="loginModal" data-bs-backdrop="false" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5 text-warning" id="staticBackdropLabel">Login Page</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="post" id="loginForm">
          <div class="form-floating shadow-sm rounded">
            <input type="email" class="form-control "style="border:none;" name="email" id="email" placeholder="Enter your gmail" required>
            <label for="email" class="form-label">Email</label>
          </div>
          <label for=""id="errorLoginEmail" class="text-danger mb-4"></label>
          <div class="form-floating shadow-sm rounded">
            <input type="password" class="form-control" style="border:none;" name="password" id="password" placeholder="Enter your password" required>
            <label for="password">Password</label>
          </div>
          <label for=""id="errorLoginPassword" class="text-danger mb-4"></label>
          <div class="d-flex justify-content-between ">
                <div class="mb-2">
                    <label for="">Don't have an account?</label>
                    <a type="#" class="text-decoration-underline" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#signupModal">
                        Signup
                    </a>
                </div>
                <div class="mb-2 text-end">
                  <input type="submit" class="btn btn-primary px-4 me-2 shadow" name="login" id="login" value="Login">
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="../assets/vendor/jQuery/jquery-3.7.1.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("#loginForm");
        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            let isValid = true;
            document.getElementById("errorLoginEmail").innerText = "";
            document.getElementById("errorLoginPassword").innerText = "";
            if (!emailInput.value.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
                document.getElementById("errorLoginEmail").innerText = "Please enter a valid email address.";
                isValid = false;
            }
            if (!passwordInput.value.trim()) {
                document.getElementById("errorLoginPassword").innerText = "Password cannot be empty.";
                isValid = false;
            }
            if (isValid) {
              $.ajax({
                url: "../../database/verify_login.php",
                type: "POST",
                data: {
                  email: emailInput.value,
                  password: passwordInput.value
                },
                success: function (response){
                  if(response.trim() === "success"){
                    location.reload();
                  }else if(response.trim() === "error1"){
                    console.log("error1");
                    document.getElementById("errorLoginEmail").innerText = "The email is not registered. Please check for typos or sign up for a new account.";
                  }else if(response.trim() === "error2"){
                    console.log("error2");
                    document.getElementById("errorLoginPassword").innerText = "Incorrect password. Please try again.";
                  }
                }
              })
            }
        });
    });
  </script>