$(document).ready(function() {
    $.ajax({
      url: 'shopLoggedIn.php',
      type: 'GET',
      success: function(response) {
        $('#shopContainer').html(response);
      },
      error: function() {
        console.error('Error loading shopLoggedIn.php');
      }
    });
  });