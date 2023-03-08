function deleteCar(ID){
    let idPassed = ID;
    // console.log(Id)
    let deleteCar = new XMLHttpRequest();

    let url = "php/deletecar.php";
    let params = "ID=" + idPassed;
    deleteCar.open("POST", url, true);
    deleteCar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    deleteCar.send(params);
    location.reload();
}

function editcar(id){
    document.getElementById('IDCar').value = id;
}

function submittedforms(){
  let fetchMore = new XMLHttpRequest();
  fetchMore.open("GET", "./php/loadsubmitted.php", true);
  fetchMore.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      document.getElementById('content').innerHTML = 'Submitted Forms';
      document.querySelector('.featured-car-list').innerHTML = this.responseText;
    }
  };
  fetchMore.send();
};


function deleteform(ID){
  let idPassed = ID;
  // console.log(Id)
  let deleteCar = new XMLHttpRequest();

  let url = "php/deletefinance.php";
  let params = "ID=" + idPassed;
  deleteCar.open("POST", url, true);
  deleteCar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  deleteCar.send(params);
  location.reload();
  submittedforms();
}




function logout() {
  let xhr = new XMLHttpRequest();

  xhr.open('GET', 'php/logout.php', true);

  xhr.onload = function() {
    if (this.status == 200) {
      console.log(this.responseText);
    }
  };

  // Send the request
  xhr.send();
  location.reload();
}
