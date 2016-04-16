  // Close any open dropdown menu, when user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      $(".dropdown-content").hide();
    }
  }

$(document).ready(function(){
  var maxIndex = 0; // used to decide which window overlaps another

  // when a menu bar button is clicked, the dropdown will show
  $(".dropbtn").click(function() {
    $(".dropdown-content").hide(); // hide all other menus first
    $(this).children(".dropdown-content").show();
  });

  /* ----App button behaviors ----*/
  // double click to show app
  $(".apps div").dblclick(function() {
    var $appWindow = $("#" + $(this).attr("class"));
    maxIndex += 1;
    $appWindow.css("z-index", maxIndex);
    $appWindow.show();
  })

  // Enternet to close and minimize through buttons
  $(".close, .minimize").click(function() {
    $("#enternet").hide();
  });

  // Snake to close and minimize through buttons
  $(".sclose, .sminimize").click(function() {
    $("#snake").css("visibility", "hidden");
  });

  // Snake opening on doubleclick through snake app
  $(".snake").dblclick(function() {
    maxIndex += 1;
    $("#snake").css("z-index", maxIndex);
    // $("#snake").show();
    if ($("#snake").css("visibility") == "hidden")
      $("#snake").css('visibility', 'visible');
    else
      $("#snake").css("visibility", "hidden");
  });

  // $(function() {
  //   $(".etop").draggable();
  // });



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