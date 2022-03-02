

  localStorage.setItem("time_now", Date.now());
  time_taken = localStorage.getItem("time_now") - localStorage.getItem("start_time");
  console.log(time_taken);
  if (localStorage.token == null) {
    window.location.href = "http://localhost/tm_dynamic_pricing_web/";
  } else if (time_taken > 900000) { //200s --> 200000ms 
    alert("You are logged out due to session timeout.");
    window.location.href = "http://localhost/tm_dynamic_pricing_web/";
  } else {
  }

