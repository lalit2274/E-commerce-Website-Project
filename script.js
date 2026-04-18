/* ================= CART ================= */
function addToCart(product_id){

let user_id = localStorage.getItem("loginUser")

// 🔥 FORCE VALUE
if(!user_id || user_id === null || user_id === "null"){
    user_id = "guest";
}

fetch("add_to_cart.php",{
method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},
body:`user_id=${user_id}&product_id=${product_id}`
})
.then(res=>res.text())
.then(data=>{
console.log("Added:", data)
alert("Added to Cart")
})

}


/* ================= SIDEBAR ================= */

function openSidebar(){
document.getElementById("sidebar").style.width="220px";
document.getElementById("overlay").style.display = "block";
}

function closeSidebar(){
document.getElementById("sidebar").style.width="0";
document.getElementById("overlay").style.display = "none";
}


/* ================= ADMIN PRODUCT ================= */
function addProduct(){

let formData = new FormData()

formData.append("name", document.getElementById("name").value)
formData.append("price", document.getElementById("price").value)
formData.append("description", document.getElementById("description").value)
formData.append("category", document.getElementById("category").value)

let file = document.getElementById("image").files[0]
formData.append("image", file)

fetch("add_product.php",{
method:"POST",
body:formData
})
.then(res=>res.text())
.then(data=>{
alert(data)

loadAdminStats();   // stats update
filterCategory("all"); // products refresh

})
 // ✅ FORM RESET (IMPORTANT)
  document.getElementById("name").value = "";
  document.getElementById("price").value = "";
  document.getElementById("description").value = "";
  document.getElementById("category").selectedIndex = 0;
  document.getElementById("image").value = "";
}

function showProducts(){

fetch("get_products.php")
.then(res=>res.json())
.then(products=>{

let html=""

products.forEach((p)=>{

html+=`

<div class="product">
<img src="${p.image || 'https://via.placeholder.com/150'}" width="150">
<h3>${p.name}</h3>
<p>₹${p.price}</p>
<button onclick="addToCart(${p.id})">Add Cart</button>
</div>

`

})

document.getElementById("product").innerHTML = html

})

}


function deleteProduct(id){

fetch("delete_product.php",{
method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},
body:`id=${id}`
})
.then(res=>res.text())
.then(data=>{
alert("Deleted")
showProducts()
})

}





/* search-section*/
function searchProduct(){

let search = document.getElementById("searchBox").value.toLowerCase()

fetch("get_products.php")
.then(res=>res.json())
.then(products=>{

let html=""

products.forEach(p=>{

if(p.name.toLowerCase().includes(search)){

html+=`
<div class="product">
<img src="${p.image || 'https://via.placeholder.com/150'}" width="150">
<h3>${p.name}</h3>
<p>₹${p.price}</p>
<button onclick="addToCart(${p.id})">Add Cart</button>
</div>
`

}

})

document.getElementById("products").innerHTML = html

})

}


/*login check*/
function buyNow(product_id){

let user = localStorage.getItem("loginUser")

if(!user){
alert("Please Login First")
window.location.href="login.html"
return
}

window.location.href="checkout.html?id="+product_id

}

/*order save*/
function placeOrder(product_id){

let user_id = localStorage.getItem("loginUser")

if(!user_id){
alert("Please Login First")
window.location.href="login.html"
return
}

fetch("place_order.php",{
method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},
body:`user_id=${user_id}&product_id=${product_id}`
})
.then(res=>res.text())
.then(data=>{
alert("Order Placed")
window.location.href="orders.html"
})

}


/**/
function toggleSearch() {
    let box = document.querySelector(".nav-search");
    let input = document.getElementById("searchBox");

    box.classList.toggle("active");

    if(box.classList.contains("active")){
        input.focus();
    }
}



function openProfile(){

let user = localStorage.getItem("loginUser")

if(!user){
    alert("Please Login First")
    window.location.href = "login.html"
    return false   // 🔥 VERY IMPORTANT
}

window.location.href = "profile.html"
return false
}
window.onload = function(){

    loadAdminStats();

    let user = localStorage.getItem("loginUser");

    let nameSpan = document.getElementById("userName");
    let link = document.getElementById("userLink");

    if(user && user !== "null"){
        nameSpan.innerText = "Hello, " + user;
        link.href = "profile.html";
    } else {
        nameSpan.innerText = "Hello, Register";
        link.href = "signup.html";
    }

}
