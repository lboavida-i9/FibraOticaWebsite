//Here you put the javascript that you need in youre html

//This function is going to call the Homepage handler, and run the Select all case
function GetWorkingExample() {
   $.post('../Handlers/HomePageHandlers.php?action=WorkingExample', function (response) {
       $("#Receiver").html(response);
    });
};