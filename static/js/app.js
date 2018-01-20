$(document).ready(function(){
  var words = ["Hey", "Hi", "Yo", "What's up", "How's it going", "What's cracking", "I'm Griimnak."];
  var count = 0;

  var greeting = setInterval(function(){
    count++;
    $("#changeText").text(function(){
      $(this).text(words[count % words.length]);
      if (count == 6) {
        clearInterval(greeting);
      }
    });
  }, 660);

  var animateIcons = setInterval(function(){
    $(".social-media-icons").fadeIn();
    $("#nav").fadeIn();
  }, 4500);

});

