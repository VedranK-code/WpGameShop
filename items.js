$(document).ready(function() {
    $.ajax({
      url: 'items.php',
      type: 'GET',
      success: function(response) {
        $('#shopContainer').html(response);
      },
      error: function() {
        console.error('Error loading items.php');
      }
    });
  });