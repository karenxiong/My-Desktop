  // Close any open dropdown menu, when user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      $(".dropdown-content").hide();
    }
  }

$(document).ready(function(){
  // when a menu bar button is clicked, the dropdown will show
  $(".dropbtn").click(function() {
    $(".dropdown-content").hide(); // hide all other menus first
    $(this).children(".dropdown-content").show();
  });

  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function updateTime() {
    var today = moment().format('ddd MMM D, h:mm A');
    document.getElementById("time").innerHTML = today;
  };
  updateTime();
  setInterval(function(){
    updateTime();
  },1000);  
});