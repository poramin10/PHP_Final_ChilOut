function GetData0() {
  var keyword = document.querySelector(".keyword-TAT");

  let Picture = document.querySelector("#picture0");
  let Title = document.querySelector("#title0");
  let Description = document.querySelector("#description0");

  axios
    .get(
      "https://tatapi.tourismthailand.org/tatapi/v5/places/search?keyword=" +
        keyword.value,

      {
        headers: {
          Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
          "Accept-Language": `TH`,
        },
      }
    )

    .then((res) => {
      check = res.data.result[0].place_name;

      document.getElementById("card0").style.visibility = "visible";
      Picture.src = res.data.result[0].thumbnail_url;
      if (res.data.result[0].thumbnail_url == "") {
        Picture.src =
          "https://piotrkowalski.pw/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png";
      }
      Title.innerHTML = res.data.result[0].place_name;
      Description.innerHTML = res.data.result[0].destination;
    })
    .catch((error) => {
      document.getElementById("card0").style.visibility = "hidden";
    });
}

var button0 = document.querySelector(".button-TAT");
button0.addEventListener("click", GetData0);


// -------------------------------------------------------------------------
function GetData1() {
  var keyword = document.querySelector(".keyword-TAT");

  let Picture = document.querySelector("#picture1");
  let Title = document.querySelector("#title1");
  let Description = document.querySelector("#description1");

  axios
    .get(
      "https://tatapi.tourismthailand.org/tatapi/v5/places/search?keyword=" +
        keyword.value,

      {
        headers: {
          Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
          "Accept-Language": `TH`,
        },
      }
    )

    .then((res) => {
      document.getElementById("card1").style.visibility = "visible";
      Picture.src = res.data.result[1].thumbnail_url;
      if (res.data.result[1].thumbnail_url == "") {
        Picture.src =
          "https://piotrkowalski.pw/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png";
      }
      Title.innerHTML = res.data.result[1].place_name;
      Description.innerHTML = res.data.result[1].destination;
    })
    .catch((error) => {
      document.getElementById("card1").style.visibility = "hidden";
    });
}

var button1 = document.querySelector(".button-TAT");
button1.addEventListener("click", GetData1);

// -------------------------------------------------------------------------
function GetData2() {
    var keyword = document.querySelector(".keyword-TAT");
  
    let Picture = document.querySelector("#picture2");
    let Title = document.querySelector("#title2");
    let Description = document.querySelector("#description2");
  
    axios
      .get(
        "https://tatapi.tourismthailand.org/tatapi/v5/places/search?keyword=" +
          keyword.value,
  
        {
          headers: {
            Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
            "Accept-Language": `TH`,
          },
        }
      )
  
      .then((res) => {
        document.getElementById("card2").style.visibility = "visible";
        Picture.src = res.data.result[2].thumbnail_url;
        if (res.data.result[2].thumbnail_url == "") {
          Picture.src =
            "https://piotrkowalski.pw/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png";
        }
        Title.innerHTML = res.data.result[2].place_name;
        Description.innerHTML = res.data.result[2].destination;
      })
      .catch((error) => {
        document.getElementById("card2").style.visibility = "hidden";
      });
  }
  
  var button2 = document.querySelector(".button-TAT");
  button2.addEventListener("click", GetData2);
  

// -------------------------------------------------------------------------
  function GetData3() {
    var keyword = document.querySelector(".keyword-TAT");
  
    let Picture = document.querySelector("#picture3");
    let Title = document.querySelector("#title3");
    let Description = document.querySelector("#description3");
  
    axios
      .get(
        "https://tatapi.tourismthailand.org/tatapi/v5/places/search?keyword=" +
          keyword.value,
  
        {
          headers: {
            Authorization: `Bearer GiYml8OQO42CUxN0VCRr23w3lLqzxpHFmc6OBgb(lEvJF(hu)xdP1d2bI7nqDxOOIDTbvLKAUqk)L04ptZemKA0=====2`,
            "Accept-Language": `TH`,
          },
        }
      )
  
      .then((res) => {
        document.getElementById("card3").style.visibility = "visible";
        Picture.src = res.data.result[3].thumbnail_url;
        if (res.data.result[3].thumbnail_url == "") {
          Picture.src =
            "https://piotrkowalski.pw/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png";
        }
        Title.innerHTML = res.data.result[3].place_name;
        Description.innerHTML = res.data.result[3].destination;
      })
      .catch((error) => {
        document.getElementById("card3").style.visibility = "hidden";
      });
  }
  
  var button3 = document.querySelector(".button-TAT");
  button3.addEventListener("click", GetData3);
  