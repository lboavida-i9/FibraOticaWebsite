//Here you put the javascript that you need in youre html

//This function is going to call the Homepage handler, and run the Select all case
function GetWorkingExample() {
   $.post('../Handlers/HomePageHandlers.php?action=WorkingExample', function (response) {
       $("#Receiver").html(response);
    });
};

var myIndex;

function OnLoad()
{
    //inicio criaçao de carrosel
    myIndex = 0;
    carousel();
    //Fim criaçao de carrosel
}

//inicio criaçao de carrosel
function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
//fim criaçao de carrosel