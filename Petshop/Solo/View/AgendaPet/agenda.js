let petSelecionado = null;
let nomePet = "";
let servicoSelecionado = null;



function selecionarPet(elemento,event) {
    event.preventDefault();
    const continuar = document.getElementById("continuar");
    const imagemPet = elemento.querySelector(".imagemPet");

    if (petSelecionado !== null) {
        petSelecionado.querySelector(".imagemPet").classList.remove("selected");
    }

    imagemPet.classList.add("selected");
    petSelecionado = elemento;
    continuar.disabled = false;
    continuar.style.cursor = "pointer";
    continuar.style.backgroundColor = "#7A1858";
    continuar.style.color = "white";

    nomePet = elemento.querySelector("h2").textContent;
    document.getElementById('nomePetId').value = nomePet;

    // Atualize os dados do servidor usando AJAX
    const xhr = new XMLHttpRequest();
    const dadosEnviar = {
        nomePet: nomePet,
    };
    const url = "agendarPetPag2.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                console.log(response); // Dados retornados do servidor
            } else {
                console.error("Erro:", xhr.status);
            }
        }
    };
    xhr.send(JSON.stringify(dadosEnviar));


    ///////////////////////////////////
    //Função Serviço//
}
function selecionarServico(elemento) {
    
    const continuar = document.getElementById("continuar");
    const servico = elemento.querySelector('div');
    
  const servicoID = elemento.id;
    
    servicoSelecionado = elemento;
    continuar.disabled = false;
    continuar.style.cursor = "pointer";
    continuar.style.backgroundColor = "#7A1858";
    continuar.style.color = "white";
    servico.style.color = "#7A1858"
    

    nomePet = elemento.querySelector("h2").textContent;
    document.getElementById('nomePetId').value = nomePet;

}
//////////////////////////////////////////

function voltar() {
    window.location.href = 'agendarPet.php';
}; 






