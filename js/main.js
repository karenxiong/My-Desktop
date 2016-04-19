// allow drag and drop on tags with windows class
$(function() {
  $(".window").draggable();
});

// Close any open dropdown menu, when user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    $(".dropdown-content").hide();
  }
}

$(document).ready(function(){
  var maxIndex = 0; // used to decide which window overlaps another
  
  // reply msgs in order
  var annie = ["Hey its been a while!", "Sorry...I have to go! Talk to you next time :)"];
  var jacob = ["Hey... I'm not in a good mood right now.", "I'm gonna go. Seeya."];

  /* ---------------- App icon doubleclick behaviors ---------------- */
  // doubleclick apps, not including snake
  $(".apps div").dblclick(function() {
    var $appWindow = $("#" + $(this).attr("class"));
    maxIndex += 1;
    $appWindow.css("z-index", maxIndex);
    $appWindow.show();
  })

  // doubleclick snake app
  $(".snake").dblclick(function() {
    maxIndex += 1;
    $("#snake").css("z-index", maxIndex);
    // $("#snake").show();
    if ($("#snake").css("visibility") == "hidden")
      $("#snake").css('visibility', 'visible');
    else
      $("#snake").css("visibility", "hidden");
  });

  /* ---------------- Messenger chat window behaviors -------------------- */
  // double clicking name to open chat window
  $("#messenger span").dblclick(function() {
    var $appWindow = $("#" + $(this).attr("class"));
    maxIndex += 1;
    $appWindow.css("z-index", maxIndex);
    $appWindow.show();
  })

  // function used to get a reply from a person, line by line
  function getReply(receiver) {
    if (receiver.match(/annie/i)) return [annie.shift(), annie.length];
    if (receiver.match(/jacob/i)) return [jacob.shift(), jacob.length];
    if (receiver.match(/andy/i) || receiver.match("howard")) return ["", -1];
  }

  $(".send").keypress(function(e) {
    if(e.which == 13) { // if enter key is pressed
        // prevent default behavior
        e.preventDefault();
        
        // save and empty enter textbox
        var receiver = $(this).parent().parent().attr("id");
        var msg = "<b>Karen</b>" + " @ " + $("#time").html().split(",")[1] + 
          ": " + $(this).val(); // format the msg with a time
        $(this).val(""); // erase text box

        // update convo text box with the msg
        var $convoWindow = $("#" + receiver + " .convo");
        $convoWindow.append("<p class='sender'>" + msg + "</p>");
        $convoWindow.animate({ scrollTop: $convoWindow[0].scrollHeight}, 200);

        // reply after a certain time has passed
        var reply = getReply(receiver);
        setTimeout(function() {
          // say a reply
          if (reply[0] != undefined && reply[0] != "") {
            $convoWindow.append("<p class='receiver'>" + "<b>" + receiver.charAt(0).toUpperCase() 
              + receiver.slice(1) + "</b>" + " @ " + $("#time").html().split(",")[1] + ": " + reply[0] 
              + "</p>"); // show the reply
          }
          // check if the person doesnt have anything left to speak, puts em offline
          if (reply[0] != undefined && reply[1] == 0) {
            // put the person offline
            var currentOnlineNum = parseInt($(".online h4").html().split(" ")[1].split("/")[0]) - 1;
            var currentOfflineNum = parseInt($(".offline h4").html().split(" ")[1].split("/")[0]) + 1;
            $(".online h4").html("Online " + currentOnlineNum + "/4");
            $(".offline h4").html("Offline " + currentOfflineNum + "/4");
            $(".offline").append($(".contact " + "span." + receiver));
          }
        }, 2000);
    };
  });

  /* ---------------- general window / desktop behaviors ---------------- */
  // when window is clicked, it will appear on top of all other windows
  $(".window").click(function() {
    maxIndex += 1;
    $(this).css("z-index", maxIndex);
  });

  // close and window minimize buttons
  $(".close, .minimize").click(function() {
    if ($(this).closest(".window").css("id") == "snake") {
      $("#snake").css("visibility", "hidden");
    } else {
      $(this).closest(".window").hide();
    }
  });

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