// const inputFile = document.querySelector("#picture__input");
// const pictureImage = document.querySelector(".picture__image");
// const pictureImageTxt = "Choose an image";
// pictureImage.innerHTML = pictureImageTxt;

// inputFile.addEventListener("change", function (e) {
//   const inputTarget = e.target;
//   const file = inputTarget.files[0];

//   if (file) {
//     const reader = new FileReader();

//     reader.addEventListener("load", function (e) {
//       const readerTarget = e.target;

//       const img = document.createElement("img");
//       img.src = readerTarget.result;
//       img.classList.add("picture__img");

//       pictureImage.innerHTML = "";
//       pictureImage.appendChild(img);
//     });

//     reader.readAsDataURL(file);
//   } else {
//     pictureImage.innerHTML = pictureImageTxt;
//   }
// });

/* Adiciona um ouvinte de evento para o evento de entrada no elemento com o ID "telTelefone"*/
const telTelefone = document.getElementById("telTelefone");
/* Verifica se o tamanho do telefone é igual a 11*/
telTelefone.addEventListener("input", function (e) {
  let telefone = e.target.value.replace(/\D/g, "").substring(0, 11);
  const tamanho = telefone.length;
/* Formata o telefone no formato (DD) 9XXXX-XXXX"*/
  if (tamanho === 11) {
    telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4})$/, "($1) $2-$3");
  }  /* Verifica se o tamanho do telefone é igual a 10*/

  else if (tamanho === 10) {
    telefone = telefone.replace(/^(\d{2})(\d{4})(\d{4})$/, "($1) $2-$3");
  }   
/* Verifica se o tamanho do telefone é igual a 9*/

  else if (tamanho === 9) {
    telefone = telefone.replace(/^(\d{5})(\d{4})$/, "$1-$2");
  } 
  /* Verifica se o tamanho do telefone é igual a 8*/
  /*  Formata o telefone no formato XXXX-XXXX*/
  else if (tamanho === 8) {
    telefone = telefone.replace(/^(\d{4})(\d{4})$/, "$1-$2");
  }
  /* Atualiza o valor do elemento de entrada com o telefone formatado*/

  e.target.value = telefone;
});