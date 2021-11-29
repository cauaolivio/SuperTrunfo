let totalCards = 0;
let indexCard = 0;
let indexCardMachine = 0;

let cards = [];
let cardsPlayer = [];
let cardsMachine = [];

let cardFrontUser;
let cardBackUser;
let arrowRight;
let arrowLeft;
let buttonGame;
let buttonPlay;
let cardFrontMachine;
let cardBackMachine;
let modalEndGame;

let pointUser;
let pointMachine;

function startGame() {
  modalEndGame = document.querySelector('.content-end-game')
  cardFrontUser = document.querySelector('.card-front');
  cardBackUser = document.querySelector('.card-back');
  arrowRight = document.querySelector('.arrow-right');
  arrowLeft = document.querySelector('.arrow-left');
  buttonGame = document.querySelector('.buttom-game');
  buttonPlay = document.querySelector('.buttom-play');

  cardFrontUser.style.display = 'block';
  cardBackUser.style.display = 'none';
  arrowRight.style.display = 'block';
  arrowLeft.style.display = 'block';
  buttonGame.style.display = 'none';
  buttonPlay.style.display = 'block';
  modalEndGame.style.display = "none"; 
  
  cards = JSON.parse(handleCards());
  totalCards = cards.length;

  [cardsPlayer, cardsMachine] = separateCards(cards);
  
  pointUser = document.querySelector('.point-user').innerHTML = `${cardsPlayer.length} / ${totalCards}`;
  pointMachine = document.querySelector('.point-machine').innerHTML = `${cardsMachine.length} / ${totalCards}`;
  
  indexCard = 0;
  indexCardMachine = 0;
  
  makeCardPlayer(cardsPlayer);
}

function handleCards() {
  let cards = []
  let httpRequest = new XMLHttpRequest();

  httpRequest.onreadystatechange = () => {
    if (httpRequest.readyState === 4) {
      if (httpRequest.status === 200) {
        cards = httpRequest.responseText;
      }
    }
  };
  httpRequest.open('GET', '../database/drawCards.php', false);
  httpRequest.send();

  return cards;
}

function separateCards(cards) {
  cardsPlayer = [];
  cardsMachine = [];
  for(let i = 0; i < cards.length; i++) {
    if(i < (totalCards/2)){
      cardsPlayer.push(cards[i]);
    }else{
      cardsMachine.push(cards[i]);
    }
  }
  return [cardsPlayer, cardsMachine];
}

function makeCardPlayer(cardsPlayer) {
  let image = document.querySelector('#imagePlayer');
  let name = document.querySelector('#namePlayer');
  let potency = document.querySelector('#potencyPlayer');
  let motor = document.querySelector('#motorPlayer');
  let maxSpeed = document.querySelector('#maxSpeedPlayer');
  let time = document.querySelector('#timePlayer');
  let weight = document.querySelector('#weightPlayer');
  
  if(checkURL(cardsPlayer[indexCard].imagem)){
    image.src = cardsPlayer[indexCard].imagem;
  } else {
    image.src = "../assets/StandardCar.jpg";
  }
  name.innerHTML = cardsPlayer[indexCard].nome;
  
  potency.innerHTML = `${cardsPlayer[indexCard].potencia} CV`;
  motor.innerHTML = `${cardsPlayer[indexCard].motor}${cardsPlayer[indexCard].motor.indexOf('.') === -1 ? '.0' : ''}`;
  maxSpeed.innerHTML = `${cardsPlayer[indexCard].velocidade_maxima} Km/h`;
  time.innerHTML = `${cardsPlayer[indexCard].tempo_zero_cem} seg`;
  weight.innerHTML = `${cardsPlayer[indexCard].peso} Kg`;
}

function checkURL(url) {
  return(url.match(/\.(jpeg|jpg|gif|png)$/) != null);
}

function changeCard(n) {
  indexCard += parseInt(n);
  if (indexCard > cardsPlayer.length - 1) indexCard = 0;
  if (indexCard < 0) indexCard = cardsPlayer.length - 1;
  makeCardPlayer(cardsPlayer);
}

function getSelectAtr() {
  let radioAtr = document.querySelectorAll("[name=atr]");
  for (let i = 0; i < radioAtr.length; i++) {
    if (radioAtr[i].checked) {
      return radioAtr[i].value;
    }
  }
}

