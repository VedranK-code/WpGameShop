$(document).ready(function() {
    $.ajax({
      url: 'ispis.php',
      type: 'GET',
      success: function(response) {
        $('#ItemsList').html(response);
      },
      error: function() {
        console.error('Error loading ispis.php');
      }
    });
  });