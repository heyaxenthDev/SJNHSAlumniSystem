function getSecurityQuestion() {
  let email = document.getElementById("email").value;
  let type = document.getElementById("type").value;

  fetch("get_security_question.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `email=${email}&type=${type}`, // Include 'type' and encode values
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        document.getElementById("securityQuestion").innerText = data.question;
        document.getElementById("securityQuestionSection").style.display =
          "block";
      } else {
        alert("Username not found!");
      }
    });
}

function verifyAnswer() {
  let email = document.getElementById("email").value;
  let answer = document.getElementById("securityAnswer").value;
  let type = document.getElementById("type").value;

  fetch("verify_security_answer.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `email=${email}&answer=${answer}&type=${type}`,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        document.getElementById("resetPasswordSection").style.display = "block";
      } else {
        alert("Incorrect answer!");
      }
    });
}

function resetPassword() {
  let email = document.getElementById("email").value.trim();
  let newPassword = document.getElementById("yourPassword").value.trim();
  let type = document.getElementById("type").value;

  if (!email || !newPassword || !type) {
    swal({
      title: "Error!",
      text: "All fields are required!",
      icon: "error",
      button: "OK",
    });
    return;
  }

  fetch("reset_password.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `email=${encodeURIComponent(email)}&newPassword=${encodeURIComponent(
      newPassword
    )}&type=${encodeURIComponent(type)}`,
  })
    .then((response) => response.json())
    .then((data) => {
      swal({
        title: data.status === "success" ? "Success!" : "Error!",
        text: data.message,
        icon: data.status,
        button: "OK",
      }).then(() => {
        if (data.status === "success") {
          window.location.href = "index.php"; // Redirect if successful
        }
      });
    })
    .catch((error) => {
      console.error("Error:", error);
      swal({
        title: "Error!",
        text: "Something went wrong. Please try again.",
        icon: "error",
        button: "OK",
      });
    });
}
