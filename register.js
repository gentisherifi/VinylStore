document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registerForm");

  if (!form) return;

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const email = document.getElementById("regEmail").value;
    const password = document.getElementById("regPassword").value;
    const confirm = document.getElementById("regConfirm").value;

    if (email && password && confirm) {
      alert("Registration successful!");
    } else {
      alert("Please fill in all fields.");
    }
  });
});
