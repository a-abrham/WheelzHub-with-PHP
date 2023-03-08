// Cart

let cartHolder = document.querySelector('.cart-holder');
let closeCart = document.querySelector('#close-cart');


function viewCart() {
    cartHolder.classList.add("active");
    body.classList.add('bodylog');
    container.classList.add('con-mob');
}

// for login
function login() {
    body.classList.add('bodylog');
}

function closelogin() {
    body.classList.remove('bodylog');
}


closeCart.onclick = function(){
    cartHolder.classList.remove("active");
    body.classList.remove('bodylog');
    container.classList.remove('con-mob');
}

function checkout() {
    cartHolder.classList.remove("active");
    body.classList.remove('bodylog');
    container.classList.remove('con-mob');
}

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {
    let removeCartItemButtons = document.getElementsByClassName('cart-remove')
    for (let i = 0; i < removeCartItemButtons.length; i++) {
        let button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)
    }

    let quantityInputs = document.getElementsByClassName('cart-quantity')
    for (let i = 0; i < quantityInputs.length; i++) {
        let input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

    // let addToCartButtons = document.getElementsByClassName('add-to-cart')
    // for (let i = 0; i < addToCartButtons.length; i++) {
    //     let button = addToCartButtons[i]
    //     button.addEventListener('click', addToCartClicked)
    // }

}

function addtoCart(title, price, imageUrl) {
    console.log(title, price, imageUrl);

    let cartbox = document.createElement('div');
    cartbox.classList.add('cart-box');
    let cartContent = document.getElementsByClassName('card-content')[0];
    let cartboxNames = cartContent.getElementsByClassName('cart-product-title');
    
    let cartboxContents = `
    <img src="${imageUrl}" class="cart-img">
    <div class="detail-box">
        <div class="cart-product-title">${title}</div>
        <div class="cart-price">${price} ETB</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <a href="#" class="cartremove"><ion-icon src='icons/del.svg' aria-hidden='true'></ion-icon></a>
    </div>
    `;
    cartbox.innerHTML = cartboxContents;
    cartContent.append(cartbox);
    cartbox.getElementsByClassName('cartremove')[0].addEventListener('click', removeCartItem)
    cartbox.getElementsByClassName('cart-quantity')[0].addEventListener('change', quantityChanged)

    updatetotal();
}

function removeCartItem(event) {
    let buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updatetotal();
}

function quantityChanged(event) {
    let input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updatetotal();
}

function updatetotal() {
    document.getElementsByClassName('total-price')[0].innerText = '0 ETB '

    let cartContent = document.getElementsByClassName('card-content')[0]
    let cartboxes = cartContent.getElementsByClassName('cart-box')
    let total = 0
    for (let i = 0; i < cartboxes.length; i++) {
        let cartbox = cartboxes[i]
        let priceElement = cartbox.getElementsByClassName('cart-price')[0]
        let quantityElement = cartbox.getElementsByClassName('cart-quantity')[0]
        let price = parseFloat(priceElement.innerText.replace('ETB', ''))
        let quantity = quantityElement.value
        total = total + (price * quantity)
        total = Math.round(total * 100) / 100;

        document.getElementsByClassName('total-price')[0].innerText = total + ' ETB '
    }
}





// featured car image viewer

function changepic(smallImg) {
    let bigImg = document.getElementById('imagebox');
    bigImg.src = smallImg.src;
}
    



// go to top

let scroll = document.getElementById('header');


window.onscroll = function scrollFunction() {

    
  if (document.documentElement.scrollTop > 10) {
    if (document.documentElement.scrollTop > 100) {
        document.getElementById("myBtn").style.display = "block";
    }
    scroll.classList.add('activ');
    }
    else {
    document.getElementById("myBtn").style.display = "none";
    scroll.classList.remove('activ');
  }
}

// When the user clicks on the button, scroll to the top of the document
document.getElementById("myBtn").addEventListener("click", topFunction);

function topFunction() {
  document.documentElement.scrollTop = 0;
}









/* nav mob reponsive */
let mobMenu = document.getElementById('mobMenu');
let menu = document.querySelector('.menu');
let body = document.querySelector('body');
let container = document.querySelector('section');


mobMenu.onclick = function() {
    topFunction();
    mobMenu.classList.toggle('fa-times');
    menu.classList.toggle('active');
    body.classList.toggle('bodylog');
    container.classList.toggle('con-mob');
}




let car = {
    imgs: './images/featured cars/car1.png',
    imageUrl: './images/featured cars/car1.png',
    made: 'Toyota',
    title: 'Toyota Hatchback'
}







function viewcar(title, image1, image2, image3) {
  console.log(title);
  body.classList.add('bodylog');  

  // console.log(image_url);

  document.querySelector(".form").innerHTML = `
  `

    document.querySelector(".form").innerHTML += `

    <h3>Details for ${title}</h3><a class="close" href="#featured-car" onclick="closelogin()">&times;</a>
    <div class="prod">
        
        <div class="pro-small-pic">
          <img src="${image1}" alt="" onclick="changepic(this)">
          <img src="${image2}" alt="" onclick="changepic(this)">
          <img src="${image3}" alt="" onclick="changepic(this)">
        </div>

        <div class="pro-big-pic">
          <img id="imagebox" src="${image2}" alt="">
        </div>
      </div>
    `
}


















// for view more car
document.getElementById("loadFeaturedCars").addEventListener("click", function() {
    let fetchMore = new XMLHttpRequest();
    fetchMore.open("GET", "./php/fetchmorecars.php", true);
    fetchMore.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        let content = document.querySelector(".featured-car-list")
         content.innerHTML = this.responseText;
      }
    };
    fetchMore.send();
});



function validateForm(){
    let username = document.getElementById("username").value;

    // Check if the input fields are empty
    if (username === "") {
      alert("Both fields are required.");
      return false;
    }
}

function disable(){
    body.classList.add('bodylog');
}