function makeCardMachine(cardsMachine, atrSelect) {
  let image = document.querySelector('#imageMachine');
  let name = document.querySelector('#nameMachine');
  let potency = document.querySelector('#potencyMachine');
  let motor = document.querySelector('#motorMachine');
  let maxSpeed = document.querySelector('#maxSpeedMachine');
  let time = document.querySelector('#timeMachine');
  let weight = document.querySelector('#weightMachine');
  
  if(checkURL(cardsMachine[indexCardMachine].imagem)){
    image.src = cardsMachine[indexCardMachine].imagem;
  } else {
    image.src = "../assets/StandardCar.jpg";
  }
  name.innerHTML = cardsMachine[indexCardMachine].nome;

  switch (atrSelect) {
    case 'potencia':
      potency.parentNode.style.backgroundColor = "#FF9794";
      
      motor.parentNode.style.backgroundColor = null;
      maxSpeed.parentNode.style.backgroundColor = null;
      time.parentNode.style.backgroundColor = null;
      weight.parentNode.style.backgroundColor = null;
      break;
    case 'motor':
      motor.parentNode.style.backgroundColor = "#FF9794";

      potency.parentNode.style.backgroundColor = null;
      maxSpeed.parentNode.style.backgroundColor = null;
      time.parentNode.style.backgroundColor = null;
      weight.parentNode.style.backgroundColor = null;
      break;
    case 'velocidade_maxima':
      maxSpeed.parentNode.style.backgroundColor = "#FF9794";

      potency.parentNode.style.backgroundColor = null;
      motor.parentNode.style.backgroundColor = null;
      time.parentNode.style.backgroundColor = null;
      weight.parentNode.style.backgroundColor = null;
      break;
    case 'tempo_zero_cem':
      time.parentNode.style.backgroundColor = "#FF9794";

      potency.parentNode.style.backgroundColor = null;
      motor.parentNode.style.backgroundColor = null;
      maxSpeed.parentNode.style.backgroundColor = null;
      weight.parentNode.style.backgroundColor = null;
      break;
    case 'peso':
      weight.parentNode.style.backgroundColor = "#FF9794";
      weight.parentNode.style.borderBottomLeftRadius = "8px";
      weight.parentNode.style.borderBottomRightRadius = "8px";

      potency.parentNode.style.backgroundColor = null;
      motor.parentNode.style.backgroundColor = null;
      maxSpeed.parentNode.style.backgroundColor = null;
      time.parentNode.style.backgroundColor = null;
      break;
  }
  
  potency.innerHTML = `${cardsMachine[indexCardMachine].potencia} CV`;
  motor.innerHTML = `${cardsMachine[indexCardMachine].motor}${cardsMachine[indexCardMachine].motor.indexOf('.') === -1 ? '.0' : ''}`;
  maxSpeed.innerHTML = `${cardsMachine[indexCardMachine].velocidade_maxima} Km/h`;
  time.innerHTML = `${cardsMachine[indexCardMachine].tempo_zero_cem} seg`;
  weight.innerHTML = `${cardsMachine[indexCardMachine].peso} Kg`;
}

