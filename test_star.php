
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="rating-stars">
  <span class="star" data-rating="1">&#9733;</span>
  <span class="star" data-rating="2">&#9733;</span>
  <span class="star" data-rating="3">&#9733;</span>
  <span class="star" data-rating="4">&#9733;</span>
  <span class="star" data-rating="5">&#9733;</span>
</div>
<input type="hidden" name="rating" id="rating-input" value="">


  </body>
</html>
<script type="text/javascript">

// Retrieve all star elements
const stars = document.querySelectorAll('.star');

// Add click event listener to each star
stars.forEach(star => {
  star.addEventListener('click', function() {
    const ratingValue = this.getAttribute('data-rating');

    // Set the value of the hidden input field
    document.getElementById('rating-input').value = ratingValue;

    // Add "active" class to the selected star and remove it from others
    stars.forEach(s => s.classList.remove('active'));
    this.classList.add('active');
  });
});


</script>
