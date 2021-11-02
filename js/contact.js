$radios.change(function() {
  var $checked = $radios.filter(function() {
    return $(this).prop('checked');
  });
  // Output the value of the checked radio
  console.log($checked.val());
});
