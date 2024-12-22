document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get("status");
  
    if (status) {
      const message =
        status === "success"
          ? "Üzenet sikeresen elküldve. Köszönöm a megkeresést!"
          : "Váratlan hiba miatt nem sikerült elküldeni az üzenetet.";
  
      // Create popup
      const popup = document.createElement("div");
      popup.textContent = message;
      popup.className = "popup " + (status === "success" ? "popup-success" : "popup-failure");
      document.body.appendChild(popup);
  
      // Delay fade-out effect for 5 seconds, then fade over 2 seconds
      setTimeout(() => {
        popup.classList.add("fade-out");
        setTimeout(() => popup.remove(), 2000); // Remove popup after fade-out
      }, 5000);

      // Optionally clean up the URL
      urlParams.delete("status");
      window.history.replaceState({}, document.title, window.location.pathname + window.location.hash);
    }
});
  