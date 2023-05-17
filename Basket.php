<!DOCTYPE html>
<html lang="UTF_8">
<head>
  <meta charset="UTF-8">
  <title>TAYA CAKE</title>
  <link rel="stylesheet" href="CSS.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="B3.3_Css.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
  <nav class="navbar">
    <div class="inner-width">
      <a href="Home.html" class="logo"><img src="kk.png" alt=""></a>
      <div class="navbar-menu">
        <a href="Home.html" class="active"> Home </a> 
     <a href="about us.html" > about us </a>
    <a href="customer reviews.html">Customer reviews</a>
     <a href="Your Opinions.html">Your Opinions</a>
      <a href="Basket.php" class="h-icons"><i class='bx bxs-cart'></i></a>  
		<a href="login.php" class="h-icons"><i class='bx bx-user'></i></a>
   </div>
      </div>
    </div>
  </nav>
  <!-- basket.html -->

    <div class="main-container">
    <div class="card">

      <div class="left-container">
        
  <div class="container">
    <table class="table table-striped table-hover">

      <thead>
        <tr>
          <th>Item</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody id="cart-items">
      </tbody>
      <tfoot>
        <tr>
          <td>Total</td>
          <td id="total-price"></td>
        </tr>
      </tfoot>
    </table>
  </div>
  
      </div>


      <?php	
        	require('connection.php');

        if (isset($_POST['submit'])) {
                                
                                $Country = trim($_POST['Country']);
                                $City = trim(($_POST['City']));
                                $Neighborhod = trim(($_POST['Neighborhod']));
                                $Street = trim(($_POST['Street']));
                                $Description = trim(($_POST['Description']));
                                $PostalCode = trim(($_POST['PostalCode']));

                           

								if (is_numeric($Country)) {
                                    $errors['Country'] = "<div style='color:red'>Country Must Be String</div>";
								}
								if(empty($errors)){
									$sql = "INSERT INTO deliveryaddress(Country,City,Neighborhod,Street,Description,PostalCode) VALUES(? , ? , ? , ? , ? , ?)";
                                    $stm = $con->prepare($sql);
                                    $stm->execute(array($Country,$City,$Neighborhod,$Street,$Description,$PostalCode));
                                    if ($stm->rowCount()) {
										
										echo "<script> alert('Successfully registered')
										window.open('Basket.php#manal','_self')
									  </script>";
								}
								else {

									echo "<div class='alert alert-danger'> Row Not Inserted</div>";

								}
							}
						}

?>
<form method="post">
      <div class="right-container">
          <h1>CheckOut</h1>
          <!--delivery-->
          <div class="box">
            <h3><img src="icon.jpeg" style="width:45px; height:30px;"> Delivery Address</h3>
            
                <div>
                <p>Country</p>
                <select  name="Country" id="" class="option-box" >
                <option  value="Saudi Arabia">Saudi Arabia</option>
                </select>
                </div>
                <div>
                  <p>City</p>
                  <select name="City" id="" class="option-box" >
                  <option  value="Riyadh">Riyadh</option>
                  </select>
                </div>
                <div class="user-details">
                <div class="input-box">
                <p>Neighborhod</p>
                <input type="text" name="Neighborhod" required maxlength="50" placeholder="Neighborhod Name" class="input" required>
                </div>
                <div class="input-box">
                <p>Street</p>
                <input type="text" name="Street" required maxlength="50" placeholder="Street Name" class="input" required>
                </div>
                <div class="input-box">
                <p>Description of the house (optional)</p>
                <input type="text" name="Description" placeholder="Description of the house" class="input" required>
                </div>
                <div class="input-box">
                <p>Postal Code (optional)</p>
                <input type="text" name="PostalCode" placeholder="Postal Code" class="input" required>
                </div>
                <br>
                <div class="button1">
                  <input type="submit" name="submit" value="save">
                  </div>
                </div>
            </form>
            </div>

            <?php	
        	require('connection.php');

        if (isset($_POST['submitt'])) {
                                
                                $name = trim($_POST['name']);
                                $cardnumber = trim(($_POST['cardnumber']));
                                $CardType = trim(($_POST['CardType']));
                                $IBANnumber = trim(($_POST['IBANnumber']));
                                $CVV = trim(($_POST['CVV']));

                           

                                if (is_numeric($name)) {
                                  $errors['name'] = "<div style='color:red'>name Must Be String</div>";
								}
								if(empty($errors)){
									$sql = "INSERT INTO paymentinformation(name,cardnumber,CardType,IBANnumber,CVV) VALUES(? , ? , ? , ? , ? )";
                                    $stm = $con->prepare($sql);
                                    $stm->execute(array($name,$cardnumber,$CardType,$IBANnumber,$CVV));
                                    if ($stm->rowCount()) {
										
										echo "<script> alert('Successfully registered')
										window.open('Basket.php#manal','_self')
									  </script>";
								}
								else {

									echo "<div class='alert alert-danger'> Row Not Inserted</div>";

								}
							}
						}

?>

            <br>
            <form method="post">

          <h2>Payment Information</h2>
          <p>The name of the card holder</p>
          <input type="text" required maxlength="50" name="name" class="inputbox" required>

          <p>card number</p>
          <input type="number"  name="cardnumber" class="inputbox" > 

          <p>Card Type</p>
          <select name="CardType" id="" class="inputbox">
            <option value="Choose the name of the bank">Choose the name of the bank</option>
            <option value="Al Rajhi Bank">Al Rajhi Bank</option>
            <option value="Al Ahly Bank">Al Ahly Bank</option>
            <option value="African Bank">African Bank</option>
          </select>

          <div class="expcvv">
            <p class="exp">IBAN number</p>
            <input type="number" name="IBANnumber" class="inputbox">

            <p class="exp2">CVV</p>
            <input type="password" name="CVV" class="inputbox">
          </div>

          <button type="submit" name="submitt" class="button">
            pay </button>
        </form>
      </div>

    </div>
  </div>
  <script>
    let cartItems=[];
    const storedCartItems = JSON.parse(localStorage.getItem('cartItems'));
    if (storedCartItems) {
      cartItems = storedCartItems;
    }
  
  const cartItemsEl = document.getElementById('cart-items');
  const totalPriceEl = document.getElementById('total-price');  
  let totalPrice = 0;
  
  cartItems.forEach((item, index) => {
    cartItemsEl.innerHTML += `
      <tr>
        <td>${item.name}</td>
        <td>${item.price}</td>
      </tr>
    `;
  
    totalPrice += parseInt(item.price.replace('SAR ', ''));
  });
  
  totalPriceEl.innerText = `SAR ${totalPrice}`;
  
  
</script>
</body>
</html>
