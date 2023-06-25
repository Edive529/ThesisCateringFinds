<header class="header"  style="background-color:#2a9df4;">

   <section class="flex" >
     <a  type="button" onclick="goback()" class="back" style="    color: var(--white);
    margin-left: 2rem;
    font-size: 1.8rem;
    text-transform: capitalize;">Go Back</a>
      <a href="index.php" class="logo">CateringFinds</a>

      <nav class="navbar" >

        <a href="cateringMaps.php" class="cart-btn">Map</a>



         <a href="reglogin.php">my orders</a>

         <a href="reglogin.php" class="cart-btn">cart</a>





          <span class="input-group-btn">

            <a href="index_Search.php" >Search <span class="fas fa-search" style="color:#2a9df4;"></span></a>

       </span>



      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>
   </section>
   <script>
    function goback(){
        window.history.go(-1);
    }

    $('#ph').on('keypress',function(){
         var text = $(this).val().length;
         if(text > 9){
              return false;
         }else{
            $('#ph').text($(this).val());
         }

    });
</script>

</header>
