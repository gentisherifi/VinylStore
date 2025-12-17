document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");

  if (!form) return;

  form.addEventListener("submit", (e) => {
    e.preventDefault(); 

    const email = document.getElementById("loginEmail").value;
    const password = document.getElementById("loginPassword").value;

    if (email && password) {
      alert("Login successful!");
    } else {
      alert("Please enter both email and password.");
    }
  });
});
