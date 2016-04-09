$(document).ready(function(){
  function myFunction() {
      document.getElementById("droplist").classList.toggle("show");
  }

  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropmenu')) {

      var dropdowns = document.getElementsByClassName("dropcontent");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  function updateTime() {
    var today = moment().format('ddd MMM D, h:mm A');
    document.getElementById("time").innerHTML = today;
  };
  updateTime();
  setInterval(function(){
    updateTime();
  },1000);  
});