function playGame() {
  if(cardsPlayer.length !== 0 || cardsMachine.length !== 0) {
    let atrSelect = getSelectAtr();
    let elResult = document.querySelector('.message-result');
    let valCardPlayer = parseFloat(cardsPlayer[indexCard][atrSelect]);
    indexCardMachine = Math.floor(Math.random() * (cardsMachine.length));
    let valCardMachine = parseFloat(cardsMachine[indexCardMachine][atrSelect]);
    
    let cardFrontMachine = document.querySelector('.card-machine-front');
    let cardBackMachine = document.querySelector('.card-machine-back');
    cardFrontMachine.style.display = 'block';
    cardBackMachine.style.display = 'none';
    
    makeCardMachine(cardsMachine, atrSelect);
    
    if (atrSelect == 'tempo_zero_cem') {
      if (valCardPlayer < valCardMachine) {
        elResult.innerHTML = "Você ganhou!";
        cardsPlayer.push(cardsMachine[indexCardMachine]);
        cardsMachine.splice(indexCardMachine, 1);
  
      } else if (valCardMachine < valCardPlayer) {
        elResult.innerHTML = "Você perdeu!";
        cardsMachine.push(cardsPlayer[indexCard]);
        cardsPlayer.splice(indexCard, 1);
  
      } else {
        elResult.innerHTML = "Deu empate!";
      }
    } else {
      if (valCardPlayer > valCardMachine) {
        elResult.innerHTML = "Você ganhou!"
        cardsPlayer.push(cardsMachine[indexCardMachine]);
        cardsMachine.splice(indexCardMachine, 1);
  
      } else if (valCardMachine > valCardPlayer) {
        elResult.innerHTML = "Você perdeu!";
        cardsMachine.push(cardsPlayer[indexCard]);
        cardsPlayer.splice(indexCard, 1);
  
      } else {
        elResult.innerHTML = "Deu empate!";
      }
    }

    pointUser = document.querySelector('.point-user').innerHTML = `${cardsPlayer.length} / ${totalCards}`;
    pointMachine = document.querySelector('.point-machine').innerHTML = `${cardsMachine.length} / ${totalCards}`;
    
    setTimeout(() => {
      cardFrontMachine = document.querySelector('.card-machine-front');
      cardBackMachine = document.querySelector('.card-machine-back');
      cardFrontMachine.style.display = 'none';
      cardBackMachine.style.display = 'block';
      elResult.innerHTML = '';
      
      if (cardsPlayer.length >= 1) {
        changeCard(-(cardsPlayer.length));
        makeCardPlayer(cardsPlayer);
      }

      if (cardsPlayer.length == 0 || cardsMachine.length == 0) {
        endGame();
      }
    }, 2500);
    
  }
}

function endGame() {
  modalEndGame = document.querySelector('.content-end-game')
  cardFrontUser = document.querySelector('.card-front');
  cardBackUser = document.querySelector('.card-back');
  arrowRight = document.querySelector('.arrow-right');
  arrowLeft = document.querySelector('.arrow-left');
  buttonGame = document.querySelector('.buttom-game');
  buttonPlay = document.querySelector('.buttom-play');
  cardFrontMachine = document.querySelector('.card-machine-front');
  cardBackMachine = document.querySelector('.card-machine-back');
  
  let titleModal = document.querySelector('.title-modal');
  let messageModal = document.querySelector('.message-modal');
  
  cardFrontUser.style.display = 'none';
  cardBackUser.style.display = 'block';
  cardFrontMachine.style.display = 'none';
  cardBackMachine.style.display = 'block';
  arrowRight.style.display = 'none';
  arrowLeft.style.display = 'none';
  buttonGame.style.display = 'none';
  buttonPlay.style.display = 'none';

  if (cardsPlayer.length == 0) {
    titleModal.innerHTML = "Derrota";
    titleModal.style.color = "#E10600";
    messageModal.innerHTML = "Que pena! <br/> Você perdeu essa partida.";
  }else{
    titleModal.innerHTML = "Vitória";
    titleModal.style.color = "#47AD36";
    messageModal.innerHTML = "Parabéns! <br/> Você venceu essa partida.";
  }

  modalEndGame.style.display = 'flex';

  handleMatch(cardsPlayer.length == 0 ? 'derrota' : 'vitoria');
}

function handleMatch(status) {
  let httpRequest = new XMLHttpRequest();
  
  let completeDate = new Date();
  
  let year = String(completeDate.getFullYear())
  let month = String(completeDate.getMonth()+1);
  let day = String(completeDate.getDate())
  let date = `${year}-${parseInt(month) < 10 ? '0' : ''}${month}-${parseInt(day) < 10 ? '0' : ''}${day}`;

  let hour = String(completeDate.getHours())
  let minutes = String(completeDate.getMinutes());
  let seconds = String(completeDate.getSeconds());
  let schedule = `${parseInt(hour) < 10 ? '0' : ''}${hour}:${parseInt(minutes) < 10 ? '0' : ''}${minutes}:${parseInt(seconds) < 10 ? '0' : ''}${seconds}`;
  
  httpRequest.open('POST', '../database/saveMatch.php', false);
  httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  httpRequest.send(`date=${date}&schedule=${schedule}&status=${status}`);
}